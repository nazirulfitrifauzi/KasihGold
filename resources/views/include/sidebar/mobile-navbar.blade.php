<header class="relative items-center flex justify-end flex-shrink-0 p-4 block md:hidden">
    <!-- Mobile sub header button -->
    <button @click="isSubHeaderOpen = !isSubHeaderOpen"
        class="p-2 text-white bg-yellow-400 rounded-lg shadow-md sm:hidden  focus:outline-none ">
        <x-heroicon-o-dots-vertical class="w-5 h-5" />
    </button>

    <!-- Mobile sub header -->
    <div x-transition:enter="transform transition-transform" x-transition:enter-start="translate-y-full opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transform transition-transform"
        x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-full opacity-0"
        x-show="isSubHeaderOpen" @click.away="isSubHeaderOpen = false"
        class="absolute flex items-center justify-between p-2 bg-gray-700 rounded-md shadow-lg sm:hidden top-16 left-5 right-5 z-50" x-cloak>

        <x-general.grid mobile="5" gap="3" sm="5" md="5" lg="5" xl="5" class="col-span-6 p-6">

            <!-- Notifications button -->
            <button @click="isSidebarOpenMobile = true; currentSidebarTab = 'notificationsTab'; isSubHeaderOpen = false"
                class="p-2 text-yellow-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none">
                <span class="absolute items-center inline-block w-4 h-4 text-white transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full" style="font-size: 9px">1
                </span>
                <x-heroicon-o-bell class="w-6 h-6" />
            </button>

            <!-- Cart button -->
            <button @click="isSidebarOpenMobile = true; currentSidebarTab = 'cartTab'; isSubHeaderOpen = false"
                class="p-2 text-yellow-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none">
                <span class="absolute items-center inline-block w-4 h-4 text-white transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full" style="font-size: 9px">1
                </span>
                <x-heroicon-o-shopping-cart class="w-6 h-6" />
            </button>

            <!-- Shop -->
            <div class="relative" x-data="{ isOpen: false }">
                <button class="p-2 text-white bg-indigo-500 rounded-lg shadow-md focus:outline-none" 
                data-title="Shop" data-placement="right" x-on:click="Open = true"
                @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})">
                <x-heroicon-o-shopping-bag class="w-6 h-6  " />
                </button>
                <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu"
                    tabindex="-1"
                    class="absolute w-48 py-1 mt-2 origin-bottom-left bg-indigo-500 rounded-md shadow-lg left-14 bottom-0  focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-label="user menu" x-cloak>

                    @if (auth()->user()->role == 2)
                    <a href="{{route('product-view')}}" class="block px-4 py-2 text-sm font-semibold text-white hover:bg-gray-50 hover:text-indigo-400" 
                    role="menuitem">
                        Buy Product
                    </a>

                    <a href="{{route('product-sell')}}" class="block px-4 py-2 text-sm font-semibold text-white hover:bg-gray-50 hover:text-indigo-400" 
                    role="menuitem">
                        Sell Product
                    </a>
                    @endif
                    @if (auth()->user()->role == 1)
                    <a href="{{route('admin.product-sell-hq')}}" class="block px-4 py-2 text-sm font-semibold text-white hover:bg-gray-50 hover:text-indigo-400" 
                    role="menuitem">
                        Sell Product
                    </a>
                    @endif
                </div>
            </div>

            <!-- customer support -->
            <div x-data="{ Open : false }">
                <div class="p-2 text-white bg-pink-600 rounded-lg shadow-md focus:outline-none"  x-on:click="Open = true" >
                    <x-heroicon-o-question-mark-circle class="w-6 h-6 " />
                </div>

                <div class="cursor-default text-gray-900">
                    <x-general.modal2 modalActive="Open" title="Customer Support" modalSize="lg" headerbg="pink-600">
                        <x-slot name="icon">
                            <x-heroicon-s-question-mark-circle class="h-8 w-8 mr-1" />
                        </x-slot>
                        <div class="px-4 flex justify-center mt-4 text-sm font-semibold text-center ">
                            <p>If you need any assitance please contact us via <br> WhatsApp/SMS/Call </p>
                        </div>
                        <div class="flex justify-center mt-2 text-sm font-semibold">
                            <p class='bg-pink-600 py-2 px-4 text-white rounded-lg'>+606-851 8151</p> 
                        </div>
                    </x-general.modal2>
                </div>
            </div>
            
            <!-- Screening passed -->
            <div>
                @if(auth()->user()->active == 0)
                    <div class="p-2 text-white bg-orange-400 rounded-lg shadow-md focus:outline-none tooltipbtn"  data-title="Screening in process" data-placement="right">
                        <svg class="w-6 h-6 animate-spin" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="2" x2="12" y2="6"></line>
                            <line x1="12" y1="18" x2="12" y2="22"></line>
                            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                            <line x1="2" y1="12" x2="6" y2="12"></line>
                            <line x1="18" y1="12" x2="22" y2="12"></line>
                            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                        </svg>
                    </div>
                @else
                    <div class="p-2 text-white bg-green-400 rounded-lg shadow-md  tooltipbtn"  data-title="Screening passed" data-placement="right">
                        <x-heroicon-o-check-circle class="w-6 h-6 " />
                    </div>
                @endif
            </div>

        </x-general.grid>
    </div>
</header>