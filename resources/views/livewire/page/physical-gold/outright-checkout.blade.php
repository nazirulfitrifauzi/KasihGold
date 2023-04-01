<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                @if ($this->buybackStatus==0)
                    Outright Checkout 
                @else
                    Buyback Checkout 
                @endif
            </h2>
        </div>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
        @endif
        <div class="p-4 mt-8 bg-white mb-20 sm:mb-0">

            <!--Start desktop view-->
            <div class="hidden lg:block">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Product" sort="" />
                        <x-table.table-header class="text-left" value="Total Quantity Available" sort="" />
                        <x-table.table-header class="text-left" value="Quantity" sort="" />
                    </x-slot>
                    <x-slot name="tbody">

                        @foreach ($goldO as $types)
                        @if($types->products->prod_cat!=3)
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-3 items-center">
                                    <img class="object-cover w-16 h-16 rounded" 
                                    src="{{ asset('img/product/'.$types->products->prod_cat.'/'.$types->products->item_id.'/'.$types->products->prod_img1) }}" alt="">
                                    <div>
                                        <h3 class="text-sm font-semibold">{{$types->products->prod_name}}</h3>
                                    </div>
                                </div>
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{$types->total}} Pcs</p>
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                    <button  wire:click="exitProdSub({{$types->products->item_id}})"
                                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                    </button>

                                    @php
                                        $cart_qty = 0;
                                        $quantity = DB::table('inv_cart')->select('prod_qty')->where('user_id', auth()->user()->id)->where('exit_type', 1)->where('item_id',$types->products->item_id)->where('deleted_at',NULL)->first();
                                    @endphp
                                    <input type="text"
                                        class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                        hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                        justify-center
                                        text-gray-700 
                                        outline-none"
                                        name="custom-input-number" value="{{($quantity ? $quantity->prod_qty : 0)}}" disabled>
                                    
                                    </input>
                                    @if(!empty($quantity))
                                    @endif
                                    <button  wire:click="exitProdAdd({{$types->products->item_id}})"
                                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </x-table.table-body>

                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <x-table.table-body colspan="2" class="text-xs text-right font-medium text-gray-700 ">
                               <p>Total Weight</p>
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-{{ ($gross_weight >= 1 &&  (floor($gross_weight) == $gross_weight)) ? 'grey' : 'red' }}-700 ">
                                <p>{{$gross_weight}} g</p>
                            </x-table.table-body>
                        </tr>
                        
                        

                    </x-slot>
                    <div class="px-2 py-2">
                    </div>
                </x-table.table>
            </div>
            <!--End desktop view-->

            <!--Start Mobile view-->
            <div class="block lg:hidden">
                <div class="border-2 p-4 rounded-md">
                    @foreach ($goldO as $types)
                        @if($types->products->prod_cat!=3)
                            <div class="border-b-2 py-2">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <img class="object-cover w-16 h-16 rounded" 
                                        src="{{ asset('img/product/'.$types->products->prod_cat.'/'.$types->products->item_id.'/'.$types->products->prod_img1) }}"alt="">
                                        <h3 class="text-sm font-semibold">{{$types->products->prod_name}}</h3>
                                    </div>
                                    <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                        <button  wire:click="exitProdSub({{$types->products->item_id}})"
                                            class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                            <span class="m-auto text-2xl font-thin">−</span>
                                        </button>

                                        @php
                                            $cart_qty = 0;
                                            $quantity = DB::table('inv_cart')->select('prod_qty')->where('user_id', auth()->user()->id)->where('exit_type', 1)->where('item_id',$types->products->item_id)->where('deleted_at',NULL)->first();
                                        @endphp
                                    
                                        <input type="text"
                                            class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                            hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                            justify-center
                                            text-gray-700 
                                            outline-none"
                                            name="custom-input-number" value="{{($quantity ? $quantity->prod_qty : 0)}}" disabled>
                                        </input>
                                        <button  wire:click="exitProdAdd({{$types->products->item_id}})"
                                            class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                            <span class="m-auto text-2xl font-thin">+</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="border-b-2 py-2">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-sm font-semibold">Total Weight</h3>
                            </div>

                            <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                <h3 class="text-sm font-semibold text-{{ ($gross_weight >= 1 &&  (floor($gross_weight) == $gross_weight)) ? 'grey' : 'red' }}-700 ">{{$gross_weight}} g</h3>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--End Mobile view-->



            <! -- Start Checkout -->
            <x-general.grid mobile="1" gap="8" sm="1" md="2" lg="2" xl="2" class="w-full col-span-12 mt-6">
                <div class="bg-white py-2">
                    <div x-data="{ accordion: 0 ,accordion1: 0  }">
                        <div class="w-full px-2 py-4  focus:outline-none">
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
    
                <div class="bg-white py-2 px-4  rounded-lg  border-2">
                    <div class="border-b-2 py-4">
                    @if ($this->buybackStatus==0)
                        <h1 class="text-3xl font-semibold">Total Outright</h1>
                    @else
                        <h1 class="text-3xl font-semibold">Total Buyback</h1>
                    @endif
                    </div>
                    
                    <div class="flex justify-between border-b-2 py-4">
                        <div class="font-semibold text-lg">
                            <p>Total Price</p>
                        </div>
                        <div class="font-semibold text-lg">
                            <p>RM {{number_format($total,2)}}</p>
                        </div>
                    </div>
                    @if ($this->buybackStatus==1)
                    <div class="flex justify-between border-b-2 py-4">
                        <div class="font-semibold text-lg">
                            <p>Total Buyback Price</p>
                        </div>
                        <div class="font-semibold text-lg">
                            <p>RM {{number_format($total*1.06,2)}}</p>
                        </div>
                    </div>
                    @endif
                    <div class="flex justify-center my-6">
                        <button type="button" class="w-full flex items-center justify-center px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500" wire:click="outright()">
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
})
    </script>
@endpush
