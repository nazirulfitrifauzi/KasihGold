<div>
    <div>
        <div class="flex mt-8 justify between">
            <h2 class="mr-auto text-lg font-medium">
                Group Summary
            </h2>
            <div class="px-2 py-1 text-white bg-yellow-400">
                <p>PG00214563</p>
            </div>
        </div>

        <div class="p-4 mt-4 bg-white mb-20 sm:mb-0">
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
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            1
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            1
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            15
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            9
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            38
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            63
                        </x-table.table-body>
                        {{-- <x-table.table-body colspan="6" class="text-center text-gray-500">
                            No Downlines
                        </x-table.table-body> --}}
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            2
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            7
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            5
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            12
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            24
                        </x-table.table-body>
                        {{-- <x-table.table-body colspan="6" class="text-center text-gray-500">
                            No Downlines
                        </x-table.table-body> --}}
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-center text-gray-500 border-2">
                            -
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500 border-2">
                            1
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500 border-2">
                            22
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500 border-2">
                            14
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500 border-2">
                            50
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500 border-2">
                            87
                        </x-table.table-body>
                    </tr>
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
            <div class="flex justify-end mt-3 font-semibold">
                <div class="flex space-x-3">
                    <x-heroicon-s-check-circle class="w-5 h-5 mt-1 text-green-500" />
                    <p> Last update on 20 March 2021 06:36pm </p>
                </div>
            </div>
        </div>
    </div>
</div>
