<div>
    <div class="mb-20 sm:mb-0">
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Digital Gold Details
            </h2>
        </div>

        <div class="p-4 mt-4">
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 px-6 py-6 mb-6 bg-white border-2 rounded-lg">
                <div class="flex items-center justify-center flex-auto cursor-pointer" wire:click="details">
                    @if(($this->tGold+$this->tGoldS)<=1.0)
                    <x-gold.goldview name="" type="1g" percentage="{{($this->tGold+$this->tGoldS)*100}}" totalGram="{{($this->tGold+$this->tGoldS)}}" reachGram="{{1-($this->tGold+$this->tGoldS)}}" />
                    @elseif (($this->tGold+$this->tGoldS)<=2.5)
                    <x-gold.goldview name="" type="2.5g" percentage="{{(($this->tGold+$this->tGoldS)/2.5)*100}}" totalGram="{{($this->tGold+$this->tGoldS)}}" reachGram="{{2.5-($this->tGold+$this->tGoldS)}}" />
                    @elseif (($this->tGold+$this->tGoldS)<=5)
                    <x-gold.goldview  name="" type="5g" percentage="{{(($this->tGold+$this->tGoldS)/5)*100}}" totalGram="{{($this->tGold+$this->tGoldS)}}" reachGram="{{5-($this->tGold+$this->tGoldS)}}" />
                    @elseif (($this->tGold+$this->tGoldS)<=10)
                    <x-gold.goldview name="" type="10g" percentage="{{(($this->tGold+$this->tGoldS)/10)*100}}" totalGram="{{($this->tGold+$this->tGoldS)}}" reachGram="{{10-($this->tGold+$this->tGoldS)}}" />
                    @else
                    <x-gold.goldview name="" type="1kg" percentage="{{(($this->tGold+$this->tGoldS)/1000)*100}}" totalGram="{{($this->tGold+$this->tGoldS)}}" reachGram="{{10-($this->tGold+$this->tGoldS)}}" />
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
                                        <p>Digital Gold Wafer (Fixed)</p>
                                        <p class="text-lg">{{$this->tGold+$this->tGoldS}} g</p>
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
                                        <p>Digital Gold Dinar</p>
                                        <p class="text-lg">{{$this->tGoldD}} g</p>
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
                                        <p>Digital Gold Wafer (Flexible)</p>
                                        <p class="text-lg">{{$this->tGoldS}} g</p>
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
                            <livewire:page.digital-gold.transaction-history/>
                        </x-tab.content>
                        <!--End Transaction History -->

                        <!-- Start Success -->
                        <x-tab.content name="1">
                            <livewire:page.digital-gold.success/>
                        </x-tab.content>
                        <!-- End Success -->

                        <!-- Start Pending -->
                        <x-tab.content name="2">
                            <livewire:page.digital-gold.pending/>
                        </x-tab.content>
                        <!-- End Pending -->

                        <!-- Start Fail -->
                        <x-tab.content name="3">
                            <livewire:page.digital-gold.fail/>
                        </x-tab.content>
                        <!-- End Fail -->

                        <!-- Start Exit Request  -->
                        <x-tab.content name="4">
                            <livewire:page.digital-gold.exit-request/>
                        </x-tab.content>
                        <!-- End Exit Request  -->

                    </div>
                </div>
            </div>
    </div>
</div>
