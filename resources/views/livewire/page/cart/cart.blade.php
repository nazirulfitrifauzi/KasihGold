<div>
    <div>
        <div class="flex flex-col w-full mt-8 intro-y sm:flex-row">
            <h2 class="text-lg font-medium">
                Shopping Cart
            </h2>
        </div>
        <div class="col-span-12 mb-20 lg:col-span-12 xxl:col-span-12 sm:mb-0">
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

                                </x-slot>
                                <x-slot name="tbody">

                                    @foreach ($this->karts as $cartInfo)
                                    <tr>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <div class="flex flex-col items-center space-x-3 lg:flex-row">
                                                <img class="object-cover w-16 h-16 rounded"
                                                    src="{{ asset('img/product/'.$cartInfo->products->prod_cat.'/'.$cartInfo->products->item_id.'/'.$cartInfo->products->prod_img1) }}" alt="">

                                                <div class="mt-4 lg:mt-0">
                                                    <h3 class="text-sm font-semibold">{{$cartInfo->products->prod_name}}</h3>
                                                </div>
                                            </div>
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            @php
                                                $currentDate = date('Y-m-d');
                                                $currentDate = date('Y-m-d', strtotime($currentDate));
                                                $startDate = $cartInfo->products->item->promotions->start_date ?? '';
                                                $endDate = $cartInfo->products->item->promotions->end_date ?? '';
                                            @endphp
                                            @if($cartInfo->products->item->promotions !== NULL && ($currentDate >= $startDate) && ($currentDate <= $endDate))
                                                <p>RM {{ (auth()->user()->isAgentKAP()) ?
                                                number_format(($cartInfo->products->item->promotions->promo_price - $cartInfo->products->item->commissionKAP->agent_rate),2) :
                                                number_format($cartInfo->products->item->promotions->promo_price,2) }}</p>
                                            @else
                                                <p>RM {{ (auth()->user()->isAgentKAP()) ?
                                                number_format(($cartInfo->products->item->marketPrice->price-$cartInfo->products->item->commissionKAP->agent_rate),2) :
                                                number_format($cartInfo->products->item->marketPrice->price,2) }}</p>
                                            @endif
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <div class="relative flex flex-row w-24 h-10 mt-1 bg-transparent rounded-lg">
                                                <button  wire:click="subProd({{$cartInfo->id}})"
                                                    class="w-20 h-full text-gray-600 bg-gray-300 rounded-l cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                    <span class="m-auto text-2xl font-thin">-</span>
                                                </button>

                                                <input  type="text"
                                                        class="flex items-center justify-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                                                        name="custom-input-number"  value="{{$cartInfo->prod_qty}}" disabled></input>
                                                <button  wire:click="addProd({{$cartInfo->id}})"
                                                    class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                    <span class="m-auto text-2xl font-thin">+</span>
                                                </button>
                                            </div>
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            @if($cartInfo->products->item->promotions !== NULL && ($currentDate >= $startDate) && ($currentDate <= $endDate))
                                                <p>RM {{ (auth()->user()->isAgentKAP()) ?
                                                number_format(($cartInfo->products->item->promotions->promo_price - $cartInfo->products->item->commissionKAP->agent_rate * $cartInfo->prod_qty),2) :
                                                number_format($cartInfo->products->item->promotions->promo_price * $cartInfo->prod_qty,2) }}</p>
                                            @else
                                                <p>RM {{ (auth()->user()->isAgentKAP()) ?
                                                number_format((($cartInfo->products->item->marketPrice->price - $cartInfo->products->item->commissionKAP->agent_rate * $cartInfo->prod_qty)),2)
                                                : number_format($cartInfo->products->item->marketPrice->price * $cartInfo->prod_qty,2) }}</p>
                                            @endif
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="relative text-xs font-medium text-gray-700">
                                            <div class="flex justify-center">
                                                <x-btn.tooltip-btn  class="flex items-center justify-center text-xs bg-red-600 rounded-full hover:bg-red-700"
                                                    btnRoute="#" tooltipTitle="Delete"
                                                    data-id="{{ $cartInfo->id }}" onclick="deleteConfirmation({{ $cartInfo->id }})">
                                                    <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                                </x-btn.tooltip-btn>

                                                <x-popup.delete name="deleteConfirmation" variable="id" posturl="{{ url('/cart') }}/"  />
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
                            <div class="p-4 border-2 rounded-md">

                                    @foreach ($this->karts as $cartInfo)
                                    <div class="py-2 border-b-2">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <img class="object-cover w-16 h-16 rounded" src="{{ asset('img/gold/'.$cartInfo->products->prod_img1) }}" alt="">
                                                <h3 class="text-sm font-semibold">{{$cartInfo->products->prod_name}}</h3>
                                            </div>
                                            <div>
                                                <div class="flex justify-end pb-2">
                                                    <x-btn.tooltip-btn  class="flex items-center justify-center text-xs bg-red-600 rounded-full hover:bg-red-700"
                                                        btnRoute="#" tooltipTitle="Delete"
                                                        data-id="{{ $cartInfo->id }}" onclick="deleteConfirmation({{ $cartInfo->id }})">
                                                        <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                                    </x-btn.tooltip-btn>

                                                    <x-popup.delete name="deleteConfirmation" variable="id" posturl="{{ url('/cart') }}/"  />
                                                </div>

                                                <div class="relative flex flex-row w-24 h-10 mt-1 bg-transparent rounded-lg">

                                                    <button  wire:click="subProd({{$cartInfo->products->prod_weight}})"
                                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-l cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                        <span class="m-auto text-2xl font-thin">-</span>
                                                    </button>

                                                    <input  type="text"
                                                            class="flex items-center justify-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                                                            name="custom-input-number" wire:model="qty_{{$cartInfo->products->prod_cat}}" value="qty_{{$cartInfo->products->prod_cat}}" ></input>

                                                    <button  wire:click="addProd({{$cartInfo->products->prod_weight}})"
                                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400 focus:outline-none">
                                                        <span class="m-auto text-2xl font-thin">+</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between mt-1">
                                            <div>
                                                <p class="text-xs text-gray-500">UNIT PRICE</p>
                                                <p class='text-sm font-semibold'>RM {{ (auth()->user()->isAgentKAP()) ? number_format(($cartInfo->products->item->marketPrice->price-$cartInfo->products->item->commissionKAP->agent_rate),2) : number_format($cartInfo->products->item->marketPrice->price,2) }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500">TOTAL PRICE</p>
                                                <p class='text-sm font-semibold text-right'>RM {{ (auth()->user()->isAgentKAP()) ? number_format((($cartInfo->products->item->marketPrice->price-$cartInfo->products->item->commissionKAP->agent_rate)),2) : number_format($cartInfo->products->item->marketPrice->price*$cartInfo->prod_qty,2) }}</p>

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

                                <div class="py-4 border-b-2">
                                    <x-form.basic-form wire:submit.prevent="calculatePromo">
                                        <x-slot name="content">
                                            <div class="flex space-x-4">
                                                <div class="flex-grow">
                                                    <x-form.input placeholder="Promo Code" label="" wire:model.defer="promo_code" value="promo_code" />
                                                </div>
                                                <div class="flex-none">
                                                    <button type="submit" class="flex items-center px-6 py-2 mt-1 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </x-slot>
                                    </x-form.basic-form>
                                </div>
                                
                                <div class="flex flex-col py-4 border-b-2">
                                    <div class="flex flex-col justify-between lg:flex-row">
                                        <div class="text-sm font-semibold lg:text-lg">
                                            <p>Misc. Charges</p>
                                        </div>
                                        <div class="text-sm font-semibold lg:text-lg">
                                            <p>RM 1.00</p>
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
                                    <div class="flex flex-col justify-between lg:flex-row">
                                        <div class="text-sm lg:text-base">
                                            <p>FPX Payment Fees</p>
                                        </div>
                                        <div class="text-sm lg:text-base">
                                            <p>RM 1.00</p>
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
                                            <p>RM {{number_format($this->total+1,2)}}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-between lg:flex-row">
                                        <div class="text-lg font-semibold">
                                            <p>Total Payment</p>
                                        </div>
                                        <div class="text-lg font-semibold">
                                            <p>RM {{ (auth()->user()->isAgentKAP()) ? number_format(($this->total-$this->comm)+1,2) : number_format($this->total+1,2) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-center my-6">

                                    @if($this->karts->isEmpty())
                                    <a type="button"
                                        class="flex items-center justify-center w-full px-2 py-2 text-sm font-bold text-white bg-gray-500 rounded cursor-not-allowed focus:outline-none hover:bg-gray-600">
                                        <p>Proceed to checkout</p>
                                    </a>
                                    @else
                                    <a href="{{ route('product-buy') }}"
                                        class="flex items-center justify-center w-full px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500">
                                        <p>Proceed to checkout</p>
                                    </a>
                                    @endif
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

@push('js')
    <script>
        window.livewire.on('message', message => {
            Swal.fire({
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 2500
            });
        })
    </script>
@endpush
