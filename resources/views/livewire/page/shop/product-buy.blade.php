<div class="">
    <div class="bg-white rounded-lg">
        <main class="my-8 py-6 px-4">
            <div class="container mx-auto px-6">
                <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
                <div class="flex flex-col lg:flex-row mt-2">
                    <div class="w-full lg:w-1/2 order-2">
                        <x-form.basic-form wire:submit.prevent="buy">
                            <x-slot name="content">
                                <div class="pb-8">
                                    <div class="lg:w-full">
                                        <div>
                                            <h4 class="text-base text-gray-600 font-medium">Billing Details</h4>
                                            <div class="mt-4" x-data="{ accordion: 0 }">
                                                <div class="flex items-center justify-between w-full bg-white border  p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 1 ? 0 : 1" type="radio"  id="" value="" name="address"  class="form-radio h-5 w-5 text-blue-600" >
                                                            <span class="ml-2 text-sm text-gray-700">Purchase for myself</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 1 }" x-cloak>
                                                    <div class="border-2 px-4 py-4">
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
                                                                        value6="state" 
                                                                        condition="state"
                                                                    />
                                                                </div>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center justify-between w-full bg-white rounded-b-none border p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 2 ? 0 : 2" type="radio" id="" value="" name="address" class="form-radio h-5 w-5 text-blue-600">
                                                        <span class="ml-2 text-sm text-gray-700">Purchase for others</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 2 }" x-cloak>
                                                    <div class="border-2  rounded-b-lg  px-4 py-4">
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
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="pb-8">
                                    <div class="lg:w-full">
                                        <div>
                                            <div class="mt-6">
                                                <div class="w-full bg-white  border leading-5 p-4 focus:outline-none">
                                                    <label class="block text-sm font-semibold leading-5 ml-2 text-gray-700 ">
                                                        Contact:
                                                    </label>
                                                    <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                        <div class="w-full ml-2">
                                                            <input class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{auth()->user()->email}}" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full bg-white  border leading-5 p-4 focus:outline-none">
                                                    <label class="block text-sm font-semibold leading-5 ml-2 text-gray-700 ">
                                                        Ship To:
                                                    </label>
                                                    <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                        <div class="w-full ml-2">
                                                            <input class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="No. 11 Jalan 9/6, Taman IKS Seksyen 9, 43650 Bandar Baru Bangi, Selangor, Malaysia" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div x-data="{ accordion: 0 }">
                                    <div class="lg:w-full">
                                        <div>
                                            <h4 class="text-base text-gray-600 font-medium">Shipping Method</h4>
                                            <div class="mt-3">
                                                <div class="flex items-center justify-between w-full bg-white   border  p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 1 ? 0 : 1" type="radio"  id="" value="" name="method"  class="form-radio h-5 w-5 text-blue-600" >
                                                        <span class="ml-2 text-sm text-gray-700">POSLAJU</span>
                                                    </label>
                                                    <span class="text-sm text-gray-700 font-semibold">RM 6.00</span>
                                                </div>
                                                <div class=" flex items-center justify-between w-full bg-white  border p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input type="radio" id="" value="" name="method" class="form-radio h-5 w-5 text-blue-600">
                                                        <span class="ml-2 text-sm text-gray-700">SELF COLLECT AT HEADQUARTERS</span>
                                                    </label>
                                                    <span class="text-sm text-gray-700 font-semibold">FREE</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{-- 
                                    <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 1 }" x-cloak>
                                        <div class="lg:w-full mt-5">
                                            <div>
                                                <h4 class="text-base text-gray-600 font-medium">Shipping Address</h4>
                                                <div class="mt-3">
                                                    <div class="flex items-center justify-between w-full bg-white   border  p-4 focus:outline-none">
                                                        <label class="flex items-center">
                                                            <input type="radio"  id="" value="" name="method"  class="form-radio h-5 w-5 text-blue-600" >
                                                            <span class="ml-2 text-sm text-gray-700">POSLAJU</span>
                                                        </label>
                                                        <span class="text-sm text-gray-700 font-semibold">RM 6.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="pb-8 mt-8">
                                    <div class="lg:w-full">
                                        <div class="mb-2">
                                            <h4 class="text-base text-gray-600 font-medium">Payment</h4>
                                            <span class="text-sm text-gray-500">All transactions are secure and encrypted</span>
                                        </div>
                                        <div class="bg-gray-200  pt-0 pl-0 pr-0 border">
                                            <div class="mr-auto text-lg font-medium bg-white text-white py-2 px-2 ">
                                                <div class="flex justify-between">
                                                    <div>
                                                        <img src="{{ asset('img/ipay88.png') }}"  class="w-auto h-10"/>
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('img/visa-mastercard-.jpg') }}"  class="w-auto h-10"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-12 px-4">
                                                <div class="flex justify-center items-center"  x-data="{ open : false  }">
                                                    <a href="#" class="animate-bounce" x-on:click="open = true">
                                                        <x-heroicon-o-credit-card class="w-auto h-28 text-gray-400" />
                                                    </a>
                                                    <x-general.modal modalActive="open" title="Payment" modalSize="lg">
                                                        <div class="flex flex-col gap-3">
                                                            <div class="h-96 overflow-y-auto">
                                                                <img src="{{ asset('img/senangPay-demo.png') }}" />
                                                            </div>
                                                            <a x-on:click="open = false" 
                                                                class="cursor-pointer text-center px-4 py-2 text-sm items-center text-white  bg-green-500 rounded hover:bg-green-600 focus:outline-none" >
                                                                Ok
                                                            </a>
                                                        </div>
                                                    </x-general.modal>
                                                </div>
                                                <span class="text-sm flex justify-center items-center text-center text-gray-400"> 
                                                    You have now selected and will be redirected to IPay88to <br>Complete your purchase securely
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>
                                    <div class="lg:w-full">
                                        <div>
                                            <h4 class="text-base text-gray-600 font-medium">Billing Details</h4>
                                            <div class="mt-6" x-data="{ accordion: 0 }">
                                                <div class="flex items-center justify-between w-full bg-white border  p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 1 ? 0 : 1" type="radio"  id="" value="" name="address"  class="form-radio h-5 w-5 text-blue-600" >
                                                            <span class="ml-2 text-sm text-gray-700">Purchase for Myself</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 1 }">
                                                    <div class="border-2 px-4 py-4">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                                                    <x-form.input type="text" label="First Name" value="fname" livewire="wire:model.lazy=fname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.input type="text" label="Last Name" value="lname" livewire="wire:model.lazy=lname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.input type="text" label="Company Name (optional)" value="cname" livewire="wire:model.lazy=cname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                   
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
                                                <div class=" flex items-center justify-between w-full bg-white rounded-b-none border p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                        <input @click="accordion = accordion == 2 ? 0 : 2" type="radio" id="" value="" name="address" class="form-radio h-5 w-5 text-blue-600">
                                                        <span class="ml-2 text-sm text-gray-700">Purchase for Others</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 2 }">
                                                    <div class="border-2  rounded-b-lg  px-4 py-4">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                                                    <x-form.input type="text" label="First Name" value="fname" livewire="wire:model.lazy=fname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.input type="text" label="Last Name" value="lname" livewire="wire:model.lazy=lname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.input type="text" label="Company Name (optional)" value="cname" livewire="wire:model.lazy=cname wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
                                                                    <x-form.input type="text" label="IC Number *" value="nric" livewire="wire:model.lazy=nric wire:loading.attr=readonly wire:loading.class=bg-gray-300 wire:target=submit"/>
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
                                        </div>
                                        <div class="flex items-center justify-end mt-8">
                                            <button class="flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600 focus:outline-none">
                                                <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                <span>COMPLETE ORDER</span>
                                            </button>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="flex items-center justify-end mt-2">
                                    <button class="flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600 focus:outline-none">
                                        <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                        <span>COMPLETE ORDER</span>
                                    </button>
                                </div>
                            </x-slot>
                        </x-form.basic-form>
                    </div>

                    <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2 mt-4">
                        <div class="flex justify-center lg:justify-end">
                            <div class="border  max-w-md w-full px-4 py-3">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-gray-700 font-medium">Order total (1)</h3>
                                </div>
                                <div class="flex justify-between mt-6 border-b-2 pb-4">
                                    <div class="flex">
                                        <img class="h-20 w-20 object-cover rounded"
                                            src="{{ asset('storage/'.$prod->prod_img1) }}"
                                            alt="">
                                        <div class="mx-3 my-3">
                                            <h3 class="text-sm text-gray-600">{{$prod->prod_name}}</h3>
                                        </div>
                                    </div>
                                    <span class="text-gray-600 my-3">{{$prod->prod_price}}</span>
                                </div>

                                <x-form.basic-form wire:submit.prevent="">
                                    <x-slot name="content">
                                        <div class=" mt-6 border-b-2 pb-4">
                                            <x-form.input label="Gift card or discount code" value=""  />
                                            <button class="flex items-center px-3 py-2 my-auto bg-indigo-500 text-white text-sm font-medium rounded-md hover:bg-indigo-600 focus:outline-none">
                                                <x-heroicon-o-badge-check class="w-5 h-5 mr-2" />
                                                <span>Apply</span>
                                        </button>
                                        </div>
                                    </x-slot>
                                </x-form.basic-form>

                                <div class="mt-6 border-b-2 pb-4">
                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Subtotal</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>RM {{$prod->prod_price}}</p>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Shipping</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>Free</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between mt-6 border-b-2 pb-4">
                                    <div class="font-semibold">
                                        <p>Total</p>
                                    </div>
                                    <div class="font-semibold text-lg">
                                        <p>RM {{$prod->prod_price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
</div>
</div>