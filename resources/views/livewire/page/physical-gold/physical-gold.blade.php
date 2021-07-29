<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Physical Gold Details
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white mb-20 sm:mb-0">
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 mb-6">
                <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                    <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-lg">
                                    <p>Total Grams</p>
                                    <p class="text-base">2.03 g</p>
                                </div>
                            </div>
                        </div>
                </x-general.price-card>
                <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                    <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-lg">
                                    <p>Total Convertable 1g Gold</p>
                                    <p class="text-base">Upto 2 pcs</p>
                                </div>
                            </div>
                        </div>
                </x-general.price-card>
                <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                    <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-lg">
                                    <p>Total Convertable 0.25g Gold</p>
                                    <p class="text-base">Upto 8 pcs</p>
                                </div>
                            </div>
                        </div>
                </x-general.price-card>
            </x-general.grid>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Grams" sort="" />
                    <x-table.table-header class="text-left" value="Price Bought" sort="" />
                    <x-table.table-header class="text-left" value="Price Now" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>1 g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 241.00</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 252.00</p>
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>1 g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 241.00</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 252.00</p>
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>0.01 g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 2.52</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 2.52</p>
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>0.01 g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 2.52</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 2.52</p>
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>0.01 g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 2.52</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 2.52</p>
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

