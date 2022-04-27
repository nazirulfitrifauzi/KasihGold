<div class="">
    <div class="mb-20 bg-white rounded-lg sm:mb-0">
        <main class="px-4 py-6 my-8">
            <div class="container mx-auto">
                <h3 class="text-2xl font-medium text-gray-700">Bank Information</h3>
                <div class="flex flex-col mt-2 lg:flex-row">
                    <div class="order-2 w-full lg:w-1/2">
                        <x-form.basic-form wire:submit.prevent="submit">
                            <x-slot name="content">
                                <div class="pb-8">
                                    <div class="lg:w-full">
                                        <div>
                                            <div class="mt-4">
                                                <div class="flex items-center justify-between w-full p-4 bg-white border focus:outline-none">
                                                    <label class="flex items-center">
                                                            <span class="ml-2 text-base text-gray-700">Bank Information</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white">
                                                    <div class="px-4 py-4 border-2">
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
                                                                                class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 "
                                                                            disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account No
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="" wire:model="accNo"
                                                                                class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 "
                                                                            disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account Holder Name
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="" wire:model="accHolderName"
                                                                                class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 "
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
                                                                                class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 "
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
                                    <button class="flex items-center px-3 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none">
                                        <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                        <span>CONFIRM</span>
                                    </button>
                                </div>
                            </x-slot>
                        </x-form.basic-form>
                    </div>
                    <div class="flex-shrink-0 order-1 w-full mt-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="flex justify-center lg:justify-end">
                            <div class="w-full max-w-md px-4 py-3 border">
                                <div class="flex items-center justify-between">
                                    @if(session('outright')==1)
                                    <h3 class="font-medium text-gray-700">Outright total </h3>
                                    @else
                                    <h3 class="font-medium text-gray-700">Buyback total </h3>
                                    @endif
                                </div>

                                
                                
                                    <div class="flex justify-between pb-4 mt-6 border-b-2">
                                        <div class="flex">
                                            <img class="object-cover w-20 h-20 rounded"
                                                src="{{ asset('img/product/1/9/d1.png') }}"
                                                alt="">
                                            <div class="mx-3 my-3">
                                                <h3 class="text-sm text-gray-600">Kasih AP Gold Wafer</h3>
                                                <h4 class="text-sm text-gray-600"><b>{{$GoldMintQTY}} gram</b></h4>
                                            </div>
                                        </div>
                                        <span class="my-3 font-semibold text-gray-600">RM {{$MintingCost}}</span>
                                    </div>

                                    <table class="w-full">
                                        <tr>
                                            <th width="80%"></th>
                                            <th width="10%"></th>
                                            <th width="10%"></th>
                                        </tr>
                                        <tr>
                                            <td class="pt-6 font-semibold">Minting Cost</td>
                                            <td class="px-2 pt-6 text-lg font-semibold text-right">RM</td>
                                            <td class="pt-6 text-lg font-semibold text-right">{{$MintingCost}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pt-6 font-semibold">Shipping</td>
                                            <td class="px-2 pt-6 text-lg font-semibold text-right">RM</td>
                                            <td class="pt-6 text-lg font-semibold text-right ">10</td>
                                        </tr>
                                        <tr class="border-b-2 ">
                                            <td  class="py-2 font-semibold">Misc. Charges</td>
                                            <td  class="px-2 py-2 text-lg font-semibold text-right">RM</td>
                                            <td  class="py-2 text-lg font-semibold text-right">1</td>
                                        </tr>
                                        <tr>
                                            <td class="pt-2 font-semibold">Total Cost</td>
                                            <td class="px-2 pt-2 text-lg font-semibold text-right">RM</td>
                                            <td class="pt-2 text-lg font-semibold text-right">{{$MintingCost + 10}}</td>
                                        </tr>
                                    </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</div>
