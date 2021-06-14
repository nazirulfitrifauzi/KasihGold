<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="flex mr-auto text-lg font-medium">
            Stock Management
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
        <div class="grid grid-cols-12 col-span-12 gap-5  border-t border-theme-5 pt-4">
            <div class="flex space-x-2 col-span-12">
                <h2 class="text-lg font-medium">
                    Gold Bar List
                </h2>
                <div class="flex items-center mx-2 cursor-pointer" x-data="{ openModal: false}">
                    <x-heroicon-o-plus-circle class="w-6 h-6 text-green-400 hover:text-green-500" @click="openModal = true"/>
                    {{-- Start modal --}}
                        <x-general.modal modalActive="openModal" title="Stock Management" modalSize="2xl">
                            <div x-data="{ active: 0 }">
                                <div class="flex w-full my-2 bg-gray-100 shadow-sm">
                                    <x-tab.nav-tab name="0" livewire="">
                                        <div class="flex font-medium">
                                            <x-heroicon-o-clipboard-list class="w-6 h-6 mr-2"/>Serial Number
                                        </div>
                                    </x-tab.nav-tab>
                                </div>
                                <!-- Start Add Category -->
                                <x-tab.nav-content name="0">
                                    <x-form.basic-form wire:submit.prevent="">
                                        <x-slot name="content">
                                            <div class="p-4 leading-4">
                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                    <x-form.input  label="Serial Number" value="addSerialNumber" wire:model=""/>
                                                    <x-form.input  label="Total Weight" value="addTotalWeight" wire:model=""/>
                                                </div>
                                                <div class="flex justify-end mt-4">
                                                    <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </x-slot>
                                    </x-form.basic-form>
                                </x-tab.nav-content>
                                <!-- End Add Category -->
                            </div>
                        </x-general.modal>
                    {{-- End modal --}}
                </div>
            </div>
            <!-- BEGIN: Item List -->
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-12 ">
                <div class="flex justify-start bg-white rounded-lg border-2 mb-6 py-6 px-4 overflow-y-auto">
                    <div class="flex items-center  flex-auto ">
                        <x-gold.goldview type="1kg" percentage="57" totalGram="437.04" reachGram="562.96" />
                        <x-gold.goldview type="1kg" percentage="57" totalGram="437.04" reachGram="562.96" />
                    </div>
                </div>
            </x-general.grid>

            {{-- <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-12 bg-white rounded-lg border-2 mb-6 py-6">
                <div class="flex items-center  flex-auto ">
                    <x-gold.goldview type="1kg" percentage="57" totalGram="437.04" reachGram="562.96" />
                </div>
                <div class="flex items-center  flex-auto ">
                    <x-gold.goldview type="1kg" percentage="57" totalGram="437.04" reachGram="562.96" />
                </div>
            </x-general.grid> --}}
            
            <div class="col-span-12 intro-y">
                <div class="grid grid-cols-12 gap-6">
                    <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-no-wrap">
                        <div class="relative dropdown" x-data="{open: false}">
                            <div class="absolute z-40 w-40 rounded-lg shadow-lg " x-show="open" style="display: none; top: -17px; left: 90px;">
                                <div class="py-4">
                                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                                    <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to Excel
                                    </a>
                                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                                    <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 sm:w-auto sm:mt-0 sm:ml-auto">
                            <div class="relative flex w-56 text-gray-700">
                                <span class="mt-3 mr-2">Search</span>
                                <x-form.input label="" value=""/>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN: Data List -->
                    <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                        <x-table.table>
                                <x-slot name="thead">
                                    <x-table.table-header class="text-left" value="No" sort=""/>
                                    <x-table.table-header class="text-left" value="Serial Number" sort=""/>
                                    <x-table.table-header class="text-left" value="Weight Occupied" sort=""/>
                                    <x-table.table-header class="text-left" value="Weight Vacant" sort=""/>
                                    <x-table.table-header class="text-left" value="Created Date" sort=""/>
                                </x-slot>
                                <x-slot name="tbody">
                                        <tr>
                                            <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                1
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                001/001/001/K45621
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                463.7 g
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                536.3 g
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                30/03/2021
                                            </x-table.table-body>
                                            
                                        </tr>
                                </x-slot>
                        </x-table.table>
                    </div>
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                    <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-row sm:flex-no-wrap">
                        {{-- {{ $list->links('pagination::tailwind') }} --}}
                    </div>
                    <!-- END: Pagination -->
                </div>
            </div>
        </div>
    </div>

    {{-- loading --}}
        {{-- <div wire:loading wire:target="submit">
            <x-loading.global-loading />
        </div> --}}
</div>
