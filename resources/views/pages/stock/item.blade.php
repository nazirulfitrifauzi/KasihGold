
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
                <x-form.basic-form action="">
                    <x-slot name="content">
                        <div class="p-4 mt-4 leading-4">
                            <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                <x-form.dropdown label="Type" value="" default="yes">
                                    <option value=""></option>
                                </x-form.dropdown>
                                <x-form.input label="Name" value="" />
                                <x-form.input label="Brand" value="" />
                                <x-form.input label="Purity" value=""/>
                            </div>
                            <div class="flex justify-end">
                                <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none" @click="modalOpen1 = false" >
                                    Cancel
                                </button>
                                <button class="flex px-4 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none">
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
            <x-general.card-tab
                class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"
                countTab="{{ $item->id }}"
                wire:click="$emit('itemSelected', {{ $item->id }})"
            >
                <div class="p-4">
                    <div class="font-medium">
                        {{ ucfirst(strtolower($item->name)) }}
                    </div>

                    <div class="">
                        {{ ucwords(strtolower($item->supplier->name)) }}
                    </div>
                </div>
            </x-general.card-tab>
        @endforeach
    </div>
</div>
