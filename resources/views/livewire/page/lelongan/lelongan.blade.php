<div class="px-4 mb-20 lg:mb-0">
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Lelongan
        </h2>
    </div>
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-12 mt-1">
            <x-form.basic-form wire:submit.prevent="">
                <x-slot name="content">
                    <x-info-alert title="Syarat & Arahan Lelongan">
                        A. Setiap bidaan akan dikenakan caj RM5
                        <br>
                        <div class="pt-1 pl-4 text-sm text-white">
                            <ol class="list-decimal">
                                <li>Sila Pilih barangan yang hendak dibida dengan menekan butang <strong>BIDA</strong>.</li>
                                <li>Masukkan Nilai bidaan di <strong>HARGA BIDA</strong>.</li>
                                <li>Tekan Butang <strong>Tambah BIDA</strong> bagi membida barangan pilihan.</li>
                            </ol>
                        </div>
                    </x-info-alert>

                    <div class="mt-6">
                        <div class="pb-4 border-b">
                            <h1 class="text-lg font-medium">Senarai Lelongan</h1>
                        </div>
                        <div class="p-4 my-6 bg-white rounded-lg shadow-lg">
                            <x-table.table>
                                <x-slot name="thead">
                                    <x-table.table-header class="text-left" value="NO" sort="" />
                                    <x-table.table-header class="text-left" value="NO SIRI" sort="" />
                                    <x-table.table-header class="text-left" value="JENIS MARHUN" sort="" />
                                    <x-table.table-header class="text-left" value="BERAT MARHUN" sort="" />
                                    <x-table.table-header class="text-center" value="KARAT MARHUN" sort="" />
                                    <x-table.table-header class="text-center" value="HARGA REZAB" sort="" />
                                    <x-table.table-header class="text-center" value="BIDA" sort="" />
                                    <x-table.table-header class="text-left" value="TINDAKAN" sort="" />
                                </x-slot>
                                <x-slot name="tbody">
                                    <tr>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            NO
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            NO SIRI
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            JENIS MARHUN
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            BERAT MARHUN
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-right text-gray-700 ">
                                            KARAT MARHUN
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-right text-gray-700 ">
                                            HARGA REZAB
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-center text-gray-700">
                                            BIDA
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <div class="flex items-center">
                                                <a href="#" class="inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                                    <x-heroicon-o-cursor-click class="w-4 h-4 mr-1" />
                                                    <p>Pilih</p>
                                                </a>
                                            </div>
                                        </x-table.table-body>
                                    </tr>
                                </x-slot>
                                <div class="px-2 py-2">
                                    {{-- {{ $list->links('pagination-links') }} --}}
                                </div>
                            </x-table.table>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="pb-4 border-b">
                            <h1 class="text-lg font-medium">Bindaan</h1>
                        </div>
                        <div class="p-4 my-6 bg-white rounded-lg shadow-lg">
                            <x-general.grid mobile="1" gap="5" sm="1" md="4" lg="4" xl="4" class="col-span-12 ">
                                <x-form.input
                                    label="No Siri"
                                    value=""
                                    placeholder=""
                                    wire:model.defer=""
                                />
                                <x-form.input
                                    label="Jenis Marhun"
                                    value=""
                                    placeholder=""
                                    wire:model.defer=""
                                />
                                <x-form.input
                                    label="Harga Bida (RM)"
                                    value=""
                                    placeholder=""
                                    wire:model.defer=""
                                />
                                <div class="flex items-center mt-4 space-x-1">
                                    <a href="#" class="inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                        <x-heroicon-o-plus-circle class="w-4 h-4 mr-1" />
                                        <p>Buat Bindaan</p>
                                    </a>
                                    <a href="#" class="inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600">
                                        <x-heroicon-o-trash class="w-4 h-4 mr-1" />
                                        <p>Buang Bidaan</p>
                                    </a>
                                </div>
                            </x-general.grid>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="pb-4 border-b">
                            <h1 class="text-lg font-medium">Muatnaik Caj Bidaan RM0</h1>
                        </div>
                        <div class="p-4 my-6 bg-white rounded-lg shadow-lg">
                            <x-general.grid mobile="1" gap="5" sm="1" md="2" lg="2" xl="2" class="col-span-12 ">
                                <x-form.input
                                    label="Muat Naik Resit Bayaran Bidaan : (hanya boleh muatnaik jpg/png/jpeg/pdf)"
                                    type="file"
                                    value=""
                                    placeholder=""
                                    wire:model.defer=""
                                />
                            </x-general.grid>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-center p-4 my-6 rounded-lg bg-gray-50">
                            <button  class="inline-flex items-center px-2 py-2 text-xs font-semibold text-white bg-green-400 rounded-lg hover:bg-green-500">
                                <x-heroicon-o-save class="w-4 h-4 mr-1" />
                                <p>Sahkan Bindaan</p>
                            </button>
                        </div>
                    </div>
                </x-slot>
            </x-form.basic-form>

    </x-general.grid>
</div>
