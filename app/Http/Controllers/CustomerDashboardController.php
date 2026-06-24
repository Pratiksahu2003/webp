<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Auth::user()->orders()
            ->with(['service', 'subService', 'package'])
            ->latest()
            ->paginate(10);

        return view('customer.dashboard', compact('orders'));
    }

    public function show(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        $order->load(['service', 'subService', 'package.features', 'transactions']);

        return view('customer.orders.show', compact('order'));
    }

    public function invoice(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        $order->load(['user', 'service', 'subService', 'package', 'transactions']);

        return view('customer.orders.invoice', compact('order'));
    }
}
