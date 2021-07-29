<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Request/Inquiry
        </h2>
    </div>

    <div class="p-4 mt-8 bg-white mb-20 sm:mb-0">
        <div class="flex justify-between my-4">
            <div class="flex items-center">
                <div class="relative dropdown" x-data="{open: false}">
                    <button class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none hover:bg-yellow-300" @click="open = !open">Actions</button>
                    <div class="absolute z-10 w-40 bg-white rounded-lg shadow-lg" x-show="open" style="display: none; top: -17px; left: 90px;">
                        <div class="py-4">
                            <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                            <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to Excel
                            </a>
                            <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                            <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:loading>
                <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                    style="left: 50%; top:50%">
                    <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                    <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                </div>
            </div>
            <div class="flex flex-col items-start lg:flex-row lg:items-center">
                <p class="mr-2 -mt-3 text-base text-left text-gray-500">Select Date: </p>
                <x-form.input type="date" label="" value="" wire:model="search" />
            </div>
        </div>
        <x-table.table>
            <x-slot name="thead">
                <x-table.table-header class="text-left" value="NAME" sort="" />
                <x-table.table-header class="text-left" value="TITLE" sort="" />
                <x-table.table-header class="text-left" value="DATE" sort="" />
                <x-table.table-header class="text-left" value="ACTIONS" sort="" />
            </x-slot>
            <x-slot name="tbody">
                @forelse ($list as $item)
                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{$item->reported_by->name}}
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{$item->title}}
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{$item->created_at->format('d-m-Y')}}
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <div x-data="{ openShow: false}">
                            <a href="#detail_{{$item->id}}" @click="openShow = true">
                                <div class="flex">
                                    <x-heroicon-o-eye class="w-5 h-5 mr-1 text-blue-500" />
                                    <p class="text-blue-500">Show</p>
                                </div>
                            </a>

                            {{-- Start modal Show --}}
                            <x-general.modal modalActive="openShow" title="User Incident Reporting" modalSize="lg">
                                <x-form.basic-form action="">
                                    <x-slot name="content">
                                        <div class="p-4 mt-4 leading-4">
                                            <div class="mt-5">
                                                <x-form.dropdown label="" value="" default="" disabled>
                                                    <option value="">{{$item->category->name}}</option>
                                                </x-form.dropdown>
                                            </div>
                                            <div class="mt-5">
                                                <x-form.dropdown label="" value="" default="" disabled>
                                                    <option value="">{{$item->subcategory->name}}</option>
                                                </x-form.dropdown>
                                            </div>
                                            <div class="mt-5">
                                                <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                    <input disabled type="text" value="{{$item->title}}"
                                                        class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <textarea readonly data-feature="all" rows="8"
                                                    class="block w-full h-full px-3 py-2 text-gray-400 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none  focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">{{$item->comment}}</textarea>
                                            </div>
                                        </div>
                                    </x-slot>
                                </x-form.basic-form>
                            </x-general.modal>
                            {{-- End modal Show --}}
                        </div>
                    </x-table.table-body>
                </tr>
                @empty
                <tr>
                    <x-table.table-body colspan="4" class="text-center text-gray-500">
                        No new Request/Inquiry
                    </x-table.table-body>
                </tr>
                @endforelse
            </x-slot>
            <div class="px-2 py-2">
                {{ $list->links('pagination::tailwind') }}
            </div>
        </x-table.table>
    </div>
</div>