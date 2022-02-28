<div class="">
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

                        <x-form.basic-form wire:submit.prevent="buy">

                            <x-slot name="content">
                            @if (auth()->user()->client != 2)
                                <div class="pb-8">
                                    <div class="lg:w-full">
                                        <div>
                                            <h4 class="text-base font-medium text-gray-600">Billing Details</h4>
                                            <div class="mt-4" x-data="{ accordion: 0 }">
                                                <div class="flex items-center justify-between w-full p-4 bg-white border focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 1 ? 0 : 1" type="radio"  id="" value="" name="address"  class="w-5 h-5 text-blue-600 form-radio" >
                                                            <span class="ml-2 text-sm text-gray-700">Purchase for myself</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 1 }" x-cloak>
                                                    <div class="px-4 py-4 border-2">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                                                    <x-form.input type="text" label="First Name" value="" livewire="wire:model.lazy=fname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.input type="text" label="Last Name" value="" livewire="wire:model.lazy=lname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.input type="text" label="Company Name (optional)" value="" livewire="wire:model.lazy=cname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.address class=""
                                                                        label="Address"
                                                                        value1="address1"
                                                                        value2="address2"
                                                                        value3="address3"
                                                                        value4="town"
                                                                        value5="postcode"
                                                                        value6="state_id"
                                                                        condition="state_id"
                                                                    />
                                                                </div>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between w-full p-4 bg-white border rounded-b-none focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 2 ? 0 : 2" type="radio" id="" value="" name="address" class="w-5 h-5 text-blue-600 form-radio">
                                                        <span class="ml-2 text-sm text-gray-700">Purchase for others</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 2 }" x-cloak>
                                                    <div class="px-4 py-4 border-2 rounded-b-lg">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                                                    <x-form.input type="text" label="First Name" value="" livewire="wire:model.lazy=fname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.input type="text" label="Last Name" value="" livewire="wire:model.lazy=lname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.input type="text" label="Company Name (optional)" value="" livewire="wire:model.lazy=cname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.input type="text" label="IC Number *" value="" livewire="wire:model.lazy=nric wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.address class=""
                                                                        label="Address"
                                                                        value1="address1"
                                                                        value2="address2"
                                                                        value3="address3"
                                                                        value4="town"
                                                                        value5="postcode"
                                                                        value6="state_id"
                                                                        condition="state_id"
                                                                    />
                                                                </div>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (auth()->user()->client != 2)
                                <div x-data="{ accordion: 0 }">
                                    <div class="lg:w-full">
                                        <div>
                                            <h4 class="text-base font-medium text-gray-600">Shipping Method</h4>
                                            <div class="mt-3">
                                                <div class="flex items-center justify-between w-full p-4 bg-white border focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 1 ? 0 : 1" type="radio"  id="" value="" name="method"  class="w-5 h-5 text-blue-600 form-radio" >
                                                        <span class="ml-2 text-sm text-gray-700">POSLAJU</span>
                                                    </label>
                                                    {{-- <span class="text-sm font-semibold text-gray-700">RM @if ($state_id==10) 9.00 @elseif ($state_id==11) 8.50 @else 6.00 @endif </span> --}}
                                                    <span class="text-sm font-semibold text-gray-700">RM {{number_format($postage,2)}}</span>
                                                </div>
                                                <div class="flex items-center justify-between w-full p-4 bg-white border focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 2 ? 0 : 2"  type="radio" id="" value="" name="method" class="w-5 h-5 text-blue-600 form-radio">
                                                        <span class="ml-2 text-sm text-gray-700">SELF COLLECT AT HEADQUARTERS</span>
                                                    </label>
                                                    <span class="text-sm font-semibold text-gray-700">FREE</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 1 }" x-cloak>
                                        <div class="mt-5 lg:w-full" x-data="{ show: true }">
                                            <div>
                                                <h4 class="text-base font-medium text-gray-600">Shipping Address</h4>
                                                <div class="mt-3">
                                                    <div class="flex items-center justify-between w-full p-4 bg-white border focus:outline-none">
                                                        <div class="flex items-center">
                                                            <input type="checkbox"
                                                                class="w-4 h-4 text-blue-700 transition duration-150 ease-in-out form-checkbox"
                                                                @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }"/>
                                                            <label class="block ml-2 text-sm leading-5 text-gray-700">
                                                                Same with billing details
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-4 border-2 rounded-b-lg" x-show="show">
                                                <x-form.basic-form>
                                                    <x-slot name="content">
                                                        <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                                            <x-form.input type="text" label="First Name" value="" livewire="wire:model.lazy=fname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                            <x-form.input type="text" label="Last Name" value="" livewire="wire:model.lazy=lname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                        </div>
                                                        <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                            <x-form.input type="text" label="Company Name (optional)" value="" livewire="wire:model.lazy=cname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                            <x-form.input type="text" label="IC Number *" value="" livewire="wire:model.lazy=nric wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                            <x-form.address class=""
                                                                label="Address"
                                                                value1="address1"
                                                                value2="address2"
                                                                value3="address3"
                                                                value4="town"
                                                                value5="postcode"
                                                                value6="state"
                                                                condition="state"
                                                            />
                                                        </div>
                                                    </x-slot>
                                                </x-form.basic-form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 2 }" x-cloak></div>
                                </div>
                            @endif

                                <div class="pb-8 mt-8">
                                    <div class="lg:w-full">
                                        <div class="mb-2">
                                            <h4 class="text-base font-medium text-gray-600">Payment</h4>
                                            <span class="text-sm text-gray-500">All transactions are secure and encrypted</span>
                                        </div>
                                        <div class="p-0 bg-gray-100 border shadow-lg">
                                            <div class="px-2 py-2 mr-auto text-lg font-medium text-white bg-white border-b">
                                                <div class="flex justify-between">
                                                    <div>
                                                        <img src="{{ asset('img/toyyibpay.png') }}"  class="w-auto h-10"/>
                                                    </div>
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
                                                                    <h6 class="text-sm text-gray-600">{{$prod->prod_qty}} pcs</h6>
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
                                                            @else
                                                                <span class="my-3 font-semibold text-gray-600">
                                                                    RM {{ number_format($prod->products->item->marketPrice->price*$prod->prod_qty, 2) }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                        @php
                                                            if ($prod->products->item->promotions != NULL && ($currentDate >= $prod->products->item->promotions->start_date) && ($currentDate <= $prod->products->item->promotions->end_date)) {
                                                                $total += $prod->products->item->promotions->promo_price * $prod->prod_qty;
                                                            } else {
                                                                $total += $prod->products->item->marketPrice->price * $prod->prod_qty;
                                                            }

                                                            $comm += $prod->commission->agent_rate*$prod->prod_qty;
                                                        @endphp
                                                        @endforeach
                                                        {{-- <x-form.basic-form wire:submit.prevent="">
                                                            <x-slot name="content">
                                                                <div class="pb-4 mt-6 border-b-2 ">
                                                                    @if (auth()->user()->client == 2)
                                                                    <x-form.input label="Agent Referral Code" value=""  />
                                                                    @else
                                                                    <x-form.input label="Gift card or discount code" value=""  />
                                                                    @endif
                                                                    <button class="flex items-center px-3 py-2 my-auto text-sm font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none">
                                                                        <x-heroicon-o-badge-check class="w-5 h-5 mr-2" />
                                                                        <span>Apply</span>
                                                                    </button>
                                                                </div>
                                                            </x-slot>
                                                        </x-form.basic-form> --}}

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

                                                            <div class="flex justify-between">
                                                                <div class="text-gray-500">
                                                                    <p>Promotions</p>
                                                                </div>
                                                                <div class="text-gray-500">
                                                                    <p>RM 0.00</p>
                                                                </div>
                                                            </div>
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
                                    </div>
                                </div>

                                @if(auth()->user()->active == 1)

                                    @if($products->isEmpty())
                                        <div class="flex items-center justify-end mt-2">
                                            <a type="button" class="flex items-center px-3 py-2 text-sm font-medium text-white bg-gray-500 rounded-md cursor-not-allowed hover:bg-gray-600 focus:outline-none">
                                                <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                <span>COMPLETE ORDER</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="flex items-center justify-end">
                                            <button class="flex items-center px-3 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none">
                                                <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                <span>COMPLETE ORDER</span>
                                            </button>
                                        </div>
                                    @endif
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
                            </x-slot>
                        </x-form.basic-form>
                    </div>

                    {{-- <div class="flex-shrink-0 order-1 w-full mt-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="flex justify-center lg:justify-end">
                            <div class="w-full max-w-md px-4 py-3 border">
                                <div class="flex items-center justify-between">

                                    <h3 class="font-medium text-gray-700">Order total ({{$tprod}})</h3>
                                </div>

                                @foreach ($products as $prod)

                                <div class="flex justify-between pb-4 mt-6 border-b-2">
                                    <div class="flex">
                                        <img class="object-cover w-20 h-20 rounded"
                                            src="{{ asset('img/gold/'.$prod->products->prod_img1) }}"
                                            alt="">
                                        <div class="mx-3 my-3">
                                            <h3 class="text-sm text-gray-600">{{$prod->products->prod_name}}</h3>
                                        </div>
                                    </div>
                                    <span class="my-3 font-semibold text-gray-600">RM {{number_format($prod->products->prod_price*$prod->prod_qty,2)}}</span>
                                </div>
                                @php
                                    $total+=$prod->products->prod_price*$prod->prod_qty;
                                @endphp
                                @endforeach

                                <x-form.basic-form wire:submit.prevent="">
                                    <x-slot name="content">
                                        <div class="pb-4 mt-6 border-b-2 ">
                                            @if (auth()->user()->client == 2)
                                            <x-form.input label="Agent Referral Code" value=""  />
                                            @else
                                            <x-form.input label="Gift card or discount code" value=""  />
                                            @endif
                                            <button class="flex items-center px-3 py-2 my-auto text-sm font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none">
                                                <x-heroicon-o-badge-check class="w-5 h-5 mr-2" />
                                                <span>Apply</span>
                                        </button>
                                        </div>
                                    </x-slot>
                                </x-form.basic-form>

                                <div class="pb-4 mt-6 border-b-2">
                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Subtotal</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>RM {{number_format($total,2)}}</p>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Shipping</p>
                                        </div>
                                        <div class="font-semibold">
                                            @if (auth()->user()->client == 2)
                                            <p>RM 0.00</p>
                                            @else
                                            <p>RM {{number_format($postage,2)}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between pb-4 mt-6 border-b-2">
                                    <div class="font-semibold">
                                        <p>Total</p>
                                    </div>
                                    <div class="text-lg font-semibold">
                                        @if (auth()->user()->client == 2)
                                            <p>RM {{number_format($total,2)}}</p>
                                        @else
                                            <p>RM {{number_format($total+$postage,2)}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </main>
    </div>
</div>
</div>