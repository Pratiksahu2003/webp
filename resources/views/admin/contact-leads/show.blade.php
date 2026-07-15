@extends('layouts.admin')
@section('title', 'Lead #'.$contactLead->id.' - VanTroZ Admin')
@section('page-title', 'Contact Lead Details')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Lead from {{ $contactLead->name }}</h1>
        <a href="{{ route('admin.contact-leads.index') }}" class="text-gray-600">← Back to Contact Leads</a>
    </div>

    @if(session('success'))
    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-3">
                <h2 class="font-semibold text-lg mb-2">Submission Details</h2>
                <p><span class="text-gray-500">Name:</span> {{ $contactLead->name }}</p>
                <p><span class="text-gray-500">Email:</span> <a href="mailto:{{ $contactLead->email }}" class="text-blue-600">{{ $contactLead->email }}</a></p>
                <p><span class="text-gray-500">Company:</span> {{ $contactLead->company ?? '—' }}</p>
                <p><span class="text-gray-500">Phone:</span> {{ $contactLead->phone ?? '—' }}</p>
                <p><span class="text-gray-500">Service Interest:</span> {{ $contactLead->service_label ?? '—' }}</p>
                <p><span class="text-gray-500">Budget:</span> {{ $contactLead->budget_label ?? '—' }}</p>
                <p><span class="text-gray-500">Submitted:</span> {{ $contactLead->created_at->format('M d, Y g:i A') }}</p>
                <div>
                    <span class="text-gray-500">Message:</span>
                    <p class="mt-2 whitespace-pre-wrap text-gray-800">{{ $contactLead->message ?? '—' }}</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold mb-3">Tracking</h2>
                <p class="text-sm"><span class="text-gray-500">IP Address:</span> <span class="font-mono">{{ $contactLead->ip_address }}</span></p>
                <p class="text-sm mt-2"><span class="text-gray-500">User Agent:</span></p>
                <p class="text-xs text-gray-600 break-all mt-1">{{ $contactLead->user_agent ?? '—' }}</p>
                @if($contactLead->read_at)
                <p class="text-sm mt-3"><span class="text-gray-500">First read:</span> {{ $contactLead->read_at->format('M d, Y g:i A') }}</p>
                @endif
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold mb-3">Update Lead</h2>
                <form method="POST" action="{{ route('admin.contact-leads.update-status', $contactLead) }}">
                    @csrf
                    @method('PATCH')
                    <label class="block text-sm text-gray-600 mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3">
                        @foreach(\App\Models\ContactLead::STATUSES as $status)
                        <option value="{{ $status }}" @selected($contactLead->status === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <label class="block text-sm text-gray-600 mb-1">Admin Notes</label>
                    <textarea name="admin_notes" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3" placeholder="Internal notes about follow-up...">{{ old('admin_notes', $contactLead->admin_notes) }}</textarea>
                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
