@extends('layouts.admin')
@section('title', 'Contact Leads - VanTroZ Admin')
@section('page-title', 'Contact Leads')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Contact Leads</h1>
            <p class="text-gray-600 mt-1">Track and manage Contact Us form submissions</p>
        </div>
        <a href="{{ route('admin.contact-leads.export', request()->query()) }}" class="admin-btn admin-btn-ink">Export CSV</a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
        <div class="zoho-stat-card"><div class="text-sm text-gray-500 uppercase">Total</div><div class="text-2xl font-bold">{{ $stats['total'] }}</div></div>
        @foreach(['new' => 'blue', 'read' => 'indigo', 'contacted' => 'green', 'archived' => 'gray'] as $status => $color)
        <div class="zoho-stat-card"><div class="text-sm text-gray-500 uppercase">{{ $status }}</div><div class="text-2xl font-bold">{{ $stats[$status] ?? 0 }}</div></div>
        @endforeach
    </div>

    <div class="admin-card mb-6">
        <div class="admin-card-body">
            <form method="GET" class="admin-filter">
                <input type="text" name="search" placeholder="Search name, email, company, phone, IP..." value="{{ request('search') }}">
                <select name="status">
                    <option value="">All statuses</option>
                    @foreach(\App\Models\ContactLead::STATUSES as $status)
                        <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                <button type="submit" class="admin-btn admin-btn-primary">Filter</button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lead</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Interest</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">IP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($leads as $lead)
                <tr class="hover:bg-gray-50 {{ $lead->status === 'new' ? 'bg-blue-50/40' : '' }}">
                    <td class="px-6 py-4">
                        <div class="font-medium">{{ $lead->name }}</div>
                        @if($lead->company)<div class="text-sm text-gray-500">{{ $lead->company }}</div>@endif
                    </td>
                    <td class="px-6 py-4">
                        <div>{{ $lead->email }}</div>
                        @if($lead->phone)<div class="text-sm text-gray-500">{{ $lead->phone }}</div>@endif
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <div>{{ $lead->service_label ?? '—' }}</div>
                        @if($lead->budget_label)<div class="text-gray-500">{{ $lead->budget_label }}</div>@endif
                    </td>
                    <td class="px-6 py-4 text-sm font-mono text-gray-600">{{ $lead->ip_address }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 capitalize">{{ $lead->status }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm">{{ $lead->created_at->format('M d, Y H:i') }}</td>
                    <td class="px-6 py-4"><a href="{{ route('admin.contact-leads.show', $lead) }}" class="text-blue-600">View</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">No contact leads yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 border-t">{{ $leads->links() }}</div>
    </div>
</div>
@endsection
