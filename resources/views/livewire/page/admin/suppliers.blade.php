<div x-data="{modalAdd: false, modalEdit: false, modalDelete: false}">
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Suppliers
        </h2>
    </div>

    <div class="p-4 mt-8 bg-white">
        <div class="flex justify-between my-4">
            <div class="flex items-center">
                <button x-on:click="modalAdd = true"
                    class="flex px-4 py-2 ml-2 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none hover:bg-yellow-300">
                    <x-heroicon-o-document-add class="w-5 h-5 mr-1" /> Add Suppliers
                </button>
            </div>
            <div wire:loading>
                <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                    style="left: 50%; top:50%">
                    <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                    <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                </div>
            </div>
            <div class="flex items-center">
                <x-form.search-input/>
            </div>
        </div>
        
        @if (!$suppliers->isEmpty())
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="CODE" sort="" />
                    <x-table.table-header class="text-left" value="NAME" sort="" />
                    <x-table.table-header class="text-left" value="ACTIONS" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $supplier->code }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="w-full text-sm font-medium text-gray-700 ">
                                {{ $supplier->name }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                <div class="flex space-x-1">
                                    <!----- Start Edit Btn ----->
                                    <div>
                                        <x-btn.tooltip-btn class="bg-blue-600 rounded-full hover:bg-blue-700" btnRoute="#" tooltipTitle="Edit" x-on:click="modalEdit = true" wire:click="edit({{ $supplier->id }})">
                                            <x-heroicon-o-pencil-alt class="w-4 h-4 text-white" />
                                        </x-btn.tooltip-btn>
                                    </div>
                                    <!----- End Edit Btn ----->

                                    <!----- Start Delete Btn----->
                                    <div>
                                        <x-btn.tooltip-btn class="bg-red-600 rounded-full hover:bg-red-700" btnRoute="#" tooltipTitle="Delete" x-on:click="modalDelete = true" wire:click="delete({{ $supplier->id }})">
                                            <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                        </x-btn.tooltip-btn>
                                    </div>
                                    <!----- End Delete Btn----->

                                </div>
                            </x-table.table-body>
                        </tr>
                    @endforeach
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        @endif
    </div>

    {{-- Start Modal Add Suppliers --}}
    <x-general.modal modalActive="modalAdd" title="Add New Suppliers" modalSize="2xl" closeBtn="yes">
        <x-form.basic-form wire:submit.prevent="addSupplier">
            <x-slot name="content">
                <div class="p-4 mt-4 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <x-form.input type="text" label="Code" value="" wire:model="add.code" />
                        <x-form.input type="text" label="Name" value="" wire:model="add.name" />
                        <x-form.input type="text" label="Phone no 1" value="" wire:model="add.phone1" />
                        <x-form.input type="text" label="Phone no 2" value="" wire:model="add.phone2" />
                        <x-form.input type="text" label="No fax" value="" wire:model="add.fax" />
                    </div>
                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                        <x-form.address class="" label="Address" value1="add.address1" value2="add.address2"
                            value3="add.address3" value4="add.town" value5="add.postcode" value6="add.state" :states="$states" condition="" x-on:click="modalAdd = false"/>
                    </div>
                    <div class="flex justify-end mt-5">
                        <button
                            type="button"
                            class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none hover:bg-red-500"
                            x-on:click="modalAdd = false">
                            Cancel
                        </button>
                        <button type="submit"
                            class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                            Submit
                        </button>
                    </div>
                </div>
            </x-slot>
        </x-form.basic-form>
    </x-general.modal>
    {{-- End Modal Add Suppliers --}}

    {{-- Start Modal Edit Suppliers --}}
    <x-general.modal modalActive="modalEdit" title="Edit Suppliers" modalSize="2xl" closeBtn="no">
        <x-form.basic-form wire:submit.prevent="saveEdit">
            <x-slot name="content">
                <div class="p-4 mt-4 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <x-form.input type="text" label="Code" value="" wire:model="edit.code" />
                        <x-form.input type="text" label="Name" value="" wire:model="edit.name" />
                        <x-form.input type="text" label="Phone no 1" value="" wire:model="edit.phone1" />
                        <x-form.input type="text" label="Phone no 2" value="" wire:model="edit.phone2" />
                        <x-form.input type="text" label="No fax" value="" wire:model="edit.fax" />
                    </div>
                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                        <x-form.address class="" label="Address" value1="edit.address1"
                            value2="edit.address2" value3="edit.address3" value4="edit.town"
                            value5="edit.postcode" value6="edit.state" :states="$states" condition="" />
                    </div>
                    <div class="flex justify-end mt-5">
                        <button
                            type="button"
                            class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none hover:bg-red-500"
                            x-on:click="modalEdit = false">
                            Cancel
                        </button>
                        <button type="submit"
                            class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                            Submit
                        </button>
                    </div>
                </div>
            </x-slot>
        </x-form.basic-form>
    </x-general.modal>
    {{-- End Modal Edit Suppliers --}}

    {{-- Start modal delete Suppliers --}}
    <x-general.modal modalActive="modalDelete" title="Delete Confirmation" modalSize="sm"
    closeBtn="yes">
        <div class="">
            <div class="py-4 font-semibold text-center text-black font">
                Are you sure you want to delete
            </div>
            <div class="flex justify-center mt-3">
                <button
                    class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none"
                    x-on:click="modalDelete = false">
                    Cancel
                </button>
                <button
                    class="flex px-4 py-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none" wire:click="saveDelete">
                    Yes,Delete
                </button>
            </div>
        </div>
    </x-general.modal>
    {{-- End modal delete Suppliers --}}
</div>