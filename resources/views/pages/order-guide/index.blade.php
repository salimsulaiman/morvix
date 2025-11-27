@extends('components.layouts.app')
@section('content')
    <section class="max-w-7xl mx-auto px-8 mt-56 relative">
        <div class="w-full rounded-2xl h-[300px] bg-lime-600 p-16 flex gap-8 items-center relative bg-center bg-cover justify-end"
            style="background-image: url('{{ asset('assets/images/background-cta.jpg') }}');">
            <div class="flex flex-col gap-4">
                <h1 class="text-4xl text-white font-semibold">How to Order</h1>
                <p class="text-slate-200 max-w-xl">Welcome to Morvix, your trusted partner in premium car rentals. We
                    are
                    dedicated to providing exceptional
                    service and a diverse fleet of vehicles to meet your travel needs.</p>
            </div>
            <img src="{{ asset('assets/images/product/half-mpv.png') }}" alt=""
                class="w-[520px] absolute left-0 -top-16">
        </div>
    </section>
    <div class="min-h-screen bg-white py-16 mt-12">
        <div class="max-w-7xl mx-auto px-8">
            <!-- Steps -->
            <div class="space-y-8">

                <!-- Step 1 -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-lime-600">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-lime-600 rounded-full flex items-center justify-center">
                                <i data-feather="search" class="w-6 h-6 text-white"></i>
                            </div>
                        </div>
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Step 1: Browse Vehicles</h3>
                            <p class="text-slate-600 mb-4">Explore our collection of cars and motorcycles. Filter by type,
                                price, or features to find your perfect ride.</p>
                            <a href="{{ route('cars.index') }}"
                                class="inline-flex items-center text-lime-600 hover:text-lime-500 font-medium">
                                Browse vehicles
                                <i data-feather="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-lime-600">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-lime-600 rounded-full flex items-center justify-center">
                                <i data-feather="calendar" class="w-6 h-6 text-white"></i>
                            </div>
                        </div>
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Step 2: Select Dates</h3>
                            <p class="text-slate-600 mb-4">Choose your pickup and return dates. Check availability and view
                                pricing for your selected duration.</p>

                            <div class="bg-slate-100 rounded-lg p-4 mt-4">
                                <ul class="space-y-2 text-slate-600 text-sm">
                                    <li class="flex items-center">
                                        <i data-feather="check" class="w-4 h-4 text-lime-600 mr-2"></i>
                                        Minimum rental: 1 day
                                    </li>
                                    <li class="flex items-center">
                                        <i data-feather="check" class="w-4 h-4 text-lime-600 mr-2"></i>
                                        Discounts for weekly/monthly rentals
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-lime-600">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-lime-600 rounded-full flex items-center justify-center">
                                <i data-feather="user" class="w-6 h-6 text-white"></i>
                            </div>
                        </div>
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Step 3: Enter Your Details</h3>
                            <p class="text-slate-600 mb-4">Provide your personal information and upload required documents.
                            </p>

                            <div class="bg-slate-100 rounded-lg p-4 mt-4">
                                <p class="text-slate-700 font-medium mb-2">Required Documents:</p>
                                <ul class="space-y-2 text-slate-600 text-sm">
                                    <li class="flex items-center">
                                        <i data-feather="file-text" class="w-4 h-4 text-lime-600 mr-2"></i>
                                        Valid driver's license
                                    </li>
                                    <li class="flex items-center">
                                        <i data-feather="file-text" class="w-4 h-4 text-lime-600 mr-2"></i>
                                        National ID or Passport
                                    </li>
                                    <li class="flex items-center">
                                        <i data-feather="file-text" class="w-4 h-4 text-lime-600 mr-2"></i>
                                        Proof of address (for long-term rentals)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-lime-600">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-lime-600 rounded-full flex items-center justify-center">
                                <i data-feather="credit-card" class="w-6 h-6 text-white"></i>
                            </div>
                        </div>
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Step 4: Make Payment</h3>
                            <p class="text-slate-600 mb-4">Complete your booking with secure payment through our payment
                                gateway.</p>

                            <div class="bg-slate-100 rounded-lg p-4 mt-4">
                                <p class="text-slate-700 font-medium mb-3">Accepted Payment Methods:</p>

                                <div class="grid grid-cols-2 gap-3">
                                    <div class="flex items-center bg-white border rounded p-3">
                                        <i data-feather="credit-card" class="w-5 h-5 text-lime-600 mr-2"></i>
                                        <span class="text-slate-700 text-sm">Credit Card</span>
                                    </div>
                                    <div class="flex items-center bg-white border rounded p-3">
                                        <i data-feather="smartphone" class="w-5 h-5 text-lime-600 mr-2"></i>
                                        <span class="text-slate-700 text-sm">Debit Card</span>
                                    </div>
                                    <div class="flex items-center bg-white border rounded p-3">
                                        <i data-feather="dollar-sign" class="w-5 h-5 text-lime-600 mr-2"></i>
                                        <span class="text-slate-700 text-sm">Bank Transfer</span>
                                    </div>
                                    <div class="flex items-center bg-white border rounded p-3">
                                        <i data-feather="smartphone" class="w-5 h-5 text-lime-600 mr-2"></i>
                                        <span class="text-slate-700 text-sm">E-Wallet</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-lime-600">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-lime-600 rounded-full flex items-center justify-center">
                                <i data-feather="check-circle" class="w-6 h-6 text-white"></i>
                            </div>
                        </div>
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Step 5: Confirmation & Pickup</h3>
                            <p class="text-slate-600 mb-4">Receive your booking confirmation via email and pick up your
                                vehicle at the scheduled time.</p>

                            <div class="bg-slate-100 rounded-lg p-4 mt-4">
                                <ul class="space-y-2 text-slate-600 text-sm">
                                    <li class="flex items-start">
                                        <i data-feather="mail" class="w-4 h-4 text-lime-600 mr-2 mt-1"></i>
                                        Instant email confirmation
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="map-pin" class="w-4 h-4 text-lime-600 mr-2 mt-1"></i>
                                        Pickup location details included
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="phone" class="w-4 h-4 text-lime-600 mr-2 mt-1"></i>
                                        24/7 customer support available
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="mt-12 bg-white shadow rounded-lg p-6 border border-lime-600">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i data-feather="alert-circle" class="w-6 h-6 text-lime-600"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-slate-900 mb-3">Important Notes</h3>

                        <ul class="space-y-2 text-slate-600 text-sm">
                            <li class="flex items-start">
                                <i data-feather="chevron-right" class="w-4 h-4 text-lime-600 mr-2 mt-1"></i>
                                Full payment required at booking confirmation
                            </li>
                            <li class="flex items-start">
                                <i data-feather="chevron-right" class="w-4 h-4 text-lime-600 mr-2 mt-1"></i>
                                Security deposit may be required for certain vehicles
                            </li>
                            <li class="flex items-start">
                                <i data-feather="chevron-right" class="w-4 h-4 text-lime-600 mr-2 mt-1"></i>
                                Cancellation policy: Free cancellation up to 24 hours before pickup
                            </li>
                            <li class="flex items-start">
                                <i data-feather="chevron-right" class="w-4 h-4 text-lime-600 mr-2 mt-1"></i>
                                Fuel: Vehicle should be returned with same fuel level as pickup
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-12 text-center">
                <a href="{{ route('cars.index') }}"
                    class="inline-flex items-center bg-lime-600 hover:bg-lime-500 text-white font-semibold px-8 py-4 rounded-lg transition-colors">
                    <i data-feather="arrow-right" class="w-5 h-5 mr-2"></i>
                    Start Your Booking Now
                </a>
            </div>

            <!-- Need Help -->
            <div class="mt-8 text-center">
                <p class="text-slate-500 mb-4">Need assistance with your booking?</p>
                <a href="{{ route('contact.index') }}"
                    class="inline-flex items-center text-lime-600 hover:text-lime-500 font-medium">
                    <i data-feather="message-circle" class="w-5 h-5 mr-2"></i>
                    Contact Support
                </a>
            </div>

        </div>
    </div>
@endsection
