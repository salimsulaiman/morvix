<div id="sim-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-[999] flex items-center justify-center overflow-y-auto">

    <div class="relative p-4 w-full max-w-2xl">
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">

            <!-- Header -->
            <div class="flex items-center justify-between border-b border-default pb-4">
                <h3 class="text-lg font-medium text-heading">Tambah SIM</h3>
                <button type="button" class="w-9 h-9 flex items-center justify-center" data-modal-hide="sim-modal">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('sim.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-5 py-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor SIM</label>
                        <div class="relative">
                            <input type="text" name="sim_number" placeholder="Nomor SIM" required
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-lime-600">
                            <i data-feather="file-text" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe SIM</label>
                        <div class="relative">
                            <select name="sim_type"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-lime-600">
                                <option value="">Pilih Tipe SIM</option>
                                <option value="A">A</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="C">C</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                            </select>
                            <i data-feather="layers" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Berlaku</label>
                        <div class="relative">
                            <input type="date" name="expired_at"
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-lime-600">
                            <i data-feather="calendar" class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5"></i>
                        </div>
                    </div>
                    <div x-data="{ fileName: '' }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto SIM</label>
                        <div class="relative">
                            <input type="file" name="sim_photo"
                                @change="fileName = $event.target.files[0]?.name || ''"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10">

                            <div
                                class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm flex items-center text-gray-500">
                                <i data-feather="image" class="w-5 h-5 text-gray-400 absolute left-3.5"></i>
                                <span x-text="fileName || 'Upload Foto SIM'"></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" value="1" checked
                            class="rounded border-gray-300 text-lime-600 focus:ring-lime-600">
                        <label class="text-sm text-gray-700">Aktif</label>
                    </div>

                </div>

                <div class="flex items-center border-t border-default space-x-4 pt-4">
                    <button type="submit"
                        class="text-white bg-lime-600 hover:bg-lime-700 rounded-base text-sm px-4 py-2.5">
                        Simpan
                    </button>
                    <button type="button" data-modal-hide="sim-modal"
                        class="bg-neutral-secondary-medium rounded-base text-sm px-4 py-2.5">
                        Batal
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
