@extends('components.layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-40 lg:mt-56 relative">
        <div class="w-full rounded-2xl min-h-[400px] sm:min-h-[300px] bg-slate-800 p-6 sm:p-10 lg:p-16 flex flex-col md:flex-row gap-6 sm:gap-8 items-start md:items-center relative bg-center bg-cover"
            style="background-image: url('{{ asset('assets/images/background-about.jpg') }}');">

            <div class="flex flex-col gap-3 sm:gap-4 max-w-full md:max-w-lg z-10">
                <h1 class="text-2xl sm:text-3xl lg:text-4xl text-lime-500 font-semibold">
                    About us
                </h1>
                <p class="text-sm sm:text-base text-slate-300">
                    Welcome to Morvix, your trusted partner in premium car rentals. We are
                    dedicated to providing exceptional
                    service and a diverse fleet of vehicles to meet your travel needs.
                </p>
            </div>

            <img src="{{ asset('assets/images/product/car/off-road.png') }}" alt=""
                class="w-96 lg:w-[640px] absolute right-0 bottom-0">
        </div>
    </section>

    <img src="{{ asset('assets/images/morvix-drive-your-freedom.png') }}" alt=""
        class="max-w-7xl my-12 mx-auto px-8 w-full">

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 flex flex-col lg:flex-row gap-10 lg:gap-16">

        <div class="flex flex-col gap-4 w-full lg:w-1/2">
            <h2 class="font-bold text-xl sm:text-2xl uppercase max-w-md text-slate-900">
                Insight Through Achievement
            </h2>

            <p class="text-sm text-slate-700">
                Discover fresh insights that inspire you to view opportunities from a broader
                angle. Our achievements and data reflect our commitment to delivering meaningful value and building lasting
                trust.
            </p>

            <div class="w-full grid grid-cols-2 gap-4 mt-4 gap-y-6">
                <div class="flex flex-col gap-2">
                    <h3 class="text-3xl sm:text-4xl text-slate-900 font-bold">
                        5.200+<span class="text-xs text-lime-600 font-bold"> /Customers</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-700">
                        Trusted by thousands of satisfied customers across various destinations.
                    </p>
                </div>

                <div class="flex flex-col gap-2">
                    <h3 class="text-3xl sm:text-4xl text-slate-900 font-bold">
                        4.9/5<span class="text-xs text-lime-600 font-bold"> /Rating</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-700">
                        Highly rated for consistent service quality and customer experience.
                    </p>
                </div>

                <hr class="text-slate-300 col-span-2">

                <div class="flex flex-col gap-2">
                    <h3 class="text-3xl sm:text-4xl text-slate-900 font-bold">
                        40+<span class="text-xs text-lime-600 font-bold"> /Vehicle units</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-700">
                        A well-maintained fleet offering options for every type of trip.
                    </p>
                </div>

                <div class="flex flex-col gap-2">
                    <h3 class="text-3xl sm:text-4xl text-slate-900 font-bold">
                        5+<span class="text-xs text-lime-600 font-bold"> /Years</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-700">
                        Years of experience delivering safe and dependable rentals.
                    </p>
                </div>
            </div>

            <a href="#"
                class="px-4 py-2 text-base rounded-full bg-lime-600 text-white font-medium w-fit mt-4 hover:bg-lime-700 transition-colors duration-150 ease-in-out">
                Contact us
            </a>
        </div>

        <div class="aspect-[4/3] rounded-2xl bg-slate-100 w-full lg:w-1/2 overflow-hidden relative grayscale-50">
            <img src="{{ asset('assets/images/articles/hyundai-motor-group.jpg') }}" alt=""
                class="w-full h-full object-cover object-center">
        </div>

    </section>

    <section class="w-full bg-slate-800 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-bold text-xl sm:text-2xl uppercase max-w-md mx-auto mb-4 text-white text-center">
                What We Offers
            </h2>

            <p class="text-sm text-slate-300 max-w-lg mx-auto text-center">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed culpa quidem
                rerum eos harum quo, sapiente iure
            </p>

            <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 gap-y-10 mt-12 sm:mt-16">

                <div class="flex flex-col">
                    <div class="rounded-full bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center">
                        <i data-feather="calendar" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Daily & Monthly Car Rental</h3>
                    <p class="text-slate-300 text-sm">
                        Flexible rental options for daily or monthly use, perfect for business trips, vacations, or
                        long-term
                        mobility needs.
                    </p>
                </div>

                <div class="flex flex-col">
                    <div class="rounded-full bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center">
                        <i data-feather="user" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Car Rental With Driver</h3>
                    <p class="text-slate-300 text-sm">
                        Enjoy a hassle-free journey with our professional and experienced drivers who ensure comfort,
                        safety,
                        and punctuality.
                    </p>
                </div>

                <div class="flex flex-col">
                    <div class="rounded-full bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center">
                        <i data-feather="key" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Self-Drive (Lepas Kunci)</h3>
                    <p class="text-slate-300 text-sm">
                        Freedom to explore at your own pace. Rent a car without a driver for maximum privacy and
                        convenience.
                    </p>
                </div>

                <div class="flex flex-col">
                    <div class="rounded-full bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center">
                        <i data-feather="navigation" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Motorcycle Rental</h3>
                    <p class="text-slate-300 text-sm">
                        Affordable and efficient motorcycle rental for short city trips, commuting, or flexible daily
                        mobility.
                    </p>
                </div>

                <div class="flex flex-col">
                    <div class="rounded-full bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center">
                        <i data-feather="map-pin" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Vehicle Delivery Service</h3>
                    <p class="text-slate-300 text-sm">
                        We deliver the vehicle directly to your location—home, office, hotel, or airport—for maximum ease
                        and
                        convenience.
                    </p>
                </div>

                <div class="flex flex-col">
                    <div class="rounded-full bg-lime-600 h-12 w-12 mb-4 flex justify-center items-center">
                        <i data-feather="briefcase" class="text-white"></i>
                    </div>
                    <h3 class="text-white text-base font-medium mb-2">Corporate & Event Rental</h3>
                    <p class="text-slate-300 text-sm">
                        Special packages for companies, events, weddings, and long-term operational needs with flexible
                        contracts.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 flex flex-col-reverse lg:flex-row-reverse gap-10 lg:gap-16">
        <div class="flex flex-col gap-4 w-full lg:w-1/2">
            <h2 class="font-bold text-xl sm:text-2xl uppercase max-w-md text-slate-900">
                Why Choose Us
            </h2>

            <p class="text-sm text-slate-700">
                Our mission is to make mobility simple and stress-free by offering flexible rental options, verified vehicle
                standards, and a team that is always ready to assist you from booking to return.
            </p>

            <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4 gap-y-6">
                <div
                    class="w-full rounded-2xl bg-slate-100 flex flex-col gap-2 p-6 sm:p-8 hover:bg-lime-600 transition-colors duration-150 ease-in-out group cursor-default">
                    <h3 class="text-2xl sm:text-3xl text-slate-900 font-bold group-hover:text-white">
                        Transparent & Fair Pricing
                    </h3>
                    <p class="text-sm text-slate-700 group-hover:text-white">
                        Clear and competitive rates with no hidden charges.
                    </p>
                </div>

                <div
                    class="w-full rounded-2xl bg-slate-100 flex flex-col gap-2 p-6 sm:p-8 hover:bg-lime-600 transition-colors duration-150 ease-in-out group cursor-default">
                    <h3 class="text-2xl sm:text-3xl text-slate-900 font-bold group-hover:text-white">
                        Well-Maintained Vehicles
                    </h3>
                    <p class="text-sm text-slate-700 group-hover:text-white">
                        Regularly serviced cars and motorcycles for safe and comfortable trips.
                    </p>
                </div>

                <div
                    class="w-full rounded-2xl bg-slate-100 flex flex-col gap-2 p-6 sm:p-8 hover:bg-lime-600 transition-colors duration-150 ease-in-out group cursor-default">
                    <h3 class="text-2xl sm:text-3xl text-slate-900 font-bold group-hover:text-white">
                        Fast & Easy Booking
                    </h3>
                    <p class="text-sm text-slate-700 group-hover:text-white">
                        A simple and efficient process that lets you book within minutes.
                    </p>
                </div>

                <div
                    class="w-full rounded-2xl bg-slate-100 flex flex-col gap-2 p-6 sm:p-8 hover:bg-lime-600 transition-colors duration-150 ease-in-out group cursor-default">
                    <h3 class="text-2xl sm:text-3xl text-slate-900 font-bold group-hover:text-white">
                        Responsive Support
                    </h3>
                    <p class="text-sm text-slate-700 group-hover:text-white">
                        Quick and reliable assistance whenever you need it.
                    </p>
                </div>
            </div>
        </div>

        <div class="aspect-[4/3] rounded-2xl bg-slate-100 w-full lg:w-1/2 overflow-hidden relative grayscale-50">
            <img src="{{ asset('assets/images/articles/ford.jpg') }}" alt=""
                class="w-full h-full object-cover object-center">
        </div>
    </section>

    <section class="w-full bg-lime-600 bg-cover bg-center"
        style="background-image: url('{{ asset('assets/images/background-cta.jpg') }}');">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 sm:pt-28 lg:pt-32 pb-64 sm:pb-72 lg:pb-96 relative overflow-hidden flex items-center">
            <img src="{{ asset('assets/images/product/type-suv.png') }}" alt=""
                class="w-full max-w-5xl -scale-x-100 mb-4 mx-auto absolute -bottom-16 sm:-bottom-56 lg:-bottom-64 left-1/2 -translate-x-1/2">
            <div class="flex flex-col justify-center items-center w-full text-center">
                <div class="flex flex-col items-center gap-1 mb-4">
                    <h3 class="text-3xl sm:text-4xl lg:text-6xl text-slate-900 uppercase">
                        Ready for Your
                    </h3>
                    <h3
                        class="text-5xl sm:text-7xl md:text-8xl lg:text-[156px] text-slate-200 uppercase font-bold leading-none">
                        Next Trip?
                    </h3>
                </div>
                <p class="text-slate-900 mb-2 text-sm sm:text-base max-w-xl">
                    Choose from our well-maintained cars and motorcycles with flexible rental options.
                </p>
                <p class="text-slate-900 mb-6 sm:mb-8 font-bold text-sm sm:text-base max-w-xl">
                    Experience reliable vehicles and top-tier service for every trip.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <a href="#"
                        class="rounded-full px-6 py-2 bg-slate-900 text-white hover:bg-slate-950 transition-colors duration-150 ease-in-out">
                        Rent a Car
                    </a>
                    <a href="#"
                        class="rounded-full px-6 py-2 bg-slate-200 text-slate-900 hover:bg-slate-300 transition-colors duration-150 ease-in-out">
                        Contact us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
