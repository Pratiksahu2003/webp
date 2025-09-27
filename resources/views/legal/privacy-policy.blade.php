@extends('layouts.website')

@section('title', 'Privacy Policy - ' . config('company.name'))
@section('description', 'Privacy Policy for ' . config('company.name') . ' - Learn how we collect, use, and protect your personal information.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-gray-700 to-gray-800 text-white py-20 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gray-900 bg-opacity-60 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Privacy Policy</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Your privacy is important to us. This policy explains how we collect, use, and protect your information.
            </p>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <p class="text-gray-600 mb-8">
                <strong>Last updated:</strong> {{ date('F d, Y') }}
            </p>

            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Information We Collect</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We collect information you provide directly to us, such as when you:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Fill out contact forms or request quotes</li>
                            <li>Subscribe to our newsletter or blog updates</li>
                            <li>Create an account or use our services</li>
                            <li>Communicate with us via email, phone, or chat</li>
                            <li>Participate in surveys or feedback forms</li>
                        </ul>
                        <p>This information may include:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Name and contact information (email, phone, address)</li>
                            <li>Company information and job title</li>
                            <li>Project requirements and specifications</li>
                            <li>Payment and billing information</li>
                            <li>Communication preferences</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. How We Use Your Information</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We use the information we collect to:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Provide, maintain, and improve our services</li>
                            <li>Process transactions and send related information</li>
                            <li>Send technical notices, updates, and support messages</li>
                            <li>Respond to your comments, questions, and requests</li>
                            <li>Communicate about products, services, and events</li>
                            <li>Monitor and analyze trends and usage</li>
                            <li>Detect, investigate, and prevent fraudulent activities</li>
                            <li>Comply with legal obligations</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Information Sharing and Disclosure</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We do not sell, trade, or otherwise transfer your personal information to third parties except in the following circumstances:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong>Service Providers:</strong> We may share information with trusted third-party service providers who assist us in operating our website and conducting business</li>
                            <li><strong>Legal Requirements:</strong> We may disclose information when required by law or to protect our rights, property, or safety</li>
                            <li><strong>Business Transfers:</strong> Information may be transferred in connection with a merger, acquisition, or sale of assets</li>
                            <li><strong>Consent:</strong> We may share information with your explicit consent</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Data Security</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. These measures include:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Encryption of data in transit and at rest</li>
                            <li>Regular security assessments and updates</li>
                            <li>Access controls and authentication measures</li>
                            <li>Employee training on data protection</li>
                            <li>Secure hosting and backup systems</li>
                        </ul>
                        <p>However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Cookies and Tracking Technologies</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We use cookies and similar tracking technologies to:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Remember your preferences and settings</li>
                            <li>Analyze website traffic and usage patterns</li>
                            <li>Improve user experience and website functionality</li>
                            <li>Provide personalized content and advertisements</li>
                        </ul>
                        <p>You can control cookies through your browser settings, but disabling cookies may affect website functionality.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Your Rights and Choices</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>You have the following rights regarding your personal information:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong>Access:</strong> Request access to your personal information</li>
                            <li><strong>Correction:</strong> Request correction of inaccurate information</li>
                            <li><strong>Deletion:</strong> Request deletion of your personal information</li>
                            <li><strong>Portability:</strong> Request transfer of your information</li>
                            <li><strong>Opt-out:</strong> Unsubscribe from marketing communications</li>
                            <li><strong>Restriction:</strong> Request restriction of processing</li>
                        </ul>
                        <p>To exercise these rights, please contact us at {{ config('company.contact.email') }}.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Data Retention</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We retain your personal information for as long as necessary to:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Provide our services and support</li>
                            <li>Comply with legal obligations</li>
                            <li>Resolve disputes and enforce agreements</li>
                            <li>Improve our services and operations</li>
                        </ul>
                        <p>When information is no longer needed, we securely delete or anonymize it.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">8. International Data Transfers</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Your information may be transferred to and processed in countries other than your own. We ensure appropriate safeguards are in place to protect your information in accordance with applicable data protection laws.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Children's Privacy</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Our services are not directed to children under 13 years of age. We do not knowingly collect personal information from children under 13. If we become aware that we have collected such information, we will take steps to delete it promptly.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Changes to This Privacy Policy</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date. We encourage you to review this Privacy Policy periodically.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Contact Us</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>If you have any questions about this Privacy Policy or our privacy practices, please contact us:</p>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <p><strong>{{ config('company.name') }}</strong></p>
                            <p>{{ config('company.address.primary.full') }}</p>
                            <p>Email: <a href="mailto:{{ config('company.contact.email') }}" class="text-orange-500 hover:text-orange-600">{{ config('company.contact.email') }}</a></p>
                            <p>Phone: <a href="tel:{{ config('company.contact.phone') }}" class="text-orange-500 hover:text-orange-600">{{ config('company.contact.phone') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection