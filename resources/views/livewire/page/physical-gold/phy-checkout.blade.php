<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Physical Gold Checkout
            </h2>
        </div>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
        @endif
        <div class="grid grid-cols-12 rounded-lg mx-4">
            <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                <div class="p-4 mt-8 bg-white">
                    <x-general.grid mobile="1" gap="5" sm="4" md="4" lg="4" xl="4" class="col-span-6 mb-4">
                        <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                            <div class="font-bold text-base text-white">
                                    <div class="flex space-x-4 items-center">
                                        <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                            <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                        </div>
                                        <div class="text-xl">
                                            <p>My wallet Gold </p>
                                            <p class="text-lg">{{$this->tGold}} g</p>
                                        </div>
                                    </div>
                                </div>
                        </x-general.price-card>
                    </x-general.grid>
                    <x-table.table>
                        <x-slot name="thead">
                            <x-table.table-header class="text-left" value="Product" sort="" />
                            <x-table.table-header class="text-left" value="Grammage" sort="" />
                            <x-table.table-header class="text-left" value="Quantity" sort="" />
                            <x-table.table-header class="text-left" value="Total Grammage" sort="" />
                        </x-slot>
                        <x-slot name="tbody">

                            @foreach ($gtype as $types)
                            <tr>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    <div class="flex items-center space-x-3">
                                        <img class="object-cover w-16 h-16 rounded" src="{{ asset('img/gold/'.$types->prod_img1) }}" alt="">
                                        <div>
                                            <h3 class="text-sm font-semibold">{{$types->prod_name}}</h3>
                                        </div>
                                    </div>
                                </x-table.table-body>

                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    <p>{{number_format($types->prod_weight,2)}} Gram</p>
                                </x-table.table-body>

                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    <div class="relative flex flex-row w-24 h-10 mt-1 bg-transparent rounded-lg">
                                        <button  wire:click="exitProd({{-1}},'{{$types->prod_weight}}')"
                                            class="w-20 h-full text-gray-600 bg-gray-300 rounded-l cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                            <span class="m-auto text-2xl font-thin">−</span>
                                        </button>
                                        <input type="text"
                                            class="flex items-center justify-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                                            name="custom-input-number" wire:model="goldbar{{$types->prod_cat}}" value="goldbar{{$types->prod_cat}}" ></input>
                                        <button  wire:click="exitProd({{1}},'{{$types->prod_weight}}')"
                                            class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                            <span class="m-auto text-2xl font-thin">+</span>
                                        </button>
                                    </div>
                                </x-table.table-body>

                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    @if($types->prod_cat=="063")
                                    <p>{{number_format($this->goldbar063*0.25,2)}} Gram</p>
                                    @elseif($types->prod_cat=="064")
                                    <p>{{number_format($this->goldbar064,2)}} Gram</p>
                                    @endif
                                </x-table.table-body>

                            </tr>
                            @endforeach


                        </x-slot>
                        <div class="px-2 py-2">
                            {{-- {{ $list->links('pagination::tailwind') }} --}}
                        </div>
                    </x-table.table>


                    <! -- Start Checkout -->
                    <div class="flex justify-end my-6">
                        <div class="w-full md:w-2/5 px-4 py-4 bg-white border-2 rounded-lg">
                            <div class="py-4 border-b-2">
                                <h1 class="text-xl md:text-3xl font-semibold">Total Physical Gold Conversion</h1>
                            </div>

                            <div class="flex justify-between py-4 border-b-2">
                                <div class="text-lg font-semibold">
                                    <p>Total Grams</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <p>{{($this->goldbar063*0.25)+($this->goldbar064)}} grams </p>
                                </div>
                            </div>

                            <div class="flex justify-center my-6">
                                <button type="button" class="flex items-center justify-center w-full px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500" wire:click="convert()">
                                    <p>Proceed to checkout</p>
                                </button>
                            </div>
                        </div>
                    </div>
                    <! -- End Checkout -->
                </div>
            </div>
        </div>
    </div>
</div>
