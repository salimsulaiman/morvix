<div class="fixed bottom-0 left-0 right-0 z-40 bg-slate-900 lg:hidden">
    <div class="flex justify-evenly px-4 py-4 items-center">

        <a href="{{ route('home.index') }}"
            class="flex w-full items-center justify-center text-xs font-medium gap-2 transition
           {{ request()->routeIs('home.*')
               ? 'bg-lime-800 px-4 py-3 rounded-full text-lime-100'
               : 'flex-col text-slate-400 hover:text-lime-300' }}">
            <i data-feather="home" class="w-5 h-5 shrink-0"></i>
            @if (request()->routeIs('home.*'))
                <span>Beranda</span>
            @endif
        </a>

        <a href="{{ route('cars.index') }}"
            class="flex w-full items-center justify-center text-xs font-medium gap-2 transition
           {{ request()->routeIs('cars.*')
               ? 'bg-lime-800 px-4 py-3 rounded-full text-lime-100'
               : 'flex-col text-slate-400 hover:text-lime-300' }}">
            <i data-feather="truck" class="w-5 h-5 shrink-0"></i>
            @if (request()->routeIs('cars.*'))
                <span>Mobil</span>
            @endif
        </a>

        <a href="{{ route('motorcycles.index') }}"
            class="flex w-full items-center justify-center text-xs font-medium gap-2 transition
           {{ request()->routeIs('motorcycles.*')
               ? 'bg-lime-800 px-4 py-3 rounded-full text-lime-100'
               : 'flex-col text-slate-400 hover:text-lime-300' }}">
            <i data-feather="zap" class="w-5 h-5 shrink-0"></i>
            @if (request()->routeIs('motorcycles.*'))
                <span>Motor</span>
            @endif
        </a>

        <a href="#"
            class="flex w-full items-center justify-center text-xs font-medium gap-2 transition
           {{ request()->routeIs('layanan.*')
               ? 'bg-lime-800 px-4 py-3 rounded-full text-lime-100'
               : 'flex-col text-slate-400 hover:text-lime-300' }}">
            <i data-feather="grid" class="w-5 h-5 shrink-0"></i>
            @if (request()->routeIs('layanan.*'))
                <span>Layanan</span>
            @endif
        </a>

        <a href="{{ route('profile.index') }}"
            class="flex w-full items-center justify-center text-xs font-medium gap-2 transition
           {{ request()->routeIs('profile.*')
               ? 'bg-lime-800 px-4 py-3 rounded-full text-lime-100'
               : 'flex-col text-slate-400 hover:text-lime-300' }}">
            <i data-feather="user" class="w-5 h-5 shrink-0"></i>
            @if (request()->routeIs('profile.*'))
                <span>Profile</span>
            @endif
        </a>
    </div>
</div>
