<form action="{{ $action ?? url()->current() }}" x-bind:action="actions?.[type] ?? '{{ $action ?? url()->current() }}'"
    method="GET" class="bg-white rounded-4xl flex flex-col gap-4 p-6 sm:p-8 justify-center h-auto lg:h-40">
    @foreach (request()->except(['city', 'start_date', 'end_date', 'page']) as $key => $value)
        @if (is_array($value))
            @foreach ($value as $v)
                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
            @endforeach
        @else
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endif
    @endforeach
    <h6 class="text-xs">Cari kendaraan</h6>

    <div class="flex flex-col lg:flex-row gap-6 lg:gap-4 justify-between items-stretch lg:items-center"
        x-data="vehicleSearch()" x-init="initDatepickers()">

        <div class="flex flex-col gap-4 w-full lg:w-auto">
            <h6 class="font-bold text-sm">Lokasi Penyewaan</h6>

            <div class="relative">
                <button type="button" @click.stop="open = !open"
                    class="bg-gray-100 text-gray-500 text-sm rounded-full w-full lg:w-48 p-2.5 flex items-center gap-1">
                    <svg class="w-5 h-5 text-gray-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.37892 10.2236L8 16L12.6211 10.2236C13.5137 9.10788 14 7.72154 14 6.29266V6C14 2.68629 11.3137 0 8 0C4.68629 0 2 2.68629 2 6V6.29266C2 7.72154 2.4863 9.10788 3.37892 10.2236ZM8 8C9.10457 8 10 7.10457 10 6C10 4.89543 9.10457 4 8 4C6.89543 4 6 4.89543 6 6C6 7.10457 6.89543 8 8 8Z" />
                    </svg>
                    <span x-text="selected === '' && selected !== null ? 'Semua' : (selected || 'Choose Location')"
                        class="truncate"></span>

                </button>

                <ul x-show="open" @click.outside="open = false" x-cloak
                    class="absolute left-0 mt-2 w-full lg:w-48 bg-white rounded-2xl shadow-md z-50 overflow-hidden py-2">
                    <li>
                        <button type="button" @click.stop="selectCity()"
                            class="w-full text-left px-4 py-2 text-sm hover:bg-lime-400 text-gray-700"
                            :class="{ 'bg-lime-200 text-lime-900 font-medium': selected === "" }"> Semua
                        </button>
                    </li>
                    <template x-for="(city, index) in options" :key="index">
                        <li>
                            <button type="button" @click.stop="selectCity(city)"
                                class="w-full text-left px-4 py-2 text-sm hover:bg-lime-400 text-gray-700"
                                :class="{ 'bg-lime-200 text-lime-900 font-medium': selected === city }" x-text="city">
                            </button>
                        </li>
                    </template>
                </ul>

                <input type="hidden" name="city" :value="selected">
            </div>
        </div>

        <div class="hidden lg:block w-[3px] h-full rounded-full bg-concrete-100"></div>

        <div class="flex flex-col gap-4 w-full lg:w-auto">
            <h6 class="font-bold text-sm">Tanggal Penyewaan</h6>

            <div class="relative w-full lg:max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Z" />
                    </svg>
                </div>

                <input type="text" x-ref="start" x-model="startDate" name="start_date"
                    class="bg-gray-100 text-gray-900 text-sm rounded-full block w-full ps-10 p-2.5 outline-none border-0 focus:ring-0"
                    placeholder="Select date start">
            </div>
        </div>

        <div class="hidden lg:block w-[3px] h-full rounded-full bg-concrete-100"></div>

        <div class="flex flex-col gap-4 w-full lg:w-auto">
            <h6 class="font-bold text-sm">Tanggal Pengembalian</h6>

            <div class="relative w-full lg:max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Z" />
                    </svg>
                </div>

                <input type="text" x-ref="end" x-model="endDate" name="end_date"
                    class="bg-gray-100 text-gray-900 text-sm rounded-full block w-full ps-10 p-2.5 outline-none border-0 focus:ring-0"
                    placeholder="Select date end">
            </div>
        </div>

        <button type="submit"
            class="w-full md:w-full lg:w-auto rounded-full bg-lime-500 p-3 lg:p-2 hover:bg-lime-600 flex items-center justify-center gap-2">
            <i data-feather="search" class="w-5 h-5 text-white"></i>
            <span class="text-white text-sm font-medium lg:hidden">Cari Kendaraan</span>
        </button>
    </div>
</form>

<script>
    function vehicleSearch() {
        return {
            open: false,
            selected: '{{ request('city') ?? '' }}',
            options: @js($cities),
            startDate: '{{ request('start_date') }}',
            endDate: '{{ request('end_date') }}',
            startPicker: null,
            endPicker: null,
            selectCity(city) {
                this.selected = city
                this.open = false
            },
            initDatepickers() {
                const today = new Date()

                this.startPicker = new Datepicker(this.$refs.start, {
                    minDate: today,
                    format: 'mm/dd/yyyy'
                })

                this.endPicker = new Datepicker(this.$refs.end, {
                    minDate: today,
                    format: 'mm/dd/yyyy'
                })

                this.$refs.start.addEventListener('changeDate', () => {
                    const start = new Date(this.$refs.start.value)
                    this.endPicker.setOptions({
                        minDate: start
                    })

                    if (this.endDate && new Date(this.endDate) < start) {
                        this.endDate = ''
                        this.$refs.end.value = ''
                    }
                })
            }
        }
    }
</script>
