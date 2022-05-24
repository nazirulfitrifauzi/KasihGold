<div class="">
    <div class="bg-white rounded-lg mb-20 sm:mb-0">
        <main class="my-8 py-6 px-4">
            <div class="container mx-auto">
                <h3 class="text-gray-700 text-2xl font-medium">Bank Information</h3>
                <div class="flex flex-col lg:flex-row mt-2">
                    <div class="w-full lg:w-1/2 order-2">
                        <x-form.basic-form wire:submit.prevent="submit">
                            <x-slot name="content">
                                <div class="pb-8">
                                    <div class="lg:w-full">
                                        <div>
                                            <div class="mt-4">
                                                <div class="flex items-center justify-between w-full bg-white border  p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                            <span class="ml-2 text-base text-gray-700">Bank Information</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white">
                                                    <div class="border-2 px-4 py-4">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                                    <x-form.dropdown label="Bank" wire:model="bankId" default="no" value="bankId" disabled>
                                                                        <option value="0">Choose Bank</option>
                                                                        @foreach ($banks as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </x-form.dropdown>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Swift Code
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="" wire:model="swiftCode"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account No
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="" wire:model="accNo"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account Holder Name
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="" wire:model="accHolderName"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account ID (IC or others ID registered with bank)
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="" wire:model="bankAccId"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            disabled>
                                                                        </div>
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
                                        <span>CONFIRM</span>
                                    </button>
                                </div>
                            </x-slot>
                        </x-form.basic-form>
                    </div>
                    <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2 mt-4">
                        <div class="flex justify-center lg:justify-end">
                            <div class="border  max-w-md w-full px-4 py-3">
                                <div class="flex items-center justify-between">
                                    @if(session('outright')==1)
                                    <h3 class="text-gray-700 font-medium">Outright total </h3>
                                    @else
                                    <h3 class="text-gray-700 font-medium">Buyback total </h3>
                                    @endif
                                </div>

                                
                                    @foreach ($cartInfo as $product)
                                        <div class="flex justify-between mt-6 border-b-2 pb-4">
                                            <div class="flex">
                                                <img class="object-cover w-20 h-20 rounded"
                                                src="{{ asset('img/product/'.$product->products->prod_cat.'/'.$product->products->item_id.'/'.$product->products->prod_img1) }}" alt="">

                                                <div class="mx-3 my-3">
                                                    <h3 class="text-sm text-gray-600">{{$product->products->prod_name}}</h3>
                                                    <h6 class="text-sm text-gray-600">{{$product->prod_qty}} pcs</h6>
                                                </div>
                                            </div>
                                            {{-- <span class="font-semibold text-gray-600 my-3">RM {{number_format($product['prod_price']*$product['qty'],2)}}</span>
                                            <span class="font-semibold text-gray-600 my-3">RM {{ number_format($product->products->out->price*$prod->prod_qty, 2) }} --}}
                                            </span>
                                        </div>
                                    @endforeach

                                <div class="mt-6 border-b-2 pb-4">
                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Surrender Price</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>RM {{number_format($total,2)}}</p>
                                        </div>
                                    </div>
                                    @if(session('outright')!=1)
                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Buyback price at {{date('d/m/Y',strtotime((now()->addMonths(7))))}}</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>RM {{number_format(($total*1.06),2)}}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if(session('outright')==1)
                                <div class="flex justify-between mt-6 border-b-2 pb-4">
                                    <div class="font-semibold">
                                        <p>Total</p>
                                    </div>
                                    <div class="font-semibold text-lg">
                                        @if(session('outright')!=1)
                                        <p>RM {{number_format(($total*1.06),2)}}</p>
                                        @else
                                        <p>RM {{number_format($total,2)}}</p>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</div>
