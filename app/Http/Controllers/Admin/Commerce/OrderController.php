<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['user', 'service', 'subService', 'package'])
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('order_number', 'like', "%{$request->search}%")
                        ->orWhereHas('user', fn ($u) => $u->where('name', 'like', "%{$request->search}%")
                            ->orWhere('email', 'like', "%{$request->search}%"));
                });
            })
            ->status($request->payment_status)
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $stats = [
            'pending' => Order::where('payment_status', 'pending')->count(),
            'paid' => Order::where('payment_status', 'paid')->count(),
            'failed' => Order::where('payment_status', 'failed')->count(),
            'refunded' => Order::where('payment_status', 'refunded')->count(),
            'cancelled' => Order::where('payment_status', 'cancelled')->count(),
        ];

        return view('admin.commerce.orders.index', compact('orders', 'stats'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'service', 'subService', 'package.features', 'transactions']);

        return view('admin.commerce.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,processing,paid,failed,cancelled,refunded',
        ]);

        $order->update([
            'payment_status' => $request->payment_status,
            'paid_at' => $request->payment_status === 'paid' ? ($order->paid_at ?? now()) : $order->paid_at,
        ]);

        return redirect()->back()->with('success', 'Order status updated.');
    }

    public function export(Request $request): StreamedResponse
    {
        $orders = Order::with(['user', 'service', 'subService', 'package'])
            ->status($request->payment_status)
            ->latest()
            ->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="orders-'.now()->format('Y-m-d').'.csv"',
        ];

        return response()->stream(function () use ($orders) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Order Number', 'Customer', 'Email', 'Phone', 'Service', 'Sub Service',
                'Package', 'Amount', 'Payment Status', 'Transaction ID', 'Date',
            ]);

            foreach ($orders as $order) {
                fputcsv($handle, [
                    $order->order_number,
                    $order->user->name,
                    $order->user->email,
                    $order->user->phone,
                    $order->service->title,
                    $order->subService->title,
                    $order->package->package_name,
                    $order->amount,
                    $order->payment_status,
                    $order->transaction_id,
                    $order->created_at->format('Y-m-d H:i'),
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }
}
