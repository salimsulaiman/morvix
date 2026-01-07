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
                        <h3 class="font-semibold text-gray-900">Profile Saya</h3>
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


                {{-- Form --}}
                <form class="px-5 py-2" method="POST" action="{{ route('profile.detail.edit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Name --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                placeholder="Masukkan nama lengkap"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                                required />
                            <i data-feather="user" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <div class="relative">
                            <input type="tel" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                                placeholder="Masukkan nomor telepon"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                                required />
                            <i data-feather="phone" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>

                    {{-- ID Number --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor KTP</label>
                        <div class="relative">
                            <input type="text" name="id_number" value="{{ old('id_number', Auth::user()->id_number) }}"
                                placeholder="Masukkan nomor KTP"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                                required />
                            <i data-feather="credit-card" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>

                    {{-- Date of Birth --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <div class="relative">
                            <input type="date" name="date_of_birth"
                                value="{{ old('date_of_birth', Auth::user()->date_of_birth) }}"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                                required />
                            <i data-feather="calendar" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>

                    {{-- Gender --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                        <div class="relative">
                            <select name="gender"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 appearance-none bg-white"
                                required>
                                <option value="">Pilih jenis kelamin</option>

                                <option value="male"
                                    {{ old('gender', Auth::user()->gender) === 'male' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="female"
                                    {{ old('gender', Auth::user()->gender) === 'female' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            <i data-feather="users" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <div class="relative">
                            <textarea name="address" rows="3"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 appearance-none bg-white"
                                placeholder="Masukkan alamat lengkap" required>{{ old('address', Auth::user()->address) }}</textarea>

                            <i data-feather="map-pin" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>


                    {{-- Save Button --}}
                    <button type="submit"
                        class="w-full bg-lime-600 text-white py-3 rounded-lg font-medium hover:bg-lime-700 transition-colors focus:outline-none focus:ring-2 focus:ring-lime-600 focus:ring-offset-2">
                        Simpan Perubahan
                    </button>
                </form>
                <div class="flex items-center p-5 border-b border-gray-100">
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold text-gray-900">Data SIM</h3>
                    </div>
                </div>
                <div class="w-full p-5 flex flex-col gap-4">
                    @if ($user_sim->isEmpty())
                        <p class="text-sm text-gray-500 mb-4">Anda belum menambahkan data SIM.</p>
                    @else
                        @foreach ($user_sim as $sim)
                            <div class="relative aspect-auto rounded-2xl border border-dashed p-4">
                                <div
                                    class="w-full h-36 sm:h-56 bg-gray-200 rounded-lg overflow-hidden relative border border-gray-300">
                                    <img src="{{ asset('storage/' . $sim->sim_photo) }}" alt="{{ $sim->sim_number }}"
                                        class="w-full h-full object-cover object-center">
                                </div>

                                <div class="mt-3 flex justify-between">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $sim->sim_type }} -
                                            {{ $sim->sim_number }}
                                        </h4>
                                        <p class="text-sm text-gray-500">Berlaku hingga:
                                            {{ \Carbon\Carbon::parse($sim->expired_at)->format('d M Y') }}</p>
                                    </div>
                                    <div class="flex gap-2 items-center">
                                        <button type="button" data-modal-target="edit-sim-{{ $sim->id }}"
                                            data-modal-toggle="edit-sim-{{ $sim->id }}"
                                            class=" p-2 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </button>
                                        <div id="edit-sim-{{ $sim->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden fixed inset-0 z-[999] flex items-center justify-center overflow-y-auto">

                                            <div class="relative p-4 w-full max-w-2xl">
                                                <div
                                                    class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">

                                                    <!-- Header -->
                                                    <div
                                                        class="flex items-center justify-between border-b border-default pb-4">
                                                        <h3 class="text-lg font-medium text-heading">Edit SIM</h3>
                                                        <button type="button"
                                                            class="w-9 h-9 flex items-center justify-center"
                                                            data-modal-hide="edit-sim-{{ $sim->id }}">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>

                                                    <form action="{{ route('sim.update', $sim->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="space-y-5 py-4">
                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700 mb-2">Nomor
                                                                    SIM</label>
                                                                <input type="text" name="sim_number"
                                                                    value="{{ $sim->sim_number }}" required
                                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-lime-600">
                                                            </div>
                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700 mb-2">Tipe
                                                                    SIM</label>
                                                                <select name="sim_type"
                                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-lime-600">
                                                                    @foreach (['A', 'B1', 'B2', 'C', 'C1', 'C2'] as $type)
                                                                        <option value="{{ $type }}"
                                                                            @selected($sim->sim_type === $type)>
                                                                            {{ $type }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                                                    Berlaku</label>
                                                                <input type="date" name="expired_at"
                                                                    value="{{ optional($sim->expired_at)->format('Y-m-d') }}"
                                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-lime-600">
                                                            </div>

                                                            <div x-data="{ fileName: '' }">
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700 mb-2">Foto
                                                                    SIM</label>
                                                                <div class="aspect-[16/6] rounded-lg overflow-hidden mb-2">
                                                                    <img src="{{ asset('storage/' . $sim->sim_photo) }}"
                                                                        alt="Current SIM Photo"
                                                                        class="w-full h-full object-cover">
                                                                </div>
                                                                <div class="relative">
                                                                    <input type="file" name="sim_photo"
                                                                        @change="fileName = $event.target.files[0]?.name || ''"
                                                                        class="absolute inset-0 opacity-0 cursor-pointer z-10">

                                                                    <div
                                                                        class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm flex items-center text-gray-500">
                                                                        <i data-feather="image"
                                                                            class="w-5 h-5 text-gray-400 absolute left-3.5"></i>
                                                                        <span
                                                                            x-text="fileName || 'Upload Foto SIM'"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Active -->
                                                            <div class="flex items-center gap-2">
                                                                <input type="checkbox" name="is_active" value="1"
                                                                    @checked($sim->is_active)
                                                                    class="rounded border-gray-300 text-lime-600">
                                                                <label class="text-sm text-gray-700">Aktif</label>
                                                            </div>

                                                        </div>

                                                        <!-- Footer -->
                                                        <div
                                                            class="flex items-center border-t border-default space-x-4 pt-4">
                                                            <button type="submit"
                                                                class="text-white bg-lime-600 hover:bg-lime-700 rounded-base text-sm px-4 py-2.5">
                                                                Update
                                                            </button>
                                                            <button type="button"
                                                                data-modal-hide="edit-sim-{{ $sim->id }}"
                                                                class="bg-neutral-secondary-medium rounded-base text-sm px-4 py-2.5">
                                                                Batal
                                                            </button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('sim.delete', $sim->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 rounded-lg bg-red-100 text-red-600 hover:bg-red-200">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="p-5 border-b border-gray-100">
                        <button type="button" data-modal-target="sim-modal" data-modal-toggle="sim-modal"
                            class="w-full border border-lime-600 text-lime-600 py-3 rounded-lg font-medium hover:bg-lime-700 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-lime-600 focus:ring-offset-2">
                            Tambah SIM
                        </button>
                        @include('partials.modal-add-sim')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
