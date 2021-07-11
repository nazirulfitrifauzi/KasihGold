<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Cashback
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
                    <x-table.table-header class="text-left" value="Agent ID/Name" sort="" />
                    <x-table.table-header class="text-left" value="Product" sort="" />
                    <x-table.table-header class="text-left" value="Bought By" sort="" />
                    <x-table.table-header class="text-left" value="Bought At" sort="" />
                    <x-table.table-header class="text-left" value="Commision (RM)" sort="" />
                    <x-table.table-header class="text-left" value="Action" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($lists as $list)
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $loop->iteration }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $list->user->profile->code }} - {{ $list->user->name }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $list->item->name}}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                <p>{{ $list->boughtUser->profile->code }} - {{ $list->boughtUser->name }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                <p>{{ $list->created_at->format('d F Y') }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                <p>{{ number_format($list->commission, 2) }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                <div x-data="{ openShow: false}">
                                    <a href="#detail_{{$list->id}}" @click="openShow = true">
                                        <div class="flex">
                                            <x-heroicon-o-eye class="w-5 h-5 mr-1 text-blue-500" />
                                            <p class="text-blue-500">Show</p>
                                        </div>
                                    </a>

                                    {{-- Start modal Show --}}
                                    <x-general.modal modalActive="openShow" title="Electronic Fund Transfer" modalSize="lg">
                                        <x-form.basic-form wire:submit.prevent="submit">
                                            <x-slot name="content">
                                                <div class="p-4 mt-4 leading-4">
                                                    <h2 class="text-lg font-bold">Customer Bank Information</h2>

                                                    <div class="mt-5">
                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                            <input disabled type="text" value=""
                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                        </div>
                                                    </div>
                                                    <div class="mt-5">
                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                            <input disabled type="text" value=""
                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                        </div>
                                                    </div>
                                                    <div class="mt-5">
                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                            <input disabled type="text" value=""
                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                        </div>
                                                    </div>
                                                    <h2 class="mt-5 text-lg font-bold">Surrendered Amount</h2>

                                                    <div class="mt-3">
                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                            <input disabled type="text" value=""
                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                        </div>
                                                    </div>

                                                    <h2 class="mt-5 text-lg font-bold">Proof of Transfer</h2>

                                                    <div class="flex mt-5">
                                                        <label for="product-img1"
                                                            class="w-full p-10 text-center bg-gray-200 rounded-lg shadow cursor-pointer hover:bg-gray-300 group">
                                                            <span
                                                                class="inline-flex items-center font-medium text-gray-600 group-hover:text-gray-700">
                                                                <x-heroicon-o-plus-circle class="w-10 h-10 mr-2 text-yellow-400 " />
                                                            </span>
                                                        </label>
                                                        <input type="file" class="absolute invisible pointer-events-none" id="product-img1"
                                                            name="product-img1" wire:model="prod_img1">
                                                    </div>
                                                    <div class="flex justify-end mt-4">
                                                        <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </x-slot>
                                        </x-form.basic-form>
                                    </x-general.modal>
                                    {{-- End modal Show --}}
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
</div>