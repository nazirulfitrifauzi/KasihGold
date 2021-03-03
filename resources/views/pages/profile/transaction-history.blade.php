<x-general.card class="mt-5 bg-white shadow-lg">
    <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
        <h2 class="mr-auto text-base font-medium">
            Transaction history
        </h2>
    </div>
    <div class="flex flex-col gap-2 px-4 py-4">
        @if (!$movement->isEmpty())
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="ITEM" sort=""/>
                    <x-table.table-header class="text-left" value="SUPPLIER" sort=""/>
                    <x-table.table-header class="text-left" value="STATUS" sort=""/>
                    <x-table.table-header class="text-left" value="MOVEMENT" sort=""/>
                    <x-table.table-header class="text-left" value="DATE" sort=""/>
                    <x-table.table-header class="text-left" value="ACTIONS" sort=""/>
                </x-slot>
                <x-slot name="tbody">
                    @foreach($movement as $movemen)
                        <tr>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $movemen->item->name }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $movemen->supplier->name }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($movemen->status == 1) ? "IN" : "OUT" }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                <p class="text-xs text-gray-400">{{ ($movemen->status == 1) ? "FROM" : "TO" }}</p>
                                <p>
                                    @if ($movemen->status == 1)
                                        {{ $movemen->from_user->name }}
                                    @else
                                        {{ $movemen->to_user->name }}
                                    @endif
                                </p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium tracking-wider text-gray-700">
                                {{ date('d M Y', strtotime($movemen->created_at)) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                <div class="flex">
                                    <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1 text-blue-500"/>
                                    <p class="text-blue-500">Edit</p>
        
                                    <x-heroicon-o-trash class="w-5 h-5 ml-3 mr-1 text-red-500"/>
                                    <p class="text-red-500">Delete</p>
                                </div>
                            </x-table.table-body>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table.table>
        @endif
    </div>
</x-general.card>