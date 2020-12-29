
<div class="col-span-12 pt-5 border-t border-gray-300 intro-y" >
    <div class="flex flex-col items-center intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Categories
        </h2>
        <div class="flex w-full mt-4 sm:w-auto sm:mt-0" x-data="{ modalOpen2: false}">
            <button class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer hover:bg-yellow-300" @click="modalOpen2 = true" >
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
                                <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none hover:bg-red-500" @click="modalOpen2 = false">
                                    Cancel
                                </button>
                                <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
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
    <div class="grid grid-cols-12 gap-6">
        @foreach ($categories as $category)
            <div class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block" >
                <x-general.card-tab class="{{ $categoryActive == $category->id ? 'bg-yellow-400 text-white' : '' }} hover:bg-yellow-400 hover:text-white" wire:click="$emit('categorySelected', {{ $category->id }})">
                    <div class="p-4">
                        <div class="flex justify-between font-medium">
                            {{ ucfirst(strtolower($category->name)) }}
                            <div class="flex">
                                <div x-data="{ editOpen : false  }">
                                    <x-btn.tooltip-btn class="text-xs flex items-center px-2 py-2 bg-blue-600 rounded-full hover:bg-blue-700" 
                                    btnRoute="#" tooltipTitle="Edit" x-on:click="editOpen = true">
                                        <x-heroicon-o-pencil-alt class="w-4 h-4 text-white"/>
                                    </x-btn.tooltip-btn>

                                    {{-- Start modal edit Category --}}
                                    <div class="cursor-default text-gray-900">
                                        <x-general.modal modalActive="editOpen" title="Edit Category" modalSize="lg">
                                            <x-form.basic-form >
                                                <x-slot name="content">
                                                    <div class="p-4 mt-4 leading-4">
                                                        <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                            <x-form.input  label="Name" value=""/>
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none hover:bg-red-500" @click="editOpen = false">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </x-slot>
                                            </x-form.basic-form>
                                        </x-general.modal>
                                    </div>
                                    {{-- End Modal edit Category --}}
                                </div>
                                
                                <div x-data="{ deleteOpen : false  }">
                                    <x-btn.tooltip-btn class="text-xs flex items-center px-2 py-2 bg-red-600 rounded-full hover:bg-red-700 ml-2" 
                                    btnRoute="#" tooltipTitle="Delete" x-on:click="deleteOpen = true">
                                        <x-heroicon-o-trash class="w-4 h-4 text-white"/>
                                    </x-btn.tooltip-btn>
                                    {{-- Start modal delete --}}
                                    <div class="cursor-default">
                                        <x-general.modal modalActive="deleteOpen" title="Delete Confirmation" modalSize="sm" closeBtn="yes">
                                            <div class="">
                                                <div class="py-4 font-semibold text-center text-black font">
                                                    Are you sure you want to delete :<br>
                                                    Category "{{ucfirst(strtolower($category->name)) }}"?
                                                </div>
                                                <div class="flex justify-center mt-3">
                                                    <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none" x-on:click="deleteOpen = false">
                                                        Cancel
                                                    </button>
                                                    <button class="flex px-4 py-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none" wire:click="delete('category', {{ $category->id }})">
                                                        yes,Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </x-general.modal>
                                    </div>
                                    {{-- End modal delete  --}}
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {{ $category->item_type()->count() }} Items
                        </div>
                    </div>
                </x-general.card-tab>
            </div>
        @endforeach
    </div>
</div>