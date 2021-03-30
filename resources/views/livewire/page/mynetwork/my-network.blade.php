<div>
    <div>
        <div class="flex justify between mt-8">
            <h2 class="mr-auto text-lg font-medium">
                Group Summary
            </h2>
            <div class="bg-yellow-400 text-white py-1 px-2">
                <p>PG00214563</p>
            </div>
        </div>
        
        <div class="p-4 mt-4 bg-white">
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Tier" sort="" />
                    <x-table.table-header class="text-left" value="Master Dealer" sort="" />
                    <x-table.table-header class="text-left" value="Dealer" sort="" />
                    <x-table.table-header class="text-left" value="Dropship" sort="" />
                    <x-table.table-header class="text-left" value="Customer" sort="" />
                    <x-table.table-header class="text-left" value="Total" sort="" />
                    

                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="6" class="text-gray-500 text-center">
                            No Downlines
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-gray-500 text-center border-2">
                            -
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-center border-2">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-center border-2">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-center border-2">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-center border-2">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-center border-2">
                            0
                        </x-table.table-body>
                    </tr>
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
            <div class="flex justify-end mt-3 font-semibold">
                <div class="flex space-x-3">
                    <x-heroicon-s-check-circle class="mt-1 w-5 h-5 text-green-500" />
                    <p> Last update on 20 March 2021 06:36pm </p>
                </div>
            </div>
        </div>
    </div>
</div>
