@extends('layouts.admin')
@section('title', 'Onboard Client - VanTroZ Admin')
@section('page-title', 'Onboard Client')
@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Onboard Client</h1>
            <p class="text-gray-600 mt-1">Create a billable client profile</p>
        </div>
        <a href="{{ route('admin.customers.index') }}" class="text-gray-600">← Back</a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-6">
        @include('admin.commerce.customers.form', ['customer' => null, 'action' => route('admin.customers.store'), 'method' => 'POST'])
    </div>
</div>
@endsection
