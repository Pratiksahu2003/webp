<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCustomerRequest;
use App\Http\Requests\Admin\UpdateCustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = User::query()
            ->where('role', 'user')
            ->withCount('orders')
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->search}%")
                        ->orWhere('email', 'like', "%{$request->search}%")
                        ->orWhere('company_name', 'like', "%{$request->search}%")
                        ->orWhere('phone', 'like', "%{$request->search}%");
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.commerce.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.commerce.customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = User::create(array_merge($request->validated(), [
            'password' => Hash::make(Str::random(16)),
            'role' => 'user',
            'email_verified_at' => now(),
        ]));

        return redirect()
            ->route('admin.customers.show', $customer)
            ->with('success', 'Client onboarded successfully.');
    }

    public function show(User $customer)
    {
        abort_unless($customer->role === 'user', 404);

        $customer->load(['orders' => fn ($q) => $q->latest()->limit(20)]);

        return view('admin.commerce.customers.show', compact('customer'));
    }

    public function edit(User $customer)
    {
        abort_unless($customer->role === 'user', 404);

        return view('admin.commerce.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, User $customer)
    {
        abort_unless($customer->role === 'user', 404);

        $customer->update($request->validated());

        return redirect()
            ->route('admin.customers.show', $customer)
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(User $customer)
    {
        abort_unless($customer->role === 'user', 404);

        $customer->delete();

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Client removed.');
    }
}
