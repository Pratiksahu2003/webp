@extends('layouts.admin')
@section('title', 'Edit Client - VanTroZ Admin')
@section('page-title', 'Edit Client')
@section('content')
<div class="admin-page">
    <div class="admin-page-header">
        <div>
            <h1>Edit Client</h1>
            <p>{{ $customer->name }}</p>
        </div>
        <a href="{{ route('admin.customers.show', $customer) }}" class="admin-btn admin-btn-secondary">← Back</a>
    </div>
    <div class="admin-card">
        <div class="admin-card-body">
            @include('admin.commerce.customers.form', [
                'customer' => $customer,
                'action' => route('admin.customers.update', $customer),
                'method' => 'PUT',
            ])
        </div>
    </div>
</div>
@endsection
