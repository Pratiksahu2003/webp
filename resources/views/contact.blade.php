@extends('layouts.website')

@section('title', 'Contact Us - ' . config('company.name'))
@section('description', 'Get in touch with ' . config('company.name') . ' for your software development needs. Contact us for a free consultation.')

@section('content')

<x-page-hero
    variant="brand"
    badge="Get In Touch"
    title="Contact Us"
    subtitle="Ready to start your project? Let's discuss how we can help you build something exceptional."
/>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Get in Touch</h2>

                @if(session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                    @csrf

                    <div class="hidden" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ff6b35] focus:border-transparent @error('name') border-red-500 @enderror" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ff6b35] focus:border-transparent @error('email') border-red-500 @enderror" required>
                        </div>
                    </div>
                    
                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                        <input type="text" id="company" name="company" value="{{ old('company') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ff6b35] focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ff6b35] focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="service" class="block text-sm font-medium text-gray-700 mb-2">Service Interest</label>
                        <select id="service" name="service" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ff6b35] focus:border-transparent">
                            <option value="">Select a service</option>
                            @foreach(\App\Models\ContactLead::SERVICES as $value => $label)
                            <option value="{{ $value }}" @selected(old('service') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">Project Budget</label>
                        <select id="budget" name="budget" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ff6b35] focus:border-transparent">
                            <option value="">Select budget range</option>
                            @foreach(\App\Models\ContactLead::BUDGETS as $value => $label)
                            <option value="{{ $value }}" @selected(old('budget') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Project Description</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ff6b35] focus:border-transparent" placeholder="Tell us about your project requirements...">{{ old('message') }}</textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white px-8 py-3 rounded-lg font-semibold hover:from-[#ea580c] hover:to-[#ff6b35] transition-colors shadow-lg shadow-orange-500/25">
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Contact Information</h2>
                
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="bg-orange-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-[#ff6b35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Phone</h3>
                            <p class="text-gray-600">{{ config('company.contact.phone') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-orange-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-[#ff6b35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Email</h3>
                            <p class="text-gray-600">{{ config('company.contact.email') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-orange-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-[#ff6b35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Office Location</h3>
                            <div class="text-gray-600 space-y-1">
                                <p class="font-semibold">{{ config('company.address.primary.name') }}</p>
                                <p>{{ config('company.address.primary.full') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Section -->
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h3>
                    
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-900 mb-2">How quickly can you deliver a custom software solution?</h4>
                            <p class="text-gray-600 text-sm">The timeline depends on project complexity. Simple solutions take 2-3 months, average projects 3-6 months, and complex projects 9+ months.</p>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-900 mb-2">Do you cover all software development life-cycle phases?</h4>
                            <p class="text-gray-600 text-sm">Yes, we provide end-to-end workflows with full SDLC handling, from discovery to ongoing support.</p>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-900 mb-2">How do you guarantee quality?</h4>
                            <p class="text-gray-600 text-sm">We adopt a proactive shift-left approach to QA, follow international coding standards, and comply with ISO 9001 standards.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-[#ff6b35] to-[#f7931e] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Get Started?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto text-white/90">
            Contact us today for a free consultation and project estimate
        </p>
        <a href="tel:{{ config('company.contact.phone') }}" class="inline-flex items-center justify-center bg-[#111827] hover:bg-black text-white px-8 py-3.5 rounded-lg font-semibold transition-colors shadow-lg shadow-black/20">
            Call Now: {{ config('company.contact.phone') }}
        </a>
    </div>
</section>
@endsection
