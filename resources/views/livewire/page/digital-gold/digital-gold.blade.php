<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Digital Gold Details
            </h2>
        </div>

        <div class="p-4 mt-8">

            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 bg-white rounded-lg border-2 mb-6 py-6 px-6">
                <div class="flex items-center justify-center flex-auto ">
                    <x-gold.goldview type="1g" percentage="100" totalGram="0.00" reachGram="1.00" />
                </div>
                <div class="flex flex-col flex-auto mr-0 lg:mr-5">
                    <h1 class="text-base font-bold">My Gold</h1>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col lg:flex-row items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-base lg:text-xl text-center lg:text-left pt-2 lg:pt-0">
                                        <p>Total Grams</p>
                                        <p class="text-lg">1.36 g</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    {{-- <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col lg:flex-row items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-base lg:text-xl text-center lg:text-left pt-2 lg:pt-0">
                                        <p>Total Price Bought</p>
                                        <p class="text-lg">RM 342.72</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card> --}}
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col lg:flex-row items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Current Price</p>
                                        <p class="text-lg">RM 342.72</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                </div>
                <div class="flex flex-col flex-auto " x-data="{ openModal1: false, openModal2: false, openModal3: false}">
                    <h1 class="text-base font-bold">Exit / Sell</h1>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal1 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col lg:flex-row items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-refresh class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-base lg:text-xl text-center lg:text-left pt-2 lg:pt-0">
                                        <p>Change Physical</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal2 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col lg:flex-row items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-cash class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Outright Sell/Buy Back</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    {{-- <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal3 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col lg:flex-row items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-library class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-base lg:text-xl text-center lg:text-left pt-2 lg:pt-0">
                                        <p>Buy Back</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card> --}}

                    {{-- Start modal 1--}}
                        <x-general.new-modal modalName="openModal1" size="xl">
                            <div>
                                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-blue-100 rounded-full">
                                    <x-heroicon-o-refresh class="w-6 h-6 text-blue-600" />
                                </div>

                                <div class="mt-3 text-center sm:mt-5">
                                    <h1 class="text-lg font-bold">Change to Physical Gold</h1>
                                    <div class="mt-2">
                                        <div>
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Your Gold</h3>
                                            <p class="text-sm text-gray-500">
                                                0.25 gram
                                            </p>
                                        </div>

                                        <div class="px-4 lg:px-20 py-5">
                                            <div x-data="{ accordion: 0 ,accordion1: 0  }">
                                                <div class="w-full p-4 bg-white border focus:outline-none">
                                                    <label class="flex">
                                                        <input @click="accordion = accordion == 1 ? 0 : 1" type="checkbox"  id="" value="" name="physical_gold"  
                                                        class="w-5 h-5 text-blue-600 form-checkbox">
                                                    </label>
                                                    <div class="flex flex-col ml-3 text-center justify-center -mt-4 lg:-mt-6">
                                                        <span class="block text-sm font-medium text-gray-900">
                                                            0.25 gram Physical
                                                        </span>
                                                        <span class="block text-sm text-gray-500">
                                                            Your digital gold is enough for this change.
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion !== 1 }" x-cloak>
                                                    <div class="px-4 py-4 border-2">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <x-form.dropdown label="" default="no"  value="">
                                                                    <option value="" hidden>Select Available Quantity</option>
                                                                    <option value="1" >1</option>
                                                                    <option value="2" >2</option>
                                                                    <option value="3" >3</option>
                                                                    <option value="4" >4</option>
                                                                    <option value="5" >5</option>
                                                                </x-form.dropdown>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </div>

                                                <div class="w-full p-4 bg-white border rounded-b-none focus:outline-none">
                                                    <label class="flex ">
                                                        <input @click="accordion1 = accordion1 == 1 ? 0 : 1" type="checkbox" id="" value="" name="physical_gold" 
                                                        class="w-5 h-5 text-blue-600 form-checkbox " >
                                                    </label>
                                                    <div class="flex flex-col ml-3 text-center justify-center -mt-4 lg:-mt-6">
                                                        <span class="block text-sm font-medium text-gray-900">
                                                            1 gram Physical
                                                        </span>
                                                        <span class="block text-sm text-gray-500">
                                                            Your digital gold is enough for this change.
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="overflow-hidden bg-white" :class="{ 'h-0': accordion1 !== 1 }" x-cloak>
                                                    <div class="px-4 py-4 border-2 rounded-b-lg">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <x-form.dropdown label="" default="no" value="">
                                                                    <option value="" hidden>Select Available Quantity</option>
                                                                    <option value="1" >1</option>
                                                                </x-form.dropdown>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm" @click="openModal1 = false">
                                        Cancel
                                    </button>
                                    <a href="physical-gold-cart" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:col-start-2 sm:text-sm" @click="openModal1 = false">
                                        Submit
                                    </a>
                                </div>
                            </div>
                        </x-general.new-modal>
                    {{-- End modal 1--}}

                    {{-- Start modal 2--}}
                        <x-general.new-modal modalName="openModal2" size="xl">
                            <div>
                                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
                                    <x-heroicon-o-cash class="w-6 h-6 text-green-600" />
                                </div>

                                <div class="mt-3 text-center sm:mt-5">
                                    <h1 class="text-lg font-bold">Sell Your gold</h1>
                                    <div class="mt-2">
                                        <div>
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Your Gold</h3>
                                            <p class="text-sm text-gray-500">
                                                1.36 gram
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Current Market Price</h3>
                                            <p class="text-sm text-gray-500">
                                                RM 342.72
                                            </p>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-xs italic leading-none text-red-500 ">All your certificate will be revoked onced you submit this request and please allow up to 3 working days to process your transactions.</p>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                        <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm" @click="openModal2 = false">
                                            Cancel
                                        </button>
                                        <a href="outright-gold-cart" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:col-start-2 sm:text-sm" @click="openModal2 = false">
                                            Submit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </x-general.new-modal>
                    {{-- End modal 2--}}

                    {{-- Start modal 3--}}
                        <x-general.new-modal modalName="openModal3" size="xl">
                            <div>
                                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-yellow-100 rounded-full">
                                    <x-heroicon-o-library class="w-6 h-6 text-yellow-600" />
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <h1 class="text-lg font-bold">Sell Now, Buy Back Later</h1>
                                    <div class="mt-2">
                                        <div class="p-4 border-l-4 border-blue-400 bg-blue-50">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <x-heroicon-o-information-circle class="w-5 h-5 text-blue-400"/>
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm text-blue-700">Please note that you'll get 100% from this transaction and required to pay in 6 + 1 months time.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Your Gold</h3>
                                            <p class="text-sm text-gray-500">
                                                1.36 gram
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-4">
                                            <div class="mr-4">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900">Current Market Price</h3>
                                                <p class="text-sm text-gray-500">
                                                    RM 342.72
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <p class="text-xs italic leading-none text-red-500 ">Please allow up to 3 working days to process your transactions.</p>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                        <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm" @click="openModal3 = false">
                                            Cancel
                                        </button>
                                        <a href="/bb-gold-cart" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:col-start-2 sm:text-sm" @click="openModal3 = false">
                                            Submit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </x-general.new-modal>
                    {{-- End modal 3--}}
                </div>
            </x-general.grid>

        </div>
    </div>
</div>
