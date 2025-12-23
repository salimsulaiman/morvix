@extends('components.layouts.auth')
@section('content')
    <div class="w-full max-w-5xl mx-auto bg-white rounded-2xl shadow overflow-hidden flex flex-col md:flex-row sm:p-4 gap-4">
        <div x-data="{
            active: '{{ $errors->hasBag('register') ? 'signup' : 'signin' }}'
        }"
            class="w-full md:w-1/2 bg-white border-2 border-slate-100 rounded-xl flex flex-col items-center justify-center px-8 py-16 gap-4">
            <h1 class="text-slate-900 text-2xl font-medium text-center md:text-left">Welcome to Morvix</h1>
            <p class="text-slate-600 max-w-sm text-center text-sm">Start your experience with Morvix by signing in or signing
                up.</p>
            <div class="flex gap-1 p-1 rounded-xl border border-slate-300 bg-white w-full max-w-xs">
                <button @click="active = 'signin'" class="px-6 py-2 rounded-lg text-sm w-full transition"
                    :class="active === 'signin' ? 'bg-slate-200' : 'bg-white hover:bg-slate-100'">
                    Sign In
                </button>
                <button @click="active = 'signup'" class="px-6 py-2 rounded-lg text-sm w-full transition"
                    :class="active === 'signup' ? 'bg-slate-200' : 'bg-white hover:bg-slate-100'">
                    Sign Up
                </button>
            </div>
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    class="mt-5 rounded-lg bg-green-100 px-4 py-3 text-green-800 border border-green-300 w-full max-w-md">
                    <div class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        <p class="text-sm font-medium">
                            {{ session('success') }}
                        </p>
                        <button @click="show = false" class="ml-auto text-green-700 hover:text-green-900">
                            ✕
                        </button>
                    </div>
                </div>
            @endif
            <div class="w-full max-w-md mt-5" x-show="active === 'signin'" x-data="{ showPassword: false }">
                @include('pages.auth.login')
            </div>
            <div class="w-full max-w-md mt-5" x-show="active === 'signup'" x-data="{ showPassword: false }">
                @include('pages.auth.register')
            </div>
        </div>
        <div class="w-full md:w-1/2 relative rounded-xl overflow-hidden hidden md:block">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ asset('assets/images/articles/fortuner.jpg') }}');"></div>
            <div
                class="absolute inset-0 bg-gradient-to-t from-lime-800 to-transparent z-20 flex items-end justify-center p-8">
                <div class="w-full flex flex-col gap-4">
                    <h2 class="text-2xl font-medium text-white text-center max-w-sm mx-auto">A Unifed Hub for Smarter
                        Financial Decision-Marketing</h2>
                    <p class="text-white text-center text-sm max-w-sm mx-auto">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Aliquam reiciendis amet consequuntur sed</p>
                </div>
            </div>
        </div>
    </div>
@endsection
