
<div class="col-span-12 pt-5 border-t border-gray-300 intro-y" >
    <div class="flex flex-col items-center intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Categories
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        @foreach ($categories as $category)
            <div class="relative flex col-span-12 lg:col-span-4 xl:col-span-3 xxl:col-span-3 " >
                    <x-general.card-tab class="{{ $categoryActive == $category->id ? 'bg-yellow-400 text-white' : '' }} hover:bg-yellow-400 hover:text-white" wire:click="$emit('categorySelected', {{ $category->id }})">
                        <div class="p-4">
                            <div class="flex justify-between font-medium">
                                {{ ucfirst(strtolower($category->name)) }}
                                
                            </div>
                            <div class="">
                                {{ $category->item_type()->count() }} Items
                            </div>
                        </div>
                    </x-general.card-tab>
                    <div class="flex absolute top-0 right-0 py-10 px-6">
                        <div x-data="{ editOpen : false  }">
                            <x-btn.tooltip-btn class="text-xs flex items-center px-2 py-2 bg-blue-600 rounded-full hover:bg-blue-700" 
                            btnRoute="#" tooltipTitle="Edit" x-on:click="editOpen = true">
                                <x-heroicon-o-pencil-alt class="w-4 h-4 text-white"/>
                            </x-btn.tooltip-btn>

                            {{-- Start modal edit Category --}}
                            <div class="cursor-default text-gray-900">
                                <x-general.modal modalActive="editOpen" title="Edit Category" modalSize="lg" closeBtn="no">
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
                                <x-general.new-modal modalName="deleteOpen" size="sm">
                                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full">
                                        <x-heroicon-o-trash class="w-8 h-8 text-red-600" />
                                    </div>
                                    <div class="py-2 text-center ">
                                        <h1 class="text-lg font-bold">Are you sure you want to delete?</h1>
                                    </div>
                                    <div class="">
                                        <div class="pb-2 font-semibold text-center text-gray-400 text-xs">
                                            Do you really want to delete your
                                            Category "{{ucfirst(strtolower($category->name)) }}"?
                                            This process cannot be undone
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
                                </x-general.new-modal>
                            </div>
                            {{-- End modal delete  --}}
                        </div>
                    </div>
                
            </div>
        @endforeach
    </div>
</div>