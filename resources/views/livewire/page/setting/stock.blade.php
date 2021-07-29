<div class="px-4 py-6 sm:p-6 lg:pb-8">
    {{-- Category --}}
    <div>
        <h2 class="flex mb-4 mr-auto text-lg font-medium">
            Add Category
        </h2>
        <x-table.table>
            <x-slot name="thead">
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">No.</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer  w-32">
                        <span class="mr-2">Category Code</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer  w-32">
                        <span class="mr-2">Category Name</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">Action</span>
                    </div>
                </th>
            </x-slot>
            <x-slot name="tbody">
                @forelse ($categories as $category)
                    <tr>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $loop->iteration }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $category->code }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $category->name }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 "/>
                    </tr>
                @empty
                    <tr>
                        <x-table.table-body colspan="4" class="text-sm italic font-medium tracking-wider text-gray-400">
                            No category data has been registered.
                        </x-table.table-body>
                    </tr>
                @endforelse

                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-heroicon-o-plus-circle class="w-6 h-6 text-green-400 hover:text-green-500"/>
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="ic" wire:model="categoryCode"/>
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="ic" wire:model="categoryName"/>
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="flex items-center gap-5 text-sm font-medium text-gray-700">
                        <button type="button" class="px-5 py-2 text-sm text-center text-white bg-blue-500 rounded shadow-sm focus:outline-none hover:bg-blue-400" wire:click="addCategory">Add Category</button>
                    </x-table.table-body>
                </tr>
            </x-slot>
        </x-table.table>
    </div>

    {{-- Type --}}
    <div class="py-4">
        <h2 class="flex mb-4 mr-auto text-lg font-medium">
            Add Type
        </h2>
        <x-table.table>
            <x-slot name="thead">
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">No.</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer  w-52">
                        <span class="mr-2">Parent Category</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer  w-32">
                        <span class="mr-2">Type Code</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer w-32">
                        <span class="mr-2">Type Name</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer w-52">
                        <span class="mr-2">Purity</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">Action</span>
                    </div>
                </th>
            </x-slot>
            <x-slot name="tbody">
                @forelse ($types as $type)
                    <tr>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $loop->iteration }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $type->category->name }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $type->code }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $type->name }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $type->purity }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 "/>
                    </tr>
                @empty
                    <tr>
                        <x-table.table-body colspan="6" class="text-sm italic font-medium tracking-wider text-gray-400">
                            No type data has been registered.
                        </x-table.table-body>
                    </tr>
                @endforelse

                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-heroicon-o-plus-circle class="w-6 h-6 text-green-400 hover:text-green-500"/>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.dropdown label="" value="" default="no" wire:model="typeParent">
                            <option value="0" selected>Select Parent Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                            @endforeach
                        </x-form.dropdown>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="typeCode" wire:model="typeCode"/>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="typeName" wire:model="typeName"/>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="typePurity" wire:model="typePurity"/>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="flex items-center gap-5 text-sm font-medium text-gray-700">
                        <button type="button" class="px-5 py-2 text-sm text-center text-white bg-blue-500 rounded shadow-sm focus:outline-none hover:bg-blue-400" wire:click="addType">Add Type</button>
                    </x-table.table-body>
                </tr>
            </x-slot>
        </x-table.table>
    </div>

    {{-- Item --}}
    <div class="py-4">
        <h2 class="flex mb-4 mr-auto text-lg font-medium">
            Add Item
        </h2>
        <x-table.table>
            <x-slot name="thead">
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">No.</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer  w-52">
                        <span class="mr-2">Parent Type</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer  w-32">
                        <span class="mr-2">Item Code</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer w-32">
                        <span class="mr-2">Item Name</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">Action</span>
                    </div>
                </th>
            </x-slot>
            <x-slot name="tbody">
                @forelse ($items as $item)
                    <tr>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $loop->iteration }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $item->type->category->name }} - {{ $item->type->name }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $item->code }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $item->name }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 "/>
                    </tr>
                @empty
                    <tr>
                        <x-table.table-body colspan="5" class="text-sm italic font-medium tracking-wider text-gray-400">
                            No item data has been registered.
                        </x-table.table-body>
                    </tr>
                @endforelse

                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-heroicon-o-plus-circle class="w-6 h-6 text-green-400 hover:text-green-500"/>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.dropdown label="" value="" default="no" wire:model="itemParent">
                            <option value="0" selected>Select Parent Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ ucwords($type->category->name) }} - {{ ucwords($type->name) }}</option>
                            @endforeach
                        </x-form.dropdown>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="itemCode" wire:model="itemCode"/>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="itemName" wire:model="itemName"/>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="flex items-center gap-5 text-sm font-medium text-gray-700">
                        <button type="button" class="px-5 py-2 text-sm text-center text-white bg-blue-500 rounded shadow-sm focus:outline-none hover:bg-blue-400" wire:click="addItem">Add Item</button>
                    </x-table.table-body>
                </tr>
            </x-slot>
        </x-table.table>
    </div>
</div>