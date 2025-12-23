@extends('components.layouts.app')
@section('content')
    <div class="min-h-screen pt-32 relative">
        <div class="absolute inset-0 bg-lime-600 bg-cover bg-center bg-blend-multiply z-0"
            style="background-image: url('{{ asset('assets/images/background-patern.jpg') }}');">
        </div>
        <div class="max-w-2xl mx-auto relative z-10">
            <div class="mx-auto w-full flex flex-col gap-2 mb-4 items-center py-4">
                <div class="w-28 h-28 rounded-full bg-slate-100 relative">
                    <img src="https://api.dicebear.com/9.x/thumbs/svg?seed={{ urlencode(Auth::user()->name) }}&scale=90"
                        alt="Profile" class="w-full h-full rounded-full">
                    <button
                        class="h-8 w-8 bg-white rounded-full shadow flex items-center justify-center absolute right-0 bottom-0 overflow-hidden p-2">
                        <i data-feather="camera" class="w-4 h-4 text-slate-500"></i>
                    </button>
                </div>
                <h2 class="text-xl font-medium text-white mt-4">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-white">{{ Auth::user()->email }}</p>
            </div>
            <div class="bg-white rounded-t-2xl overflow-hidden py-4">
                <a href="{{ route('profile.detail') }}" class="flex items-start p-5 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 flex items-center justify-center flex-shrink-0">
                        <i data-feather="user" class="w-5 h-5 text-slate-500"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold text-gray-900">Profile Saya</h3>
                        <p class="text-sm text-gray-500 mt-1">Kelola data pribadi dan informasi akun</p>
                    </div>
                </a>

                <a href="#" class="flex items-start p-5 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 flex items-center justify-center flex-shrink-0">
                        <i data-feather="clock" class="w-5 h-5 text-slate-500"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold text-gray-900">Riwayat Sewa</h3>
                        <p class="text-sm text-gray-500 mt-1">Lihat semua riwayat penyewaan kendaraan</p>
                    </div>
                </a>

                <a href="#" class="flex items-start p-5 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 flex items-center justify-center flex-shrink-0">
                        <i data-feather="heart" class="w-5 h-5 text-slate-500"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold text-gray-900">Favorit</h3>
                        <p class="text-sm text-gray-500 mt-1">Daftar mobil dan motor favorit Anda</p>
                    </div>
                </a>

                <a href="#" class="flex items-start p-5 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 flex items-center justify-center flex-shrink-0">
                        <i data-feather="credit-card" class="w-5 h-5 text-slate-500"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold text-gray-900">Pembayaran</h3>
                        <p class="text-sm text-gray-500 mt-1">Kelola metode dan riwayat pembayaran</p>
                    </div>
                </a>

                <a href="#" class="flex items-start p-5 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 flex items-center justify-center flex-shrink-0">
                        <i data-feather="settings" class="w-5 h-5 text-slate-500"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold text-gray-900">Pengaturan Akun</h3>
                        <p class="text-sm text-gray-500 mt-1">Keamanan, password, dan preferensi</p>
                    </div>
                </a>

                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center p-5 hover:bg-gray-50 transition-colors">
                        <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-feather="log-out" class="w-5 h-5 text-red-600"></i>
                        </div>
                        <div class="ml-4 flex-1 text-left">
                            <h3 class="font-semibold text-gray-900">Keluar</h3>
                        </div>
                        <i data-feather="chevron-right" class="w-5 h-5 text-gray-400"></i>
                    </button>
                </form>

            </div>

        </div>
    </div>
@endsection
