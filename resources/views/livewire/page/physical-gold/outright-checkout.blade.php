<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Outright Checkout
            </h2>
        </div>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
        @endif
        <div class="p-4 mt-8 bg-white">
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Product" sort="" />
                    <x-table.table-header class="text-left" value="Current Product Price" sort="" />
                    <x-table.table-header class="text-left" value="Quantity" sort="" />
                    <x-table.table-header class="text-left" value="Outright Price" sort="" />
                </x-slot>
                <x-slot name="tbody">

                    @foreach ($gtype as $types)
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-3 items-center">
                                <img class="object-cover w-16 h-16 rounded" src="{{ asset('img/gold/'.$types->prod_img1) }}" alt="">
                                <div>
                                    <h3 class="text-sm font-semibold">{{$types->prod_name}}</h3>
                                </div>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM {{$types->prod_price}}</p>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                <button  wire:click="exitProd({{-1}},'{{$types->prod_weight}}')"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="text"
                                    class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                    hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                    justify-center
                                    text-gray-700 
                                    outline-none"
                                    name="custom-input-number" wire:model="goldbar{{$types->prod_cat}}" value="goldbar{{$types->prod_cat}}" ></input>
                                <button  wire:click="exitProd({{1}},'{{$types->prod_weight}}')"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM {{$types->outright_price}}</p>
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
                <div class="bg-white py-4 w-2/5">
                    <div x-data="{ accordion: 0 ,accordion1: 0  }">
                        <div class="w-full p-4  focus:outline-none">
                            <label class="flex">
                                <input @click="accordion = accordion == 1 ? 0 : 1" type="checkbox"  id="" value="" name="physical_gold" wire:click="buyback()"
                                class="w-5 h-5 text-blue-600 form-checkbox">
                            </label>
                            <div class="flex flex-col ml-8 text-left justify-start -mt-6">
                                <span class="block text-sm font-medium text-gray-900">
                                    Buy Back
                                </span>
                                <span class="block text-sm text-gray-500">
                                    You can repurchase your surrendered digital gold at a fixed rate for upto<br>
                                    6 + 1 months.
                                </span>
                            </div>
                        </div>
                        <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 1 }" x-cloak>
                            
                        </div>
                    </div>
                </div>
                <div class=" w-1/5 ">
                </div>
                
                <div class="bg-white py-4 px-4  rounded-lg w-2/5 border-2">
                    <div class="border-b-2 py-4">
                        <h1 class="text-3xl font-semibold">Total Outright</h1>
                    </div>
                    
                    <div class="flex justify-between border-b-2 py-4">
                        <div class="font-semibold text-lg">
                            <p>Total Price</p>
                        </div>
                        <div class="font-semibold text-lg">
                            <p>RM {{($info_bar061->outright_price*$goldbar061)+($info_bar062->outright_price*$goldbar062)+($info_bar063->outright_price*$goldbar063)+($info_bar064->outright_price*$goldbar064)}}</p>
                        </div>
                    </div>
                    <div class="flex justify-center my-6">
                        <button type="button" class="w-full flex items-center justify-center px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500" wire:click="outright()">
                            <p>Proceed to checkout</p>
                        </button>
                    </div>
                </div>
            </div>
            <! -- End Checkout -->
        </div>
    </div>
</div>
