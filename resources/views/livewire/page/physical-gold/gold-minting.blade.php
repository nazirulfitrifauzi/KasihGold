<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Gold Minting Checkout
            </h2>
        </div>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
        @endif
        <div class="p-4 mt-8 bg-white mb-20 sm:mb-0">
            <x-general.grid mobile="1" gap="5" sm="4" md="4" lg="4" xl="4" class="col-span-6 mb-4">
                <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                    <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-xl">
                                    <p>My Gold Wallet (Flexible) </p>
                                    <p class="text-lg">{{$total}} g</p>
                                </div>
                            </div>
                        </div>
                </x-general.price-card>
            </x-general.grid>

            <!--Start desktop view-->
            <div class="hidden lg:block">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Product" sort="" />
                        <x-table.table-header class="text-left" value="Grammage (g)" sort="" />
                    </x-slot>
                    <x-slot name="tbody">

                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-3 items-center">
                                    <img class="object-cover w-16 h-16 rounded" 
                                    src="{{ asset('img/product/1/9/d1.png') }}" alt="">
                                    <div>
                                        <h3 class="text-sm font-semibold">Kasih AP Gold Wafer</h3>
                                    </div>
                                </div>
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                    <input type="text"
                                        class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                        hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                        justify-center
                                        text-gray-700 
                                        outline-none"
                                        {{-- name="custom-input-number" value="{{$types->products->item_id}}" disabled></input> --}}
                                        name="custom-input-number" wire:model="GoldMintQTY" >
                                    
                                    </input>
                                </div>
                            </x-table.table-body>

                            {{-- <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>RM {{$types->outright_price}}</p>
                            </x-table.table-body> --}}

                        </tr>
                        

                    </x-slot>
                    <div class="px-2 py-2">
                        {{-- {{ $list->links('pagination::tailwind') }} --}}
                    </div>
                </x-table.table>
            </div>
            <!--End desktop view-->

            <!--Start Mobile view-->
            {{-- <div class="block lg:hidden">
                <div class="border-2 p-4 rounded-md">
                    @foreach ($goldO as $types)
                        <div class="border-b-2 py-2">
                            <div class="flex justify-between items-center">
                                <div>
                                    <img class="object-cover w-16 h-16 rounded" 
                                    src="{{ asset('img/product/'.$types->products->prod_cat.'/'.$types->products->item_id.'/'.$types->products->prod_img1) }}"alt="">
                                    <h3 class="text-sm font-semibold">{{$types->products->prod_name}}</h3>
                                </div>
                                <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                    <button  wire:click="exitProdAdd({{$types->products->item_id}})"
                                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input type="text"
                                        class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                        hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                        justify-center
                                        text-gray-700 
                                        outline-none"
                                        name="custom-input-number" value="{{$types->products->prod_cat}}" disabled>
                                    </input>
                                    <button  wire:click="exitProdSub({{$types->products->item_id}})"
                                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between mt-1">
                                <div>
                                    <p class="text-xs text-gray-500">CURRENT PRODUCT PRICE</p>
                                    <p class='text-sm font-semibold'>RM {{$types->products->prod_price}}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">OUTRIGHT PRICE</p>
                                    <p class='text-sm font-semibold text-right'>RM {{$types->products->outright_price}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
            <!--End Mobile view-->



            <! -- Start Checkout -->
            <x-general.grid mobile="1" gap="8" sm="1" md="2" lg="2" xl="2" class="w-full col-span-12 mt-6">
                <div class="bg-white py-2">
                    
                </div>
    
                <div class="bg-white py-2 px-4  rounded-lg  border-2">
                    <div class="border-b-2 py-4">
                        <h1 class="text-3xl font-semibold">Total Gold Minting</h1>
                    
                    </div>
                    
                    <div class="flex justify-between border-b-2 py-4">
                        <div class="font-semibold text-lg">
                            <p>Total Grammage</p>
                        </div>
                        <div class="font-semibold text-lg">
                            {{-- <p>RM {{number_format(($info_bar061->outright_price*$goldbar061)+($info_bar062->outright_price*$goldbar062)+($info_bar063->outright_price*$goldbar063)+($info_bar064->outright_price*$goldbar064+($info_bar065->outright_price*$goldbar065)),2)}}</p> --}}
                            <p>{{$GoldMintQTY}} Gram</p>
                        </div>
                    </div>

                    <div class="flex justify-between border-b-2 py-4">
                        <div class="font-semibold text-lg">
                            <p>Total Minting Cost</p>
                        </div>
                        <div class="font-semibold text-lg">
                            {{-- <p>RM {{number_format(($info_bar061->outright_price*$goldbar061)+($info_bar062->outright_price*$goldbar062)+($info_bar063->outright_price*$goldbar063)+($info_bar064->outright_price*$goldbar064+($info_bar065->outright_price*$goldbar065)),2)}}</p> --}}
                            <p>RM {{$MintingCost}}</p>
                        </div>
                    </div>
                
                    <div class="flex justify-center my-6">
                        <button type="button" class="w-full flex items-center justify-center px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500" wire:click="next()">
                            <p>Proceed to checkout</p>
                        </button>
                    </div>
                </div>
            </x-general.grid>
            <! -- End Checkout -->
        </div>
    </div>
</div>


@push('js')
    <script>
       
       window.livewire.on('message', message => {
    alert(message);
    // or whatever alerting library you'd like to use
})
    </script>
@endpush