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
                <div class="flex flex-col flex-auto ">
                    <h1 class="text-base font-bold">Exit / Sell</h1>
                    <a href="physical-gold-cart">
                        <x-general.price-card  class="text-white bg-red-400 rounded-lg" >
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
                    </a>
                    <a href="outright-gold-cart">
                        <x-general.price-card  class="text-white bg-red-400 rounded-lg">
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
                    </a>
                </div>
            </x-general.grid>

        </div>

        @if(auth()->user()->isAgentKAP())
            <div x-data="{ active: 0 }">
                <div class="grid grid-cols-12 mx-4 border-2 rounded-lg">
                    <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                        <div class="flex p-4 mb-6 overflow-x-auto bg-white border-b-2">
                            <x-tab.title name="0" livewire="">
                                <div class="flex font-semibold">
                                    <x-heroicon-o-clipboard-list class="w-6 h-6 mr-2"/>Transaction History
                                </div>
                            </x-tab.title>
                            <x-tab.title name="1" livewire="">
                                <div class="flex font-semibold">
                                    <x-heroicon-o-clipboard-check class="w-6 h-6 mr-2"/>Success
                                </div>
                            </x-tab.title>
                            <x-tab.title name="2" livewire="">
                                <div class="flex font-semibold">
                                    <x-heroicon-o-clock class="w-6 h-6 mr-2"/>Pending
                                </div>
                            </x-tab.title>
                            <x-tab.title name="3" livewire="">
                                <div class="flex font-semibold">
                                    <x-heroicon-o-exclamation-circle class="w-6 h-6 mr-2"/>Fail
                                </div>
                            </x-tab.title>
                            <x-tab.title name="4" livewire="">
                                <div class="flex font-semibold">
                                    <x-heroicon-o-clipboard-copy class="w-6 h-6 mr-2"/>Exit Request
                                </div>
                            </x-tab.title>
                        </div>

                        <!-- Start Transaction History -->
                        <x-tab.content name="0">
                            <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
                                <h2 class="px-6 mr-auto text-lg font-medium">
                                    Purchase History
                                </h2>
                            </div>
                            <div class="p-4 mt-4 bg-white">
                                <x-table.table>
                                    <x-slot name="thead">
                                        <x-table.table-header class="text-left" value="Items" sort="" />
                                        <x-table.table-header class="text-left" value="Price (RM)" sort="" />
                                        <x-table.table-header class="text-left" value="Purchase Date" sort="" />
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
                        </x-tab.content>
                        <!--End Transaction History -->

                        <!-- Start Success -->
                        <x-tab.content name="1">
                            <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
                                <h2 class="px-6 mr-auto text-lg font-medium">
                                    Success
                                </h2>
                            </div>
                            <div class="p-4 mt-4 bg-white">
                                <x-table.table>
                                    <x-slot name="thead">
                                        <x-table.table-header class="text-left" value="Items" sort="" />
                                        <x-table.table-header class="text-left" value="Price (RM)" sort="" />
                                        <x-table.table-header class="text-left" value="Purchase Date" sort="" />
                                        <x-table.table-header class="text-left" value="Status" sort="" />
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
                                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800">Success</span>
                                                </x-table.table-body>
                                            </tr>
                                        @endforeach
                                    </x-slot>
                                    <div class="px-2 py-2">
                                        {{-- {{ $list->links('pagination::tailwind') }} --}}
                                    </div>
                                </x-table.table>
                            </div>
                        </x-tab.content>
                        <!-- End Success -->

                        <!-- Start Pending -->
                        <x-tab.content name="2">
                            <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
                                <h2 class="px-6 mr-auto text-lg font-medium">
                                    Pending
                                </h2>
                            </div>
                            <div class="p-4 mt-4 bg-white">
                                <x-table.table>
                                    <x-slot name="thead">
                                        <x-table.table-header class="text-left" value="Items" sort="" />
                                        <x-table.table-header class="text-left" value="Price (RM)" sort="" />
                                        <x-table.table-header class="text-left" value="Purchase Date" sort="" />
                                        <x-table.table-header class="text-left" value="Status" sort="" />
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
                                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">Pending</span>
                                                </x-table.table-body>
                                            </tr>
                                        @endforeach
                                    </x-slot>
                                    <div class="px-2 py-2">
                                        {{-- {{ $list->links('pagination::tailwind') }} --}}
                                    </div>
                                </x-table.table>
                            </div>
                        </x-tab.content>
                        <!-- End Pending -->

                        <!-- Start Fail -->
                        <x-tab.content name="3">
                            <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
                                <h2 class="px-6 mr-auto text-lg font-medium">
                                    Fail
                                </h2>
                            </div>
                            <div class="p-4 mt-4 bg-white">
                                <x-table.table>
                                    <x-slot name="thead">
                                        <x-table.table-header class="text-left" value="Items" sort="" />
                                        <x-table.table-header class="text-left" value="Price (RM)" sort="" />
                                        <x-table.table-header class="text-left" value="Purchase Date" sort="" />
                                        <x-table.table-header class="text-left" value="Status" sort="" />
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
                                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800">Fail</span>
                                                </x-table.table-body>
                                            </tr>
                                        @endforeach
                                    </x-slot>
                                    <div class="px-2 py-2">
                                        {{-- {{ $list->links('pagination::tailwind') }} --}}
                                    </div>
                                </x-table.table>
                            </div>
                        </x-tab.content>
                        <!-- End Fail -->

                        <!-- Start Exit Request  -->
                        <x-tab.content name="4">
                            <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
                                <h2 class="px-6 mr-auto text-lg font-medium">
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
                        </x-tab.content>
                        <!-- End Exit Request  -->

                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
