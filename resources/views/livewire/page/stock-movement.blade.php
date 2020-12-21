<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Stock Movement
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white">
            <div class="flex justify-between my-4">
                <div wire:loading>
                    <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                        style="left: 50%; top:50%">
                        <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                        <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="mr-2 -mt-3 text-base text-gray-500">Search: </span>
                    <x-form.input label="" value="" wire:model="" />
                </div>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="REF" sort="" />
                    {{-- <x-table.table-header class="text-left" value="DATE" sort="" /> --}}
                    <x-table.table-header class="text-left" value="SUPPLIER / CUSTOMER NAME" sort="" />
                    <x-table.table-header class="text-left" value="PCS" sort="" />
                    <x-table.table-header class="text-left" value="SERIAL NUMBER" sort="" />
                    <x-table.table-header class="text-left" value="SHIPMENT DATE" sort="" />
                    <x-table.table-header class="text-left" value="TRACKING NUMBER" sort="" />
                    <x-table.table-header class="text-left" value="STATUS / REMARKS" sort="" />
                    <x-table.table-header class="text-left" value="TOTAL OUT" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($data as $item)
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                {{ $item->id }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                @if ($item->supplier_id != NULL)
                                    {{ $item->supplier->name }}
                                @else
                                    @if ($item->status == 1) <!-- in -->
                                        {{ $item->from_user->name}}
                                    @else   <!-- out -->
                                        {{ $item->to_user->name }}
                                    @endif
                                @endif
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                {{ $item->unit }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                {{ $item->serial_no }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                {{ $item->shipment_date }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                {{ $item->tracking_no }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                @if ($item->status == 1)
                                    <div class="flex">
                                        <x-heroicon-o-login class="w-6 h-6 mr-2 text-green-400" />
                                        <p class="text-green-400">In</p>
                                    </div>
                                @else
                                    <div class="flex">
                                        <x-heroicon-o-logout class="w-6 h-6 mr-2 text-red-600" />
                                    <p class="text-red-600">Out</p>
                                </div>
                                @endif
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                {{ $item->total_out }}
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