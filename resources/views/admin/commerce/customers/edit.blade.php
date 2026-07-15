@extends('layouts.admin')
@section('title', 'Edit Client - VanTroZ Admin')
@section('page-title', 'Edit Client')
@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Client</h1>
            <p class="text-gray-600 mt-1">{{ $customer->name }}</p>
        </div>
        <a href="{{ route('admin.customers.show', $customer) }}" class="text-gray-600">← Back</a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-6">
        @include('admin.commerce.customers.form', [
            'customer' => $customer,
            'action' => route('admin.customers.update', $customer),
            'method' => 'PUT',
        ])
    </div>
</div>
@endsection
