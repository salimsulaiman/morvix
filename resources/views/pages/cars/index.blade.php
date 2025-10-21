@extends('components.layouts.app')

@section('content')
    <section class="w-full h-auto bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('assets/images/articles/sedan-inova.jpg') }}');">
        <div class="inset-0 absolute bg-black/50"></div>
        <div class="max-w-7xl mx-auto px-8 pt-40 pb-24 flex flex-col items-center justify-center h-full z-10 relative gap-4">
            <h1 class="text-5xl font-medium text-white max-w-2xl leading-relaxed text-center">Perjalanan <span
                    class="text-lime-500 font-bold">Nyaman</span>, Pengalaman Tak Terlupakan
            </h1>
            <p class="text-base text-gray-200 max-w-md text-center">Temukan layanan rental mobil dan motor terbaik dengan
                pelayanan
                unggulan dan harga ramah kantong.</p>
            <div class="w-full mt-24">
                <div class="max-w-7xl mx-auto flex flex-col gap-4">
                    <div class="bg-white h-40 rounded-4xl flex flex-col gap-4 p-8 justify-center">
                        <h6 class="text-xs">Cari kendaraan</h6>
                        <div class="flex gap-4 justify-between">
                            <div class="flex flex-col gap-4">
                                <h6 class="font-bold text-sm">Lokasi Penyewaan</h6>
                                <div x-data="{ open: false, selected: 'Choose Location', options: ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Bali'] }" class="relative">
                                    <button type="button" @click.stop="open = !open"
                                        class="bg-gray-50 text-gray-500 text-sm rounded-full w-48 p-2.5 outline-none border-0 focus:ring-0 flex items-center gap-1 select-none">
                                        <svg class="w-5 h-5 text-gray-500 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.37892 10.2236L8 16L12.6211 10.2236C13.5137 9.10788 14 7.72154 14 6.29266V6C14 2.68629 11.3137 0 8 0C4.68629 0 2 2.68629 2 6V6.29266C2 7.72154 2.4863 9.10788 3.37892 10.2236ZM8 8C9.10457 8 10 7.10457 10 6C10 4.89543 9.10457 4 8 4C6.89543 4 6 4.89543 6 6C6 7.10457 6.89543 8 8 8Z" />
                                        </svg>
                                        <span x-text="selected" class="truncate"></span>
                                    </button>
                                    <ul x-show="open" @click.outside="open = false"
                                        class="absolute left-0 mt-2 w-48 bg-white rounded-2xl shadow-md z-50 overflow-hidden py-2"
                                        x-cloak>
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
                            <div class="w-[3px] h-full rounded-full bg-concrete-100"></div>
                            <div class="flex flex-col gap-4">
                                <h6 class="font-bold text-sm">Tanggal Penyewaan</h6>

                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker id="datepicker-range-start" name="date-start" type="text"
                                        class="bg-gray-50 text-gray-900 text-sm rounded-full block w-full ps-10 p-2.5 outline-none border-0 focus:ring-0 placeholder-gray-500"
                                        placeholder="Select date start">
                                </div>

                            </div>
                            <div class="w-[3px] h-full rounded-full bg-concrete-100"></div>
                            <div class="flex flex-col gap-4">
                                <h6 class="font-bold text-sm">Tanggal Pengembalian</h6>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker id="datepicker-range-end" name="date-end" type="text"
                                        class="bg-gray-50 text-gray-900 text-sm rounded-full block w-full ps-10 p-2.5 outline-none border-0 focus:ring-0 placeholder-gray-500"
                                        placeholder="Select date end">
                                </div>
                            </div>
                            <button
                                class="rounded-full bg-lime-500 p-2 h-fit cursor-pointer hover:bg-lime-600 flex items-center justify-center">
                                <i data-feather="search" class="w-5 h-5 text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto mb-16 mt-8 px-8">
        <div class="grid md:grid-cols-2 gap-0 bg-gray-900 rounded-2xl overflow-hidden shadow-xl">
            <div class="p-8 md:p-12 flex flex-col justify-center">
                <h3 class="text-3xl font-bold text-white mb-4">
                    Drive Your Dream Car Today
                </h3>
                <p class="text-gray-300 mb-6">
                    From economy to luxury, we have the perfect vehicle for every journey. Instant booking with
                    transparent pricing.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-white">
                        <svg class="w-5 h-5 text-lime-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>24/7 Roadside Assistance</span>
                    </li>
                    <li class="flex items-center gap-3 text-white">
                        <svg class="w-5 h-5 text-lime-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Flexible Pickup & Drop-off</span>
                    </li>
                    <li class="flex items-center gap-3 text-white">
                        <svg class="w-5 h-5 text-lime-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Comprehensive Insurance Included</span>
                    </li>
                </ul>
                <button
                    class="bg-lime-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-lime-700 transition-colors shadow-lg w-full md:w-auto cursor-pointer">
                    Start Your Journey →
                </button>
            </div>
            <div class="h-64 md:h-auto bg-slate-500 relative overflow-hidden">
                <img src="{{ asset('assets/images/articles/fortuner.jpg') }}" alt="CTA Image"
                    class="w-full h-full object-cover object-center" />
            </div>
        </div>
    </section>
@endsection
