<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactLead;
use App\Models\Media;
use App\Models\Order;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServicePackage;
use App\Models\SubService;
use App\Models\Technology;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = $this->buildStats();
        $orderStats = $this->buildOrderStats();
        $monthlyRevenue = $this->buildMonthlyRevenue();
        $recentActivity = $this->buildRecentActivity();
        $recentOrders = Order::with(['user', 'subService', 'package'])
            ->latest()
            ->take(5)
            ->get();
        $recentBlogPosts = BlogPost::latest()->take(5)->get();
        $actionItems = $this->buildActionItems();

        return view('admin.dashboard', compact(
            'stats',
            'orderStats',
            'monthlyRevenue',
            'recentActivity',
            'recentOrders',
            'recentBlogPosts',
            'actionItems',
        ));
    }

    public function quickStats(): JsonResponse
    {
        return response()->json([
            'stats' => $this->buildStats(),
            'orderStats' => $this->buildOrderStats(),
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
        $lastWeekStart = now()->subWeek()->startOfWeek();
        $lastWeekEnd = now()->subWeek()->endOfWeek();

        return [
            'pages' => Page::count(),
            'pagesThisWeek' => Page::where('created_at', '>=', $weekStart)->count(),
            'publishedPages' => Page::where('is_published', true)->count(),
            'blogPosts' => BlogPost::count(),
            'blogPostsThisWeek' => BlogPost::where('created_at', '>=', $weekStart)->count(),
            'publishedPosts' => BlogPost::published()->count(),
            'draftPosts' => BlogPost::where('status', 'draft')->count(),
            'services' => Service::count(),
            'activeServices' => Service::active()->count(),
            'subServices' => SubService::count(),
            'packages' => ServicePackage::count(),
            'technologies' => Technology::count(),
            'customers' => User::where(function ($query) {
                $query->where('role', '!=', 'admin')->orWhereNull('role');
            })->count(),
            'contactLeads' => ContactLead::count(),
            'newContactLeads' => ContactLead::where('status', 'new')->count(),
            'media' => Media::count(),
            'pagesLastWeek' => Page::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count(),
            'blogPostsLastWeek' => BlogPost::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count(),
        ];
    }

    private function buildOrderStats(): array
    {
        $paidOrders = Order::where('payment_status', 'paid');

        return [
            'total' => Order::count(),
            'pending' => Order::where('payment_status', 'pending')->count(),
            'paid' => Order::where('payment_status', 'paid')->count(),
            'failed' => Order::where('payment_status', 'failed')->count(),
            'processing' => Order::where('payment_status', 'processing')->count(),
            'cancelled' => Order::where('payment_status', 'cancelled')->count(),
            'refunded' => Order::where('payment_status', 'refunded')->count(),
            'totalRevenue' => (float) $paidOrders->sum('amount'),
            'revenueThisMonth' => (float) Order::where('payment_status', 'paid')
                ->where('created_at', '>=', now()->startOfMonth())
                ->sum('amount'),
            'ordersThisMonth' => Order::where('created_at', '>=', now()->startOfMonth())->count(),
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
                'year' => $date->format('Y'),
                'revenue' => (float) Order::where('payment_status', 'paid')
                    ->whereBetween('created_at', [$start, $end])
                    ->sum('amount'),
                'orders' => Order::whereBetween('created_at', [$start, $end])->count(),
            ]);
        }

        return $months;
    }

    private function buildRecentActivity(): Collection
    {
        $activities = collect();

        Page::latest('updated_at')->take(5)->get()->each(function (Page $page) use ($activities) {
            $activities->push([
                'type' => 'page',
                'title' => $page->title,
                'description' => 'Page updated',
                'url' => route('admin.pages.edit', $page),
                'time' => $page->updated_at,
                'color' => 'blue',
            ]);
        });

        BlogPost::latest('updated_at')->take(5)->get()->each(function (BlogPost $post) use ($activities) {
            $activities->push([
                'type' => 'blog',
                'title' => $post->title,
                'description' => 'Blog post '.($post->status === 'published' ? 'published' : 'updated'),
                'url' => route('admin.blog-posts.edit', $post),
                'time' => $post->updated_at,
                'color' => 'purple',
            ]);
        });

        Order::with('user')->latest()->take(5)->get()->each(function (Order $order) use ($activities) {
            $activities->push([
                'type' => 'order',
                'title' => $order->order_number,
                'description' => 'Order from '.$order->user->name.' — '.ucfirst($order->payment_status),
                'url' => route('admin.orders.show', $order),
                'time' => $order->created_at,
                'color' => 'emerald',
            ]);
        });

        Service::latest('updated_at')->take(3)->get()->each(function (Service $service) use ($activities) {
            $activities->push([
                'type' => 'service',
                'title' => $service->title,
                'description' => 'Service updated',
                'url' => route('admin.services.edit', $service),
                'time' => $service->updated_at,
                'color' => 'orange',
            ]);
        });

        Media::latest()->take(3)->get()->each(function (Media $media) use ($activities) {
            $activities->push([
                'type' => 'media',
                'title' => $media->original_name ?? $media->name,
                'description' => 'Media uploaded',
                'url' => '#',
                'time' => $media->created_at,
                'color' => 'pink',
            ]);
        });

        return $activities
            ->filter(fn (array $item) => $item['time'] instanceof Carbon)
            ->sortByDesc('time')
            ->take(10)
            ->values();
    }

    private function buildActionItems(): Collection
    {
        $items = collect();

        BlogPost::where('status', 'draft')->latest()->take(5)->get()->each(function (BlogPost $post) use ($items) {
            $items->push([
                'label' => 'Review draft: '.$post->title,
                'url' => route('admin.blog-posts.edit', $post),
                'priority' => 'medium',
                'type' => 'blog',
            ]);
        });

        Order::where('payment_status', 'pending')->latest()->take(5)->get()->each(function (Order $order) use ($items) {
            $items->push([
                'label' => 'Pending payment: '.$order->order_number,
                'url' => route('admin.orders.show', $order),
                'priority' => 'high',
                'type' => 'order',
            ]);
        });

        ContactLead::where('status', 'new')->latest()->take(5)->get()->each(function (ContactLead $lead) use ($items) {
            $items->push([
                'label' => 'New contact lead: '.$lead->name,
                'url' => route('admin.contact-leads.show', $lead),
                'priority' => 'high',
                'type' => 'lead',
            ]);
        });

        Page::where('is_published', false)->latest()->take(5)->get()->each(function (Page $page) use ($items) {
            $items->push([
                'label' => 'Unpublished page: '.$page->title,
                'url' => route('admin.pages.edit', $page),
                'priority' => 'low',
                'type' => 'page',
            ]);
        });

        BlogPost::where('status', 'scheduled')
            ->where('scheduled_at', '>', now())
            ->orderBy('scheduled_at')
            ->take(3)
            ->get()
            ->each(function (BlogPost $post) use ($items) {
                $items->push([
                    'label' => 'Scheduled: '.$post->title,
                    'url' => route('admin.blog-posts.edit', $post),
                    'priority' => 'medium',
                    'type' => 'blog',
                    'due' => $post->scheduled_at?->format('M d, Y g:i A'),
                ]);
            });

        return $items->take(8)->values();
    }
}
