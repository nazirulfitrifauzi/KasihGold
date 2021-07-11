<div class="px-4 sm:p-6 lg:pb-8">
    <div class="py-4">
        <h2 class="flex mb-4 mr-auto text-lg font-medium">
            Market Prices for {{ now()->format('jS \o\f F, Y') }}
        </h2>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('info'))
        <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('success'))
        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('warning'))
        <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}" />
        @endif
        <x-form.basic-form wire:submit.prevent="submit">
            <x-slot name="content">
                <div class="flex items-center mb-4">
                    <label class="block text-sm font-semibold leading-5 text-gray-700 mr-2 {{ ($errors->has($start_date)) ? 'text-red-700' : ''}}">Start Date :</label>
                    <x-form.input type="date" label="" value="start_date" wire:model="start_date"/>
                    <label class="block text-sm font-semibold leading-5 text-gray-700 mr-2 ml-4 {{ ($errors->has($end_date)) ? 'text-red-700' : ''}}">End Date :</label>
                    <x-form.input type="date" label="" value="end_date" wire:model="end_date"/>
                </div>
                <x-table.table>
                    <x-slot name="thead">
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            <div class="flex cursor-pointer">
                                <span class="mr-2">Product</span>
                            </div>
                        </th>
                        <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            <div class="flex w-40 cursor-pointer">
                                <span class="mr-2">Price (RM)</span>
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
                                    <x-form.input type="hidden" label="" value="" wire:model="items.{{ $key }}"/>
                                    <x-form.input type="hidden" label="" value="" wire:model="items.{{ $key }}.id"/>
                                    <x-form.input type="text" label="" value="items.{{ $key }}.price" wire:model="items.{{ $key }}.price"/>
                                </x-table.table-body>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                        Submit
                    </button>
                </div>
            </x-slot>
        </x-form.basic-form>
    </div>
</div>