@extends('layouts.admin')
@section('title', 'Onboard Client - VanTroZ Admin')
@section('page-title', 'Onboard Client')
@section('content')
<div class="admin-page">
    <div class="admin-page-header">
        <div>
            <h1>Onboard Client</h1>
            <p>Create a billable client profile with billing details</p>
        </div>
        <a href="{{ route('admin.customers.index') }}" class="admin-btn admin-btn-secondary">← Back</a>
    </div>
    <div class="admin-card">
        <div class="admin-card-body">
            @include('admin.commerce.customers.form', ['customer' => null, 'action' => route('admin.customers.store'), 'method' => 'POST'])
        </div>
    </div>
</div>
@endsection
