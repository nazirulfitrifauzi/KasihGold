<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Physical Gold Conversion Details
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
                                    <p class="text-base">{{$totalGrammage}} g</p>
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
                                    <p>Total Converted 1g Gold Pieces</p>
                                    <p class="text-base">{{$one_gram}} pcs</p>
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
                                    <p>Total Converted 0.25g Gold Pieces</p>
                                    <p class="text-base">{{$quarter_gram}} pcs</p>
                                </div>
                            </div>
                        </div>
                </x-general.price-card>
            </x-general.grid>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Reference Number" sort="" />
                    <x-table.table-header class="text-left" value="1g Gold Pieces" sort="" />
                    <x-table.table-header class="text-left" value="0.25g Gold Pieces" sort="" />
                    <x-table.table-header class="text-left" value="Conversion Date" sort="" />
                </x-slot>
                <x-slot name="tbody">
                @forelse ($exit as $item)   
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{$item->ref_payment}}</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{$item->one_gram}} Pcs</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{$item->quarter_gram}} Pcs</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{ $item->created_at->format('d F Y') }}</p>
                        </x-table.table-body>
                    </tr>
                @empty 
                    <tr>
                        <x-table.table-body colspan="4" class="text-center text-gray-500">
                            No Pending Transaction
                        </x-table.table-body>
                    </tr>
                @endforelse
                </x-slot>
                <div class="px-2 py-2">
                    {{ $exit->links('pagination-links') }}
                </div>
            </x-table.table>
        </div>
    </div>
</div>

