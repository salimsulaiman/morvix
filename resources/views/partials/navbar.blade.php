<div class="w-full z-50 fixed top-0">
    <nav class="w-full bg-transparent transition-all duration-300 ease-in-out" x-data="{ open: false, scrolled: false, service: false }"
        x-init="scrolled = window.scrollY > 10;
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 10
        })" x-cloak aria-label="Navigasi utama">

        <div class="w-full transition-all duration-300 ease-in-out {{ request()->is('/') ? '' : 'bg-slate-950/90 backdrop-blur-lg' }}"
            @if (request()->is('/')) :class="scrolled ? 'bg-slate-950/90 backdrop-blur-lg' : 'bg-transparent'" @endif>

            <div class="max-w-7xl mx-auto px-8 transition-all duration-300 ease-in-out flex justify-between items-center
            {{ request()->is('/') ? '' : 'py-4' }}"
                @if (request()->is('/')) :class="scrolled ? 'py-4' : 'py-8'" @endif>
                <a href="/" aria-label="Beranda Movix" class="text-2xl font-bold text-lime-500">
                    morvix
                </a>
                <ul class="hidden xlg:flex gap-6 relative">
                    <li>
                        <a href="#"
                            class="font-semibold transition-colors duration-150 ease-in-out
                            {{ request()->is('/') ? 'text-lime-400 hover:text-lime-300' : 'text-gray-200 hover:text-lime-400' }}">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="font-semibold transition-colors duration-150 ease-in-out
                            {{ request()->is('about') ? 'text-lime-400 hover:text-lime-300' : 'text-gray-200 hover:text-lime-400' }}">
                            Mobil
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="font-semibold transition-colors duration-150 ease-in-out
                        {{ request()->is('about') ? 'text-lime-400 hover:text-lime-300' : 'text-gray-200 hover:text-lime-400' }}">
                            Motor
                        </a>
                    </li>
                    <li class="relative">
                        <button type="button" @mouseenter="service = true" @mouseleave="service = false"
                            class="font-semibold transition-colors duration-150 ease-in-out flex items-center
                            {{ request()->is('service*') || request()->is('pricing') || request()->is('order-guide')
                                ? 'text-lime-400 hover:text-lime-300'
                                : 'text-gray-200 hover:text-lime-400' }}"
                            aria-haspopup="true" :aria-expanded="service.toString()">
                            Layanan Kami
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul x-show="service" x-transition @mouseenter="service = true" @mouseleave="service = false"
                            class="absolute top-6 left-1/2 -translate-x-1/2 mt-2 w-80 bg-slate-800 shadow-md rounded-xl py-2 z-50 px-2"
                            x-cloak>
                            <li>
                                <a href="#"
                                    class="flex items-center gap-4 px-4 py-2 rounded-lg transition-colors duration-150 ease-in-out
                            {{ request()->is('pricing')
                                ? 'bg-lime-900 text-lime-200'
                                : 'text-gray-200 hover:bg-lime-900 hover:text-lime-200' }}">
                                    <i data-feather="layout" class="w-4 h-4"></i>
                                    Order Guide
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center gap-4 px-4 py-2 rounded-lg transition-colors duration-150 ease-in-out
                                    {{ request()->is('order-guide')
                                        ? 'bg-lime-900 text-lime-200'
                                        : 'text-gray-200 hover:bg-lime-900 hover:text-lime-200' }}">
                                    <i data-feather="file-text" class="w-4 h-4"></i>
                                    Promotions
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="font-semibold transition-colors duration-150 ease-in-out
                            {{ request()->is('portfolio*') ? 'text-lime-400 hover:text-lime-300' : 'text-gray-200 hover:text-lime-400' }}">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="font-semibold transition-colors duration-150 ease-in-out
                            {{ request()->is('article*') ? 'text-lime-400 hover:text-lime-300' : 'text-gray-200 hover:text-lime-400' }}">
                            Kontak
                        </a>
                    </li>
                </ul>

                <div class="gap-4 items-center hidden xlg:flex">
                    <button @click="openSearch=true" aria-label="Buka pencarian">
                        <i data-feather="search" class="w-6 h-6 text-gray-200 hover:text-lime-400 cursor-pointer"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="fixed inset-0 bg-black/50 z-40 backdrop-blur-sm xlg:hidden" x-show="open" @click="open=false"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        {{-- @include('partials.sidebar') --}}
    </nav>

</div>
