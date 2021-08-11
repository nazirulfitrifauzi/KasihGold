<div>
    <div>
        <div class="flex flex-col items-center my-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Anouncement
            </h2>
        </div>
        <div class="mb-20 bg-white sm:mb-0">
            <div class="flex justify-between mb-3 flex-col items-start sm:items-center  mt-8 intro-y sm:flex-row">
                <div class="mt-3">
                    <a href="{{ route('admin.create-announcements') }}"
                        class="flex items-center px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none">
                        <x-heroicon-o-plus-circle class="w-6 h-6 mr-2" />
                        <p>Create Announcement</p>
                    </a>
                </div>
                <div class="mt-3">
                    <x-form.search-input />
                </div>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="No" sort="" />
                    <x-table.table-header class="text-left" value="Title" sort="" />
                    <x-table.table-header class="text-left" value="Anouncement detail" sort="" />
                    <x-table.table-header class="text-left" value="Action" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>1</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>Test</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>Test</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-2">
                                <x-heroicon-o-eye class="w-5 h-5 mr-1 text-indigo-500 cursor-pointer tooltipbtn" wire:click="" data-title="View" data-placement="top"/>
                                <x-heroicon-o-trash class="w-5 h-5 mr-1 text-red-600 cursor-pointer tooltipbtn" data-id="" onclick="deleteConfirmation()" data-title="Delete" data-placement="top"/>
                            </div>
                            <x-popup.delete-admin name="deleteConfirmation" variable="id" posturl=""  />
                        </x-table.table-body>
                    </tr>
                </x-slot>
                {{-- <div class="px-2 py-2">
                    {{ $list->links('pagination-links') }}
                </div> --}}
            </x-table.table>
        </div>
    </div>
</div>
