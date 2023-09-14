<div class="px-4 mb-20 lg:mb-0">
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Lelongan
        </h2>
    </div>
    <div class="relative grid grid-cols-12 gap-2">
        <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-8 ">
            <div>
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
                    <div class="my-6 bg-white rounded-lg shadow-lg ">
                        <x-table.table>
                            <x-slot name="thead">
                                <x-table.table-header class="text-center" value="NO" sort="" />
                                <x-table.table-header class="text-left" value="NO SIRI" sort="" />
                                <x-table.table-header class="text-left" value="JENIS MARHUN" sort="" />
                                <x-table.table-header class="text-left" value="BERAT MARHUN" sort="" />
                                <x-table.table-header class="text-center" value="KARAT MARHUN" sort="" />
                                <x-table.table-header class="text-center" value="HARGA REZAB" sort="" />
                                <x-table.table-header class="text-center" value="TINDAKAN" sort="" />
                            </x-slot>
                            <x-slot name="tbody">
                                @php
                                    $page = $lelong->currentPage();
                                    $startIndex = ($page - 1) * 10;
                                @endphp

                                @foreach ($lelong as $list)
                                    <tr class="bg-indigo-50">
                                        <x-table.table-body-lowpadding class="text-xs font-bold text-center text-gray-700">
                                            {{ $startIndex + $loop->iteration }}
                                        </x-table.table-body-lowpadding>
                                        <x-table.table-body-lowpadding class="text-xs font-bold text-gray-700 ">
                                            {{ $list->SIRI_NO }}
                                        </x-table.table-body-lowpadding>
                                        <td colspan="3"></td>
                                        <x-table.table-body-lowpadding colspan="" class="text-xs font-bold text-right text-gray-700 ">
                                            RM {{ number_format($list->AMT_REZAB, 2) }}
                                        </x-table.table-body-lowpadding>
                                        <x-table.table-body-lowpadding colspan="" class="text-xs font-bold text-gray-700 ">
                                            <div class="flex items-center justify-center">
                                                <a href="#" class="inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
                                                    <x-heroicon-o-cursor-click class="w-4 h-4 mr-1" />
                                                    <p>Pilih</p>
                                                </a>
                                            </div>
                                        </x-table.table-body-lowpadding>
                                    </tr>

                                    <!-- Display the associated pawnDetails -->
                                    @foreach($list->pawnDetails as $index => $pawnDetail)
                                        <tr>
                                            <td colspan="2"></td> <!-- Empty columns for alignment -->
                                            <x-table.table-body-lowpadding colspan="" class="text-xs font-medium text-gray-700 ">
                                                {{ optional($pawnDetail->marhunType)->MARHUN_TYPE }}
                                            </x-table.table-body-lowpadding>
                                            <x-table.table-body-lowpadding colspan="" class="text-xs font-medium text-gray-700 ">
                                                {{ $pawnDetail->WEIGHT }} gram
                                            </x-table.table-body-lowpadding>
                                            <x-table.table-body-lowpadding colspan="" class="text-xs font-medium text-right text-gray-700 ">
                                                {{ $pawnDetail->KARAT }}
                                            </x-table.table-body-lowpadding>
                                            <td colspan="2"></td> <!-- Empty column for alignment -->
                                        </tr>
                                    @endforeach
                                @endforeach
                            </x-slot>

                            <div class="px-2 py-2">
                                {{ $lelong->links('pagination-links') }}
                            </div>
                        </x-table.table>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative col-span-12 p-4 sm:col-span-12 md:col-span-5 lg:col-span-4">

            <div class="sticky top-4 ">
                <div class="mt-2">
                    <div class="pb-4 border-b">
                        <h1 class="text-lg font-medium">Bindaan</h1>
                    </div>
                    <div class="p-4 my-6 bg-white rounded-lg shadow-lg">
                        <x-general.grid mobile="1" gap="2" sm="1" md="1" lg="1" xl="1" class="col-span-12 ">
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
                            <div class="flex items-center mt-2 space-x-1">
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
                        <x-general.grid mobile="1" gap="5" sm="1" md="2" lg="1" xl="1" class="col-span-12 ">
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
            </div>
        </div>
    </div>
</div>
