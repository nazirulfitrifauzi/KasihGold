<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                My Agent
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white">
            <div class="flex justify-between my-4">
                <div wire:loading>
                    <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                        style="left: 50%; top:50%">
                        <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                        <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                    </div>
                </div>
                <div class="flex items-center">
                    <x-form.search-input />
                </div>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="No" sort="" />
                    <x-table.table-header class="text-left" value="Name" sort="" />
                    <x-table.table-header class="text-left" value="Order Date" sort="" />
                    <x-table.table-header class="text-left" value="Serial No" sort="" />
                    <x-table.table-header class="text-left" value="Action" sort="" />

                </x-slot>
                <x-slot name="tbody">
                    
                    <tr>
                        <x-form.basic-form wire:submit.prevent="">
                        <x-slot name="content">
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>1</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>Agent Kasih Gold</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>31 March 2021</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <x-form.dropdown label="" value="serial_no" wire:model="" default="no" >
                                <option value="">Serial Number</option>
                            </x-form.dropdown>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600">
                                <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1" />
                                Approve
                            </button>
                        </x-table.table-body>

                        </x-slot>
                    </x-form.basic-form>
                    </tr>

                    {{-- <tr>
                        <x-table.table-body colspan="4" class="text-center text-gray-500">
                            No new orders
                        </x-table.table-body>
                    </tr> --}}
                    

                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>
    </div>
</div>