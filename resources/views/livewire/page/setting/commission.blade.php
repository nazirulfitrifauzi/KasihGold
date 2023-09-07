<div class="px-4 sm:p-6 lg:pb-8">
    <div class="py-4">
        <h2 class="flex mb-4 mr-auto text-lg font-medium">
            Commission
        </h2>
        <x-table.table>
            <x-slot name="thead">
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">Item</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex w-32 cursor-pointer">
                        <span class="mr-2">Master Dealer</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex w-32 cursor-pointer">
                        <span class="mr-2">Agent</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">Action</span>
                    </div>
                </th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($items as $key => $item)
                    <tr wire:key="item-{{ $item->id }}">
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                            {{ $item->name }}
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            <x-form.input placeholder="" type="text" label="" value="" wire:model="items.{{ $key }}.md_rate"/>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            <x-form.input placeholder="" type="text" label="" value="" wire:model="items.{{ $key }}.agent_rate"/>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            <button type="button" class="px-5 py-2 text-sm text-center text-white bg-blue-500 rounded shadow-sm focus:outline-none hover:bg-blue-400" wire:click="updateRate({{ $key }}, {{ $item->id }})">
                                Update
                            </button>
                        </x-table.table-body>
                    </tr>
                @endforeach
            </x-slot>
        </x-table.table>
    </div>
</div>