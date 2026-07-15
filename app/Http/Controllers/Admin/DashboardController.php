<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactLead;
use App\Models\Media;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServicePackage;
use App\Models\SubService;
use App\Models\Technology;
use App\Models\User;
use App\Services\CompanyProfileService;
use App\Services\PaymentGatewaySettingsService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index(
        PaymentGatewaySettingsService $gatewaySettings,
        CompanyProfileService $companyProfile,
    ) {
        $stats = $this->buildStats();
        $orderStats = $this->buildOrderStats();
        $invoiceStats = $this->buildInvoiceStats();
        $salesInsights = $this->buildSalesInsights($orderStats, $invoiceStats);
        $monthlyRevenue = $this->buildMonthlyRevenue();
        $recentActivity = $this->buildRecentActivity();
        $recentOrders = Order::with(['user', 'subService', 'package'])
            ->latest()
            ->take(6)
            ->get();
        $recentInvoices = Order::adminSource()
            ->with('user')
            ->latest()
            ->take(5)
            ->get();
        $recentBlogPosts = BlogPost::latest()->take(4)->get();
        $actionItems = $this->buildActionItems();
        $gateway = $gatewaySettings->current();
        $company = $companyProfile->all();

        return view('admin.dashboard', compact(
            'stats',
            'orderStats',
            'invoiceStats',
            'salesInsights',
            'monthlyRevenue',
            'recentActivity',
            'recentOrders',
            'recentInvoices',
            'recentBlogPosts',
            'actionItems',
            'gateway',
            'company',
        ));
    }

    public function quickStats(): JsonResponse
    {
        return response()->json([
            'stats' => $this->buildStats(),
            'orderStats' => $this->buildOrderStats(),
            'invoiceStats' => $this->buildInvoiceStats(),
        ]);
    }

    public function recentActivity(): JsonResponse
    {
        return response()->json([
            'activities' => $this->buildRecentActivity()->map(fn (array $item) => [
                'type' => $item['type'],
                'title' => $item['title'],
                'description' => $item['description'],
                'url' => $item['url'],
                'time' => $item['time']->diffForHumans(),
            ]),
        ]);
    }

    private function buildStats(): array
    {
        $weekStart = now()->startOfWeek();
        $monthStart = now()->startOfMonth();

        return [
            'blogPosts' => BlogPost::count(),
            'blogPostsThisWeek' => BlogPost::where('created_at', '>=', $weekStart)->count(),
            'publishedPosts' => BlogPost::published()->count(),
            'draftPosts' => BlogPost::where('status', 'draft')->count(),
            'services' => Service::count(),
            'activeServices' => Service::active()->count(),
            'subServices' => SubService::count(),
            'packages' => ServicePackage::count(),
            'technologies' => Technology::count(),
            'customers' => User::where('role', 'user')->count(),
            'customersThisMonth' => User::where('role', 'user')->where('created_at', '>=', $monthStart)->count(),
            'contactLeads' => ContactLead::count(),
            'newContactLeads' => ContactLead::where('status', 'new')->count(),
            'media' => Media::count(),
        ];
    }

    private function buildOrderStats(): array
    {
        $monthStart = now()->startOfMonth();
        $lastMonthStart = now()->subMonth()->startOfMonth();
        $lastMonthEnd = now()->subMonth()->endOfMonth();

        $revenueThisMonth = (float) Order::where('payment_status', 'paid')
            ->where(function ($q) use ($monthStart) {
                $q->where('paid_at', '>=', $monthStart)
                    ->orWhere(function ($inner) use ($monthStart) {
                        $inner->whereNull('paid_at')->where('created_at', '>=', $monthStart);
                    });
            })
            ->sum('amount');

        $revenueLastMonth = (float) Order::where('payment_status', 'paid')
            ->where(function ($q) use ($lastMonthStart, $lastMonthEnd) {
                $q->whereBetween('paid_at', [$lastMonthStart, $lastMonthEnd])
                    ->orWhere(function ($inner) use ($lastMonthStart, $lastMonthEnd) {
                        $inner->whereNull('paid_at')->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd]);
                    });
            })
            ->sum('amount');

        return [
            'total' => Order::count(),
            'pending' => Order::where('payment_status', 'pending')->count(),
            'paid' => Order::where('payment_status', 'paid')->count(),
            'failed' => Order::where('payment_status', 'failed')->count(),
            'processing' => Order::where('payment_status', 'processing')->count(),
            'cancelled' => Order::where('payment_status', 'cancelled')->count(),
            'refunded' => Order::where('payment_status', 'refunded')->count(),
            'totalRevenue' => (float) Order::where('payment_status', 'paid')->sum('amount'),
            'revenueThisMonth' => $revenueThisMonth,
            'revenueLastMonth' => $revenueLastMonth,
            'ordersThisMonth' => Order::where('created_at', '>=', $monthStart)->count(),
            'paidThisMonth' => Order::where('payment_status', 'paid')
                ->where(function ($q) use ($monthStart) {
                    $q->where('paid_at', '>=', $monthStart)
                        ->orWhere(function ($inner) use ($monthStart) {
                            $inner->whereNull('paid_at')->where('created_at', '>=', $monthStart);
                        });
                })
                ->count(),
            'gstCollectedThisMonth' => (float) Order::where('payment_status', 'paid')
                ->where(function ($q) use ($monthStart) {
                    $q->where('paid_at', '>=', $monthStart)
                        ->orWhere(function ($inner) use ($monthStart) {
                            $inner->whereNull('paid_at')->where('created_at', '>=', $monthStart);
                        });
                })
                ->sum('tax_amount'),
        ];
    }

    private function buildInvoiceStats(): array
    {
        $unpaidStatuses = ['pending', 'processing', 'failed'];

        return [
            'total' => Order::adminSource()->count(),
            'unpaid' => Order::adminSource()->whereIn('payment_status', $unpaidStatuses)->count(),
            'paid' => Order::adminSource()->where('payment_status', 'paid')->count(),
            'outstandingAmount' => (float) Order::adminSource()
                ->whereIn('payment_status', $unpaidStatuses)
                ->sum('amount'),
            'sentUnpaid' => Order::adminSource()
                ->whereIn('payment_status', $unpaidStatuses)
                ->whereNotNull('invoice_sent_at')
                ->count(),
            'draftUnsent' => Order::adminSource()
                ->whereIn('payment_status', $unpaidStatuses)
                ->whereNull('invoice_sent_at')
                ->count(),
        ];
    }

    private function buildSalesInsights(array $orderStats, array $invoiceStats): array
    {
        $thisMonth = $orderStats['revenueThisMonth'];
        $lastMonth = $orderStats['revenueLastMonth'];
        $change = $lastMonth > 0
            ? round((($thisMonth - $lastMonth) / $lastMonth) * 100, 1)
            : ($thisMonth > 0 ? 100.0 : 0.0);

        return [
            'revenueChangePct' => $change,
            'revenueTrend' => $change >= 0 ? 'up' : 'down',
            'avgOrderValue' => $orderStats['paid'] > 0
                ? round($orderStats['totalRevenue'] / $orderStats['paid'], 2)
                : 0,
            'collectionRate' => $orderStats['total'] > 0
                ? round(($orderStats['paid'] / $orderStats['total']) * 100, 1)
                : 0,
            'outstandingAmount' => $invoiceStats['outstandingAmount'],
        ];
    }

    private function buildMonthlyRevenue(): Collection
    {
        $months = collect();

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $start = $date->copy()->startOfMonth();
            $end = $date->copy()->endOfMonth();

            $months->push([
                'label' => $date->format('M'),
                'full' => $date->format('M Y'),
                'year' => $date->format('Y'),
                'revenue' => (float) Order::where('payment_status', 'paid')
                    ->where(function ($q) use ($start, $end) {
                        $q->whereBetween('paid_at', [$start, $end])
                            ->orWhere(function ($inner) use ($start, $end) {
                                $inner->whereNull('paid_at')->whereBetween('created_at', [$start, $end]);
                            });
                    })
                    ->sum('amount'),
                'orders' => Order::whereBetween('created_at', [$start, $end])->count(),
                'gst' => (float) Order::where('payment_status', 'paid')
                    ->where(function ($q) use ($start, $end) {
                        $q->whereBetween('paid_at', [$start, $end])
                            ->orWhere(function ($inner) use ($start, $end) {
                                $inner->whereNull('paid_at')->whereBetween('created_at', [$start, $end]);
                            });
                    })
                    ->sum('tax_amount'),
            ]);
        }

        return $months;
    }

    private function buildRecentActivity(): Collection
    {
        $activities = collect();

        Order::with('user')->latest()->take(6)->get()->each(function (Order $order) use ($activities) {
            $isInvoice = $order->source === 'admin';
            $activities->push([
                'type' => $isInvoice ? 'invoice' : 'order',
                'title' => $order->order_number,
                'description' => ($isInvoice ? 'Invoice' : 'Order').' · '.$order->user->name.' · '.ucfirst($order->payment_status),
                'url' => $isInvoice
                    ? route('admin.invoices.show', $order)
                    : route('admin.orders.show', $order),
                'time' => $order->created_at,
                'color' => $isInvoice ? 'blue' : 'emerald',
            ]);
        });

        ContactLead::latest()->take(4)->get()->each(function (ContactLead $lead) use ($activities) {
            $activities->push([
                'type' => 'lead',
                'title' => $lead->name,
                'description' => 'Contact lead · '.ucfirst($lead->status),
                'url' => route('admin.contact-leads.show', $lead),
                'time' => $lead->created_at,
                'color' => 'orange',
            ]);
        });

        User::where('role', 'user')->latest()->take(3)->get()->each(function (User $user) use ($activities) {
            $activities->push([
                'type' => 'client',
                'title' => $user->name,
                'description' => 'Client onboarded · '.$user->email,
                'url' => route('admin.customers.show', $user),
                'time' => $user->created_at,
                'color' => 'teal',
            ]);
        });

        BlogPost::latest('updated_at')->take(3)->get()->each(function (BlogPost $post) use ($activities) {
            $activities->push([
                'type' => 'blog',
                'title' => $post->title,
                'description' => 'Blog · '.($post->status === 'published' ? 'published' : 'updated'),
                'url' => route('admin.blog-posts.edit', $post),
                'time' => $post->updated_at,
                'color' => 'purple',
            ]);
        });

        return $activities
            ->filter(fn (array $item) => $item['time'] instanceof Carbon)
            ->sortByDesc('time')
            ->take(12)
            ->values();
    }

    private function buildActionItems(): Collection
    {
        $items = collect();

        Order::adminSource()
            ->whereIn('payment_status', ['pending', 'processing', 'failed'])
            ->whereNull('invoice_sent_at')
            ->latest()
            ->take(4)
            ->get()
            ->each(function (Order $order) use ($items) {
                $items->push([
                    'label' => 'Send invoice: '.$order->order_number,
                    'url' => route('admin.invoices.show', $order),
                    'priority' => 'high',
                    'type' => 'invoice',
                ]);
            });

        Order::adminSource()
            ->whereIn('payment_status', ['pending', 'processing'])
            ->whereNotNull('invoice_sent_at')
            ->latest()
            ->take(4)
            ->get()
            ->each(function (Order $order) use ($items) {
                $items->push([
                    'label' => 'Awaiting payment: '.$order->order_number.' (₹'.number_format($order->amount, 0).')',
                    'url' => route('admin.invoices.show', $order),
                    'priority' => 'high',
                    'type' => 'invoice',
                ]);
            });

        ContactLead::where('status', 'new')->latest()->take(4)->get()->each(function (ContactLead $lead) use ($items) {
            $items->push([
                'label' => 'New lead: '.$lead->name,
                'url' => route('admin.contact-leads.show', $lead),
                'priority' => 'high',
                'type' => 'lead',
            ]);
        });

        BlogPost::where('status', 'draft')->latest()->take(3)->get()->each(function (BlogPost $post) use ($items) {
            $items->push([
                'label' => 'Review draft: '.$post->title,
                'url' => route('admin.blog-posts.edit', $post),
                'priority' => 'medium',
                'type' => 'blog',
            ]);
        });

        return $items->take(10)->values();
    }
}
