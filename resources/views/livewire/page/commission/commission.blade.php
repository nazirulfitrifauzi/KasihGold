<div>
    <div>
        <div class="flex justify between mt-8">
            <h2 class="mr-auto text-lg font-medium">
                Commission
            </h2>
        </div>
        
        <div class="p-4 mt-4 bg-white">
            <div class="bg-yellow-400 py-1 px-4 text-white">
                <p><span class="font-bold text-lg">-</span> Tier Tree Details</p>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Tier" sort="" />
                    <x-table.table-header class="text-left" value="PG CODE" sort="" />
                </x-slot>
                
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-gray-500 text-left">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-left">
                            0456734221345
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-gray-500 text-left">
                            1
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-left">
                            0356534221355
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-gray-500 text-left">
                            2
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-gray-500 text-left">
                            0156234221232
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
