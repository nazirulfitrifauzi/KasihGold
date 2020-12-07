<div class="grid grid-cols-12 col-span-12 gap-5 pt-5 mt-5 border-t border-theme-5">
    <h2 class="col-span-6 mr-auto text-lg font-medium ">
        Master List
    </h2>
    <div class="flex justify-end w-full col-span-6 mt-4 sm:w-auto sm:mt-0" x-data="{ modalOpen4: false}">
        <a href="#" class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none" 
            @click="modalOpen4 = true">Stock In / Out
        </a>
        {{-- Start modal Stock In / Out --}}
        <x-general.modal modalActive="modalOpen4" title="Stock In / Out" modalSize="lg">
            <x-form.basic-form action="">
                <x-slot name="content">
                    <div class="p-4 mt-4 leading-4">
                        <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                            <x-form.input label="Name" value=""/>
                        </div>
                        <div class="flex justify-end">
                            <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none" @click="modalOpen4 = false" >
                                Cancel
                            </button>
                            <button class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none">
                                Submit
                            </button>
                        </div>
                    </div>
                </x-slot>
            </x-form.basic-form>
        </x-general.modal>
        {{-- End Modal Stock In / Out --}}
    </div>
    <!-- BEGIN: Item List -->
    <div class="col-span-12 intro-y lg:col-span-8">
        <div class="grid grid-cols-12 gap-6">
            <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-no-wrap">
                <div class="relative dropdown" x-data="{open: false}">
                    <button class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none" @click="open = !open">Actions</button>
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
                    <div class="relative flex w-56 text-gray-700">
                        <span class="mt-2 mr-2">Search</span>
                        <x-form.input label="" value=""/>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                <x-table.table>
                        <x-slot name="thead">
                            <x-table.table-header class="text-left" value="Date" sort=""/>
                            <x-table.table-header class="text-left" value="Stock" sort=""/>
                            <x-table.table-header class="text-left" value="Status" sort=""/>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($masters as $master)
                                <tr>
                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                        {{ $master->created_at->format('jS F Y') }}
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                        {{ number_format($master->unit,0) }}
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                        <div class="flex {{ ($master->code == 1) ? 'text-green-500' : 'text-red-500' }}">
                                            @if ($master->code == 1)
                                                <x-heroicon-o-login class="w-4 h-4 mr-2"/> In
                                            @else
                                                <x-heroicon-o-logout class="w-4 h-4 mr-2"/> Out
                                            @endif
                                        </div>
                                    </x-table.table-body>
                                </tr>
                            @endforeach
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
                <div class="flex justify-between p-4 bg-white rounded-lg shadow">
                    <a href="#" class="flex px-4 py-1 mr-2 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none">Serial Number Available</a>
                    <a href="#" class="flex px-4 py-1 mr-2 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none">Total</a>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="p-2 mt-5 pos__ticket box">
                <div class="shadow">
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
            </div>
            <div class="p-2">
                <div class="flex p-5 mt-5 bg-white rounded-lg shadow">
                    <button class="flex px-4 py-1 mr-2 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none">Total</button>
                    <div class="relative w-full text-gray-700">
                        <p type="text" class="w-full px-4 py-1 font-semibold text-right bg-gray-200">253</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Ticket -->
</div>