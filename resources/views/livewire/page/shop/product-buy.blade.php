<div class=""  x-data="{disableBtn : false}">
    <div class="mb-20 bg-white rounded-lg sm:mb-0">
        <main class="px-4 py-6 my-8">
            <div class="container mx-auto">
                <h3 class="text-2xl font-medium text-gray-700">Checkout</h3>
                <div class="flex flex-col mt-2 lg:flex-row">
                    <div class="order-2 w-full ">
                        @php
                            $total = 0;
                            $comm = 0;
                        @endphp
                        @if ($state_id==10) @php $postage=9; @endphp @elseif ($state_id==11) @php $postage=8.50; @endphp @else @php $postage=6; @endphp @endif

                        <x-form.basic-form>
                            <x-slot name="content">
                                <div class="pb-8 mt-8">
                                    <div class="lg:w-full">
                                        <div class="mb-2">
                                            <h4 class="text-base font-medium text-gray-600">Payment</h4>
                                            <span class="text-sm text-gray-500">All transactions are secure and encrypted</span>
                                        </div>

                                        <div class="mb-4 border rounded-md ">
                                            <div class="px-4 py-2 text-white bg-gray-800 rounded-t-md">
                                                <p class="font-semibold">Select Payment</p>
                                            </div>
                                            <div class="p-4">
                                                <div class="grid grid-cols-1 gap-0 md:grid-cols-2">
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div class="p-4 border rounded-md cursor-pointer hover:bg-yellow-300 {{$selectPayment == 'snapNpay' ? 'bg-yellow-300' : 'bg-white'}}"
                                                            wire:click="select_payment('snapNpay')"
                                                            @click="disableBtn = true" >
                                                            <div class="flex justify-center ">
                                                                <img src="{{ asset('img/snapNpay.png') }}" class="w-auto h-12" >
                                                            </div>
                                                            <p class="mt-2 text-xs text-center ">
                                                                Service Charge : RM 0.00
                                                            </p>
                                                        </div>
                                                        <div class="p-4 border rounded-md cursor-pointer hover:bg-yellow-300  {{$selectPayment == 'toyyib' ? 'bg-yellow-300' : 'bg-white'}}"
                                                        wire:click="select_payment('toyyib')"
                                                        @click="disableBtn = true">
                                                            <div class="flex justify-center">
                                                                <img src="{{ asset('img/toyyibpay.png') }}"  class="w-auto h-12"/>
                                                            </div>
                                                            <p class="mt-2 text-xs text-center ">
                                                                Service Charge : RM 1.00
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($selectPayment != null)
                                            @if($selectPayment == 'toyyib')
                                                <x-form.basic-form wire:submit.prevent="buy">
                                            @elseif($selectPayment == 'snapNpay')
                                                <x-form.basic-form method="post" id="payment" action="https://paydev.tulus.my/">
                                            @endif

                                                <div class="p-0 bg-gray-100 border shadow-lg">
                                                    <div class="px-2 py-2 mr-auto text-lg font-medium text-white bg-white border-b">
                                                        <div class="flex justify-between">
                                                            @if($selectPayment == 'toyyib')
                                                                <img src="{{ asset('img/toyyibpay.png') }}"  class="w-auto h-10"/>
                                                            @else
                                                                <img src="{{ asset('img/snapNpay.png') }}"  class="w-auto h-10 mt-2"/>
                                                            @endif
                                                            <div>
                                                                <img src="{{ asset('img/visa-mastercard-.jpg') }}"  class="w-auto h-10"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-shrink-0 order-1 w-full mt-4 mb-8 ">
                                                        <div class="px-4 py-6">
                                                            <div class="w-full px-4 py-3 border">
                                                                <div class="flex items-center justify-between">
                                                                    <h3 class="font-medium text-gray-700">Order total ({{ $tprod }})</h3>
                                                                </div>

                                                                @foreach ($products as $prod)
                                                                    <div class="flex justify-between pb-4 mt-6 border-b-2">
                                                                        <div class="flex">
                                                                            <img class="object-cover w-20 h-20 rounded"
                                                                            src="{{ asset('img/product/'.$prod->products->prod_cat.'/'.$prod->products->item_id.'/'.$prod->products->prod_img1) }}" alt="">

                                                                            <div class="mx-3 my-3">
                                                                                <h3 class="text-sm text-gray-600">{{$prod->products->prod_name}}</h3>
                                                                                @if ($prod->products->prod_cat == 3)
                                                                                <h6 class="text-sm text-gray-600">{{$prod->prod_gram}} g</h6>
                                                                                @else
                                                                                <h6 class="text-sm text-gray-600">{{$prod->prod_qty}} pcs</h6>
                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                        @php
                                                                            $currentDate = date('Y-m-d');
                                                                            $currentDate = date('Y-m-d', strtotime($currentDate));
                                                                            $startDate = $prod->products->item->promotions->start_date ?? '';
                                                                            $endDate = $prod->products->item->promotions->end_date ?? '';
                                                                        @endphp
                                                                        @if($prod->products->item->promotions !== NULL && ($currentDate >= $startDate) && ($currentDate <= $endDate))
                                                                            <span class="my-3 font-semibold text-gray-600">
                                                                                RM {{ number_format($prod->products->item->promotions->promo_price*$prod->prod_qty, 2) }}
                                                                            </span>
                                                                        @elseif ($prod->products->prod_cat == 3)
                                                                            <span class="my-3 font-semibold text-gray-600">
                                                                                RM {{ number_format(($prod->products->item->marketPrice->price+round(($prod->products->item->marketPrice->price*$prod->percentage()),2))*$prod->prod_gram,2) }}
                                                                            </span>
                                                                        @else
                                                                            <span class="my-3 font-semibold text-gray-600">
                                                                                RM {{ number_format($prod->products->item->marketPrice->price*$prod->prod_qty, 2) }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    @php
                                                                        if ($prod->products->item->promotions != NULL && ($currentDate >= $prod->products->item->promotions->start_date) && ($currentDate <= $prod->products->item->promotions->end_date)) {
                                                                            $total += $prod->products->item->promotions->promo_price * $prod->prod_qty;
                                                                        }
                                                                        elseif ($prod->products->prod_cat == 3) {
                                                                            $total += ($prod->products->item->marketPrice->price+(round($prod->products->item->marketPrice->price*$prod->percentage(),2)))*$prod->prod_gram;
                                                                        }
                                                                        else {
                                                                            $total += $prod->products->item->marketPrice->price * $prod->prod_qty;
                                                                        }


                                                                        if ($prod->products->prod_cat == 3){
                                                                            $comm += ( $prod->commission->agent_rate/100)* ($prod->products->item->marketPrice->price+(round($prod->products->item->marketPrice->price*$prod->percentage(),2)))*$prod->prod_gram;
                                                                        }
                                                                        else
                                                                            $comm += $prod->commission->agent_rate*$prod->prod_qty;

                                                                    @endphp
                                                                @endforeach

                                                                <div class="pb-4 mt-6 border-b-2">
                                                                    <div class="flex justify-between">
                                                                        <div class="font-semibold">
                                                                            <p>Subtotal</p>
                                                                        </div>
                                                                        <div class="font-semibold">
                                                                            <p>RM {{number_format($total,2)}}</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="flex justify-between mt-4">
                                                                        <div class="font-semibold">
                                                                            <p>Misc. Charges</p>
                                                                        </div>
                                                                        <div class="font-semibold">
                                                                            <p>RM 1.00</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="flex justify-between">
                                                                        <div class="text-gray-500">
                                                                            <p>Shipping</p>
                                                                        </div>
                                                                        <div class="text-gray-500">
                                                                            @if (auth()->user()->client == 2)
                                                                            <p>RM 0.00</p>
                                                                            @else
                                                                            <p>RM {{number_format($postage,2)}}</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="flex justify-between">
                                                                        <div class="text-gray-500">
                                                                            <p>Insurances</p>
                                                                        </div>
                                                                        <div class="text-gray-500">
                                                                            <p>RM 0.00</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex justify-between">
                                                                        <div class="text-gray-500">
                                                                            <p>FPX Payment Fees</p>
                                                                        </div>
                                                                        <div class="text-gray-500">
                                                                            <p>RM 1.00</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="flex justify-between mt-4">
                                                                        <div class="font-semibold text-red-600">
                                                                            <p>Less</p>
                                                                        </div>
                                                                        <div class="font-semibold text-red-600">
                                                                            <p>RM {{ (auth()->user()->isAgentKAP()) ? number_format($comm,2) : '0.00' }}</p>
                                                                        </div>
                                                                    </div>

                                                                    @if(auth()->user()->isAgentKAP())
                                                                        <div class="flex justify-between">
                                                                            <div class="text-red-500 ">
                                                                                <p>Rebate</p>
                                                                            </div>
                                                                            <div class="text-red-500 ">
                                                                                <p>RM {{ number_format($comm,2) }}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    @if ($apply_code)
                                                                        <div class="flex justify-between">
                                                                            <div class="text-green-500">
                                                                                <p>{{ $apply_code_type }}</p>
                                                                            </div>
                                                                            <div class="text-green-500">
                                                                                <p>Code Applied : ({{ $apply_code }})</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                                <div class="flex justify-between pb-4 mt-6 border-b-2">
                                                                    <div class="font-semibold">
                                                                        <p>Total Payment</p>
                                                                    </div>
                                                                    <div class="text-lg font-semibold">
                                                                        @if (auth()->user()->client == 2)
                                                                            <p>RM {{ (auth()->user()->isAgentKAP()) ? number_format(($total-$comm)+1,2) : number_format($total+1,2) }}</p>
                                                                        @else
                                                                            <p>RM {{number_format(($total+$postage)+1,2)}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(auth()->user()->active == 1)
                                                    <div
                                                        x-show="disableBtn == true"
                                                        class="flex items-center justify-end mt-2">
                                                        @if($selectPayment == 'toyyib')
                                                            <a type="button" wire:click="buy" class="flex items-center px-3 py-2 text-sm font-medium text-white bg-green-500 rounded-md cursor-pointer hover:bg-green-600 focus:outline-none">
                                                                <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                                <span>COMPLETE ORDER</span>
                                                            </a>
                                                        @elseif($selectPayment == 'snapNpay')
                                                            <button class="flex items-center px-3 py-2 text-sm font-medium text-white bg-green-500 rounded-md cursor-pointer hover:bg-green-600 focus:outline-none">
                                                                <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                                <span>COMPLETE ORDER</span>
                                                            </button>
                                                        @endif
                                                    </div>

                                                    <div
                                                        x-show="disableBtn == false"
                                                        class="flex items-center justify-end mt-2">
                                                        <a type="button" class="flex items-center px-3 py-2 text-sm font-medium text-white bg-gray-500 rounded-md cursor-not-allowed hover:bg-gray-600 focus:outline-none">
                                                            <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                            <span>COMPLETE ORDER</span>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="p-4 rounded-md bg-red-50">
                                                        <div class="flex">
                                                            <div class="flex-shrink-0">
                                                                <x-heroicon-o-x-circle class="w-5 h-5 text-red-400" />
                                                            </div>
                                                            <div class="ml-3">
                                                                <h3 class="text-sm font-medium text-red-800">
                                                                    You cannot making any transaction until your account has been approved by Admin.
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end mt-2">
                                                        <a type="button" class="flex items-center px-3 py-2 text-sm font-medium text-white bg-gray-500 rounded-md cursor-not-allowed hover:bg-gray-600 focus:outline-none">
                                                            <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                            <span>COMPLETE ORDER</span>
                                                        </a>
                                                    </div>
                                                @endif
                                            </x-form.basic-form>
                                        @endif
                                    </div>
                                </div>
                            </x-slot>

                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</div>



@push('js')
    <script>
        window.livewire.on('message', message => {
            Swal.fire({
                icon: message.icon,
                title: message.message,
                showConfirmButton: false,
                timer: 2500
            });
        })
    </script>
@endpush