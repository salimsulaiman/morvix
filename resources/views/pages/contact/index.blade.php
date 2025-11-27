@extends('components.layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-8 mt-56 relative">
        <div class="w-full rounded-2xl h-[300px] bg-lime-600 p-16 flex gap-8 items-center relative bg-center bg-cover justify-end"
            style="background-image: url('{{ asset('assets/images/background-contact.jpg') }}');">
            <div class="flex flex-col gap-4">
                <h1 class="text-4xl text-white font-semibold">Contact us</h1>
                <p class="text-slate-200 max-w-2xl">Welcome to Morvix, your trusted partner in premium car rentals. We are
                    dedicated to
                    providing exceptional
                    service and a diverse fleet of vehicles to meet your travel needs.</p>
            </div>
            <img src="{{ asset('assets/images/product/half-xsr.png') }}" alt=""
                class="w-[420px] absolute left-0 bottom-0">
        </div>
    </section>
    <div class="relative w-full max-w-7xl mx-auto h-[400px] cursor-default">
        <h3
            class="uppercase text-[20vw] text-slate-200 font-bold absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
            MORVIX</h3>
        <h3
            class="uppercase text-[16vw] text-slate-900 font-bold absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
            MORVIX</h3>
        <h3 class="text-[3vw] font-medium text-lime-600 absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
            Drive Your Experience</h3>
    </div>
    <section class="max-w-7xl mx-auto px-8 py-16 flex gap-16">
        <div class="flex flex-col gap-4 w-1/2">
            <h2 class="font-bold text-2xl uppercase max-w-md text-slate-900">Let's Talk</h2>
            <p class="text-sm text-slate-700">Reach out anytime for questions, bookings, or assistance. Our team is ready to
                help you get the right vehicle for your journey.</p>
            <form class="space-y-6 mt-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-xs font-medium text-slate-700">First Name</label>
                        <input type="text" placeholder="Enter first name"
                            class="w-full px-4 py-3 text-sm rounded-xl border border-slate-300 focus:border-lime-600 focus:ring-2 focus:ring-lime-200 outline-none transition">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-xs font-medium text-slate-700">Last Name</label>
                        <input type="text" placeholder="Enter last name"
                            class="w-full px-4 py-3 text-sm rounded-xl border border-slate-300 focus:border-lime-600 focus:ring-2 focus:ring-lime-200 outline-none transition">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-medium text-slate-700">Email</label>
                    <input type="email" placeholder="your@email.com"
                        class="w-full px-4 py-3 text-sm rounded-xl border border-slate-300 focus:border-lime-600 focus:ring-2 focus:ring-lime-200 outline-none transition">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-medium text-slate-700">Message</label>
                    <textarea rows="5" placeholder="Type something..."
                        class="w-full px-4 py-3 text-sm rounded-xl border border-slate-300 focus:border-lime-600 focus:ring-2 focus:ring-lime-200 outline-none transition resize-none"></textarea>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-lime-600 hover:bg-lime-700 text-white font-semibold rounded-xl transition text-sm">
                    Send Message
                </button>

            </form>
        </div>

        <div class="w-1/2">
            <img src="{{ asset('assets/images/contact-image.png') }}" alt="" class="w-full h-full">
        </div>

    </section>
    <section class="w-full bg-slate-800 py-16">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="font-bold text-2xl uppercase max-w-md mx-auto mb-4 text-white text-center">Quick Contact Info</h2>
            <p class="text-sm text-slate-300 max-w-lg mx-auto text-center">Lorem ipsum dolor sit amet consectetur,
                adipisicing elit. Sed
                culpa quidem
                rerum eos harum quo, sapiente iure</p>
            <div class="w-full grid grid-cols-3 gap-8 gap-y-12 mt-16 max-w-4xl mx-auto">
                <div class="flex flex-col items-center">
                    <div class="rounded-xl bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center py-1">
                        <i data-feather="phone" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Our Contact</h3>
                    <p class="text-slate-300 text-sm">+62 812-3456-7890</p>
                    <p class="text-slate-300 text-sm">support@morvix.com</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="rounded-xl bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center py-1">
                        <i data-feather="map-pin" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Address</h3>
                    <p class="text-slate-300 text-sm">123 Main Street, City, Country</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="rounded-xl bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center py-1">
                        <i data-feather="map-pin" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Operating Hours</h3>
                    <p class="text-slate-300 text-sm">Mon–Sun: 08:00–22:00</p>
                </div>
            </div>
        </div>
    </section>

    <div class="w-full overflow-hidden grayscale">
        <div class="w-full h-[400px]">
            <iframe src="https://www.google.com/maps?q=-6.175392995519447,106.81156911533536&z=13&output=embed"
                class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <section class="w-full bg-lime-600 bg-cover bg-center"
        style="background-image: url('{{ asset('assets/images/background-about.jpg') }}');">
        <div class="max-w-7xl mx-auto px-8 py-16 relative overflow-hidden flex items-center">
            <div class="flex w-full justify-center">
                <div class="flex flex-col gap-2 items-center">
                    <h2 class="font-bold text-2xl uppercase max-w-md mb-4 text-white text-center">Ready to Book Your
                        Vehicle?</h2>
                    <p class="text-sm text-slate-200 max-w-lg text-center">Contact us today to reserve your car or
                        motorcycle and experience the freedom of the open road with Morvix.</p>
                    <div class="flex gap-2 mt-4">
                        <a href="" class="bg-lime-600 hover:bg-lime-700 text-white px-4 py-2 rounded-full">Contact
                            us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
