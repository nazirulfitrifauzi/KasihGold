
<div class="grid grid-cols-12 gap-6"  x-data="{ active: 0 }">
    <!-- BEGIN: Insurance Categories -->
    <div class="flex col-span-12 lg:col-span-4 xxl:col-span-3 lg:block">
            <x-general.card class="bg-white shadow-lg w-full">
                <div class="relative flex items-center p-5">
                    <div class="ml-4 mr-auto">
                        <div class="text-base font-medium">Insurance Categories</div>
                    </div>
                </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-tab.title name="0" livewire="">
                            <div class="flex font-semibold">
                                <x-heroicon-o-archive class="w-6 h-6 mr-2"/>Insurance Item
                            </div>
                        </x-tab.title>
                    </div>
            </x-general.card>
        </div>
        <!-- END: Insurance Categories -->


        <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
            {{-- Start Insurance Item --}}
            <x-tab.content name="0">
                <x-general.card class="mt-5 bg-white shadow-lg">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Insurance Item
                        </h2>
                    </div>
                    <div class="px-4 py-2">
                        <div class="col-span-12 intro-y lg:col-span-8">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-no-wrap">
                                    <div class="relative dropdown" x-data="{open: false}">
                                        <button class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none" @click="open = !open">Actions</button>
                                        <div class="absolute z-10 w-40 rounded-lg shadow-lg bg-white" x-show="open" style="display: none; top: -17px; left: 90px;">
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
                                        <x-form.search-input/>
                                    </div>
                                </div>
                                <!-- BEGIN: Data List -->
                                <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                                    <x-table.table>
                                            <x-slot name="thead">
                                                <x-table.table-header class="text-left" value="No" sort=""/>
                                                <x-table.table-header class="text-left" value="Agent" sort=""/>
                                                <x-table.table-header class="text-left" value="Amount" sort=""/>
                                                <x-table.table-header class="text-left" value="Date" sort=""/>
                                            </x-slot>
                                            <x-slot name="tbody">
                                                <tr>
                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    1
                                                    </x-table.table-body>

                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    Agent 1
                                                    </x-table.table-body>

                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    RM 50,000.00
                                                    </x-table.table-body>

                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    12-12-2018
                                                    </x-table.table-body>
                                                </tr>
                                                <tr>
                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    2
                                                    </x-table.table-body>

                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    Agent 2
                                                    </x-table.table-body>

                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    RM 50,000.00
                                                    </x-table.table-body>

                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                    12-12-2019
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
                </x-general.card>
            </x-tab.content>
            {{-- End Insurance Item --}}
        </div>
</div>
