@extends('components.layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-8 mt-56 relative">
        <div class="w-full rounded-2xl h-[300px] bg-slate-800 p-16 flex gap-8 items-center relative bg-center bg-cover"
            style="background-image: url('{{ asset('assets/images/background-about.jpg') }}');">
            <div class="flex flex-col gap-4">
                <h1 class="text-4xl text-lime-500 font-semibold">FAQ</h1>
                <p class="text-slate-300 max-w-lg">
                    Find helpful answers to common questions about our car rental services, including booking details and
                    essential customer information.
                </p>

            </div>
            <img src="{{ asset('assets/images/product/half-sedan.png') }}" alt=""
                class="w-[620px] absolute right-0 -top-4">
        </div>
    </section>
    <div class="min-h-screen bg-white py-16">
        <div class="max-w-7xl mx-auto px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-slate-900 mb-4">Frequently asked questions</h1>
                <p class="text-slate-600 text-sm max-w-2xl mx-auto">These are the most commonly asked questions about our
                    vehicle rental service</p>
            </div>

            <!-- Category Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-16">
                <button
                    class="px-6 py-3 bg-slate-900 text-white rounded-full font-medium text-sm hover:bg-slate-800 transition-colors">
                    General
                </button>
                <button
                    class="px-6 py-3 bg-slate-100 text-slate-900 rounded-full font-medium text-sm hover:bg-slate-200 transition-colors">
                    Pricing
                </button>
                <button
                    class="px-6 py-3 bg-slate-100 text-slate-900 rounded-full font-medium text-sm hover:bg-slate-200 transition-colors">
                    Documents
                </button>
                <button
                    class="px-6 py-3 bg-slate-100 text-slate-900 rounded-full font-medium text-sm hover:bg-slate-200 transition-colors">
                    Insurance
                </button>
            </div>

            <!-- FAQ Items -->
            <div class="max-w-4xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="smile" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">How old do I need to be to rent a
                                vehicle?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">For cars, you must be at least 21 years old with a valid driver's
                            license
                            held for a minimum of 1 year. For motorcycles, the minimum age is 18 years with a valid
                            motorcycle license. Additional fees may apply for drivers under 25.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="credit-card" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">What payment methods do you accept?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 mb-3">We accept multiple payment methods through our secure payment gateway
                            including credit cards, debit cards, bank transfers, and e-wallets like GoPay, OVO, and Dana.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="x-circle" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">What is your cancellation policy?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">You can cancel your reservation free of charge up to 24 hours
                            before your
                            scheduled pickup time. Cancellations made within 24 hours are subject to a 50% fee. No-shows
                            will be charged the full amount.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="users" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">Can other people drive the rented
                                vehicle?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">Yes, additional drivers can be added to your rental agreement for
                            a small
                            daily fee. All additional drivers must meet the same requirements and be present at pickup with
                            their documents.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="credit-card" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">Is a security deposit required?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">Yes, a refundable security deposit is required. The amount varies
                            by
                            vehicle type. The deposit is refunded within 3-5 business days after the vehicle is returned in
                            good condition.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="mail" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">What documents do I need to rent?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">You'll need a valid driver's license (or motorcycle license),
                            national ID
                            or passport, proof of address, and a credit or debit card for payment and deposit.</p>
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="shield" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">What insurance coverage is provided?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">All rentals include basic insurance with third-party liability,
                            collision
                            damage waiver, and theft protection. Additional full coverage insurance is available to reduce
                            or eliminate deductibles.</p>
                    </div>
                </div>

                <!-- FAQ Item 8 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group" onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="help-circle" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">What if the vehicle breaks down?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">Our 24/7 roadside assistance is included. Call our support line
                            immediately and we'll send help to your location and provide a replacement vehicle if needed at
                            no extra charge.</p>
                    </div>
                </div>

                <!-- FAQ Item 9 -->
                <div class="border-b border-slate-200">
                    <button class="w-full flex items-start justify-between py-6 text-left group"
                        onclick="toggleFaq(this)">
                        <div class="flex items-start flex-1 pr-8">
                            <i data-feather="play-circle" class="w-5 h-5 text-slate-400 mr-4 mt-1 flex-shrink-0"></i>
                            <span class="font-semibold text-slate-900 text-base">Do you provide vehicle tutorials?</span>
                        </div>
                        <i data-feather="chevron-down"
                            class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform mt-1"></i>
                    </button>
                    <div class="faq-content hidden pb-6 pl-9 ml-4">
                        <p class="text-slate-600 text-sm">Yes, we provide a brief tutorial on vehicle features and controls
                            during
                            pickup. Our staff will walk you through everything you need to know to safely operate the
                            vehicle.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 text-center">
                <div class="inline-block bg-slate-50 rounded-2xl p-12">
                    <i data-feather="message-circle" class="w-12 h-12 text-lime-600 mx-auto mb-4"></i>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">Still have questions?</h3>
                    <p class="text-slate-600 mb-6 max-w-md">Can't find the answer you're looking for? Our support team is
                        here to help</p>
                    <a href="{{ route('contact.index') }}"
                        class="inline-flex items-center bg-slate-900 hover:bg-slate-800 text-white font-semibold px-8 py-4 rounded-full transition-colors text-sm">
                        Get in touch
                        <i data-feather="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('[data-feather="chevron-down"]');

            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>
@endsection
