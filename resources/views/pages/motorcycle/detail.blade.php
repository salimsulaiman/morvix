@extends('components.layouts.app')

@section('content')
    <section class="w-full bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('assets/images/background-motorcycle.jpg') }}');">
        <div class="inset-0 absolute bg-black/50"></div>
        <div
            class="relative z-10 mx-auto flex min-h-[500px] max-w-7xl flex-col items-center justify-center gap-5 px-8 pt-20 text-center">
            <h5 class="uppercase text-xs px-4 py-1 bg-lime-600 text-white rounded-full">Motor</h5>
            <h1 class="max-w-3xl text-3xl font-semibold leading-tight text-white uppercase">
                Rental Motor <span class="font-bold text-lime-500">Nyaman & Praktis</span> untuk
                Perjalanan Anda
            </h1>

            <p class="max-w-xl text-base text-gray-200">
                Pilihan motor terbaik dengan kondisi prima, proses mudah,
                dan harga yang bersahabat untuk kebutuhan perjalanan Anda.
            </p>
        </div>
    </section>
    <div class="max-w-7xl mx-auto px-8 py-16" x-data="{
        mainPhoto: '{{ asset('storage/' . ($motorcycle->images->first()->image_url ?? '')) }}',
        photos: [
            @foreach ($motorcycle->images as $img)
            '{{ asset('storage/' . $img->image_url) }}', @endforeach
        ],
        adultCount: 1,
        childCount: 0,
        maxSeats: {{ $motorcycle->seats ?? 6 }},
        days: 1,
        pricePerDay: {{ $motorcycle->final_daily_price ?? ($motorcycle->daily_price ?? 350000) }},
        startDatePicker: null,
        endDatePicker: null,
    
        init() {
            this.$nextTick(() => {
                this.initializeDatePickers();
            });
        },
    
        initializeDatePickers() {
            const startEl = this.$refs.startDate;
            const endEl = this.$refs.endDate;
    
            if (startEl && endEl) {
                this.startDatePicker = new Datepicker(startEl, {
                    autohide: true,
                    format: 'mm/dd/yyyy',
                    minDate: new Date(),
                });
                this.endDatePicker = new Datepicker(endEl, {
                    autohide: true,
                    format: 'mm/dd/yyyy',
                    minDate: new Date(),
                });
    
                startEl.addEventListener('changeDate', (e) => {
                    this.calculateDays();
                });
    
                endEl.addEventListener('changeDate', (e) => {
                    this.calculateDays();
                });
            }
        },
        changePhoto(photo) {
            this.mainPhoto = photo;
        },
        incrementAdult() {
            const remainingSeats = this.maxSeats - this.childCount;
            if (this.adultCount < remainingSeats) this.adultCount++;
        },
        decrementAdult() {
            if (this.adultCount > 1) this.adultCount--;
        },
        incrementChild() {
            const remainingSeats = this.maxSeats - this.adultCount;
            if (this.childCount < remainingSeats) this.childCount++;
        },
        decrementChild() {
            if (this.childCount > 0) this.childCount--;
        },
        calculateTotal() {
            return this.days * this.pricePerDay;
        },
        calculateDays() {
            const startDate = this.startDatePicker?.getDate();
            const endDate = this.endDatePicker?.getDate();
    
            if (startDate && endDate) {
                const diffTime = endDate - startDate;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
                this.days = diffDays > 0 ? diffDays : 1;
            }
        }
    
    }">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Photo Gallery -->
                <div class="overflow-hidden mb-6">
                    <div class="aspect-video bg-slate-200 rounded-2xl">
                        <img :src="mainPhoto" alt="Main Car Photo" class="w-full h-full object-cover">
                    </div>
                    <div class="py-4 flex gap-3">
                        <template x-for="(photo, index) in photos" :key="index">
                            <div @click="changePhoto(photo)"
                                class="w-24 h-20 rounded-lg overflow-hidden cursor-pointer border-2 transition-all"
                                :class="mainPhoto === photo ? 'border-lime-500' : 'border-slate-200 hover:border-lime-300'">
                                <img :src="photo" alt="Thumbnail" class="w-full h-full object-cover">
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Car Info -->
                <div class="mb-8 w-full">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-800 mb-2">{{ $motorcycle->vehicleModel->name }}</h1>
                            <div class="flex items-center gap-4 text-slate-600">
                                <span class="flex items-center gap-1">
                                    <i data-feather="star" class="w-5 h-5 text-lime-500 fill-current"></i>
                                    <span class="font-semibold">4.8</span>
                                    <span class="text-sm">(24 reviews)</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <i data-feather="map-pin" class="w-4 h-4"></i>
                                    <span class="text-sm">{{ $motorcycle->location->city->name }}</span>
                                </span>
                            </div>
                        </div>
                        @php
                            $price = $motorcycle->final_daily_price ?? ($motorcycle->daily_price ?? 350000);

                            if ($price >= 1000) {
                                if ($price >= 1000000) {
                                    $displayPrice = round($price / 1000000, 1) . 'M';
                                } else {
                                    $displayPrice = round($price / 1000, 1) . 'K';
                                }
                            } else {
                                $displayPrice = $price;
                            }
                        @endphp

                        <div class="text-right">
                            <p class="text-3xl font-bold text-lime-600">Rp {{ $displayPrice }}</p>
                            <p class="text-sm text-slate-500">per hari</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8 w-full">
                    <h2 class="text-xl font-bold text-slate-800 mb-3 flex items-center gap-2">
                        <i data-feather="file-text" class="w-5 h-5 text-lime-600"></i>
                        Deskripsi
                    </h2>
                    <div class="prose prose-slate max-w-none prose-p:my-4">
                        {!! $motorcycle->description ?? '<p>Tidak ada deskripsi tersedia untuk mobil ini.</p>' !!}
                    </div>

                </div>

                <!-- Car Features -->
                <div class="w-full mb-8">
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i data-feather="check-circle" class="w-5 h-5 text-lime-600"></i>
                        Fitur Mobil
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg">
                            <i data-feather="users" class="w-5 h-5 text-lime-600"></i>
                            <span class="text-slate-700">{{ $motorcycle->seats }} Penumpang</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg">
                            <i data-feather="settings" class="w-5 h-5 text-lime-600"></i>
                            <span class="text-slate-700">{{ ucfirst($motorcycle->transmission) }}</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg">
                            @php
                                $fuelLabel = match ($motorcycle->fuel_type) {
                                    'gasoline' => 'Bensin',
                                    'diesel' => 'Solar',
                                    'electric' => 'Listrik',
                                    default => '-',
                                };
                            @endphp
                            <i data-feather="{{ $motorcycle->fuel_type === 'electric' ? 'zap' : 'droplet' }}"
                                class="w-5 h-5 text-lime-600"></i>
                            <span class="text-slate-700">{{ $fuelLabel }}</span>
                        </div>
                        @foreach ($motorcycle->features as $feature)
                            <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg">
                                <i data-feather="{{ $feature->icon }}" class="w-5 h-5 text-lime-600"></i>
                                <span class="text-slate-700">{{ $feature->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Location -->
                <div class="mb-8 w-full">
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i data-feather="map-pin" class="w-5 h-5 text-lime-600"></i>
                        Lokasi Pengambilan
                    </h2>
                    <div class="aspect-video bg-slate-200 rounded-lg mb-3">
                        <iframe src="{{ $motorcycle->location->map_url }}" class="w-full h-full rounded-lg border-0"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="text-slate-600">
                        <i data-feather="navigation" class="w-4 h-4 inline text-lime-600"></i>
                        <span>{{ $motorcycle->location->name }}, </span>
                        {{ $motorcycle->location->address }}
                    </p>
                </div>

                <!-- Reviews -->
                <div class="w-full">
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i data-feather="message-circle" class="w-5 h-5 text-lime-600"></i>
                        Review Pelanggan
                    </h2>

                    <!-- Review Item -->
                    <div class="border-b border-slate-200 pb-4 mb-4">
                        <div class="flex items-start gap-3">
                            <div
                                class="w-10 h-10 bg-lime-500 rounded-full flex items-center justify-center text-white font-bold">
                                A
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-slate-800">Ahmad Rizki</h3>
                                    <span class="text-sm text-slate-500">2 hari lalu</span>
                                </div>
                                <div class="flex gap-1 mb-2">
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                </div>
                                <p class="text-slate-600 text-sm">
                                    Mobil sangat nyaman dan bersih. Pelayanan ramah dan profesional.
                                    Sangat recommended untuk keluarga!
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item -->
                    <div class="pb-4">
                        <div class="flex items-start gap-3">
                            <div
                                class="w-10 h-10 bg-lime-500 rounded-full flex items-center justify-center text-white font-bold">
                                S
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-slate-800">Siti Nurhaliza</h3>
                                    <span class="text-sm text-slate-500">1 minggu lalu</span>
                                </div>
                                <div class="flex gap-1 mb-2">
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-lime-500 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 text-slate-300"></i>
                                </div>
                                <p class="text-slate-600 text-sm">
                                    Proses booking mudah, mobil sesuai ekspektasi. Harga juga kompetitif.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Sidebar -->
            <div class="lg:col-span-1 relative">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-20">
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i data-feather="calendar" class="w-5 h-5 text-lime-600"></i>
                        Form Booking
                    </h2>

                    <div id="date-range-picker" class="flex flex-col mb-4 gap-4">
                        <div class="relative">
                            <label class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                                <i data-feather="calendar" class="w-4 h-4 inline text-lime-600"></i>
                                Tanggal Pengambilan
                            </label>
                            <input id="datepicker-range-start" name="start" type="text" x-ref="startDate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                        <div class="relative">
                            <label class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                                <i data-feather="calendar" class="w-4 h-4 inline text-lime-600"></i>
                                Tanggal Pengembalian
                            </label>
                            <input id="datepicker-range-end" name="end" type="text" x-ref="endDate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                        </div>
                    </div>

                    <!-- Passenger Counter -->
                    <div class="mb-4">
                        <label class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                            <i data-feather="users" class="w-4 h-4 inline text-lime-600"></i>
                            Jumlah Penumpang
                        </label>

                        <!-- Adult Counter -->
                        <div class="flex items-center justify-between mb-3 p-3 bg-slate-50 rounded-lg">
                            <span class="text-slate-700">Dewasa</span>
                            <div class="flex items-center gap-3">
                                <button @click="decrementAdult"
                                    class="w-8 h-8 flex items-center justify-center bg-white border border-slate-300 rounded-full hover:bg-lime-500 hover:text-white hover:border-lime-500 transition-colors">
                                    <i data-feather="minus" class="w-4 h-4"></i>
                                </button>
                                <span class="w-8 text-center font-semibold" x-text="adultCount"></span>
                                <button @click="incrementAdult"
                                    class="w-8 h-8 flex items-center justify-center bg-white border border-slate-300 rounded-full hover:bg-lime-500 hover:text-white hover:border-lime-500 transition-colors">
                                    <i data-feather="plus" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Child Counter -->
                        <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                            <span class="text-slate-700">Anak-anak</span>
                            <div class="flex items-center gap-3">
                                <button @click="decrementChild"
                                    class="w-8 h-8 flex items-center justify-center bg-white border border-slate-300 rounded-full hover:bg-lime-500 hover:text-white hover:border-lime-500 transition-colors">
                                    <i data-feather="minus" class="w-4 h-4"></i>
                                </button>
                                <span class="w-8 text-center font-semibold" x-text="childCount"></span>
                                <button @click="incrementChild"
                                    class="w-8 h-8 flex items-center justify-center bg-white border border-slate-300 rounded-full hover:bg-lime-500 hover:text-white hover:border-lime-500 transition-colors">
                                    <i data-feather="plus" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Price Summary -->
                    <div class="border-t border-slate-200 pt-4 mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-600">
                                <span x-text="'Rp ' + pricePerDay.toLocaleString('id-ID')"></span> x
                                <span x-text="days > 0 ? days : 1"></span>
                                hari
                            </span>
                        </div>
                        <div class="flex justify-between items-center text-lg font-bold">
                            <span class="text-slate-800">Total Harga</span>
                            <span class="text-lime-600"
                                x-text="calculateTotal().toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })"></span>
                        </div>
                    </div>

                    <!-- Booking Button -->
                    <button
                        class="w-full bg-lime-500 hover:bg-lime-600 text-slate-950 font-bold py-3 rounded-lg transition-colors flex items-center justify-center gap-2">
                        <i data-feather="check-circle" class="w-5 h-5"></i>
                        Booking Sekarang
                    </button>

                    <p class="text-xs text-slate-500 text-center mt-3">
                        <i data-feather="shield" class="w-3 h-3 inline"></i>
                        Pembayaran aman dan terenkripsi
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="w-full bg-white">
        <div class="max-w-7xl mx-auto px-8 pt-8 pb-16">
            <h2 class="font-bold text-2xl uppercase mb-4 max-w-sm">Find the Another Vehicles</h2>
            <div class="flex justify-between gap-8 items-end">
                <p class="text-sm text-slate-700 max-w-2xl">Choose from a wide range of cars — from compact city rides to
                    premium comfort. Book easily and start your journey with <span
                        class="text-lime-600 font-bold">morvix</span>.</p>
                <a href="" class="text-sm font-bold text-lime-500 hover:text-lime-600">Lihat semua</a>
            </div>
            <div class="mt-8 w-full grid grid-cols-4 gap-4">
                @foreach ($otherMotorcycles as $motorcycle)
                    <a href="{{ route('cars.show', $motorcycle->code) }}" class="block">
                        <div class="w-full bg-slate-100 rounded-2xl aspect-[3/4] overflow-hidden relative group">
                            <div class="w-full h-full relative overflow-hidden">
                                <div
                                    class="w-full h-full flex items-center justify-center overflow-hidden group-hover:scale-110 duration-500 transition-all">
                                    <img src="{{ asset('storage/' . $motorcycle->images->first()->image_url) }}"
                                        alt="" class="w-full object-center">
                                </div>
                                <div class="absolute inset-0 z-20 flex flex-col gap-4 justify-between">
                                    <div class="flex flex-col w-full gap-1 p-4 ">
                                        <h4 class="text-slate-900 text-base line-clamp-1 font-semibold uppercase">
                                            {{ $motorcycle->vehicleModel->name }}
                                        </h4>
                                        <div class="flex gap-2">
                                            <h6 class="text-xs font-semibold text-gray-600">
                                                Sport
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2 w-full ">
                                        <div class="flex gap-4 px-4 pb-2 pt-2 w-full justify-start">
                                            <div class="flex gap-1 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-3 h-3 text-gray-600" fill="currentColor">
                                                    <path
                                                        d="M256 224.9c-47.7 0-84.7-53.77-84.7-100.02 0-22.61 8.94-43.42 25.18-58.59C212.21 51.6 233.35 43.5 256 43.5s43.79 8.1 59.53 22.79c16.23 15.17 25.18 35.97 25.18 58.59 0 46.24-37 100.02-84.7 100.02z" />
                                                    <path
                                                        d="M402.95 385c-3.25 27.82-7.86 56.27-15.15 83.5H124.21c-7.3-27.23-11.91-55.68-15.17-83.5-2.61-22.3-1.88-45.45 8.58-66.14 9.48-18.77 26.75-34.62 47.6-45.57 4.9-2.57 9.98-4.88 15.2-6.92 23.18 13.99 49.07 21.53 75.58 21.53s52.4-7.54 75.58-21.53c5.22 2.04 10.3 4.35 15.2 6.92 20.86 10.95 38.12 26.8 47.6 45.57 10.46 20.69 11.19 43.84 8.57 66.14z" />
                                                </svg>
                                                <span
                                                    class="text-gray-600 text-xs font-semibold">{{ $motorcycle->seats }}</span>
                                            </div>
                                            <div class="flex gap-2 items-center">
                                                <span class="text-gray-600 text-xs font-semibold uppercase">Manually</span>
                                            </div>
                                            <div class="flex gap-1 items-center">
                                                <span class="text-gray-600 text-xs font-semibold">70 L</span>
                                            </div>
                                        </div>
                                        <div class="flex w-full justify-between gap-2 px-4 pb-4 items-end">
                                            <div class="flex flex-col gap-1">
                                                <h6 class="font-medium text-slate-900">
                                                    Rp 500.000
                                                    <span class="text-xs text-slate-400">/Hari</span>
                                                </h6>
                                                <h6 class="font-medium line-through text-xs text-slate-400">
                                                    Rp 800.000
                                                </h6>
                                            </div>
                                            <button
                                                class="py-1 px-4 rounded-full h-fit bg-lime-600 hover:bg-lime-700 cursor-pointer text-sm text-white">
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
@endsection
