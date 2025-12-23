@extends('components.layouts.app')

@section('content')
    <section class="w-full h-auto bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('assets/images/hero-bg.jpg') }}');">
        <div class="inset-0 absolute bg-black/50"></div>
        <div
            class="relative z-10 mx-auto flex h-full max-w-7xl flex-col items-center justify-center
           gap-4
           px-4 sm:px-6 lg:px-8
           pt-40
           pb-16 sm:pb-20 lg:pb-24">

            <h1
                class="max-w-2xl text-3xl sm:text-4xl lg:text-5xl
                   font-medium leading-relaxed text-white text-start lg:text-center">
                Perjalanan <span class="font-bold text-lime-500">Nyaman</span>,
                Pengalaman Tak Terlupakan
            </h1>

            <p class="max-w-2xl lg:max-w-md text-sm sm:text-base text-gray-200 text-start lg:text-center">
                Temukan layanan rental mobil dan motor terbaik dengan
                pelayanan unggulan dan harga ramah kantong.
            </p>
            <div class="w-full mt-8 sm:mt-16 lg:mt-24">
                <div class="max-w-5xl mx-auto flex flex-col gap-4 lg:px-0">
                    <div class="flex gap-2 flex-wrap">
                        <button class="rounded-full px-4 py-2 text-sm bg-lime-500 cursor-pointer flex gap-1 items-center">
                            <img src="{{ asset('assets/icons/car.png') }}" alt="car-icon" class="h-5">
                            Mobil
                        </button>

                        <button class="rounded-full px-4 py-2 text-sm bg-slate-200 cursor-pointer flex gap-1 items-center">
                            <img src="{{ asset('assets/icons/motorcycle.png') }}" alt="motor-icon" class="h-5">
                            Motor
                        </button>
                    </div>
                    <div
                        class="bg-white rounded-4xl flex flex-col gap-4 p-6 sm:p-8 justify-center
                   h-auto lg:h-40">
                        <h6 class="text-xs">Cari kendaraan</h6>

                        <div
                            class="flex flex-col lg:flex-row gap-6 lg:gap-4
                       justify-between items-stretch lg:items-center">
                            <div class="flex flex-col gap-4 w-full lg:w-auto">
                                <h6 class="font-bold text-sm">Lokasi Penyewaan</h6>
                                <div x-data="{ open: false, selected: 'Choose Location', options: ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Bali'] }" class="relative">
                                    <button type="button" @click.stop="open = !open"
                                        class="bg-gray-100 text-gray-500 text-sm rounded-full
                                   w-full lg:w-48 p-2.5 flex items-center gap-1">
                                        <svg class="w-5 h-5 text-gray-500 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.37892 10.2236L8 16L12.6211 10.2236C13.5137 9.10788 14 7.72154 14 6.29266V6C14 2.68629 11.3137 0 8 0C4.68629 0 2 2.68629 2 6V6.29266C2 7.72154 2.4863 9.10788 3.37892 10.2236ZM8 8C9.10457 8 10 7.10457 10 6C10 4.89543 9.10457 4 8 4C6.89543 4 6 4.89543 6 6C6 7.10457 6.89543 8 8 8Z" />
                                        </svg>
                                        <span x-text="selected" class="truncate"></span>
                                    </button>

                                    <ul x-show="open" @click.outside="open = false" x-cloak
                                        class="absolute left-0 mt-2 w-full lg:w-48 bg-white rounded-2xl shadow-md z-50 overflow-hidden py-2">
                                        <template x-for="(option, index) in options" :key="index">
                                            <li>
                                                <button type="button" @click.stop="selected = option; open = false"
                                                    class="w-full text-left px-4 py-2 text-sm hover:bg-lime-400 text-gray-700"
                                                    :class="{ 'bg-lime-200 text-lime-900 font-medium': selected === option }"
                                                    x-text="option">
                                                </button>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                            <div class="hidden lg:block w-[3px] h-full rounded-full bg-concrete-100"></div>
                            <div class="flex flex-col gap-4 w-full lg:w-auto">
                                <h6 class="font-bold text-sm">Tanggal Penyewaan</h6>

                                <div class="relative w-full lg:max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>

                                    <input datepicker type="text"
                                        class="bg-gray-100 text-gray-900 text-sm rounded-full block w-full ps-10 p-2.5 outline-none border-0 focus:ring-0"
                                        placeholder="Select date start">
                                </div>
                            </div>

                            <div class="hidden lg:block w-[3px] h-full rounded-full bg-concrete-100"></div>
                            <div class="flex flex-col gap-4 w-full lg:w-auto">
                                <h6 class="font-bold text-sm">Tanggal Pengembalian</h6>

                                <div class="relative w-full lg:max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker type="text"
                                        class="bg-gray-100 text-gray-900 text-sm rounded-full block w-full ps-10 p-2.5 outline-none border-0 focus:ring-0"
                                        placeholder="Select date end">
                                </div>
                            </div>
                            <button
                                class="w-full md:w-full lg:w-auto
           rounded-full bg-lime-500 p-3 lg:p-2
           hover:bg-lime-600
           flex items-center justify-center lg:justify-center gap-2
           self-stretch lg:self-auto">
                                <i data-feather="search" class="w-5 h-5 text-white"></i>
                                <span class="text-white text-sm font-medium lg:hidden">
                                    Cari Kendaraan
                                </span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-lime-500 w-full">
        <div
            class="max-w-7xl mx-auto
               px-4 sm:px-6 lg:px-8
               py-10 sm:py-12
               grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3
               gap-8 sm:gap-12 lg:gap-20">
            <div class="w-full flex flex-col gap-2">
                <div class="bg-slate-900 rounded-full h-10 w-10 p-3 flex items-center justify-center">
                    <i data-feather="calendar" class="w-8 h-8 text-lime-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mt-2">
                    Smart & Easy Booking
                </h3>
                <p class="text-sm">
                    Sistem pemesanan Morvix dirancang cepat, intuitif, dan transparan — cukup pilih kendaraan, tentukan
                    jadwal, dan bayar secara online.
                </p>
            </div>

            <div class="w-full flex flex-col gap-2">
                <div class="bg-slate-900 rounded-full h-10 w-10 p-3 flex items-center justify-center">
                    <i data-feather="truck" class="w-8 h-8 text-lime-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mt-2">
                    Premium & Well-Maintained Vehicles
                </h3>
                <p class="text-sm">
                    Semua unit Morvix selalu melalui perawatan rutin untuk
                    memastikan keamanan dan kenyamanan perjalananmu.
                </p>
            </div>

            <div class="w-full flex flex-col gap-2 sm:col-span-2 lg:col-span-1">
                <div class="bg-slate-900 rounded-full h-10 w-10 p-3 flex items-center justify-center">
                    <i data-feather="credit-card" class="w-8 h-8 text-lime-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mt-2">
                    Secure Online Payment
                </h3>
                <p class="text-sm">
                    Didukung teknologi payment gateway terintegrasi, setiap pembayaran dijamin aman dan terlacak secara
                    real-time.
                </p>
            </div>
        </div>
    </section>

    <section class="w-full bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-8">
            <h2 class="font-bold text-xl sm:text-2xl uppercase mb-4 max-w-md text-slate-900">
                Featured Vehicles
            </h2>

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 sm:gap-8">
                <p class="text-sm text-slate-700 max-w-2xl">
                    Temukan mobil dan motor pilihan terbaik kami — dipilih khusus
                    untuk kenyamanan, gaya, dan performa. Sewa kendaraan impianmu
                    sekarang dan nikmati perjalanan bersama
                    <span class="text-lime-600 font-bold">morvix</span>.
                </p>
                <a href="" class="text-sm font-bold text-lime-500 hover:text-lime-600 self-start sm:self-auto">
                    Lihat semua
                </a>
            </div>

            <div class="mt-8 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($vehicles as $vehicle)
                    @if ($vehicle)
                        <div class="w-full bg-concrete-50 rounded-xl aspect-square overflow-hidden group">
                            <a href="{{ route('cars.show', $vehicle->code) }}"
                                class="w-full h-full bg-black/90 relative overflow-hidden">
                                <div
                                    class="w-full h-full relative overflow-hidden group-hover:scale-110 duration-500 transition-all 
                                   flex items-center justify-center">

                                    <div class="absolute inset-0 bg-cover bg-center z-0"
                                        style="background-image: url('{{ asset('assets/images/background-patern.jpg') }}');">
                                    </div>
                                    <div class="absolute inset-0 bg-gray-800/10 z-10"></div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-b from-gray-800/40 via-gray-400/20 to-gray-800/40 z-20">
                                    </div>

                                    <img src="{{ asset('storage/' . $vehicle->images->first()->image_url) }}"
                                        alt="" class="relative z-30 w-full object-contain px-6 sm:px-0">
                                </div>

                                <div class="absolute inset-0 z-20 flex flex-col gap-4 justify-between">
                                    <div
                                        class="flex flex-col w-full gap-2 p-4 bg-gradient-to-b from-black/80 via-50% via-black/60 to-transparent">
                                        <h4 class="text-lime-500 text-base sm:text-lg line-clamp-1 font-bold uppercase">
                                            {{ $vehicle->vehicleModel->name }}
                                        </h4>
                                        <h6 class="uppercase text-[10px] text-white">
                                            {{ $vehicle->vehicleModel->brand->name }}
                                        </h6>
                                    </div>

                                    <div
                                        class="flex flex-col gap-2 w-full bg-gradient-to-t from-black/80 via-50% via-black/60 to-transparent">
                                        @php
                                            $hasDiscount = $vehicle->final_daily_price < $vehicle->daily_price;
                                        @endphp

                                        <div class="flex flex-col gap-1 px-4 pt-4">
                                            @if ($hasDiscount)
                                                <h6 class="text-lime-400 text-base sm:text-lg font-medium">
                                                    Rp {{ number_format($vehicle->final_daily_price, 0, ',', '.') }}
                                                    <span class="text-xs font-medium text-slate-300">/Hari</span>
                                                </h6>
                                                <h6 class="text-slate-300 text-xs sm:text-sm line-through">
                                                    Rp {{ number_format($vehicle->daily_price, 0, ',', '.') }}
                                                </h6>
                                            @else
                                                <h6 class="text-lime-400 text-base sm:text-lg font-medium">
                                                    Rp {{ number_format($vehicle->daily_price, 0, ',', '.') }}
                                                    <span class="text-xs font-medium text-slate-300">/Hari</span>
                                                </h6>
                                            @endif
                                        </div>


                                        <div class="flex flex-wrap gap-2 px-4 pb-4 pt-2">
                                            <div class="flex bg-gray-700 gap-1 px-3 py-[5px] rounded-full items-center">
                                                <span class="text-white text-[10px]">{{ $vehicle->seats }}</span>
                                            </div>
                                            <div class="flex bg-gray-700 gap-1 px-3 py-[5px] rounded-full items-center">
                                                <span class="text-white text-[10px]">
                                                    @if (!is_null($vehicle->fuel_tank_capacity))
                                                        {{ round($vehicle->fuel_tank_capacity) }} <span>L</span>
                                                    @else
                                                        {{ round($vehicle->battery_capacity_kwh) }} <span>kWh</span>
                                                    @endif
                                                </span>

                                            </div>
                                            <div class="flex bg-gray-700 gap-2 px-3 py-[5px] rounded-full items-center">
                                                <span class="text-white text-[10px] uppercase">
                                                    {{ $vehicle->transmission }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 pt-6 sm:pt-8">
        <div
            class="w-full bg-slate-900 
               h-[260px] sm:h-[360px] lg:h-[500px] 
               rounded-xl overflow-hidden">

            <swiper-container class="mySwiper h-full" pagination="true" pagination-clickable="true" loop="true"
                autoplay-delay="4000" autoplay-disable-on-interaction="false" slides-per-view="1">

                <!-- Slide 1 -->
                <swiper-slide class="relative">
                    <img src="{{ asset('assets/images/articles/fortuner.jpg') }}" alt="Banner 1"
                        class="w-full h-full object-cover">

                    <div
                        class="absolute inset-0 bg-slate-900/40
                           flex flex-col items-center justify-center
                           text-center text-white px-4 sm:px-8">

                        <h2 class="text-xl sm:text-3xl md:text-5xl font-bold mb-2 sm:mb-4">
                            Welcome to Morvix
                        </h2>
                        <p class="text-sm sm:text-lg md:text-xl max-w-xl">
                            We Build Modern Digital Experiences
                        </p>
                    </div>
                </swiper-slide>

                <!-- Slide 2 -->
                <swiper-slide class="relative">
                    <img src="{{ asset('assets/images/articles/sedan-inova.jpg') }}" alt="Banner 2"
                        class="w-full h-full object-cover">

                    <div
                        class="absolute inset-0 bg-slate-900/40
                           flex flex-col items-center justify-center
                           text-center text-white px-4 sm:px-8">

                        <h2 class="text-xl sm:text-3xl md:text-5xl font-bold mb-2 sm:mb-4">
                            Save 20% on Your First Rental
                        </h2>
                        <p class="text-sm sm:text-lg md:text-xl max-w-2xl">
                            Book now and enjoy a special discount on your first rental
                            with Morvix.
                        </p>
                    </div>
                </swiper-slide>

            </swiper-container>
        </div>
    </section>

    <section class="bg-white w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 sm:pt-14 pb-8">
        <div class="flex flex-col gap-4">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-medium text-center text-slate-900">
                Our <span class="font-bold text-lime-600">Achievment</span>
            </h1>

            <p class="text-center text-slate-700 text-sm sm:text-base max-w-xl mx-auto">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla,
                repellat!
            </p>

            <div class="mx-auto grid grid-cols-1 sm:grid-cols-3 justify-center mt-8 gap-8 sm:gap-16 lg:gap-20">

                <div class="flex flex-col gap-3 sm:gap-4 text-center">
                    <h3 class="text-4xl sm:text-6xl lg:text-7xl text-lime-600 font-semibold">
                        2000<span class="text-2xl sm:text-4xl lg:text-5xl">+</span>
                    </h3>
                    <h6 class="text-slate-500 text-xs sm:text-sm font-medium">
                        Active Member
                    </h6>
                </div>

                <div class="flex flex-col gap-3 sm:gap-4 text-center">
                    <h3 class="text-4xl sm:text-6xl lg:text-7xl text-lime-600 font-semibold">
                        50<span class="text-2xl sm:text-4xl lg:text-5xl">+</span>
                    </h3>
                    <h6 class="text-slate-500 text-xs sm:text-sm font-medium">
                        Car Model
                    </h6>
                </div>

                <div class="flex flex-col gap-3 sm:gap-4 text-center">
                    <h3 class="text-4xl sm:text-6xl lg:text-7xl text-lime-600 font-semibold">
                        100<span class="text-2xl sm:text-4xl lg:text-5xl">+</span>
                    </h3>
                    <h6 class="text-slate-500 text-xs sm:text-sm font-medium">
                        Positive Rating
                    </h6>
                </div>

            </div>
        </div>
    </section>

    <section class="w-full bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- CARD MOBIL -->
            <div
                class="w-full aspect-video bg-slate-900 rounded-3xl p-6 sm:p-8 relative overflow-hidden flex flex-col justify-center">
                <h4 class="text-xl sm:text-2xl text-white font-semibold max-w-xs">
                    The Premier Choice for Car Rent
                </h4>

                <p class="text-sm text-white max-w-sm mt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptatibus, architecto.
                </p>

                <button
                    class="w-fit px-4 py-2 font-medium mt-4 rounded-full text-sm bg-lime-500 hover:bg-lime-600 text-slate-950">
                    Order now
                </button>

                <img src="{{ asset('assets/images/product/car.png') }}" alt=""
                    class="absolute bottom-0 right-0 translate-x-1/3 sm:translate-x-1/4 w-60 sm:w-72 md:w-80 pointer-events-none">
            </div>

            <!-- CARD MOTOR -->
            <div
                class="w-full aspect-video bg-lime-500 rounded-3xl p-6 sm:p-8 relative overflow-hidden flex flex-col justify-center">
                <h4 class="text-xl sm:text-2xl text-slate-950 font-semibold max-w-xs">
                    The Premier Choice for Car Rent
                </h4>

                <p class="text-sm text-slate-800 max-w-sm mt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptatibus, architecto.
                </p>

                <button
                    class="w-fit px-4 py-2 font-medium mt-4 rounded-full text-sm bg-slate-800 hover:bg-slate-950 text-white">
                    Order now
                </button>

                <img src="{{ asset('assets/images/product/motorcycle.png') }}" alt=""
                    class="absolute bottom-0 right-0 translate-x-1/3 sm:translate-x-1/4 w-56 sm:w-64 md:w-72 pointer-events-none">
            </div>

        </div>
    </section>

    <section class="w-full bg-lime-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

            <!-- HEADER -->
            <h2 class="font-bold text-xl sm:text-2xl uppercase mb-4 max-w-sm text-slate-950">
                Find the Perfect Car for You
            </h2>

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
                <p class="text-sm max-w-2xl text-slate-900">
                    Temukan mobil dan motor pilihan terbaik kami — dipilih khusus
                    <span class="text-lime-600 font-bold">morvix</span>.
                </p>

                <a href="" class="text-sm font-bold text-slate-900 hover:text-slate-950 self-start sm:self-auto">
                    Lihat semua
                </a>
            </div>

            <!-- GRID CARD -->
            <div class="mt-8 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($cars as $car)
                    @if ($car)
                        <a href="{{ route('cars.show', $car->code) }}" class="block w-full">
                            <div class="w-full bg-lime-500 rounded-2xl aspect-[3/4] overflow-hidden relative group">

                                <div class="absolute inset-0 bg-slate-900 bg-cover bg-top bg-blend-multiply z-0"
                                    style="background-image: url('{{ asset('assets/images/background-patern.jpg') }}');">
                                </div>

                                <div class="w-full h-full relative overflow-hidden">
                                    <div
                                        class="w-full h-full flex items-center justify-center overflow-hidden group-hover:scale-110 duration-500 transition-all">
                                        <img src="{{ asset('storage/' . $car->images->first()->image_url) }}"
                                            alt="" class="w-full object-center">
                                    </div>

                                    <div class="absolute inset-0 z-20 flex flex-col gap-4 justify-between">

                                        <!-- TOP -->
                                        <div class="flex flex-col w-full gap-1 p-4">
                                            <h4 class="text-white text-base line-clamp-1 font-bold">
                                                {{ $car->vehicleModel->name }}
                                            </h4>
                                            <div class="flex gap-2">
                                                <h6 class="text-xs font-semibold text-slate-100">
                                                    Sport
                                                </h6>
                                            </div>
                                        </div>

                                        <!-- BOTTOM -->
                                        <div class="flex flex-col gap-2 w-full">
                                            <div class="flex flex-wrap gap-3 px-4 pb-2 pt-2 w-full justify-start">

                                                <div class="flex gap-2 items-center">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-3 h-3 text-slate-100" fill="currentColor"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M0 0 C0.93714844 0.4125 1.87429687 0.825 2.83984375 1.25 C17.48959337 8.48241496 28.18835912 21.15525968 33.5 36.5 C38.37518095 52.57004089 36.88903506 69.89076631 29.3125 84.875 C24.14321 93.55575215 16.08597359 103.62493761 6.43675232 107.39056396 C3.99183026 108.79875592 3.15375866 109.47899519 2.34575081 112.21689606 C2.09380439 115.19776794 2.06939727 118.11106953 2.11352539 121.10253906 C2.10276946 122.25283474 2.09201353 123.40313042 2.08093166 124.58828354 C2.05400955 128.31473592 2.07495177 132.03917867 2.09765625 135.765625 C2.08807486 138.06495672 2.07535973 140.36427759 2.05944824 142.66357422 C2.02245432 151.19230264 2.04617662 159.72120697 2.0625 168.25 C2.041875 187.3075 2.02125 206.365 2 226 C40.28 226 78.56 226 118 226 C118.66 224.35 119.32 222.7 120 221 C125.90265458 210.65664864 133.55515811 203.69876117 144 198 C144.66 198 145.32 198 146 198 C146.10103597 186.62961596 146.14824744 175.26039899 146.12697029 163.88954735 C146.11877635 158.6092578 146.12903816 153.33035463 146.18164062 148.05029297 C146.2317376 142.95330018 146.2331418 137.8583942 146.20095444 132.76128006 C146.19720658 130.81801483 146.21092999 128.87463399 146.24249649 126.93162155 C146.88230673 116.54308703 146.88230673 116.54308703 142.83660889 107.550354 C140.26056767 106.0006113 137.8202052 105.01418781 135 104 C122.50568575 95.37778833 116.11036166 81.92305303 112.390625 67.6640625 C109.87389841 50.49998717 112.91702374 33.54385899 123.20458984 19.33642578 C132.85005875 7.13655027 145.57072847 -1.25183437 161 -4 C173.03964508 -4.89507206 184.82892993 -4.9631913 196 0 C196.92554688 0.40089844 197.85109375 0.80179687 198.8046875 1.21484375 C214.54748095 8.90785188 224.0729239 21.93165581 230.0546875 38.0546875 C234.73311296 52.63126931 232.68639508 69.28075443 226.4375 83 C220.05081636 95.03219659 211.18584837 103.90707581 199 110 C198.67 139.04 198.34 168.08 198 198 C199.65 198.66 201.3 199.32 203 200 C212.80502503 205.22085748 221.28238094 213.9214502 226 224 C226 224.66 226 225.32 226 226 C237.17084443 225.93862637 248.34145837 225.86140361 259.51205254 225.76428509 C264.69975081 225.71967338 269.8873722 225.68039714 275.07519531 225.65356445 C280.08742194 225.62743952 285.09935129 225.58697261 290.11139297 225.53681374 C292.01777557 225.52020698 293.92420952 225.50865433 295.83065414 225.50238609 C309.21027882 225.4539681 321.42245799 225.3212056 332 216 C338.54843171 208.27914165 341.43324411 200.02366682 341.51513672 190.03295898 C341.53324402 189.17496704 341.55135132 188.3169751 341.57000732 187.4329834 C341.62362341 184.62065439 341.65410714 181.80881017 341.6796875 178.99609375 C341.69066593 178.03026934 341.70164436 177.06444492 341.71295547 176.0693531 C341.76944931 170.9649409 341.8073975 165.86077116 341.83056641 160.75610352 C341.85826282 155.4935819 341.95124068 150.23430562 342.05888176 144.97289944 C342.12984093 140.91413885 342.15175117 136.85615838 342.16046524 132.79683113 C342.17320993 130.85701662 342.20442833 128.91722962 342.25472641 126.97802544 C342.93026516 116.38136848 342.93026516 116.38136848 338.57603455 107.30143738 C335.77252911 105.50902138 333.08045678 104.23524099 330 103 C317.34256959 92.89728032 310.19698203 78.85546816 308 63 C306.53109382 46.18355684 310.55459175 31.24089375 320.75 17.75 C330.30816803 6.47857543 344.43954267 -2.89515645 359.47021484 -4.21728516 C378.70219342 -5.08449072 393.85490557 -2.25480736 409.01171875 10.54296875 C421.45474742 22.30697812 427.92175088 36.11826811 428.47045898 53.16918945 C428.56754547 62.67804853 427.91734436 71.1982169 424 80 C423.5875 80.93714844 423.175 81.87429687 422.75 82.83984375 C416.86153569 94.76732969 407.55886214 103.61702075 396 110 C395.34 110 394.68 110 394 110 C394.00888245 111.15463745 394.01776489 112.3092749 394.0269165 113.49890137 C394.10841638 124.44267341 394.16816268 135.38638294 394.20724869 146.33039093 C394.22801952 151.95525375 394.25614281 157.57986928 394.30175781 163.20458984 C394.34559323 168.64464203 394.36921584 174.08445812 394.37950897 179.52467346 C394.38683327 181.58805552 394.40113339 183.65142638 394.42292023 185.71470642 C394.59209938 202.41862117 392.94117376 216.96530586 385 232 C384.52046875 232.95132813 384.0409375 233.90265625 383.546875 234.8828125 C375.10565298 250.57692917 361.76416064 262.44987953 345.875 270.3125 C345.26180908 270.62614502 344.64861816 270.93979004 344.0168457 271.26293945 C329.09935383 278.20290488 313.00741646 278.56548485 296.8984375 278.390625 C294.83908647 278.38314195 292.7797282 278.37745882 290.72036743 278.37347412 C285.36429325 278.35838001 280.00867 278.319243 274.652771 278.2746582 C269.16180517 278.23335045 263.67076473 278.21538816 258.1796875 278.1953125 C247.45292954 278.15272902 236.72650262 278.08468064 226 278 C225.70351563 278.76828125 225.40703125 279.5365625 225.1015625 280.328125 C220.78103532 290.80770157 211.69901985 299.45770294 202 305 C200.6736554 305.3601373 199.34080581 305.69812473 198 306 C197.89896403 317.37038404 197.85175256 328.73960101 197.87302971 340.11045265 C197.88122365 345.3907422 197.87096184 350.66964537 197.81835938 355.94970703 C197.7682624 361.04669982 197.7668582 366.1416058 197.79904556 371.23871994 C197.80279342 373.18198517 197.78907001 375.12536601 197.75750351 377.06837845 C197.11769327 387.45691297 197.11769327 387.45691297 201.16339111 396.449646 C203.73943233 397.9993887 206.1797948 398.98581219 209 400 C221.4780573 408.6109929 227.92767333 422.08730111 231.60546875 436.34765625 C234.04651154 452.75823102 231.54252287 469.18115983 222 483 C212.0843518 495.57671673 199.12164105 505.20839326 183 508 C170.96035492 508.89507206 159.17107007 508.9631913 148 504 C147.07445312 503.59910156 146.14890625 503.19820313 145.1953125 502.78515625 C129.45251905 495.09214812 119.9270761 482.06834419 113.9453125 465.9453125 C109.25775932 451.34029143 111.30809024 434.65923175 117.625 420.9375 C124.00430118 408.94692162 132.83388241 400.08305879 145 394 C145.495 350.44 145.495 350.44 146 306 C144.35 305.34 142.7 304.68 141 304 C131.09649481 298.24214815 123.25870841 290.18657092 118 280 C118 279.34 118 278.68 118 278 C79.72 278 41.44 278 2 278 C1.938125 296.995625 1.87625 315.99125 1.8125 335.5625 C1.76456299 341.5547876 1.71662598 347.5470752 1.66723633 353.72094727 C1.67705199 359.10433002 1.67705199 359.10433002 1.70146179 364.48765564 C1.70532083 366.88073387 1.68753027 369.27390768 1.6525116 371.66673279 C1.60359702 375.29885009 1.62394994 378.9247403 1.65942383 382.55688477 C1.629213 383.61842805 1.59900217 384.67997133 1.56787586 385.77368259 C1.64220343 388.87834022 1.8215953 391.12090288 3 394 C6.35968114 397.00643212 10.01007944 398.95057403 14 401 C26.65743041 411.10271968 33.80301797 425.14453184 36 441 C37.46550922 457.77755388 33.4629388 472.70904848 23.3125 486.1875 C13.47645336 497.79328988 0.00033664 506.85339913 -15.48852539 508.21948242 C-26.92653526 508.72247225 -37.36435132 508.58197704 -48 504 C-48.85207031 503.67257812 -49.70414063 503.34515625 -50.58203125 503.0078125 C-65.71135712 496.47956795 -75.76063757 482.38585279 -81.9765625 467.69140625 C-86.54969817 454.33528571 -85.69296115 436.79137209 -80 424 C-79.5875 423.06285156 -79.175 422.12570312 -78.75 421.16015625 C-72.86153569 409.23267031 -63.55886214 400.38297925 -52 394 C-51.34 394 -50.68 394 -50 394 C-50 300.28 -50 206.56 -50 110 C-51.65 109.34 -53.3 108.68 -55 108 C-68.95212395 99.30338462 -78.69007606 87.07032673 -83.203125 71.16796875 C-86.9659458 54.50317826 -84.19320327 36.36265299 -75.16796875 21.94921875 C-65.77355975 9.16943714 -53.07660966 -0.72706809 -37.16552734 -3.70263672 C-24.68702844 -5.41614423 -11.614668 -5.16925418 0 0 Z "
                                                            transform="translate(84,4)" />
                                                    </svg>
                                                    <span class="text-slate-100 text-xs font-semibold uppercase">
                                                        {{ $car->transmission }}
                                                    </span>
                                                </div>

                                                <div class="flex gap-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="40 50 100 100"
                                                        fill="currentColor" class="w-3 h-3 text-slate-100">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M101.25 133.22C101.25 129.5 101.18 117.57 101.18 114.06C101.18 109.73 100.89 107.59 95.18 107.06C95.09 119.49 95 132.17 95 139H99.15L98.97 147.5L43 147.3L42.65 139H47.32C47.15 124.16 46.62 77.82 46.47 73C46.29 67.25 49.16 63.84 55.99 63.66C62.82 63.48 80.76 63.12 86.68 63.3C92.6 63.48 95.33 65.94 95.33 73.84C95.33 76.93 95.27 88.32 95.2 101.06C105.03 101.98 107.2 106.95 107.2 114.06C107.2 117.55 107.27 130.43 107.27 133.22C107.27 137.01 113.88 137.35 113.88 133.08C113.88 129.98 113.88 102.08 113.88 102.08L105.98 94.71L107.1 83.9L99.2 75.75L103 71.31L119.81 88.06C119.81 88.06 119.95 121.43 119.95 133.06C119.95 144.69 101.25 144.33 101.25 133.22ZM53 73.41C53 73.41 53.31 80.74 53.31 90.23C53.31 104.9 88.77 104.16 88.77 90.08C88.77 82.17 88.93 73.08 88.93 73.08L53 73.41Z" />
                                                    </svg>
                                                    <span class="text-slate-100 text-xs font-semibold">
                                                        @if (!is_null($car->fuel_tank_capacity))
                                                            {{ round($car->fuel_tank_capacity) }} <span>L</span>
                                                        @else
                                                            {{ round($car->battery_capacity_kwh) }} <span>kWh</span>
                                                        @endif
                                                    </span>
                                                </div>

                                            </div>

                                            <div class="flex w-full justify-between gap-2 px-4 pb-4 items-end">
                                                @php
                                                    $hasDiscount = $car->final_daily_price < $car->daily_price;
                                                @endphp

                                                <div class="flex flex-col gap-1">
                                                    @if ($hasDiscount)
                                                        <h6 class="font-medium text-white">
                                                            Rp {{ number_format($car->final_daily_price, 0, ',', '.') }}
                                                            <span class="text-xs text-slate-100">/Hari</span>
                                                        </h6>

                                                        <h6 class="font-medium line-through text-xs text-slate-100">
                                                            Rp {{ number_format($car->daily_price, 0, ',', '.') }}
                                                        </h6>
                                                    @else
                                                        <h6 class="font-medium text-white">
                                                            Rp {{ number_format($car->daily_price, 0, ',', '.') }}
                                                            <span class="text-xs text-slate-100">/Hari</span>
                                                        </h6>
                                                    @endif
                                                </div>


                                                <button
                                                    class="py-1 px-4 rounded-full h-fit bg-lime-600 hover:bg-lime-700 cursor-pointer text-sm text-white z-10">
                                                    Rent Now
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="w-full bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

            <!-- HEADER -->
            <h2 class="font-bold text-xl sm:text-2xl uppercase mb-4 max-w-sm text-white">
                Find the Perfect Motorcycle for Your Trip
            </h2>

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
                <p class="text-sm max-w-2xl text-slate-200">
                    Choose from a wide range of motorcycles — from
                    compact city rides to premium comfort. Book easily and start your
                    journey with
                    <span class="text-lime-600 font-bold">morvix</span>.
                </p>

                <a href="" class="text-sm font-bold text-lime-500 hover:text-lime-600 self-start sm:self-auto">
                    Lihat semua
                </a>
            </div>

            <!-- GRID CARD -->
            <div class="mt-8 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($motorcycles as $motorcycle)
                    <a href="{{ route('motorcycles.show', $motorcycle->code) }}" class="block w-full">
                        <div class="w-full bg-lime-500 rounded-2xl aspect-[3/4] overflow-hidden relative group">

                            <div class="absolute inset-0 bg-lime-500 bg-cover bg-center bg-blend-multiply z-0"
                                style="background-image: url('{{ asset('assets/images/background-patern.jpg') }}');">
                            </div>

                            <div class="w-full h-full relative overflow-hidden">
                                <div
                                    class="w-full h-full flex items-center justify-center overflow-hidden group-hover:scale-110 duration-500 transition-all">
                                    <img src="{{ asset('storage/' . $motorcycle->images->first()->image_url) }}"
                                        alt="" class="w-full object-center">
                                </div>

                                <div class="absolute inset-0 z-20 flex flex-col gap-4 justify-between">

                                    <!-- TOP -->
                                    <div class="flex flex-col w-full gap-1 p-4">
                                        <h4 class="text-slate-950 text-base line-clamp-1 font-bold">
                                            {{ $motorcycle->vehicleModel->name }}
                                        </h4>
                                        <div class="flex gap-2">
                                            <h6 class="text-xs font-semibold text-slate-900">
                                                Sport
                                            </h6>
                                        </div>
                                    </div>

                                    <!-- BOTTOM -->
                                    <div class="flex flex-col gap-2 w-full">
                                        <div class="flex flex-wrap gap-3 px-4 pb-2 pt-2 w-full justify-start">

                                            <div class="flex gap-2 items-center">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 text-slate-700" fill="currentColor"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M0 0 C0.93714844 0.4125 1.87429687 0.825 2.83984375 1.25 C17.48959337 8.48241496 28.18835912 21.15525968 33.5 36.5 C38.37518095 52.57004089 36.88903506 69.89076631 29.3125 84.875 C24.14321 93.55575215 16.08597359 103.62493761 6.43675232 107.39056396 C3.99183026 108.79875592 3.15375866 109.47899519 2.34575081 112.21689606 C2.09380439 115.19776794 2.06939727 118.11106953 2.11352539 121.10253906 C2.10276946 122.25283474 2.09201353 123.40313042 2.08093166 124.58828354 C2.05400955 128.31473592 2.07495177 132.03917867 2.09765625 135.765625 C2.08807486 138.06495672 2.07535973 140.36427759 2.05944824 142.66357422 C2.02245432 151.19230264 2.04617662 159.72120697 2.0625 168.25 C2.041875 187.3075 2.02125 206.365 2 226 C40.28 226 78.56 226 118 226 C118.66 224.35 119.32 222.7 120 221 C125.90265458 210.65664864 133.55515811 203.69876117 144 198 C144.66 198 145.32 198 146 198 C146.10103597 186.62961596 146.14824744 175.26039899 146.12697029 163.88954735 C146.11877635 158.6092578 146.12903816 153.33035463 146.18164062 148.05029297 C146.2317376 142.95330018 146.2331418 137.8583942 146.20095444 132.76128006 C146.19720658 130.81801483 146.21092999 128.87463399 146.24249649 126.93162155 C146.88230673 116.54308703 146.88230673 116.54308703 142.83660889 107.550354 C140.26056767 106.0006113 137.8202052 105.01418781 135 104 C122.50568575 95.37778833 116.11036166 81.92305303 112.390625 67.6640625 C109.87389841 50.49998717 112.91702374 33.54385899 123.20458984 19.33642578 C132.85005875 7.13655027 145.57072847 -1.25183437 161 -4 C173.03964508 -4.89507206 184.82892993 -4.9631913 196 0 C196.92554688 0.40089844 197.85109375 0.80179687 198.8046875 1.21484375 C214.54748095 8.90785188 224.0729239 21.93165581 230.0546875 38.0546875 C234.73311296 52.63126931 232.68639508 69.28075443 226.4375 83 C220.05081636 95.03219659 211.18584837 103.90707581 199 110 C198.67 139.04 198.34 168.08 198 198 C199.65 198.66 201.3 199.32 203 200 C212.80502503 205.22085748 221.28238094 213.9214502 226 224 C226 224.66 226 225.32 226 226 C237.17084443 225.93862637 248.34145837 225.86140361 259.51205254 225.76428509 C264.69975081 225.71967338 269.8873722 225.68039714 275.07519531 225.65356445 C280.08742194 225.62743952 285.09935129 225.58697261 290.11139297 225.53681374 C292.01777557 225.52020698 293.92420952 225.50865433 295.83065414 225.50238609 C309.21027882 225.4539681 321.42245799 225.3212056 332 216 C338.54843171 208.27914165 341.43324411 200.02366682 341.51513672 190.03295898 C341.53324402 189.17496704 341.55135132 188.3169751 341.57000732 187.4329834 C341.62362341 184.62065439 341.65410714 181.80881017 341.6796875 178.99609375 C341.69066593 178.03026934 341.70164436 177.06444492 341.71295547 176.0693531 C341.76944931 170.9649409 341.8073975 165.86077116 341.83056641 160.75610352 C341.85826282 155.4935819 341.95124068 150.23430562 342.05888176 144.97289944 C342.12984093 140.91413885 342.15175117 136.85615838 342.16046524 132.79683113 C342.17320993 130.85701662 342.20442833 128.91722962 342.25472641 126.97802544 C342.93026516 116.38136848 342.93026516 116.38136848 338.57603455 107.30143738 C335.77252911 105.50902138 333.08045678 104.23524099 330 103 C317.34256959 92.89728032 310.19698203 78.85546816 308 63 C306.53109382 46.18355684 310.55459175 31.24089375 320.75 17.75 C330.30816803 6.47857543 344.43954267 -2.89515645 359.47021484 -4.21728516 C378.70219342 -5.08449072 393.85490557 -2.25480736 409.01171875 10.54296875 C421.45474742 22.30697812 427.92175088 36.11826811 428.47045898 53.16918945 C428.56754547 62.67804853 427.91734436 71.1982169 424 80 C423.5875 80.93714844 423.175 81.87429687 422.75 82.83984375 C416.86153569 94.76732969 407.55886214 103.61702075 396 110 C395.34 110 394.68 110 394 110 C394.00888245 111.15463745 394.01776489 112.3092749 394.0269165 113.49890137 C394.10841638 124.44267341 394.16816268 135.38638294 394.20724869 146.33039093 C394.22801952 151.95525375 394.25614281 157.57986928 394.30175781 163.20458984 C394.34559323 168.64464203 394.36921584 174.08445812 394.37950897 179.52467346 C394.38683327 181.58805552 394.40113339 183.65142638 394.42292023 185.71470642 C394.59209938 202.41862117 392.94117376 216.96530586 385 232 C384.52046875 232.95132813 384.0409375 233.90265625 383.546875 234.8828125 C375.10565298 250.57692917 361.76416064 262.44987953 345.875 270.3125 C345.26180908 270.62614502 344.64861816 270.93979004 344.0168457 271.26293945 C329.09935383 278.20290488 313.00741646 278.56548485 296.8984375 278.390625 C294.83908647 278.38314195 292.7797282 278.37745882 290.72036743 278.37347412 C285.36429325 278.35838001 280.00867 278.319243 274.652771 278.2746582 C269.16180517 278.23335045 263.67076473 278.21538816 258.1796875 278.1953125 C247.45292954 278.15272902 236.72650262 278.08468064 226 278 C225.70351563 278.76828125 225.40703125 279.5365625 225.1015625 280.328125 C220.78103532 290.80770157 211.69901985 299.45770294 202 305 C200.6736554 305.3601373 199.34080581 305.69812473 198 306 C197.89896403 317.37038404 197.85175256 328.73960101 197.87302971 340.11045265 C197.88122365 345.3907422 197.87096184 350.66964537 197.81835938 355.94970703 C197.7682624 361.04669982 197.7668582 366.1416058 197.79904556 371.23871994 C197.80279342 373.18198517 197.78907001 375.12536601 197.75750351 377.06837845 C197.11769327 387.45691297 197.11769327 387.45691297 201.16339111 396.449646 C203.73943233 397.9993887 206.1797948 398.98581219 209 400 C221.4780573 408.6109929 227.92767333 422.08730111 231.60546875 436.34765625 C234.04651154 452.75823102 231.54252287 469.18115983 222 483 C212.0843518 495.57671673 199.12164105 505.20839326 183 508 C170.96035492 508.89507206 159.17107007 508.9631913 148 504 C147.07445312 503.59910156 146.14890625 503.19820313 145.1953125 502.78515625 C129.45251905 495.09214812 119.9270761 482.06834419 113.9453125 465.9453125 C109.25775932 451.34029143 111.30809024 434.65923175 117.625 420.9375 C124.00430118 408.94692162 132.83388241 400.08305879 145 394 C145.495 350.44 145.495 350.44 146 306 C144.35 305.34 142.7 304.68 141 304 C131.09649481 298.24214815 123.25870841 290.18657092 118 280 C118 279.34 118 278.68 118 278 C79.72 278 41.44 278 2 278 C1.938125 296.995625 1.87625 315.99125 1.8125 335.5625 C1.76456299 341.5547876 1.71662598 347.5470752 1.66723633 353.72094727 C1.67705199 359.10433002 1.67705199 359.10433002 1.70146179 364.48765564 C1.70532083 366.88073387 1.68753027 369.27390768 1.6525116 371.66673279 C1.60359702 375.29885009 1.62394994 378.9247403 1.65942383 382.55688477 C1.629213 383.61842805 1.59900217 384.67997133 1.56787586 385.77368259 C1.64220343 388.87834022 1.8215953 391.12090288 3 394 C6.35968114 397.00643212 10.01007944 398.95057403 14 401 C26.65743041 411.10271968 33.80301797 425.14453184 36 441 C37.46550922 457.77755388 33.4629388 472.70904848 23.3125 486.1875 C13.47645336 497.79328988 0.00033664 506.85339913 -15.48852539 508.21948242 C-26.92653526 508.72247225 -37.36435132 508.58197704 -48 504 C-48.85207031 503.67257812 -49.70414063 503.34515625 -50.58203125 503.0078125 C-65.71135712 496.47956795 -75.76063757 482.38585279 -81.9765625 467.69140625 C-86.54969817 454.33528571 -85.69296115 436.79137209 -80 424 C-79.5875 423.06285156 -79.175 422.12570312 -78.75 421.16015625 C-72.86153569 409.23267031 -63.55886214 400.38297925 -52 394 C-51.34 394 -50.68 394 -50 394 C-50 300.28 -50 206.56 -50 110 C-51.65 109.34 -53.3 108.68 -55 108 C-68.95212395 99.30338462 -78.69007606 87.07032673 -83.203125 71.16796875 C-86.9659458 54.50317826 -84.19320327 36.36265299 -75.16796875 21.94921875 C-65.77355975 9.16943714 -53.07660966 -0.72706809 -37.16552734 -3.70263672 C-24.68702844 -5.41614423 -11.614668 -5.16925418 0 0 Z "
                                                        transform="translate(84,4)" />
                                                </svg>
                                                <span class="text-slate-700 text-xs font-semibold uppercase">
                                                    {{ $motorcycle->transmission }}
                                                </span>
                                            </div>

                                            <div class="flex gap-1 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="40 50 100 100"
                                                    fill="currentColor" class="w-3 h-3 text-slate-700">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M101.25 133.22C101.25 129.5 101.18 117.57 101.18 114.06C101.18 109.73 100.89 107.59 95.18 107.06C95.09 119.49 95 132.17 95 139H99.15L98.97 147.5L43 147.3L42.65 139H47.32C47.15 124.16 46.62 77.82 46.47 73C46.29 67.25 49.16 63.84 55.99 63.66C62.82 63.48 80.76 63.12 86.68 63.3C92.6 63.48 95.33 65.94 95.33 73.84C95.33 76.93 95.27 88.32 95.2 101.06C105.03 101.98 107.2 106.95 107.2 114.06C107.2 117.55 107.27 130.43 107.27 133.22C107.27 137.01 113.88 137.35 113.88 133.08C113.88 129.98 113.88 102.08 113.88 102.08L105.98 94.71L107.1 83.9L99.2 75.75L103 71.31L119.81 88.06C119.81 88.06 119.95 121.43 119.95 133.06C119.95 144.69 101.25 144.33 101.25 133.22ZM53 73.41C53 73.41 53.31 80.74 53.31 90.23C53.31 104.9 88.77 104.16 88.77 90.08C88.77 82.17 88.93 73.08 88.93 73.08L53 73.41Z" />
                                                </svg>
                                                <span class="text-slate-700 text-xs font-semibold">
                                                    @if (!is_null($motorcycle->fuel_tank_capacity))
                                                        {{ round($motorcycle->fuel_tank_capacity) }} <span>L</span>
                                                    @else
                                                        {{ round($motorcycle->battery_capacity_kwh) }} <span>kWh</span>
                                                    @endif
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex w-full justify-between gap-2 px-4 pb-4 items-end">
                                            @php
                                                $hasDiscount =
                                                    $motorcycle->final_daily_price < $motorcycle->daily_price;
                                            @endphp

                                            <div class="flex flex-col gap-1">
                                                @if ($hasDiscount)
                                                    <h6 class="font-medium text-slate-800">
                                                        Rp {{ number_format($motorcycle->final_daily_price, 0, ',', '.') }}
                                                        <span class="text-xs text-slate-700">/Hari</span>
                                                    </h6>

                                                    <h6 class="font-medium line-through text-xs text-slate-700">
                                                        Rp {{ number_format($motorcycle->daily_price, 0, ',', '.') }}
                                                    </h6>
                                                @else
                                                    <h6 class="font-medium text-slate-800">
                                                        Rp {{ number_format($motorcycle->daily_price, 0, ',', '.') }}
                                                        <span class="text-xs text-slate-700">/Hari</span>
                                                    </h6>
                                                @endif
                                            </div>
                                            <button
                                                class="py-1 px-4 rounded-full h-fit bg-slate-800 hover:bg-slate-900 cursor-pointer text-sm text-white z-10">
                                                Rent Now
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-white w-full">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-12 sm:pt-16 pb-8">
            <h2 class="font-bold text-xl sm:text-2xl uppercase mb-4 max-w-xs text-slate-900">
                What Our Customers Say
            </h2>

            <div class="flex flex-col gap-2">
                <p class="text-sm text-slate-700 max-w-2xl">
                    Real stories from customers who have enjoyed our car and
                    motorcycle rental services.
                </p>
            </div>

            <swiper-container class="mySwiper mt-8" slides-per-view="1" space-between="16" pagination="true"
                pagination-clickable="true"
                breakpoints='{
                "640": { "slidesPerView": 1.2, "spaceBetween": 20 },
                "768": { "slidesPerView": 2, "spaceBetween": 24 },
                "1024": { "slidesPerView": 3, "spaceBetween": 30 }
            }'>

                @php
                    $testimonials = [
                        [
                            'avatar' => 'https://i.pravatar.cc/150?img=11',
                            'text' =>
                                'Excellent service! The vehicle was very clean, comfortable, and ready right on time. The rental process was quick and hassle-free, making my trip much more enjoyable.',
                            'name' => 'Salim Sulaiman',
                            'job' => 'Businessman',
                        ],
                        [
                            'avatar' => 'https://i.pravatar.cc/150?img=22',
                            'text' =>
                                'The staff were incredibly friendly and helpful. They explained everything clearly and made sure I got the best car for my needs.',
                            'name' => 'Rina Kartika',
                            'job' => 'Entrepreneur',
                        ],
                        [
                            'avatar' => 'https://i.pravatar.cc/150?img=33',
                            'text' =>
                                'This is definitely the best rental service I’ve ever used. The booking was fast, the team was responsive, and the car was in perfect condition.',
                            'name' => 'Dedi Pratama',
                            'job' => 'Marketing Manager',
                        ],
                        [
                            'avatar' => 'https://i.pravatar.cc/150?img=44',
                            'text' =>
                                'Amazing service! The car quality was excellent and the interior smelled fresh. I appreciate how flexible the team was with my pick-up schedule.',
                            'name' => 'Maya Sulistyo',
                            'job' => 'Project Lead',
                        ],
                        [
                            'avatar' => 'https://i.pravatar.cc/150?img=55',
                            'text' => 'From booking to returning the car, everything went smoothly.',
                            'name' => 'Hendra Wijaya',
                            'job' => 'Software Engineer',
                        ],
                    ];
                @endphp

                @foreach ($testimonials as $item)
                    <swiper-slide>
                        <div class="w-full aspect-[5/6] bg-slate-800 rounded-3xl relative overflow-hidden flex items-end">
                            <img src="{{ asset('assets/icons/quotation.png') }}" alt=""
                                class="absolute z-0 top-6 sm:top-8 left-6 sm:left-10 w-20 sm:w-24">

                            <div class="w-full p-6 sm:p-8 relative z-10 flex flex-col gap-6">
                                <p class="text-white text-lg sm:text-base">
                                    {{ $item['text'] }}
                                </p>

                                <div class="w-full flex flex-row gap-4 items-center">
                                    <div
                                        class="h-12 w-12 sm:h-14 sm:w-14 rounded-full bg-white shrink-0 overflow-hidden relative">
                                        <img src="{{ asset($item['avatar']) }}" alt=""
                                            class="w-full h-full object-center object-cover">
                                    </div>

                                    <div class="flex flex-col gap-[2px]">
                                        <h4 class="text-white text-base sm:text-lg font-semibold">
                                            {{ $item['name'] }}
                                        </h4>
                                        <h6 class="text-slate-300 text-xs">
                                            {{ $item['job'] }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach

            </swiper-container>
        </div>
    </section>

    <section class="bg-white w-full">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-8 pb-16">
            <h2 class="font-bold text-xl sm:text-2xl uppercase mb-4 max-w-xs text-slate-900">
                Latest Tips & Travel Insights
            </h2>

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <p class="text-sm text-slate-700 max-w-2xl">
                    Stay updated with our best car and motorcycle rental guides,
                    travel advice, and maintenance tips.
                </p>
                <a href="" class="text-sm font-bold text-lime-500 hover:text-lime-600 self-start sm:self-auto">
                    Lihat semua
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @for ($i = 0; $i < 3; $i++)
                    <article class="bg-white rounded-2xl overflow-hidden border border-gray-200 flex flex-col">
                        <div class="h-48 sm:h-56 lg:h-64 bg-slate-300 relative overflow-hidden">
                            <img src="{{ asset('assets/images/articles/fortuner.jpg') }}" alt="Blog Image"
                                class="w-full h-full object-cover object-center hover:scale-110 transition-transform duration-500" />
                        </div>

                        <div class="p-5 sm:p-6 flex flex-col flex-1">
                            <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                                <span>Tech</span>
                                <span>•</span>
                                <span>5 min read</span>
                            </div>

                            <h2 class="text-base sm:text-lg font-semibold text-gray-900 mb-3">
                                The Future of Web Development
                            </h2>

                            <p class="text-gray-600 mb-4 line-clamp-3 text-sm flex-1">
                                Explore the latest trends and technologies shaping the future of web development in 2025.
                            </p>

                            <div class="flex items-center justify-between">
                                <span class="text-xs sm:text-sm text-gray-500">Oct 19, 2025</span>
                                <a href="#" class="text-lime-600 font-medium hover:text-lime-700 text-sm">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </article>
                @endfor
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto mb-16 mt-4 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 bg-gray-900 rounded-2xl overflow-hidden shadow-xl">
            <div class="p-6 sm:p-8 md:p-12 flex flex-col justify-center">
                <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                    Drive Your Dream Car Today
                </h3>
                <p class="text-sm sm:text-base text-gray-300 mb-6">
                    From economy to luxury, we have the perfect vehicle for every journey. Instant booking with
                    transparent pricing.
                </p>

                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-white text-sm sm:text-base">
                        <svg class="w-5 h-5 text-lime-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>24/7 Roadside Assistance</span>
                    </li>

                    <li class="flex items-center gap-3 text-white text-sm sm:text-base">
                        <svg class="w-5 h-5 text-lime-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Flexible Pickup & Drop-off</span>
                    </li>

                    <li class="flex items-center gap-3 text-white text-sm sm:text-base">
                        <svg class="w-5 h-5 text-lime-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Comprehensive Insurance Included</span>
                    </li>
                </ul>

                <button
                    class="bg-lime-600 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-semibold hover:bg-lime-700 transition-colors shadow-lg w-full sm:w-fit cursor-pointer">
                    Start Your Journey →
                </button>
            </div>

            <div class="h-56 sm:h-72 md:h-auto bg-slate-500 relative overflow-hidden">
                <img src="{{ asset('assets/images/articles/fortuner.jpg') }}" alt="CTA Image"
                    class="w-full h-full object-cover object-center" />
            </div>
        </div>
    </section>
@endsection
