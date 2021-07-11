<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Digital Gold Details
            </h2>
        </div>

        <div class="p-4 mt-4">
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 px-6 py-6 mb-6 bg-white border-2 rounded-lg">
                <div class="flex items-center justify-center flex-auto ">
                    @if($this->tGold<=1.0)
                    <x-gold.goldview name="" type="1g" percentage="{{$this->tGold*100}}" totalGram="{{$this->tGold}}" reachGram="{{1-$this->tGold}}" />
                    @elseif ($this->tGold<=2.5)
                    <x-gold.goldview name="" type="2.5g" percentage="{{($this->tGold/2.5)*100}}" totalGram="{{$this->tGold}}" reachGram="{{2.5-$this->tGold}}" />
                    @elseif ($this->tGold<=5)
                    <x-gold.goldview  name="" type="5g" percentage="{{($this->tGold/5)*100}}" totalGram="{{$this->tGold}}" reachGram="{{5-$this->tGold}}" />
                    @elseif ($this->tGold<=10)
                    <x-gold.goldview name="" type="10g" percentage="{{($this->tGold/10)*100}}" totalGram="{{$this->tGold}}" reachGram="{{10-$this->tGold}}" />
                    @endif
                </div>
                <div class="flex flex-col flex-auto mr-0 lg:mr-5">
                    <h1 class="text-base font-bold">My Gold</h1>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col items-center space-x-4 lg:flex-row">
                                    <div class="flex px-4 py-4 ml-3 bg-white rounded-full item-center lg:ml-0">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="pt-2 text-base text-center lg:text-xl lg:text-left lg:pt-0">
                                        <p>Total Grams</p>
                                        <p class="text-lg">{{$this->tGold}} g</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col items-center space-x-4 lg:flex-row">
                                    <div class="flex px-4 py-4 ml-3 bg-white rounded-full item-center lg:ml-0">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="pt-2 text-base text-center lg:text-xl lg:text-left lg:pt-0">
                                        <p>Current Value</p>
                                        <p class="text-lg">RM {{number_format($this->tPrice,2)}}</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                </div>
                <div class="flex flex-col flex-auto " x-data="{ openModal1: false, openModal2: false, openModal3: false}">
                    <h1 class="text-base font-bold">Exit / Sell</h1>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal1 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col items-center space-x-4 lg:flex-row">
                                    <div class="flex px-4 py-4 ml-3 bg-white rounded-full item-center lg:ml-0">
                                        <x-heroicon-o-refresh class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="pt-2 text-base text-center lg:text-xl lg:text-left lg:pt-0">
                                        <p>Change Physical</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal2 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col items-center space-x-4 lg:flex-row">
                                    <div class="flex px-4 py-4 ml-3 bg-white rounded-full item-center lg:ml-0">
                                        <x-heroicon-o-cash class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="pt-2 text-base text-center lg:text-xl lg:text-left lg:pt-0">
                                        <p>Outright Sell/Buy Back</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    {{-- <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal3 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex flex-col items-center space-x-4 lg:flex-row">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-library class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="pt-2 text-base text-center lg:text-xl lg:text-left lg:pt-0">
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
                                                {{$this->tGold}} gram
                                            </p>
                                        </div>

                                        <div class="px-4 py-5 lg:px-20">
                                            <div x-data="{ accordion: 0 ,accordion1: 0  }">
                                                <div class="w-full p-4 bg-white border focus:outline-none">
                                                    <label class="flex">
                                                        <input @click="accordion = accordion == 1 ? 0 : 1" type="checkbox"  id="" value="" name="physical_gold"
                                                        class="w-5 h-5 text-blue-600 form-checkbox">
                                                    </label>
                                                    <div class="flex flex-col justify-center ml-3 -mt-4 text-center lg:-mt-6">
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
                                                    <div class="flex flex-col justify-center ml-3 -mt-4 text-center lg:-mt-6">
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
                                                {{$this->tGold}} gram
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Current Market Price</h3>
                                            <p class="text-sm text-gray-500">
                                                RM {{number_format($this->tPrice,2)}}
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
                                                {{$this->tGold}} gram
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-4">
                                            <div class="mr-4">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900">Current Market Price</h3>
                                                <p class="text-sm text-gray-500">
                                                    RM {{number_format($this->tPrice,2)}}
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

        <div>
            <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
                <h2 class="mr-auto text-lg font-medium">
                    Exit Request 
                </h2>
            </div>

            <div class="p-4 mt-4 bg-white">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Type of Exit" sort="" />
                        <x-table.table-header class="text-left" value="Surrendered Price (RM)" sort="" />
                        <x-table.table-header class="text-left" value="Applied Date" sort="" />
                        <x-table.table-header class="text-left" value="Approval Status" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                            <tr>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    <p>Outright Sell</p>
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    <p>RM 226.80</p>
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    <p>11/07/2021</p>
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">Pending</span>

                                </x-table.table-body>
                            </tr>
                    </x-slot>
                    <div class="px-2 py-2">
                        {{-- {{ $list->links('pagination::tailwind') }} --}}
                    </div>
                </x-table.table>
            </div>
        </div>

        @if(auth()->user()->isAgentKAP())
            <div>
                <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
                    <h2 class="mr-auto text-lg font-medium">
                        Purchase History
                    </h2>
                </div>

                <div class="p-4 mt-4 bg-white">
                    <x-table.table>
                        <x-slot name="thead">
                            <x-table.table-header class="text-left" value="Items" sort="" />
                            <x-table.table-header class="text-left" value="Purchased Price (RM)" sort="" />
                            <x-table.table-header class="text-left" value="Purchased Date" sort="" />
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($history as $item)
                                <tr>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <p>Kasih Digital Gold {{ $item->weight }}g</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <p>{{ number_format($item->bought_price,2) }}</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <p>{{ $item->created_at->format('d F Y') }}</p>
                                    </x-table.table-body>
                                </tr>
                            @endforeach
                        </x-slot>
                        <div class="px-2 py-2">
                            {{-- {{ $list->links('pagination::tailwind') }} --}}
                        </div>
                    </x-table.table>
                </div>
            </div>
        @endif
    </div>
</div>
