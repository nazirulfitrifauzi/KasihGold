
<div class="col-span-12 pt-5 border-t border-gray-300 intro-y">
    <div class="flex flex-col items-center intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Categories
        </h2>
        <div class="flex w-full mt-4 sm:w-auto sm:mt-0" x-data="{ modalOpen2: false}">
            <button class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer" @click="modalOpen2 = true" >
                Add Category
            </button>

            {{-- Start modal Add Category --}}
            <x-general.modal modalActive="modalOpen2" title="Add New Category" modalSize="lg">
                <x-form.basic-form wire:submit.prevent="addCategory">
                    <x-slot name="content">
                        <div class="p-4 mt-4 leading-4">
                            <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                <x-form.input  label="Name" value="addCategoryName" wire:model="addCategoryName"/>
                            </div>
                            <div class="flex justify-end">
                                <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none" @click="modalOpen2 = false" wire:click="clearErrorBag">
                                    Cancel
                                </button>
                                <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </x-slot>
                </x-form.basic-form>
            </x-general.modal>
            {{-- End Modal Add Category --}}
        </div>
    </div>
    <div x-data="{ active: 0 }">
        <div class="grid grid-cols-12 gap-6">
            @foreach ($categories as $category)
                <div class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block">
                    <x-general.card-tab countTab="{{ $category->id }}" wire:click="$emit('categorySelected', {{ $category->id }})">
                        <div x-data="{ deleteOpen : false }">
                            <div class="p-4">
                                <div class="font-medium flex justify-between">
                                    {{ ucfirst(strtolower($category->name)) }}
                                    <div class="bg-red-600 py-2 px-2 rounded-full hover:bg-red-700 flex items-center" x-on:click="deleteOpen = true">
                                        <x-heroicon-o-trash class="w-4 h-4 text-white"/>
                                    </div>
                                </div>
                                <div class="">
                                    {{ $category->item_type()->count() }} Items
                                </div>
                            </div>
                            {{-- Start modal delete --}}
                                <x-general.modal modalActive="deleteOpen" title="Delete Confirmation" modalSize="sm" closeBtn="no">
                                    <div class="">
                                        <div class="font font-semibold text-center py-4 text-black">
                                            Are You Sure Want To Delete
                                        </div>
                                        <div class="flex justify-center mt-3">
                                            <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none" x-on:click="deleteOpen = false">
                                                Cancel
                                            </button>
                                            <button class="flex px-4 py-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none">
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
    
</div>