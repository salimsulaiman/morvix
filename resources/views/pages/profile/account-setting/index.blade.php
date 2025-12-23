@extends('components.layouts.app')
@section('content')
    <div class="min-h-screen relative">
        <div class="max-w-2xl mx-auto relative">
            <div class="bg-white rounded-t-2xl sm:rounded-2xl w-full sm:max-w-2xl pt-32 pb-8" x-show="openModal">
                {{-- Header --}}
                <div class="flex items-center p-5 border-b border-gray-100">
                    <a href="{{ route('profile.index') }}"
                        class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-feather="arrow-left" class="w-5 h-5 text-slate-500"></i>
                    </a>
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold text-gray-900">Pengaturan Akun</h3>
                    </div>
                </div>
                <div class="px-5 mt-4 space-y-3">
                    @if (session('success'))
                        <div
                            class="flex items-center gap-3 p-4 rounded-lg bg-green-50 border border-green-200 text-green-800">
                            <i data-feather="check-circle" class="w-5 h-5"></i>
                            <span class="text-sm font-medium">
                                {{ session('success') }}
                            </span>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="p-4 rounded-lg bg-red-50 border border-red-200 text-red-800">
                            <div class="flex items-center gap-2 mb-2">
                                <i data-feather="alert-circle" class="w-5 h-5"></i>
                                <span class="font-semibold text-sm">Terjadi kesalahan</span>
                            </div>
                            <ul class="list-disc list-inside text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>

                <form class="px-5 py-2" method="POST" action="{{ route('profile.account-setting.password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Password Lama
                        </label>
                        <div class="relative">
                            <input type="password" name="current_password" placeholder="Masukkan password lama"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm
                       focus:outline-none focus:ring-2 focus:ring-lime-600
                       focus:border-transparent text-gray-900 placeholder:text-gray-400"
                                required />
                            <i data-feather="lock" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Password Baru
                        </label>
                        <div class="relative">
                            <input type="password" name="password" placeholder="Masukkan password baru"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm
                       focus:outline-none focus:ring-2 focus:ring-lime-600
                       focus:border-transparent text-gray-900 placeholder:text-gray-400"
                                required />
                            <i data-feather="key" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Konfirmasi Password Baru
                        </label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" placeholder="Ulangi password baru"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm
                       focus:outline-none focus:ring-2 focus:ring-lime-600
                       focus:border-transparent text-gray-900 placeholder:text-gray-400"
                                required />
                            <i data-feather="check-circle" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-lime-600 text-white py-3 rounded-lg font-medium
               hover:bg-lime-700 transition-colors
               focus:outline-none focus:ring-2 focus:ring-lime-600 focus:ring-offset-2">
                        Ubah Password
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
