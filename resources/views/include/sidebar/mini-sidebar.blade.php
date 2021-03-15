<!-- Left mini bar -->
    <nav aria-label="Options"
        class="z-40 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-teal-700  border-indigo-100 shadow-xl sm:flex ">
        
        <div class="flex flex-col items-center flex-1 p-2 space-y-4">

            <!-- Menu button -->
            <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-yellow-300 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-yellow-300' : 'text-gray-500 bg-white'">
                <span class="sr-only">Toggle sidebar</span>
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>

            <!-- cart button -->
            <button
                @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-yellow-300 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-yellow-300' : 'text-teal-600 bg-white'">
                <span class="sr-only">Toggle notifications panel</span>

                <span class="absolute inline-block w-4 h-4 transform translate-x-1 -translate-y-1 bg-red-600 border-2 
                        border-white rounded-full text-white items-center" style="font-size: 9px">1
                </span>
                <x-heroicon-o-shopping-cart class="h-6 w-6" />
            </button>
        </div>

        <!-- User avatar -->
        <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
            <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})">
                    <div class="py-2 px-2 bg-white text-teal-600 align-middle rounded-full hover:text-white hover:bg-yellow-300 focus:outline-none ">
                        <x-heroicon-o-cog class="w-6 h-6" />
                    </div>
                <span class="sr-only">User menu</span>
            </button>
            <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu"
                tabindex="-1"
                class="absolute w-48 py-1 mt-2 origin-bottom-left bg-yellow-300 rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
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