@extends('layouts.website')

@section('title', 'Refund Policy - ' . config('company.name'))
@section('description', 'Refund Policy for ' . config('company.name') . ' - Learn about our refund and cancellation policies for software development services.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-green-700 to-green-800 text-white py-20 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-green-900 bg-opacity-60 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Refund Policy</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Our refund policy for software development services and digital products.
            </p>
        </div>
    </div>
</section>

<!-- Refund Policy Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <p class="text-gray-600 mb-8">
                <strong>Last updated:</strong> {{ date('F d, Y') }}
            </p>

            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Overview</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>At {{ config('company.name') }}, we strive to deliver high-quality software development services that meet or exceed our clients' expectations. This refund policy outlines the circumstances under which refunds may be provided for our services.</p>
                        <p>Due to the custom nature of software development work, refunds are handled on a case-by-case basis and are subject to the terms outlined below.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Service Categories</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Our refund policy varies based on the type of service provided:</p>
                        
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Custom Software Development</h3>
                            <ul class="list-disc pl-6 space-y-2">
                                <li>Web applications and websites</li>
                                <li>Mobile applications (iOS/Android)</li>
                                <li>Enterprise software solutions</li>
                                <li>API development and integration</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Design Services</h3>
                            <ul class="list-disc pl-6 space-y-2">
                                <li>UI/UX design</li>
                                <li>Brand identity design</li>
                                <li>Prototyping and wireframing</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Consulting Services</h3>
                            <ul class="list-disc pl-6 space-y-2">
                                <li>Technical consulting</li>
                                <li>Code reviews and audits</li>
                                <li>Architecture planning</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Refund Eligibility</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Refunds may be considered under the following circumstances:</p>
                        
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">3.1 Project Cancellation by Client</h3>
                                <ul class="list-disc pl-6 space-y-2">
                                    <li><strong>Before work begins:</strong> Full refund minus any setup fees (if applicable)</li>
                                    <li><strong>During discovery phase:</strong> Refund of remaining balance after deducting completed work</li>
                                    <li><strong>After development starts:</strong> No refund for completed milestones; refund of advance payments for incomplete work</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">3.2 Failure to Deliver</h3>
                                <ul class="list-disc pl-6 space-y-2">
                                    <li>If we fail to deliver agreed-upon milestones within the specified timeframe (excluding delays caused by client)</li>
                                    <li>If deliverables do not meet the specifications outlined in the project agreement</li>
                                    <li>If we are unable to complete the project due to technical impossibility</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">3.3 Quality Issues</h3>
                                <ul class="list-disc pl-6 space-y-2">
                                    <li>If deliverables contain significant defects that cannot be resolved within a reasonable timeframe</li>
                                    <li>If the final product does not function as specified in the project requirements</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Non-Refundable Services</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>The following services are generally non-refundable:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Completed work and delivered milestones</li>
                            <li>Time spent on discovery, research, and planning phases</li>
                            <li>Third-party licenses, hosting, or service fees</li>
                            <li>Custom design work that has been approved by the client</li>
                            <li>Consulting hours that have been utilized</li>
                            <li>Training and support services that have been provided</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Refund Process</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>To request a refund, please follow these steps:</p>
                        <ol class="list-decimal pl-6 space-y-2">
                            <li><strong>Contact Us:</strong> Send a written refund request to {{ config('company.contact.email') }}</li>
                            <li><strong>Provide Details:</strong> Include project details, reason for refund request, and supporting documentation</li>
                            <li><strong>Review Process:</strong> We will review your request within 5-7 business days</li>
                            <li><strong>Decision:</strong> You will receive a written response regarding the refund decision</li>
                            <li><strong>Processing:</strong> If approved, refunds will be processed within 10-15 business days</li>
                        </ol>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Refund Methods</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Approved refunds will be processed using the following methods:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Original payment method (credit card, bank transfer, etc.)</li>
                            <li>Bank transfer to the account used for original payment</li>
                            <li>Check payment (for large amounts or international clients)</li>
                        </ul>
                        <p><strong>Note:</strong> Processing fees and currency conversion charges may be deducted from the refund amount.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Dispute Resolution</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>If you disagree with our refund decision, we encourage you to:</p>
                        <ol class="list-decimal pl-6 space-y-2">
                            <li>Contact our management team to discuss the matter further</li>
                            <li>Provide additional documentation or clarification</li>
                            <li>Consider mediation through a mutually agreed third party</li>
                        </ol>
                        <p>We are committed to resolving disputes fairly and maintaining positive client relationships.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Partial Refunds</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>In some cases, partial refunds may be appropriate:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>When only part of the project scope is affected</li>
                            <li>For unused portions of prepaid services</li>
                            <li>When deliverables partially meet requirements</li>
                            <li>As a goodwill gesture for service issues</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Prevention and Quality Assurance</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>To minimize the need for refunds, we:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Provide detailed project proposals and agreements</li>
                            <li>Maintain regular communication throughout projects</li>
                            <li>Offer milestone-based delivery and approval processes</li>
                            <li>Provide testing and quality assurance for all deliverables</li>
                            <li>Offer revision rounds to ensure client satisfaction</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Changes to This Policy</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We reserve the right to modify this refund policy at any time. Changes will be effective immediately upon posting on our website. We will notify existing clients of significant changes that may affect ongoing projects.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Contact Information</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>For refund requests or questions about this policy, please contact us:</p>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <p><strong>{{ config('company.name') }}</strong></p>
                            <p>{{ config('company.address.primary.full') }}</p>
                            <p>Email: <a href="mailto:{{ config('company.contact.email') }}" class="text-green-500 hover:text-green-600">{{ config('company.contact.email') }}</a></p>
                            <p>Phone: <a href="tel:{{ config('company.contact.phone') }}" class="text-green-500 hover:text-green-600">{{ config('company.contact.phone') }}</a></p>
                        </div>
                        <p class="text-sm text-gray-500 mt-4">
                            <strong>Business Hours:</strong> Monday - Friday, 9:00 AM - 6:00 PM (IST)<br>
                            <strong>Response Time:</strong> We aim to respond to all refund requests within 24-48 hours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection