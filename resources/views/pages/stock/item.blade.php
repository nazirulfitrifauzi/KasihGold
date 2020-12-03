
<div class="col-span-12 pt-5 border-t intro-y border-gray-300">
    
        <div class="flex flex-col items-center intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Item List
            </h2>
            <div class="flex w-full mt-4 sm:w-auto sm:mt-0" x-data="{ modalOpen1: false}">
                <a href="#" class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white" @click="modalOpen1 = true" >
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
                                    <x-form.input label="Name" value="" livewire=""/>
                                    <x-form.input label="Brand" value="" livewire=""/>
                                    <x-form.input label="Purity" value="" livewire=""/>
                                </div>
                                <div class="flex justify-end">
                                    <button class="bg-yellow-400  py-2 px-4 rounded flex font-bold text-sm text-white focus:outline-none mr-2" @click="modalOpen1 = false" >
                                        Cancel
                                    </button>
                                    <button class="bg-yellow-400  py-2 px-4 rounded flex font-bold text-sm text-white focus:outline-none">
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

            <x-general.card-tab class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"  countTab="1" wire:click="">
                <div class="p-4">
                    <div class="font-medium">
                        Gold 0.25
                    </div>

                    <div class="">
                        Supplier A
                    </div>
                </div>
            </x-general.card-tab>

            <x-general.card-tab class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"  countTab="2"  wire:click="">
                <div class="p-4">
                    <div class="text-base font-medium ">
                        Gold 1.50
                    </div>

                    <div class="">
                        Supplier A
                    </div>
                </div>
            </x-general.card-tab>

            <x-general.card-tab class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"  countTab="3"  wire:click="">
                <div class="p-4">
                    <div class="text-base font-medium ">
                        Gold 2.50
                    </div>

                    <div class="">
                        Supplier A
                    </div>
                </div>
            </x-general.card-tab>

            <x-general.card-tab class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"  countTab="4"  wire:click="">
                <div class="p-4">
                    <div class="text-base font-medium ">
                        Gold 0.25
                    </div>

                    <div class="">
                        Supplier B
                    </div>
                </div>
            </x-general.card-tab>

            <x-general.card-tab class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"  countTab="4"  wire:click="">
                <div class="p-4">
                    <div class="text-base font-medium ">
                        Gold 1.50
                    </div>

                    <div class="">
                        Supplier B
                    </div>
                </div>
            </x-general.card-tab>

            <x-general.card-tab class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"  countTab="4"  wire:click="">
                <div class="p-4">
                    <div class="text-base font-medium ">
                        Gold 2.50
                    </div>

                    <div class="">
                        Supplier B
                    </div>
                </div>
            </x-general.card-tab>

        </div> 
</div>



