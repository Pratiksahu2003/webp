@extends('layouts.website')

@section('title', 'Cookie Policy - ' . config('company.name'))
@section('description', 'Learn about how ' . config('company.name') . ' uses cookies to enhance your browsing experience and provide personalized services.')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-gray-50 via-white to-orange-50">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 right-20 w-72 h-72 bg-gradient-to-br from-orange-100/30 to-orange-100/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-gradient-to-br from-orange-100/20 to-orange-100/20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Cookie <span class="text-orange-600">Policy</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                This Cookie Policy explains how {{ config('company.name') }} uses cookies and similar technologies when you visit our website.
            </p>
            <div class="mt-6 text-sm text-gray-500">
                Last updated: {{ date('F d, Y') }}
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            
            <!-- What Are Cookies -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">What Are Cookies?</h2>
                <div class="bg-orange-50 border-l-4 border-orange-500 p-6 mb-6">
                    <p class="text-gray-700 leading-relaxed">
                        Cookies are small text files that are placed on your computer or mobile device when you visit a website. 
                        They are widely used to make websites work more efficiently and to provide information to website owners.
                    </p>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Cookies allow a website to recognize a user's device and remember information about their visit, such as their preferred language and other settings. 
                    This can make your next visit easier and the site more useful to you.
                </p>
            </div>

            <!-- How We Use Cookies -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">How We Use Cookies</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    {{ config('company.name') }} uses cookies for several purposes to enhance your experience on our website:
                </p>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Essential Cookies
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            These cookies are necessary for the website to function properly. They enable basic functions like page navigation, 
                            access to secure areas, and remembering your preferences.
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Performance Cookies
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            These cookies collect information about how visitors use our website, such as which pages are visited most often. 
                            This helps us improve how our website works.
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Functional Cookies
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            These cookies enable the website to provide enhanced functionality and personalization. 
                            They may be set by us or by third-party providers whose services we have added to our pages.
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 9h6m-6 4h6m-6 4h6"/>
                            </svg>
                            Marketing Cookies
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            These cookies are used to track visitors across websites. The intention is to display ads that are relevant 
                            and engaging for the individual user and thereby more valuable for publishers and third-party advertisers.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Types of Cookies We Use -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Types of Cookies We Use</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border border-gray-300 px-4 py-3 text-left font-semibold text-gray-900">Cookie Type</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-semibold text-gray-900">Purpose</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-semibold text-gray-900">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-3 text-gray-700">Session Cookies</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Maintain your session while browsing</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Until browser closes</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="border border-gray-300 px-4 py-3 text-gray-700">Persistent Cookies</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Remember your preferences</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Up to 2 years</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-3 text-gray-700">Analytics Cookies</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Track website usage and performance</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Up to 2 years</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="border border-gray-300 px-4 py-3 text-gray-700">Marketing Cookies</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Deliver relevant advertisements</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-600">Up to 1 year</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Managing Cookies -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Managing Your Cookie Preferences</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    You have several options for managing cookies:
                </p>
                
                <div class="space-y-6">
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-6">
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">Browser Settings</h3>
                        <p class="text-blue-800 leading-relaxed">
                            Most web browsers allow you to control cookies through their settings preferences. You can set your browser to refuse cookies 
                            or delete certain cookies. However, if you choose to delete or refuse cookies, some features of our website may not function properly.
                        </p>
                    </div>
                    
                    <div class="bg-green-50 border-l-4 border-green-500 p-6">
                        <h3 class="text-xl font-semibold text-green-900 mb-3">Cookie Consent</h3>
                        <p class="text-green-800 leading-relaxed">
                            When you first visit our website, you will see a cookie consent banner. You can choose which types of cookies you want to allow. 
                            You can change your preferences at any time by clicking the cookie settings link in our footer.
                        </p>
                    </div>
                    
                    <div class="bg-orange-50 border-l-4 border-orange-500 p-6">
                        <h3 class="text-xl font-semibold text-orange-900 mb-3">Opt-Out Links</h3>
                        <p class="text-orange-800 leading-relaxed">
                            For third-party cookies, you can often opt out directly through the third-party's website. We provide links to these opt-out pages 
                            where applicable in our cookie settings.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Third-Party Cookies -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Third-Party Cookies</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Some cookies on our website are set by third-party services that appear on our pages:
                </p>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Google Analytics</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            We use Google Analytics to understand how visitors interact with our website.
                        </p>
                        <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                            Opt out of Google Analytics →
                        </a>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Social Media</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            Social media platforms may set cookies when you interact with their content on our site.
                        </p>
                        <p class="text-gray-500 text-xs">
                            Check your social media account settings to manage these cookies.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Updates to This Policy -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Updates to This Cookie Policy</h2>
                <p class="text-gray-600 leading-relaxed">
                    We may update this Cookie Policy from time to time to reflect changes in our practices or for other operational, 
                    legal, or regulatory reasons. We will notify you of any material changes by posting the updated policy on our website 
                    and updating the "Last updated" date at the top of this policy.
                </p>
            </div>

            <!-- Contact Information -->
            <div class="bg-gray-50 rounded-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Questions About Our Cookie Policy?</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    If you have any questions about our use of cookies or this Cookie Policy, please contact us:
                </p>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Contact Information</h3>
                        <div class="space-y-2 text-gray-600">
                            <p><strong>Email:</strong> {{ config('company.contact.email') }}</p>
                            <p><strong>Phone:</strong> {{ config('company.contact.phone') }}</p>
                            <p><strong>Address:</strong> {{ config('company.address.primary.full') }}</p>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('contact') }}" class="block text-orange-600 hover:text-orange-700 font-medium">
                                Contact Us →
                            </a>
                            <a href="{{ route('privacy-policy') }}" class="block text-orange-600 hover:text-orange-700 font-medium">
                                Privacy Policy →
                            </a>
                            <a href="{{ route('terms-conditions') }}" class="block text-orange-600 hover:text-orange-700 font-medium">
                                Terms & Conditions →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
