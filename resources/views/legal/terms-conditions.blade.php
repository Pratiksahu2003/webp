@extends('layouts.website')

@section('title', 'Terms & Conditions - ' . config('company.name'))
@section('description', 'Terms and Conditions for ' . config('company.name') . ' - Read our terms of service and usage policies.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-700 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Terms & Conditions</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Please read these terms and conditions carefully before using our services.
            </p>
        </div>
    </div>
</section>

<!-- Terms Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <p class="text-gray-600 mb-8">
                <strong>Last updated:</strong> {{ date('F d, Y') }}
            </p>

            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Acceptance of Terms</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>By accessing and using the services provided by {{ config('company.name') }} ("Company", "we", "us", or "our"), you accept and agree to be bound by the terms and provision of this agreement.</p>
                        <p>If you do not agree to abide by the above, please do not use this service.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Services Description</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>{{ config('company.name') }} provides software development services including but not limited to:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Web application development</li>
                            <li>Mobile application development</li>
                            <li>Custom software solutions</li>
                            <li>UI/UX design services</li>
                            <li>Data science and AI solutions</li>
                            <li>Quality assurance and testing</li>
                            <li>Consulting and technical support</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Project Agreements</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>All projects are governed by separate project agreements that include:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Detailed project scope and deliverables</li>
                            <li>Timeline and milestones</li>
                            <li>Payment terms and schedule</li>
                            <li>Intellectual property rights</li>
                            <li>Confidentiality provisions</li>
                            <li>Change request procedures</li>
                        </ul>
                        <p>These terms and conditions supplement but do not replace individual project agreements.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Payment Terms</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Payment terms are specified in individual project agreements. General payment policies include:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Invoices are due within 30 days of receipt unless otherwise specified</li>
                            <li>Late payments may incur interest charges</li>
                            <li>Work may be suspended for overdue payments</li>
                            <li>All prices are in the currency specified in the project agreement</li>
                            <li>Additional work outside the original scope requires separate authorization</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Intellectual Property Rights</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Intellectual property rights are handled as follows:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Client owns rights to custom-developed software upon full payment</li>
                            <li>We retain rights to our proprietary tools, frameworks, and methodologies</li>
                            <li>Third-party components remain subject to their respective licenses</li>
                            <li>We may use project experience for marketing purposes (with client consent)</li>
                            <li>Source code is provided upon project completion and full payment</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Confidentiality</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We maintain strict confidentiality regarding:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Client business information and data</li>
                            <li>Project specifications and requirements</li>
                            <li>Proprietary algorithms and processes</li>
                            <li>User data and personal information</li>
                            <li>Financial and commercial information</li>
                        </ul>
                        <p>Confidentiality obligations survive project completion and termination of agreements.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Warranties and Disclaimers</h2>
                    <div class="text-gray-600 space-y-4">
                        <p><strong>Limited Warranty:</strong> We warrant that our services will be performed in a professional manner consistent with industry standards.</p>
                        <p><strong>Disclaimer:</strong> Except as expressly stated, all services are provided "as is" without warranties of any kind, either express or implied, including but not limited to:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Merchantability or fitness for a particular purpose</li>
                            <li>Non-infringement of third-party rights</li>
                            <li>Uninterrupted or error-free operation</li>
                            <li>Compatibility with all systems or platforms</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Limitation of Liability</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Our liability is limited as follows:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Total liability shall not exceed the amount paid for the specific project</li>
                            <li>We are not liable for indirect, incidental, or consequential damages</li>
                            <li>We are not responsible for data loss due to client system failures</li>
                            <li>Liability limitations do not apply to gross negligence or willful misconduct</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Client Responsibilities</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Clients are responsible for:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Providing accurate and complete project requirements</li>
                            <li>Timely review and approval of deliverables</li>
                            <li>Providing necessary access to systems and data</li>
                            <li>Maintaining backups of important data</li>
                            <li>Compliance with applicable laws and regulations</li>
                            <li>Prompt payment of invoices</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Termination</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Either party may terminate a project agreement:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>With written notice as specified in the project agreement</li>
                            <li>Immediately for material breach of contract</li>
                            <li>For non-payment of invoices</li>
                        </ul>
                        <p>Upon termination, client pays for work completed and expenses incurred up to the termination date.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Force Majeure</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We are not liable for delays or failures due to circumstances beyond our reasonable control, including but not limited to natural disasters, government actions, pandemics, or technical failures of third-party services.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">12. Governing Law</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>These terms are governed by the laws of India. Any disputes shall be resolved through arbitration in Gurugram, Haryana, India, or as specified in individual project agreements.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">13. Changes to Terms</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We reserve the right to modify these terms at any time. Changes will be effective immediately upon posting on our website. Continued use of our services constitutes acceptance of modified terms.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">14. Contact Information</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>For questions about these terms and conditions, please contact us:</p>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <p><strong>{{ config('company.name') }}</strong></p>
                            <p>{{ config('company.address.primary.full') }}</p>
                            <p>Email: <a href="mailto:{{ config('company.contact.email') }}" class="text-blue-500 hover:text-blue-600">{{ config('company.contact.email') }}</a></p>
                            <p>Phone: <a href="tel:{{ config('company.contact.phone') }}" class="text-blue-500 hover:text-blue-600">{{ config('company.contact.phone') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection