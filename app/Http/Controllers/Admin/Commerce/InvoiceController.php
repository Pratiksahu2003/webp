<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInvoiceRequest;
use App\Models\Order;
use App\Models\ServicePackage;
use App\Models\User;
use App\Services\CheckoutService;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(
        protected CheckoutService $checkoutService,
        protected InvoiceService $invoiceService,
    ) {}

    public function index(Request $request)
    {
        $invoices = Order::query()
            ->adminSource()
            ->with(['user', 'package', 'subService', 'service'])
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('order_number', 'like', "%{$request->search}%")
                        ->orWhere('invoice_title', 'like', "%{$request->search}%")
                        ->orWhereHas('user', fn ($u) => $u->where('name', 'like', "%{$request->search}%")
                            ->orWhere('email', 'like', "%{$request->search}%"));
                });
            })
            ->status($request->payment_status)
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $stats = [
            'pending' => Order::adminSource()->where('payment_status', 'pending')->count(),
            'processing' => Order::adminSource()->where('payment_status', 'processing')->count(),
            'paid' => Order::adminSource()->where('payment_status', 'paid')->count(),
            'failed' => Order::adminSource()->where('payment_status', 'failed')->count(),
        ];

        return view('admin.commerce.invoices.index', compact('invoices', 'stats'));
    }

    public function create(Request $request)
    {
        $customers = User::query()
            ->where('role', 'user')
            ->orderBy('name')
            ->get(['id', 'name', 'email', 'company_name']);

        $packages = ServicePackage::query()
            ->with(['subService.service'])
            ->active()
            ->orderBy('package_name')
            ->get();

        $selectedCustomerId = $request->integer('customer_id') ?: null;

        return view('admin.commerce.invoices.create', compact('customers', 'packages', 'selectedCustomerId'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $customer = User::where('role', 'user')->findOrFail($request->validated('customer_id'));
        $order = $this->checkoutService->createAdminInvoice($customer, $request->validated());

        if ($request->boolean('send_now')) {
            $this->invoiceService->send($order);

            return redirect()
                ->route('admin.invoices.show', $order)
                ->with('success', 'Invoice created and emailed to the client.');
        }

        return redirect()
            ->route('admin.invoices.show', $order)
            ->with('success', 'Invoice created. You can send it when ready.');
    }

    public function show(Order $invoice)
    {
        abort_unless($invoice->source === 'admin', 404);

        $invoice->load(['user', 'service', 'subService', 'package', 'transactions']);

        return view('admin.commerce.invoices.show', [
            'invoice' => $invoice,
            'paymentUrl' => $invoice->canAcceptPayment() ? $invoice->signedPaymentUrl() : null,
            'invoiceUrl' => $invoice->signedInvoiceUrl(),
        ]);
    }

    public function send(Order $invoice)
    {
        abort_unless($invoice->source === 'admin', 404);

        if ($invoice->isPaid()) {
            return redirect()
                ->route('admin.invoices.show', $invoice)
                ->with('error', 'This invoice is already paid.');
        }

        $this->invoiceService->send($invoice);

        return redirect()
            ->route('admin.invoices.show', $invoice)
            ->with('success', 'Invoice emailed to '.$invoice->user->email.'.');
    }
}
