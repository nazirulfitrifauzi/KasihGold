    <div class="">
        <div class="bg-white rounded-lg">
            <main class="my-8 py-6 px-4">
                <div class="container mx-auto px-6">
                    <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
                    <div class="flex flex-col lg:flex-row mt-2">
                        <div class="w-full lg:w-1/2 order-2">
                            <x-form.basic-form wire:submit.prevent="">
                                <x-slot name="content">
                                    <div class="pb-8">
                                        <div class="lg:w-full">
                                            <div>
                                                <div class="mt-6">
                                                    <div class="w-full bg-white  border leading-5 p-4 focus:outline-none rounded-t-lg">
                                                        <div class="w-full ml-2">
                                                            <x-form.input label="Contact" value=""  />
                                                        </div>
                                                    </div>
                                                    <div class="w-full bg-white  border leading-5 p-4 focus:outline-none rounded-b-lg">
                                                        <div class="w-full ml-2">
                                                            <x-form.input label="Ship To" value=""  />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="lg:w-full">
                                            <div>
                                                <h4 class="text-base text-gray-600 font-medium">Shipping Method</h4>
                                                <div class="mt-3">
                                                    <div class="flex items-center justify-between w-full bg-white rounded-t-lg  border  p-4 focus:outline-none">
                                                        <label class="flex items-center">
                                                            <input type="radio"  id="" value="" name="method"  class="form-radio h-5 w-5 text-blue-600" >
                                                            <span class="ml-2 text-sm text-gray-700">DHL/POSLAJU</span>
                                                        </label>
                                                        <span class="text-sm text-gray-700 font-semibold">FREE</span>
                                                    </div>
                                                    <div class=" flex items-center justify-between w-full bg-white  border p-4 focus:outline-none">
                                                        <label class="flex items-center">
                                                            <input type="radio" id="" value="" name="method" class="form-radio h-5 w-5 text-blue-600">
                                                            <span class="ml-2 text-sm text-gray-700">SELF COLLECT AT HEADQUARTERS</span>
                                                        </label>
                                                        <span class="text-sm text-gray-700 font-semibold">FREE</span>
                                                    </div>
                                                    <div class=" flex items-center justify-between w-full bg-white rounded-b-lg border p-4 focus:outline-none">
                                                        <label class="flex items-center">
                                                            <input type="radio" id="" value="" name="method" class="form-radio h-5 w-5 text-blue-600">
                                                            <span class="ml-2 text-sm text-gray-700">SELF COLLECT AT THE GAEDENS MALL SHOWROOM</span>
                                                        </label>
                                                        <span class="text-sm text-gray-700 font-semibold">FREE</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-8 mt-8">
                                        <div class="lg:w-full">
                                            <div>
                                                <h4 class="text-base text-gray-600 font-medium">Payment</h4>
                                                <span class="text-sm text-gray-500">All transactions are secure and encrypted</span>
                                            </div>
                                            <x-general.card class="bg-gray-200  pt-0 pl-0 pr-0 border-2">
                                                <div class="mr-auto text-lg font-medium bg-white text-white py-2 px-2 rounded-lg rounded-b-none ">
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
                                                                <button x-on:click="open = false" 
                                                                    class="px-4 py-2 text-sm  text-white  bg-green-500 rounded hover:bg-green-600" >
                                                                    Ok
                                                                </button>
                                                            </div>
                                                        </x-general.modal>
                                                    </div>
                                                    <span class="text-sm flex justify-center items-center text-center text-gray-400"> 
                                                        You have now selected and will be redirected to IPay88to <br>Complete your purchase securely
                                                    </span>
                                                </div>
                                            </x-general.card>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="lg:w-full">
                                            <div>
                                                <h4 class="text-base text-gray-600 font-medium">Billing address</h4>
                                                <span class="text-sm text-gray-500"> Select the address that matches your cant or payment method.</span>
                                                <div class="mt-6">
                                                    <div class="flex items-center justify-between w-full bg-white rounded-t-lg border  p-4 focus:outline-none">
                                                        <label class="flex items-center">
                                                            <input type="radio"  id="" value="" name="address"  class="form-radio h-5 w-5 text-blue-600" >
                                                                <span class="ml-2 text-sm text-gray-700">Same as shipping address</span>
                                                        </label>
                                                    </div>
                                                    <div class=" flex items-center justify-between w-full bg-white rounded-b-lg border p-4 focus:outline-none">
                                                        <label class="flex items-center">
                                                            <input type="radio" id="" value="" name="address" class="form-radio h-5 w-5 text-blue-600">
                                                            <span class="ml-2 text-sm text-gray-700">Use a different billing address</span>
                                                        </label>
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
                                    </div>
                                    
                                </x-slot>
                            </x-form.basic-form>
                        </div>

                        <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2 mt-4">
                            <div class="flex justify-center lg:justify-end">
                                <div class="border rounded-md max-w-md w-full px-4 py-3">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-gray-700 font-medium">Order total (1)</h3>
                                    </div>
                                    <div class="flex justify-between mt-6 border-b-2 pb-4">
                                        <div class="flex">
                                            <img class="h-20 w-20 object-cover rounded"
                                                src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                                alt="">
                                            <div class="mx-3 my-3">
                                                <h3 class="text-sm text-gray-600">Gold 0.25G</h3>
                                            </div>
                                        </div>
                                        <span class="text-gray-600 my-3">RM 169.00</span>
                                    </div>

                                    <x-form.basic-form wire:submit.prevent="">
                                        <x-slot name="content">
                                            <div class=" mt-6 border-b-2 pb-4">
                                                <x-form.input label="Gift card or discount code" value="" wire:model="" />
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
                                                <p>RM 169.00</p>
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
                                            <p>RM 169.00</p>
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