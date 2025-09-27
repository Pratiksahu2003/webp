@extends('layouts.website')

@section('title', 'Data Science & AI Services - ' . config('company.name'))
@section('description', 'Advanced data science and artificial intelligence solutions to unlock insights and drive business growth by ' . config('company.name'))

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-teal-600 to-teal-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Data Science & AI</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Transform your data into actionable insights with advanced analytics and AI solutions
            </p>
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Explore AI Solutions
            </a>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">AI & Data Science Solutions</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Leverage the power of data and artificial intelligence to drive innovation and growth
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Data Analytics</h3>
                <p class="text-gray-600">Advanced data analysis and visualization to uncover patterns and insights from your business data.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Machine Learning</h3>
                <p class="text-gray-600">Custom ML models for prediction, classification, and automation to enhance business processes.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Natural Language Processing</h3>
                <p class="text-gray-600">NLP solutions for text analysis, sentiment analysis, chatbots, and language understanding.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Computer Vision</h3>
                <p class="text-gray-600">Image and video analysis solutions for object detection, recognition, and automated visual inspection.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Predictive Analytics</h3>
                <p class="text-gray-600">Forecasting models to predict trends, customer behavior, and business outcomes.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Data Engineering</h3>
                <p class="text-gray-600">Data pipeline development, ETL processes, and data warehouse solutions for scalable analytics.</p>
            </div>
        </div>
    </div>
</section>

<!-- Technologies -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">AI & Data Technologies</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We use cutting-edge tools and frameworks for data science and AI development
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Python</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg" alt="TensorFlow" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">TensorFlow</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pytorch/pytorch-original.svg" alt="PyTorch" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">PyTorch</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pandas/pandas-original.svg" alt="Pandas" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Pandas</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jupyter/jupyter-original.svg" alt="Jupyter" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Jupyter</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original.svg" alt="AWS" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">AWS</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-teal-600 to-teal-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Harness the Power of AI?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's explore how data science and AI can transform your business and drive innovation
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Discuss AI Solutions
            </a>
            <a href="tel:{{ config('company.contact.phone') }}" class="bg-white text-teal-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Call {{ config('company.contact.phone') }}
            </a>
        </div>
    </div>
</section>
@endsection