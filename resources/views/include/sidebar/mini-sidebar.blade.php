<!-- Left mini bar -->
    <nav aria-label="Options"
        class="z-40 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-gray-700 border-indigo-100 shadow-xl sm:flex ">

        <div class="flex flex-col items-center flex-1 p-2 space-y-4">

            <!-- Menu button -->
            <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg shadow-md tooltipbtn hover:bg-yellow-400 hover:text-white focus:outline-none"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-yellow-400' : 'text-yellow-400 bg-white'"
                data-title="Menu" data-placement="right">
                <x-heroicon-o-menu-alt-2 class="w-6 h-6" />
            </button>

            <!-- notification button -->
            <button
                @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
                class="p-2 transition-colors rounded-lg shadow-md tooltipbtn hover:bg-yellow-400 hover:text-white focus:outline-none"
                :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-yellow-400' : 'text-yellow-400 bg-white'"
                data-title="Notification" data-placement="right">
                <span class="absolute items-center inline-block w-4 h-4 text-white transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full" style="font-size: 9px">
                    1
                </span>
                <x-heroicon-o-bell class="w-6 h-6" />
            </button>

            <!-- cart button -->
            <a href="{{route('cart')}}"
                class="relative p-2 transition-colors rounded-lg shadow-md tooltipbtn bg-purple-500 hover:bg-purple-600 text-white focus:outline-none"
                data-title="Cart" data-placement="right">
                <span class="absolute flex items-center justify-center w-4 h-4 text-white right-0 top-0 bg-red-600 border-2 border-white rounded-full" style="font-size: 9px">
                    1
                </span>
                <x-heroicon-o-shopping-cart class="w-6 h-6" />
            </a>

            <!-- Shop -->
            <div class="relative flex items-center flex-shrink-0" x-data="{ isOpen: false }">
                <button class="focus:outline-none" @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})">
                    <div class="cursor-pointer bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-2 rounded-lg w-full tooltipbtn" 
                    data-title="Shop" data-placement="right" x-on:click="Open = true" >
                        <x-heroicon-o-shopping-bag class="w-6 h-6  " />
                    </div>
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
                <div class="w-full px-2 py-2 text-white bg-pink-500 rounded-lg cursor-pointer hover:bg-pink-600 tooltipbtn" data-title="Customer Support" data-placement="right" x-on:click="Open = true" >
                    <x-heroicon-o-question-mark-circle class="w-6 h-6 " />
                </div>

                <div class="cursor-default text-gray-900">
                    <x-general.modal2 modalActive="Open" title="Customer Support" modalSize="lg" headerbg="pink-600">
                        <x-slot name="icon">
                            <x-heroicon-s-question-mark-circle class="h-8 w-8 mr-1" />
                        </x-slot>
                        <div class="flex justify-center mt-4 text-base font-semibold text-center">
                            <p>If you need any assitance please contact us via <br> WhatsApp/SMS/Call </p>
                        </div>
                        <div class="flex justify-center mt-2 text-base font-semibold">
                            <p class='bg-pink-600 py-2 px-4 text-white rounded-lg'>+606-851 8151</p> 
                        </div>
                    </x-general.modal2>
                </div>
            </div>

            <!-- Screening passed -->
            <div>
                @if(auth()->user()->active == 0)
                    <div class="w-full px-2 py-2 text-white bg-orange-400 rounded-lg tooltipbtn"  data-title="Screening in process" data-placement="right">
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
                    <div class="w-full px-2 py-2 text-white bg-green-400 rounded-lg tooltipbtn"  data-title="Screening passed" data-placement="right">
                        <x-heroicon-o-check-circle class="w-6 h-6 " />
                    </div>
                @endif
            </div>
        </div>

        <!-- User avatar -->
        <div class="relative flex items-center flex-shrink-0 p-2">
            <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="tooltipbtn"
            data-title="Log out" data-placement="right">
                    <div class="py-2 px-2 bg-white text-yellow-400 align-middle rounded-full hover:text-white hover:bg-yellow-400 focus:outline-none ">
                        <x-heroicon-o-logout class="w-6 h-6" />
                    </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            </a>
        </div>

        
    </nav>