@extends('layouts.admin')
@section('title', 'Clients - VanTroZ Admin')
@section('page-title', 'Clients')
@section('content')
<div class="admin-page-wide">
    <div class="admin-page-header">
        <div>
            <h1>Clients</h1>
            <p>Onboard and manage billable client profiles</p>
        </div>
        <a href="{{ route('admin.customers.create') }}" class="admin-btn admin-btn-primary">Onboard Client</a>
    </div>

    <div class="admin-card mb-5">
        <div class="admin-card-body">
            <form class="flex flex-col md:flex-row gap-3">
                <div class="flex-1 admin-field !mb-0">
                    <label class="sr-only">Search</label>
                    <input type="text" name="search" placeholder="Search name, email, company..." value="{{ request('search') }}">
                </div>
                <button class="admin-btn admin-btn-primary">Search</button>
            </form>
        </div>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Client</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Company</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Phone</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Invoices</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Joined</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($customers as $customer)
                    <tr class="hover:bg-slate-50/80">
                        <td class="px-5 py-4">
                            <div class="font-semibold text-slate-900">{{ $customer->name }}</div>
                            <div class="text-sm text-slate-500">{{ $customer->email }}</div>
                        </td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $customer->company_name ?? '—' }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $customer->phone ?? '—' }}</td>
                        <td class="px-5 py-4 text-sm font-semibold">{{ $customer->orders_count }}</td>
                        <td class="px-5 py-4 text-sm text-slate-500">{{ $customer->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-4 text-right space-x-3">
                            <a href="{{ route('admin.customers.show', $customer) }}" class="text-sm font-semibold text-[#ff6b35] hover:text-[#f7931e]">View</a>
                            <a href="{{ route('admin.invoices.create', ['customer_id' => $customer->id]) }}" class="text-sm font-semibold text-slate-700">Invoice</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center text-slate-500">
                            No clients yet. <a href="{{ route('admin.customers.create') }}" class="text-[#ff6b35] hover:text-[#f7931e] font-semibold">Onboard your first client</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($customers->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">{{ $customers->links() }}</div>
        @endif
    </div>
</div>
@endsection
