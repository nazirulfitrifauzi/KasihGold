<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Digital Gold Details
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white">

            <div class="flex flex-row p-4 mb-10 bg-gray-300 rounded-md shadow-lg">
                <div class="flex items-center justify-center flex-auto ">
                    <x-gold.goldview type="1g" percentage="25"/>
                </div>
                <div class="flex flex-col flex-auto mr-5">
                    <h1 class="text-base font-bold">My Gold</h1>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Total Grams</p>
                                        <p class="text-lg">RM 500.00</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Total Price Bought</p>
                                        <p class="text-lg">RM 300.00</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Total Price Now</p>
                                        <p class="text-lg">RM 200.00</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                </div>
                <div class="flex flex-col flex-auto ">
                    <h1 class="text-base font-bold">Exit / Sell</h1>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-refresh class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Change Physical</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-cash class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Outright</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-library class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Buy Back</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                </div>
            </div>

            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Grams" sort="" />
                    <x-table.table-header class="text-left" value="Price Bought" sort="" />
                    <x-table.table-header class="text-left" value="Price Now" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>2.5g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 300.00</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 200.00</p>
                        </x-table.table-body>
                    </tr>
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>
    </div>
</div>
