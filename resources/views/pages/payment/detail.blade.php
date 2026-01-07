@extends('components.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 pt-36 pb-24">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
            <h1 class="text-xl font-bold text-gray-800 mb-2">Konfirmasi Pembayaran</h1>
            <div class="flex items-center gap-2">
                <span class="text-gray-600">Kode Booking:</span>
                <span class="font-semibold text-lime-600">RNT-2024-0001</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                    <img src="{{ asset('storage/' . $booking->vehicle->images->first()->image_url) }}"
                        alt="Thumbnail - {{ $booking->vehicle->vehicleModel->name }}" class="w-full h-64 object-cover">
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Detail Penyewa</h2>

                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t">
                            <div>
                                <p class="text-gray-500 text-sm">Nama</p>
                                <p class="font-semibold text-gray-800">{{ currentUser()->name }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Email</p>
                                <p class="font-semibold text-gray-800">{{ currentUser()->email }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">No. Telpon</p>
                                <p class="font-semibold text-gray-800">
                                    {{ currentUser()->phone ? currentUser()->phone : '-' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Alamat</p>
                                <p class="font-semibold text-gray-800">
                                    {{ currentUser()->address ? currentUser()->address : '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Detail Kendaraan</h2>

                    <div class="space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">{{ $booking->vehicle->vehicleModel->name }}
                                </h3>
                                <p class="text-gray-600 text-sm">No. Plat: <span
                                        class="font-semibold">{{ $booking->vehicle->formatted_license_plate }}</span></p>
                            </div>
                            <span class="bg-lime-100 text-lime-700 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $booking->vehicle->vehicleModel->type === 'car' ? 'Mobil' : 'Motor' }}</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t">
                            <div>
                                <p class="text-gray-500 text-sm">Brand</p>
                                <p class="font-semibold text-gray-800">{{ $booking->vehicle->vehicleModel->brand->name }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Category</p>
                                <p class="font-semibold text-gray-800">
                                    {{ $booking->vehicle->vehicleModel->category->name }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Tahun</p>
                                <p class="font-semibold text-gray-800">{{ $booking->vehicle->year }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Warna</p>
                                <p class="font-semibold text-gray-800">{{ $booking->vehicle->color }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Tangki</p>
                                <p class="font-semibold text-gray-800">
                                    @if (!is_null($booking->vehicle->fuel_tank_capacity))
                                        {{ round($booking->vehicle->fuel_tank_capacity) }} <span>L</span>
                                    @else
                                        {{ round($booking->vehicle->battery_capacity_kwh) }} <span>kWh</span>
                                    @endif
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Kapasitas</p>
                                <p class="font-semibold text-gray-800">{{ $booking->vehicle->seats }} Penumpang</p>
                            </div>
                        </div>

                        <!-- Lokasi Pengambilan -->
                        <div class="pt-4 border-t">
                            <p class="text-gray-500 text-sm mb-2">Lokasi Pengambilan</p>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-lime-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800">Jl. Sudirman No. 123, Jakarta Pusat</p>
                                    <a href="https://maps.google.com" target="_blank"
                                        class="text-lime-600 text-sm hover:text-lime-700 inline-flex items-center gap-1 mt-1">
                                        Lihat di Google Maps
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Sewa -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Detail Sewa</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Tanggal Mulai</span>
                            <span class="font-semibold text-gray-800">
                                {{ \Carbon\Carbon::parse($booking->start_date)->translatedFormat('d F Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Tanggal Selesai</span>
                            <span class="font-semibold text-gray-800">
                                {{ \Carbon\Carbon::parse($booking->end_date)->translatedFormat('d F Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-t">
                            <span class="text-gray-600">Total Hari</span>
                            <span class="font-semibold text-lime-600">{{ $booking->total_days }} Hari</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section - Payment -->
            <div class="lg:col-span-1">
                <form action="{{ route('bookings.pay', $booking) }}" method="POST"
                    class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
                    @csrf
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pembayaran</h2>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Harga per hari</span>
                            <span class="font-semibold text-gray-800">Rp
                                {{ number_format($booking->daily_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Durasi sewa</span>
                            <span class="font-semibold text-gray-800">{{ $booking->total_days }}</span>
                        </div>
                        <div class="flex justify-between pt-3 border-t">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold text-gray-800">Rp
                                {{ number_format($booking->subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Biaya admin</span>
                            <span class="font-semibold text-gray-800">Rp
                                {{ number_format($booking->admin_fee, 0, ',', '.') }}</span></span>
                        </div>
                        <div class="flex justify-between pt-3 border-t">
                            <span class="text-lg font-bold text-gray-800">Total Harga</span>
                            <span class="text-lg font-bold text-lime-600">Rp
                                {{ number_format($booking->total_price, 0, ',', '.') }}</span></span></span>
                        </div>
                    </div>

                    <!-- Payment Options -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Metode Pembayaran</label>
                        <div x-data="{ paymentType: 'dp' }" class="space-y-2">
                            <label
                                :class="paymentType === 'dp'
                                    ?
                                    'flex items-center p-3 border-2 border-lime-500 rounded-xl cursor-pointer bg-lime-50' :
                                    'flex items-center p-3 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-lime-300'">
                                <input type="radio" name="payment_type" value="dp" class="w-4 h-4 text-lime-600"
                                    x-model="paymentType">
                                <span class="ml-3 font-semibold text-gray-800">
                                    DP 30% (Rp {{ number_format($booking->deposit_amount, 0, ',', '.') }})
                                </span>
                            </label>

                            <label
                                :class="paymentType === 'full'
                                    ?
                                    'flex items-center p-3 border-2 border-lime-500 rounded-xl cursor-pointer bg-lime-50' :
                                    'flex items-center p-3 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-lime-300'">
                                <input type="radio" name="payment_type" value="full" class="w-4 h-4 text-lime-600"
                                    x-model="paymentType">
                                <span class="ml-3 font-semibold text-gray-800">
                                    Full Payment (Rp {{ number_format($booking->total_price, 0, ',', '.') }})
                                </span>
                            </label>
                        </div>

                    </div>

                    <!-- Payment Button -->
                    <button type="submit"
                        class="w-full bg-lime-500 hover:bg-lime-600 text-white font-bold py-4 rounded-xl transition-colors">
                        Bayar Sekarang
                    </button>

                    <p class="text-xs text-gray-500 text-center mt-4">
                        Dengan melanjutkan, Anda menyetujui syarat dan ketentuan yang berlaku
                    </p>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
