<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Shipment
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white">
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="ID" sort="" />
                    <x-table.table-header class="text-left" value="Order ID" sort="" />
                    <x-table.table-header class="text-left" value="Date" sort="" />
                    <x-table.table-header class="text-left" value="Status" sort="" />
                    <x-table.table-header class="text-left" value="Payment Status" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            
                        </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            
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