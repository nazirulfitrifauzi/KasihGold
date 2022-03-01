<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Promotion List
        </h2>
    </div>

    <div class="p-4 mt-8 mb-20 bg-white sm:mb-0">
        <div class="flex justify-between my-4">
            <div class="flex items-center">
                <div class="relative dropdown">
                    <a href="{{route('admin.add-promotion')}}" class="flex items-center px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none hover:bg-yellow-300">
                        <x-heroicon-o-plus-circle class="w-5 h-5 mr-1" />
                        <p>Add Promotion</p>
                    </a>
                </div>
            </div>
        </div>
        <x-table.table>
            <x-slot name="thead">
                <x-table.table-header class="text-left" value="NO" sort="" />
                <x-table.table-header class="text-left" value="PROMOTION TYPE" sort="" />
                <x-table.table-header class="text-left" value="PROMOTION NAME" sort="" />
                <x-table.table-header class="text-left" value="PROMOTION DESC" sort="" />
                <x-table.table-header class="text-left" value="START DATE" sort="" />
                <x-table.table-header class="text-left" value="END DATE" sort="" />
                <x-table.table-header class="text-left" value="ACTIONS" sort="" />
            </x-slot>
            <x-slot name="tbody">
                @foreach ($lists as $list)
                    <tr>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $loop->iteration }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $list->types->description }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $list->name }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $list->description }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $list->start_date }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $list->end_date }}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            <div class="flex space-x-4" x-data="{deleteOpen : false}">
                                <a href="#">
                                    <div class="flex text-blue-500">
                                        <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1" />
                                        <p>Edit</p>
                                    </div>
                                </a>
                                <a href="#"  x-on:click="deleteOpen = true">
                                    <div class="flex text-red-500">
                                        <x-heroicon-o-trash class="w-5 h-5 mr-1" />
                                        <p>Delete</p>
                                    </div>
                                </a>
                                <x-general.new-modal modalName="deleteOpen" size="lg">
                                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full">
                                        <x-heroicon-o-trash class="w-8 h-8 text-red-600" />
                                    </div>
                                    <div class="py-2 text-center ">
                                        <h1 class="text-lg font-bold">Are you sure you want to delete?</h1>
                                    </div>
                                    <div class="">
                                        <div class="pb-2 text-xs font-semibold text-center text-gray-400">
                                            Do you really want to delete?
                                            This process cannot be undone
                                        </div>
                                        <div class="flex justify-center mt-3">
                                            <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none"
                                                x-on:click="deleteOpen = false">
                                                Cancel
                                            </button>
                                            <button class="flex px-4 py-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none"
                                                wire:click="">
                                                yes,Delete
                                            </button>
                                        </div>
                                    </div>
                                </x-general.new-modal>
                            </div>
                        </x-table.table-body>
                    </tr>
                @endforeach

            </x-slot>
            <div class="px-2 py-2">
                {{-- {{ $list->links('pagination::tailwind') }} --}}
            </div>
        </x-table.table>
    </div>
</div>