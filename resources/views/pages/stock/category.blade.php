
<div class="col-span-12 pt-5 border-t border-gray-300 intro-y">
    <div class="flex flex-col items-center intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Categories
        </h2>
        <div class="flex w-full mt-4 sm:w-auto sm:mt-0" x-data="{ modalOpen2: false}">
            <a href="#" class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer" @click="modalOpen2 = true" >
                Add Category
            </a>

            {{-- Start modal Add Category --}}
            <x-general.modal modalActive="modalOpen2" title="Add New Category" modalSize="lg">
                <x-form.basic-form action="">
                    <x-slot name="content">
                        <div class="p-4 mt-4 leading-4">
                            <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                <x-form.input label="Name" value="" livewire=""/>
                            </div>
                            <div class="flex justify-end">
                                <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none" @click="modalOpen2 = false" >
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
            {{-- End Modal Add Category --}}
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6"  x-data="{ active: 0 }">
        @foreach ($categories as $category)
            <x-general.card-tab
                class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block"
                countTab="{{ $category->id }}"
                wire:click="$emit('categorySelected', {{ $category->id }})"
            >
                <div class="p-4">
                    <div class="font-medium">
                        {{ ucfirst(strtolower($category->name)) }}
                    </div>

                    <div class="">
                        {{ $category->item_type()->count() }} Items
                    </div>
                </div>
            </x-general.card-tab>
        @endforeach
    </div>
</div>