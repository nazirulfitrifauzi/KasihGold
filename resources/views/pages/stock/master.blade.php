<div class="grid grid-cols-12 col-span-12 gap-5 pt-5 mt-5 border-t border-theme-5">
    <h2 class="col-span-6 mr-auto text-lg font-medium ">
        Master List
    </h2>
    <div class="flex justify-end w-full col-span-6 mt-4 sm:w-auto sm:mt-0">
        <a href="#" class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white focus:outline-none">Stock In / Out</a>
    </div>
    <!-- BEGIN: Item List -->
    <div class="col-span-12 intro-y lg:col-span-8">
        <div class="grid grid-cols-12 gap-6">
            <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-no-wrap">
                <div class="relative dropdown" x-data="{open: false}">
                    <button class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white focus:outline-none" @click="open = !open">Actions</button>
                    <div class="absolute z-10 w-40 rounded-lg shadow-lg " x-show="open" style="display: none; top: -17px; left: 90px;">
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
                    <div class="relative w-56  flex text-gray-700">
                        <span class="mt-2 mr-2">Search</span>
                        <x-form.input label="" value="" livewire=""/>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                <x-table.table>
                        <x-slot name="thead">
                            <x-table.table-header class="text-left" value="Date" sort="" livewire=""/>
                            <x-table.table-header class="text-left" value="Stock" sort="" livewire=""/>
                            <x-table.table-header class="text-left" value="Status" sort="" livewire=""/>
                        </x-slot>
                        <x-slot name="tbody">
                            <tr>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    5th November 2020
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    100
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    <div class="flex text-green-500">
                                        <x-heroicon-o-logout class="w-5 h-5 mr-1"/> in
                                    </div>
                                </x-table.table-body>
                            </tr>
                            <tr>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    5th November 2020
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    10
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    <div class="flex text-red-500">
                                        <x-heroicon-o-login class="w-5 h-5 mr-1"/> out
                                    </div>
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
    <!-- END: Item List -->
    <!-- BEGIN: Ticket -->
    <div class="col-span-12 lg:col-span-4">
        <div class="pr-1 intro-y">
            <div class="p-2 box">
                <div class="flex justify-center bg-white p-4 rounded-lg">
                    <a href="#" class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white focus:outline-none mr-2">Serial Number Available</a>
                    <a href="#" class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white focus:outline-none mr-2">Total</a>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="p-2 mt-5 pos__ticket box">
                <a href="javascript:;" class="flex items-center p-3 transition duration-300 ease-in-out bg-white rounded-md cursor-pointer hover:bg-gray-200">
                    <div class="mr-1 truncate pos__ticket__item-name">0089-0095</div>
                    <div class="ml-auto">105</div>
                </a>
                <a href="javascript:;" class="flex items-center p-3 transition duration-300 ease-in-out bg-white rounded-md cursor-pointer hover:bg-gray-200">
                    <div class="mr-1 truncate pos__ticket__item-name">0097-0098</div>
                    <div class="ml-auto">86</div>
                </a>
                <a href="javascript:;" class="flex items-center p-3 transition duration-300 ease-in-out bg-white rounded-md cursor-pointer hover:bg-gray-200">
                    <div class="mr-1 truncate pos__ticket__item-name">0100</div>
                    <div class="ml-auto">23</div>
                </a>
                <a href="javascript:;" class="flex items-center p-3 transition duration-300 ease-in-out bg-white rounded-md cursor-pointer hover:bg-gray-200">
                    <div class="mr-1 truncate pos__ticket__item-name">0074-0075</div>
                    <div class="ml-auto">36</div>
                </a>
                <a href="javascript:;" class="flex items-center p-3 transition duration-300 ease-in-out bg-white rounded-md cursor-pointer hover:bg-gray-200">
                    <div class="mr-1 truncate pos__ticket__item-name">0077</div>
                    <div class="ml-auto">3</div>
                </a>
            </div>
            <div class="flex p-5 mt-5 bg-white rounded-lg">
                <button class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white focus:outline-none mr-2">Total</button>
                <div class="relative w-full text-gray-700">
                    <p type="text" class="w-full  py-1 px-4 text-right bg-gray-200 font-semibold">253</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Ticket -->
</div>