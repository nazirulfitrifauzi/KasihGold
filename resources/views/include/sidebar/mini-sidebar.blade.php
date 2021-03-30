<!-- Left mini bar -->
    <nav aria-label="Options"
        class="z-40 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-gray-700  border-indigo-100 shadow-xl sm:flex ">
        
        <div class="flex flex-col items-center flex-1 p-2 space-y-4">

            <!-- Menu button -->
            <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-yellow-400 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-yellow-400' : 'text-gray-500 bg-white'">
                <span class="sr-only">Toggle sidebar</span>
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>

            <!-- cart button -->
            <button
                @click="(isSidebarOpen && currentSidebarTab == 'cartTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'cartTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-yellow-400 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'cartTab') ? 'text-white bg-yellow-400' : 'text-yellow-400 bg-white'">
                <span class="sr-only">Toggle notifications panel</span>

                <span class="absolute inline-block w-4 h-4 transform translate-x-1 -translate-y-1 bg-red-600 border-2 
                        border-white rounded-full text-white items-center" style="font-size: 9px">1
                </span>
                <x-heroicon-o-shopping-cart class="h-6 w-6" />
            </button>

            <!-- notification button -->
            <button
                @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-yellow-400 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-yellow-400' : 'text-yellow-400 bg-white'">
                <span class="sr-only">Toggle notifications panel</span>

                <span class="absolute inline-block w-4 h-4 transform translate-x-1 -translate-y-1 bg-red-600 border-2 
                        border-white rounded-full text-white items-center" style="font-size: 9px">1
                </span>
                <x-heroicon-o-bell class="h-6 w-6" />
            </button>

            <div x-data="{ Open : false  }">
                <div class="cursor-pointer bg-pink-500 text-white py-2 px-2 rounded-lg w-full" x-on:click="Open = true" >
                    <x-heroicon-o-question-mark-circle class="w-6 h-6  " />
                </div>

                <div class="cursor-default text-gray-900">
                    <x-general.modal modalActive="Open" title="Customer Support" modalSize="lg">
                        <div class="flex justify-center mt-4 text-lg font-semibold">
                            <p>If you need any assitance please contact us via</p>
                        </div>
                    </x-general.modal>
                </div>
            </div>

            <div>
                @if(auth()->user()->screen == 1)
                <div class="bg-orange-400 text-white py-2 px-2 rounded-lg w-full tooltipbtn"  data-title="Screening in process" data-placement="right">
                    <svg class="w-6 h-6  animate-spin" xmlns="http://www.w3.org/2000/svg" width="24"
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
                    <div class="bg-green-400 text-white py-2 px-2 rounded-lg w-full tooltipbtn"  data-title="Screening passed" data-placement="right">
                        <x-heroicon-o-check-circle class="w-6 h-6  " />
                    </div>
                @endif
            </div>
        </div>

        <!-- User avatar -->
        <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
            <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})">
                    <div class="py-2 px-2 bg-white text-yellow-400 align-middle rounded-full hover:text-white hover:bg-yellow-400 focus:outline-none ">
                        <x-heroicon-o-cog class="w-6 h-6" />
                    </div>
                <span class="sr-only">User menu</span>
            </button>
            <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu"
                tabindex="-1"
                class="absolute w-48 py-1 mt-2 origin-bottom-left bg-yellow-400 rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-label="user menu" x-cloak>
                <a href="{{route('profile')}}" class="block px-4 py-2 text-sm font-semibold text-white hover:bg-gray-50 hover:text-yellow-400" role="menuitem">
                    Your Profile
                </a>

                <a href="{{ route('logout') }}" class="block px-4 py-2 font-semibold text-white hover:bg-gray-50 hover:text-yellow-400" role="menuitem"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>