<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Purchase History
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white mb-20 sm:mb-0">
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Items" sort="" />
                    <x-table.table-header class="text-left" value="Price (RM)" sort="" />
                    <x-table.table-header class="text-left" value="Purchase Date" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($history as $item)
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>Kasih Digital Gold {{ number_format($item->weight,2) }}g</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ number_format($item->bought_price,2) }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $item->created_at->format('d F Y') }}</p>
                            </x-table.table-body>
                        </tr>
                    @endforeach
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>
    </div>
</div>
