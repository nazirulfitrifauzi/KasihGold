<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Stock Movement
            </h2>
        </div>

        <div class="mt-8 bg-white p-4">
            <div class="flex justify-between my-4">
                <div wire:loading>
                    <div class="flex items-center justify-center text-white absolute bg-yellow-400 p-4 rounded"
                        style="left: 50%; top:50%">
                        <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                        <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="mr-2 text-base text-gray-500 -mt-3">Search: </span>
                    <x-form.input label="" value="" wire:model="" />
                </div>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="REF" sort="" />
                    <x-table.table-header class="text-left" value="DATE" sort="" />
                    <x-table.table-header class="text-left" value="CUSTOMER NAME" sort="" />
                    <x-table.table-header class="text-left" value="PCS" sort="" />
                    <x-table.table-header class="text-left" value="SERIAL NUMBER" sort="" />
                    <x-table.table-header class="text-left" value="SHIPMENT DATE" sort="" />
                    <x-table.table-header class="text-left" value="TRACKING NUMBER" sort="" />
                    <x-table.table-header class="text-left" value="STATUS / REMARKS" sort="" />
                    <x-table.table-header class="text-left" value="TOTAL OUT" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            000001
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            01-OCT
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            Muhammad Amin Bin Ali
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            4
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            090202
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            08-OCT
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            86728111
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            <div class="flex">
                            <x-heroicon-o-login class="h-6 w-6 mr-2 text-green-400" />
                            <p class="text-green-400">In</p>
                            {{-- <x-heroicon-o-logout class="h-6 w-6 mr-2 text-red-600" />
                            <p class="text-red-600">Out</p> --}}
                            </div>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class=" text-xs font-medium text-gray-700">
                            10
                        </x-table.table-body>
                    </tr>
                </x-slot>
                <div class="py-2 px-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>
    </div>
</div>