<div>
    <div>
        <div class="flex mt-8 justify between">
            <h2 class="mr-auto text-lg font-medium">
                Commission
            </h2>
        </div>
        <div class="p-4 mt-4 bg-white">
            <div class="px-4 py-1 text-white bg-yellow-400">
                <p class="text-lg font-bold">Tier Tree Details</p>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Tier" sort="" />
                    <x-table.table-header class="text-left" value="PG CODE" sort="" />
                </x-slot>

                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            0456734221345
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            1
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            0356534221355
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            2
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            0156234221232
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-left text-white bg-gray-500">
                            Total Sales Profit
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-white bg-gray-500">
                            RM 539.00
                        </x-table.table-body>
                    </tr>
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>

        <div class="p-4 mt-4 bg-white">
            <div class="px-4 py-1 text-white bg-yellow-400">
                <p class="text-lg font-bold">No of Recruitment</p>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Tier" sort="" />
                    <x-table.table-header class="text-left" value="PG CODE" sort="" />
                    <x-table.table-header class="text-left" value="Campaign Reward" sort="" />
                </x-slot>

                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            0
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            0456734221345
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-center text-gray-500">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-green-400" />
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            1
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-gray-500">
                            0356534221355
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-gray-500"/>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-left text-white bg-gray-500">
                            Rewards Earned
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-white bg-gray-500">
                            0.5 Gram
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-left text-white bg-gray-500">
                            RM 100.00
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
