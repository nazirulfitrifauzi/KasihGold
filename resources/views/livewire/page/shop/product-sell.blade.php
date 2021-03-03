<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <div class="flex">
            <h2 class="mr-auto text-lg font-medium">
                Sell Product
            </h2>
        </div>
    </div>
    <x-general.card class="bg-white shadow-lg">
        <div class="flex justify-end py-2 px-4">
            {{--  --}}
        </div>
        
            <div class="grid grid-cols-12 gap-6">
            <div class="flex col-span-12 lg:col-span-12 xxl:col-span-12 lg:block">
                    <!-- Start List Product View -->
                    <div class="py-4 px-4">
                        <x-table.table>
                            <x-slot name="thead">
                                <x-table.table-header class="text-left" value="PRODUCT NAME" sort="" />
                                <x-table.table-header class="text-left" value="PRICE OF PRODUCT" sort="" />
                                <x-table.table-header class="text-left" value="ACTIONS" sort="" />
                            </x-slot>

                            <x-slot name="tbody">
                                @forelse ($list as $item)
                                <tr>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        {{$item->prod_name}}
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        {{$item->prod_price}}
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <div class="flex font-medium">
                                            <a href="#" class="flex">
                                                <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1 text-blue-500" />
                                                <p class="text-blue-500">Sell Product</p>
                                            </a>
                                        </div>
                                    </x-table.table-body>
                                </tr>
                                @empty
                                <tr>
                                    <x-table.table-body colspan="4" class="text-gray-500 text-center">
                                        Dont have any product available.
                                    </x-table.table-body>
                                </tr>
                                @endforelse
                            </x-slot>


                            {{-- <div class="py-2 px-2">
                                {{ $list->links('pagination::tailwind') }}
                            </div> --}}
                        </x-table.table>
                    </div>
                    <!-- End  List Product View -->
            </div>
        </div>
    </x-general.card>
</div>