<div class="">
    <div class="bg-white rounded-lg mb-20 sm:mb-0">
        <main class="my-8 py-6 px-4">
            <div class="container mx-auto">
                <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
                <div class="flex flex-col lg:flex-row mt-2">
                    <div class="w-full lg:w-1/2 order-2">
                        
                         <x-form.basic-form wire:submit.prevent="convert">
                            <x-slot name="content">
                                <div class="pb-8">
                                    <div class="lg:w-full">
                                        <div>
                                            <h4 class="text-base text-gray-600 font-medium">Billing Details</h4>
                                            <div class="mt-4" x-data="{ accordion: 0 }">
                                                
                                                <div class="overflow-hidden bg-white">
                                                    <div class="border-2 px-4 py-4">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="grid gap-1 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.input label="Name" wire:model.defer="name" value="name"/>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.input label="Phone Number" wire:model.defer="phone1" value="phone1"/>
                                                                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                        <x-form.address class="" label="Address" value1="address1" value2="address2" value3="address3" value4="town" value5="postcode" value6="state" :state="$states" condition="state"/>
                                                                    </div>
                                                                </div>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            

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
                                    
                                    <h3 class="text-gray-700 font-medium">Physical Gold Conversion Total ({{session('total')}})</h3>
                                </div>

                                @if(session('products'))
                                    @foreach (session('products') as $product)
                                        @if($product['qty']!=0)
                                        <div class="flex justify-between mt-6 border-b-2 pb-4">
                                            <div class="flex">
                                                <img class="h-20 w-20 object-cover rounded"
                                                    src="{{ asset('img/product/'.$product['prod_cat'].'/'.$product['item_id'].'/'.$product['prod_img']) }}" alt="">
                                                <div class="mx-3 my-3">
                                                    <h3 class="text-sm text-gray-600">{{$product['prod_name']}}</h3>
                                                    <h4 class="text-sm text-gray-600"><b>{{$product['qty']}} pcs</b></h4>
                                                </div>
                                            </div>
                                            <span class="font-semibold text-gray-600 my-3">{{number_format($product['prod_weight']*$product['qty'],2)}} Grams</span>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                                    
                                {{-- <div class="flex justify-between mt-6 border-b-2 pb-4">
                                    <div class="flex">
                                        <img class="h-20 w-20 object-cover rounded"
                                            src="{{ asset('storage/d025.png') }}"
                                            alt="">
                                        <div class="mx-3 my-3">
                                            <h3 class="text-sm text-gray-600">Kasih Gold Digital 0.25g</h3>
                                        </div>
                                    </div>
                                    <span class="font-semibold text-gray-600 my-3">4 pcs</span>
                                </div> --}}


                                <div class="mt-6 border-b-2 pb-4">
                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Subtotal</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>{{session('totalWeight')}} Grams</p>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Shipping</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>RM 10</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between mt-6 border-b-2 pb-4">
                                    <div class="font-semibold">
                                        <p>Total</p>
                                    </div>
                                    <div class="font-semibold text-lg">
                                        <p>RM 10</p>
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