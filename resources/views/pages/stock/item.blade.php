
<div class="col-span-12 pt-5 border-t border-gray-300 intro-y">
    <div class="flex flex-col items-center intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Item List
        </h2>
        <div class="flex w-full mt-4 sm:w-auto sm:mt-0" x-data="{ modalOpen1: false}">
            <a href="#" class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer" @click="modalOpen1 = true" >
                Add Item
            </a>

            {{-- Start modal Add Items --}}
            <x-general.modal modalActive="modalOpen1" title="Add New Items" modalSize="2xl">
                <x-form.basic-form wire:submit.prevent="addItem">
                    <x-slot name="content">
                        <div class="p-4 mt-4 leading-4">
                            <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                <x-form.dropdown label="Type" value="addItemTypeId" default="yes" wire:model="addItemTypeId">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }} {{ ($type->brand != null) ? $type->brand : '' }}</option>
                                    @endforeach
                                </x-form.dropdown>
                                <x-form.dropdown label="Supplier" value="addItemSupplier" default="yes" wire:model="addItemSupplier">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </x-form.dropdown>
                                <x-form.input label="Name" value="addItemName" wire:model="addItemName" />
                                <x-form.input label="Weight" value="addItemWeight" wire:model="addItemWeight" />
                                <x-form.input label="Unit" value="addItemUnit" wire:model="addItemUnit"/>
                                <x-form.input label="Price Per Unit" value="addItemPrice" wire:model="addItemPrice"/>
                            </div>
                            <div class="flex justify-end">
                                <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none" @click="modalOpen1 = false" >
                                    Cancel
                                </button>
                                <button class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </x-slot>
                </x-form.basic-form>
            </x-general.modal>
            {{-- End Modal Add Items --}}
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6"  x-data="{ active: 0 }">
        @foreach ($items as $item)
        <div class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block">
            <x-general.card-tab countTab="{{ $item->id }}" wire:click="$emit('itemSelected', {{ $item->id }})">
                <div x-data="{ deleteOpen3 : false }">
                    <div class="p-4">
                        <div class="flex justify-between font-medium">
                            {{ ucfirst(strtolower($item->name)) }}
                            <div class="flex items-center px-2 py-2 bg-red-600 rounded-full hover:bg-red-700" x-on:click="deleteOpen3 = true">
                                <x-heroicon-o-trash class="w-4 h-4 text-white"/>
                            </div>
                        </div>
                        <div class="">
                            {{ ucwords(strtolower($item->supplier->name)) }}
                        </div>
                    </div>
                    {{-- Start modal delete --}}
                    <x-general.modal modalActive="deleteOpen3" title="Delete Confirmation" modalSize="sm" closeBtn="no">
                        <div class="">
                            <div class="py-4 font-semibold text-center text-black font">
                                Are you sure you want to delete :<br>
                                Item "{{ucfirst(strtolower($item->name)) }}"?
                            </div>
                            <div class="flex justify-center mt-3">
                                <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none" x-on:click="deleteOpen2 = false">
                                    Cancel
                                </button>
                                <button class="flex px-4 py-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none" wire:click="delete('item', {{ $item->id }})">
                                    yes,Delete
                                </button>
                            </div>
                        </div>
                    </x-general.modal>
                    {{-- End modal delete  --}}
                </div>
            </x-general.card-tab>
        </div>
        @endforeach
    </div>
</div>
