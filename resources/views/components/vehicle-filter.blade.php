<aside class="hidden md:block bg-white rounded-3xl shadow p-5 space-y-6">
    <form method="GET" action="{{ url()->current() }}" class="space-y-3">
        @foreach (request()->except(['categories', 'features', 'transmissions', 'fuel_types', 'min_price', 'max_price', 'page']) as $key => $value)
            @if (is_array($value))
                @foreach ($value as $v)
                    <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
        <h2 class="text-sm font-bold text-slate-700 border-b border-lime-200 pb-2">
            Filter {{ $type === 'car' ? 'Mobil' : 'Motor' }}
        </h2>

        <div>
            <h3 class="text-sm font-semibold text-slate-600 mb-2 uppercase tracking-wide">Kategori</h3>
            <div class="space-y-1 text-slate-700">
                @foreach ($categories as $category)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                            @checked(in_array($category->id, request('categories', []))) class="text-lime-600 focus:ring-lime-400">
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-600 mb-2 uppercase tracking-wide">Transmisi</h3>
            <div class="space-y-1 text-slate-700">
                @foreach (['manual', 'automatic'] as $transmission)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="transmissions[]" value="{{ $transmission }}"
                            @checked(in_array($transmission, request('transmissions', []))) class="text-lime-600 focus:ring-lime-400">
                        {{ ucfirst($transmission) }}
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-600 mb-2 uppercase tracking-wide">Bahan Bakar</h3>
            <div class="space-y-1 text-slate-700">
                @foreach (['gasoline', 'diesel', 'electric'] as $fuel)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="fuel_types[]" value="{{ $fuel }}"
                            @checked(in_array($fuel, request('fuel_types', []))) class="text-lime-600 focus:ring-lime-400">
                        {{ ucfirst($fuel) }}
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-600 mb-2 uppercase tracking-wide">Fitur Tambahan</h3>
            <div class="space-y-1 text-slate-700">
                @foreach ($features as $feature)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                            @checked(in_array($feature->id, request('features', []))) class="text-lime-600 focus:ring-lime-400">
                        {{ $feature->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-600 mb-2 uppercase tracking-wide">Rentang Harga</h3>

            <div class="space-y-2">
                <div class="flex justify-between text-xs text-slate-500">
                    <span>Rp <span x-text="minPrice.toLocaleString()"></span></span>
                    <span>Rp <span x-text="maxPrice.toLocaleString()"></span></span>
                </div>

                <input type="range" x-model="minPrice" :min="rangeMin" :max="rangeMax"
                    :step="10000" class="w-full accent-lime-500">
                <input type="range" x-model="maxPrice" :min="rangeMin" :max="rangeMax"
                    :step="10000" class="w-full accent-lime-500">

                <input type="hidden" name="min_price" :value="minPrice">
                <input type="hidden" name="max_price" :value="maxPrice">
            </div>
        </div>

        <button type="submit"
            class="w-full bg-lime-600 text-white rounded-lg py-2 mt-3 hover:bg-lime-700 transition shadow-md">
            Terapkan Filter
        </button>
    </form>
</aside>
