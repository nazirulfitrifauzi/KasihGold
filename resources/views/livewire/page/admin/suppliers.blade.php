<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Suppliers
        </h2>
    </div>

    <div class="mt-8 bg-white p-4">
        <div class="flex justify-between my-4">
            <div class="flex items-center" x-data="{modalAdd: false}">
                <a href="#" x-on:click="modalAdd = true"
                    class="flex px-4 py-2 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none ml-2 hover:bg-yellow-300">
                    <x-heroicon-o-document-add class="w-5 h-5 mr-1" /> Add Suppliers
                </a>
                {{-- Start Modal Add Suppliers --}}
                <x-general.modal modalActive="modalAdd" title="Add New Suppliers" modalSize="2xl">
                    <x-form.basic-form wire:submit.prevent="">
                        <x-slot name="content">
                            <div class="p-4 mt-4 leading-4">
                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                    <x-form.input label="Code" value="" wire:model="" />
                                    <x-form.input label="Name" value="" wire:model="" />
                                    <x-form.input label="Phone no 1" value="" wire:model="" />
                                    <x-form.input label="Phone no 2" value="" wire:model="" />
                                    <x-form.input label="No fax" value="" wire:model="" />
                                </div>
                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                    <x-form.address class="" label="Address" value1="address1" value2="address2"
                                        value3="address3" value4="town" value5="postcode" condition="" />
                                </div>
                                <div class="flex justify-end mt-5">
                                    <button
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
            </div>
            <div wire:loading>
                <div class="flex items-center justify-center text-white absolute bg-yellow-400 p-4 rounded"
                    style="left: 50%; top:50%">
                    <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                    <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                </div>
            </div>
            <div class="flex items-center">
                <x-form.search-input/>
            </div>
        </div>
        <x-table.table>
            <x-slot name="thead">
                <x-table.table-header class="text-left" value="CODE" sort="" />
                <x-table.table-header class="text-left" value="NAME" sort="" />
                <x-table.table-header class="text-left" value="ACTIONS" sort="" />
            </x-slot>
            <x-slot name="tbody">
                <tr>
                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                        000001
                    </x-table.table-body>
                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                        SUPPLIER A
                    </x-table.table-body>
                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                        <div class="flex space-x-1">
                            <!----- Start Edit Btn ----->
                            <div x-data="{modalEdit: false}">
                                <x-btn.tooltip-btn class="bg-blue-600 rounded-full hover:bg-blue-700" btnRoute="#" tooltipTitle="Edit" x-on:click="modalEdit = true">
                                    <x-heroicon-o-pencil-alt class="w-4 h-4 text-white" />
                                </x-btn.tooltip-btn>
                                {{-- Start Modal Edit Suppliers --}}
                                <x-general.modal modalActive="modalEdit" title="Edit Suppliers" modalSize="2xl">
                                    <x-form.basic-form wire:submit.prevent="">
                                        <x-slot name="content">
                                            <div class="p-4 mt-4 leading-4">
                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                    <x-form.input label="Code" value="" wire:model="" />
                                                    <x-form.input label="Name" value="" wire:model="" />
                                                    <x-form.input label="Phone no 1" value="" wire:model="" />
                                                    <x-form.input label="Phone no 2" value="" wire:model="" />
                                                    <x-form.input label="No fax" value="" wire:model="" />
                                                </div>
                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                    <x-form.address class="" label="Address" value1="address1"
                                                        value2="address2" value3="address3" value4="town"
                                                        value5="postcode" condition="" />
                                                </div>
                                                <div class="flex justify-end mt-5">
                                                    <button
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
                            </div>
                            <!----- End Edit Btn ----->

                            <!----- Start Delete Btn----->
                            <div x-data="{modalDelete: false}">
                                <x-btn.tooltip-btn class="bg-red-600 rounded-full hover:bg-red-700" btnRoute="#" tooltipTitle="Delete" x-on:click="modalDelete = true">
                                    <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                </x-btn.tooltip-btn>
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
                                                class="flex px-4 py-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none"
                                                wire:click="">
                                                yes,Delete
                                            </button>
                                        </div>
                                    </div>
                                </x-general.modal>
                                {{-- End modal delete Suppliers --}}
                            </div>
                            <!----- End Delete Btn----->

                        </div>
                    </x-table.table-body>
                </tr>
            </x-slot>
            <div class="py-2 px-2">
                {{-- {{ $list->links('pagination::tailwind') }} --}}
            </div>
        </x-table.table>
    </div>
</div>