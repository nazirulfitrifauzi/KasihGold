<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Physical Gold Details
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white">
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 mb-6">
                <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                    <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-xl">
                                    <p>Total Grams</p>
                                    <p class="text-lg">4.03 g</p>
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
                                <div class="text-xl">
                                    <p>Total Price Bought</p>
                                    <p class="text-lg">RM 968.13</p>
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
                                <div class="text-xl">
                                    <p>Total Price Now</p>
                                    <p class="text-lg">RM 1015.17</p>
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
                            <p>2.5g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 631.73</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 687.17</p>
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

