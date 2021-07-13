<div>
    <div>
        <div class="flex flex-col w-full mt-8 intro-y sm:flex-row">
            <h2 class="text-lg font-medium">
                Cart
            </h2>
        </div>
            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                        <div class="p-4 mt-8 bg-white">

                            <!--Start desktop view-->
                            <div class="hidden lg:block">
                                <x-table.table>
                                    <x-slot name="thead">
                                            <x-table.table-header class="text-left" value="Product" sort="" />
                                            <x-table.table-header class="text-left" value="Unit Price" sort="" />
                                            <x-table.table-header class="text-left" value="Quantity" sort="" />
                                            <x-table.table-header class="text-left" value="Total Price" sort="" />
                                            <x-table.table-header class="text-center" value="Actions" sort="" />
                                        </div>
                                    </x-slot>
                                    <x-slot name="tbody">
                                        @php
                                        $total=0;
                                        $comm=0
                                        @endphp
                                        @foreach ($cart as $carts)
                                        @php
                                        $total += $carts->products->item->marketPrice->price*$carts->prod_qty;
                                        $comm += $carts->products->item->commissionKAP->agent_rate*$carts->prod_qty;
                                        @endphp
                                        <tr>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                                <div class="flex flex-col items-center space-x-3 lg:flex-row">
                                                    <img class="object-cover w-16 h-16 rounded"
                                                        src="{{ asset('img/gold/'.$carts->products->prod_img1) }}" alt="">
                                                    <div class="mt-4 lg:mt-0">
                                                        <h3 class="text-sm font-semibold">{{$carts->products->prod_name}}</h3>
                                                    </div>
                                                </div>
                                            </x-table.table-body>

                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                                <p>RM {{ number_format($carts->products->item->marketPrice->price, 2) }}</p>
                                            </x-table.table-body>

                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                                <div class="relative flex flex-row w-24 h-10 mt-1 bg-transparent rounded-lg">
                                                    <button data-action="decrement"
                                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-l cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                        <span class="m-auto text-2xl font-thin">−</span>
                                                    </button>
                                                    <input type="text" class="flex items-center justify-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default" name="custom-input-number" value="{{$carts->prod_qty}}"></input>
                                                    <button data-action="increment"
                                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                        <span class="m-auto text-2xl font-thin">+</span>
                                                    </button>
                                                </div>
                                            </x-table.table-body>

                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                                <p>RM {{ number_format($carts->products->item->marketPrice->price*$carts->prod_qty, 2) }}</p>
                                            </x-table.table-body>

                                            <x-table.table-body colspan="" class="relative text-xs font-medium text-gray-700">
                                                <div x-data="{ deleteOpen3 : false  }" class="flex justify-center">
                                                    <x-btn.tooltip-btn
                                                        class="flex items-center justify-center text-xs bg-red-600 rounded-full hover:bg-red-700"
                                                        btnRoute="#" tooltipTitle="Delete" x-on:click="deleteOpen3 = true">
                                                        <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                                    </x-btn.tooltip-btn>

                                                    {{-- Start modal delete --}}
                                                    <div class="cursor-default">
                                                        <x-general.new-modal modalName="deleteOpen3" size="sm" modalSize="sm"
                                                            closeBtn="yes">
                                                            <div class="">
                                                                <div
                                                                    class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full">
                                                                    <x-heroicon-o-trash class="w-8 h-8 text-red-600" />
                                                                </div>
                                                                <div class="py-4 font-semibold text-center text-black ">
                                                                    Are you sure you want to delete this item?
                                                                </div>
                                                                <div class="flex justify-center mt-3">
                                                                    <button
                                                                        class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none">
                                                                        Yes
                                                                    </button>
                                                                    <button
                                                                        class="flex px-4 py-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none"
                                                                        x-on:click="deleteOpen3 = false">
                                                                        No
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-general.new-modal>
                                                    </div>
                                                    {{-- End modal delete  --}}
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
                            <!--End desktop view-->

                            <!--Start Mobile view-->
                            <div class="block lg:hidden">
                                <div class="border-2 p-4 rounded-md">
                                        @php
                                        $total=0;
                                        $comm=0
                                        @endphp
                                        @foreach ($cart as $carts)
                                        @php
                                        $total += $carts->products->item->marketPrice->price*$carts->prod_qty;
                                        $comm += $carts->products->item->commissionKAP->agent_rate*$carts->prod_qty;
                                        @endphp
                                        <div class="border-b-2 py-2">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <img class="object-cover w-16 h-16 rounded" src="{{ asset('img/gold/'.$carts->products->prod_img1) }}" alt="">    
                                                    <h3 class="text-sm font-semibold">{{$carts->products->prod_name}}</h3>       
                                                </div>
                                                <div>
                                                    <div x-data="{ deleteOpen3 : false  }" class="flex justify-end pb-2">
                                                        <x-btn.tooltip-btn
                                                            class="flex items-center justify-center text-xs bg-red-600 rounded-full hover:bg-red-700"
                                                            btnRoute="#" tooltipTitle="Delete" x-on:click="deleteOpen3 = true">
                                                            <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                                        </x-btn.tooltip-btn>

                                                        {{-- Start modal delete --}}
                                                        <div class="cursor-default">
                                                            <x-general.new-modal modalName="deleteOpen3" size="sm" modalSize="sm"
                                                                closeBtn="yes">
                                                                <div class="">
                                                                    <div
                                                                        class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full">
                                                                        <x-heroicon-o-trash class="w-8 h-8 text-red-600" />
                                                                    </div>
                                                                    <div class="py-4 font-semibold text-center text-black ">
                                                                        Are you sure you want to delete this item?
                                                                    </div>
                                                                    <div class="flex justify-center mt-3">
                                                                        <button
                                                                            class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none">
                                                                            Yes
                                                                        </button>
                                                                        <button
                                                                            class="flex px-4 py-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none"
                                                                            x-on:click="deleteOpen3 = false">
                                                                            No
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </x-general.new-modal>
                                                        </div>
                                                        {{-- End modal delete  --}}
                                                    </div>
                                                    <div class="relative flex flex-row w-24 h-10 mt-1 bg-transparent rounded-lg">
                                                        <button data-action="decrement"
                                                            class="w-20 h-full text-gray-600 bg-gray-300 rounded-l cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                            <span class="m-auto text-2xl font-thin">−</span>
                                                        </button>
                                                        <input type="text" class="flex items-center justify-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default" name="custom-input-number" value="{{$carts->prod_qty}}"></input>
                                                        <button data-action="increment"
                                                            class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                            <span class="m-auto text-2xl font-thin">+</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-between mt-1">
                                                <div>
                                                    <p class="text-xs text-gray-500">UNIT PRICE</p>
                                                    <p class='text-sm font-semibold'>RM {{ number_format($carts->products->item->marketPrice->price*$carts->prod_qty, 2) }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-xs text-gray-500">TOTAL PRICE</p>
                                                    <p class='text-sm font-semibold text-right'>RM {{ number_format($carts->products->item->marketPrice->price*$carts->prod_qty, 2) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--End Mobile view-->

                            <! -- Start Checkout -->
                            <div class="flex justify-end my-6">
                                <div class="w-full px-4 py-4 bg-white border-2 rounded-lg lg:w-1/2">
                                    <div class="py-4 border-b-2">
                                        <h1 class="text-3xl font-semibold">Cart totals</h1>
                                    </div>
                                    <div class="flex flex-col py-4 border-b-2">
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-sm font-semibold lg:text-lg">
                                                <p>Misc. Charges</p>
                                            </div>
                                            <div class="text-sm font-semibold lg:text-lg">
                                                <p>RM 0.00</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-sm lg:text-base">
                                                <p>Shipping</p>
                                            </div>
                                            <div class="text-sm lg:text-base">
                                                <p>Will be calculated on checkout page</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-sm lg:text-base">
                                                <p>Insurances</p>
                                            </div>
                                            <div class="text-sm lg:text-base">
                                                <p>RM 0.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col py-4 border-b-2">
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-sm font-semibold text-red-600 lg:text-lg">
                                                <p>Less</p>
                                            </div>
                                            <div class="text-sm font-semibold text-red-600 lg:text-lg">
                                                <p>RM {{ (auth()->user()->isAgentKAP()) ? number_format($comm,2) : '0.00' }}</p>
                                            </div>
                                        </div>
                                        @if(auth()->user()->isAgentKAP())
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-sm text-red-500 lg:text-base">
                                                <p>Rebate</p>
                                            </div>
                                            <div class="text-sm text-red-500 lg:text-base">
                                                <p>RM {{ number_format($comm,2) }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-sm text-red-500 lg:text-base">
                                                <p>Promotions</p>
                                            </div>
                                            <div class="text-sm text-red-500 lg:text-base">
                                                <p>RM 0.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col py-4 border-b-2">
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-lg font-semibold">
                                                <p>Sub Total</p>
                                            </div>
                                            <div class="text-lg font-semibold">
                                                <p>RM {{number_format($total,2)}}</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-between lg:flex-row">
                                            <div class="text-lg font-semibold">
                                                <p>Total Payment</p>
                                            </div>
                                            <div class="text-lg font-semibold">
                                                <p>RM {{ (auth()->user()->isAgentKAP()) ? number_format($total-$comm,2) : number_format($total,2) }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-center my-6">
                                        <a href="{{ route('product-buy') }}"
                                            class="flex items-center justify-center w-full px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500">
                                            <p>Proceed to checkout</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <! -- End Checkout -->
                        </div>
                    </div>
                </div>
            </div>
</div>

<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value > 1) {
            value--;
        }
        target.value = value;
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value < 10) {
            value++;
        }
        target.value = value;
    }
    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );
    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );
    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });
    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>