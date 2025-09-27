@extends('layouts.website')

@section('title', 'Terms & Conditions - Vantroz Technology Private Limited')
@section('description', 'Terms and Conditions for Vantroz Technology Private Limited - Read our terms of service and usage policies.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-700 to-blue-800 text-white py-20 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-blue-900 bg-opacity-60 z-10"></div>

    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
            <div class="space-y-8">
                <div class="text-gray-600 space-y-4">
                    <p>These Terms and Conditions ("Terms", "Terms of Service") govern the use of the website and the services provided by Vantroz Technology Private Limited ("we", "our", "us"). By accessing or using our website or services, you agree to be bound by these Terms and Conditions. If you do not agree to these Terms, please refrain from using our website or services.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Acceptance of Terms</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>By accessing or using our website and services, you acknowledge that you have read, understood, and agree to comply with these Terms and Conditions. We may update or revise these Terms at any time, and such changes will be reflected on this page with an updated effective date. You are responsible for reviewing these Terms periodically.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Services Provided</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Vantroz Technology Private Limited provides the following services:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong>IT Services:</strong> Custom IT solutions for businesses, including system design, development, and management.</li>
                            <li><strong>Website Development:</strong> Full-cycle web development services, including design, coding, and deployment.</li>
                            <li><strong>SEO Services:</strong> Comprehensive SEO strategies to improve website visibility and search engine rankings.</li>
                        </ul>
                        <p>By using our services, you agree to cooperate and provide all the necessary information, resources, and access to systems required for the successful completion of the project.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Payment Terms</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>To initiate and complete any project with Vantroz Technology Private Limited, the following payment structure applies:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong>1st Term:</strong> 40% on project initiation </li>
                            <li><strong>2nd Term:</strong> 30% after completion of AI training & initial testing </li>
                            <li><strong>3rd Term:</strong> 30% on project delivery & deployment </li>
                        </ul>
                        <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-400">
                            <p class="font-semibold text-yellow-800">Important Notes:</p>
                            <ul class="list-disc pl-6 space-y-1 text-yellow-700">
                                <li>The initial 40% payment is non-refundable, except in cases where the project is not commenced by Vantroz Technology Private Limited.</li>
                                <li>Failure to make timely payments may delay the project delivery or lead to suspension of services.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Client Responsibilities</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>You, the client, are responsible for providing accurate and complete information required for the completion of the project. This includes:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Supplying content, materials, and other resources needed for website development and SEO services.</li>
                            <li>Responding to queries and feedback requests in a timely manner to ensure smooth progress.</li>
                        </ul>
                        <p>Failure to meet these responsibilities may delay the project's delivery or affect the quality of the services provided.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Ownership and Rights</h2>
                    <div class="text-gray-600 space-y-4">
                        <p><strong>Intellectual Property:</strong> Upon full payment of the final fee, Vantroz Technology Private Limited will transfer the ownership of the website and its content to you. Until full payment is made, the intellectual property of the project, including the website, design, and code, remains the property of Vantroz Technology Private Limited.</p>
                        <p><strong>License to Use Content:</strong> You retain ownership of any content you provide (such as logos, text, images, etc.) and grant us a non-exclusive, worldwide, royalty-free license to use this content for the duration of the project.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Project Deliverables</h2>
                    <div class="text-gray-600 space-y-4">
                        <p><strong>Scope of Work:</strong> We will provide a detailed description of the scope of work before starting the project. The project will be executed according to the agreed-upon timeline and specifications.</p>
                        <p><strong>Timelines:</strong> While we strive to deliver projects on time, any delays caused by factors beyond our control (e.g., client delays in providing necessary information or resources) may affect the timeline.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Client Confidentiality</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Vantroz Technology Private Limited commits to maintaining the confidentiality of any proprietary or confidential information provided by you during the project. This includes sensitive business information, financial data, and any other private details shared in the course of the project. We will not disclose such information to any third parties without your consent unless required by law.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Privacy</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>By using our services, you consent to the collection and use of your personal information as described in our Privacy Policy. We take all necessary measures to protect your data and ensure it is used only for the purposes outlined in the Privacy Policy.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Limitation of Liability</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Vantroz Technology Private Limited will not be liable for any indirect, incidental, special, consequential, or punitive damages arising from the use of our website or services, including but not limited to, loss of data, lost profits, or interruption of services.</p>
                        <p>Our total liability for any claim related to the project will not exceed the total amount paid by the client for the service in question.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Termination of Services</h2>
                    <div class="text-gray-600 space-y-4">
                        <p><strong>Client Termination:</strong> If you choose to terminate the project before completion, you will be liable for payment for any work completed up to the point of termination. The upfront 40% payment will not be refunded.</p>
                        <p><strong>Company Termination:</strong> Vantroz Technology Private Limited may terminate the project if the client fails to meet their obligations, including but not limited to, failure to make timely payments or provide required materials. Termination of the project will not release the client from the obligation to pay for work already completed.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Third-Party Services</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Vantroz Technology Private Limited may use third-party services or platforms to complete projects (e.g., hosting services, payment gateways). We are not responsible for any issues related to third-party services. Any issues with third-party services should be directed to the service provider.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">12. Force Majeure</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Vantroz Technology Private Limited will not be liable for any delay or failure in performance due to events beyond our control, including but not limited to acts of God, war, natural disasters, labor disputes, and government regulations.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">13. Governing Law</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>These Terms and Conditions are governed by the laws of India, without regard to its conflict of law principles. Any disputes related to these Terms shall be subject to the exclusive jurisdiction of the courts in Gurugram, Haryana, India.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">14. Dispute Resolution</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>Any disputes arising under these Terms and Conditions will first be attempted to be resolved through informal negotiations. If the dispute cannot be resolved through negotiation, it will be settled by binding arbitration in accordance with the applicable arbitration rules.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">15. Changes to Terms</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>We may update or revise these Terms and Conditions from time to time. Any changes will be posted on this page, and the revised Terms will include an updated effective date. You are responsible for reviewing these Terms periodically to stay informed about any updates.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">16. Contact Us</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>If you have any questions about these Terms and Conditions or need further clarification, please contact us at:</p>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <p><strong>{{ config('company.name') }}</strong></p>
                            <p>{{ config('company.address.primary.full') }}</p>
                            <p>Email: <a href="mailto:{{ config('company.contact.email') }}" class="text-blue-500 hover:text-blue-600">{{ config('company.contact.email') }}</a></p>
                            <p>Phone: <a href="tel:{{ config('company.contact.phone') }}" class="text-blue-500 hover:text-blue-600">{{ config('company.contact.phone') }}</a></p>
                            <p>Website: <a href="https://www.vantroz.com" class="text-blue-500 hover:text-blue-600">www.vantroz.com</a></p>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Conclusion</h2>
                    <div class="text-gray-600 space-y-4">
                        <p>By using our services, you acknowledge and agree to comply with these Terms and Conditions. At Vantroz Technology Private Limited, we strive to offer top-quality IT solutions, website development, and SEO services, while ensuring transparency and professionalism in our client relationships.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection