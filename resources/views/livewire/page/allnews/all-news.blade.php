<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                All News
            </h2>
        </div>
        
        <div class="p-4 mt-2 bg-white mb-20">
            <div class="flex justify-between my-4">
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
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Title 1" sort="" />
                    <x-table.table-header class="text-left" value="Title 2" sort="" />
                    <x-table.table-header class="text-left" value="Title 3" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            Title 1
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            Title 2
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            Title 3
                        </x-table.table-body>
                    </tr>
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>
    </div>
</div>