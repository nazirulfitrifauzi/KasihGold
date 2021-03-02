<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <div class="flex">
            <h2 class="mr-auto text-lg font-medium">
                Sell Product
            </h2>
        </div>
    </div>
    <x-general.card class="bg-white shadow-lg w-full">
        <div class="flex justify-end py-2 px-4">
            <a href="{{route('product-add')}}" class="cursor-pointer flex items-center px-4 py-1 
                text-sm font-bold text-white bg-yellow-400 rounded  focus:outline-none hover:bg-yellow-300">
                <x-heroicon-o-plus-circle class="w-5 h-5 mr-2 text-white" />
                Add Product
            </a>
        </div>
            <!-- Start List Product View -->
            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                        <div class="py-4 px-4">
                            <x-table.table>
                                <x-slot name="thead">
                                    <x-table.table-header class="text-left" value="PRODUCT NAME" sort="" />
                                    <x-table.table-header class="text-left" value="PRICE OF PRODUCT" sort="" />
                                    <x-table.table-header class="text-left" value="ACTIONS" sort="" />
                                </x-slot>
                                <x-slot name="tbody">
                                    
                                    <tr>
                                        <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700"> 
                                            GOLD 0.25G
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                            RM 100.00
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                            <div class="flex font-medium">
                                                <a href="{{route('product-edit')}}" class="flex text-blue-500 hover:text-blue-600">
                                                    <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1" />
                                                    <p>Edit Product</p>
                                                </a>
                                            </div>
                                        </x-table.table-body>
                                    </tr>

                                </x-slot>
                                {{-- <div class="py-2 px-2">
                                    {{ $list->links('pagination::tailwind') }}
                                </div> --}}
                            </x-table.table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End  List Product View -->
    </x-general.card>
</div>