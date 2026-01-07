@extends('components.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-4">
        <div class="max-w-md w-full min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-2">Payment Failed</h2>
                <p class="text-gray-600 mb-6">
                    Your transaction could not be completed. Please try again.
                </p>

                <a href="{{ route('home.index') }}"
                    class="w-full bg-lime-600 hover:bg-lime-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
@endsection
