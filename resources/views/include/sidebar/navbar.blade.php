<header class="py-4 bg-gray-900  shadow-md ">
    <div class="flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <h1 class="lg:block ml-6 hidden text-white font-semibold italic">Welcome to Kasih Gold</h1>
        <div class="flex">
            <!-- Mobile hamburger -->
            <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                @click="toggleSideMenu" aria-label="Menu">
                <x-heroicon-o-menu class="w-6 h-6 text-white" />
            </button>

            <div class="hidden sm:block">
                @if(auth()->user()->screen == 1)
                <span
                    class="inline-flex items-center px-2.5 py-2 rounded-full text-xs font-medium leading-4 bg-orange-400 text-orange-100 mr-4">
                    <svg class="w-4 h-4 mr-2  animate-spin" xmlns="http://www.w3.org/2000/svg" width="24"
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
                    Screening in process
                </span>
                @else
                <span
                    class="inline-flex items-center px-2.5 py-2 rounded-full text-xs font-medium leading-4 bg-green-400 text-green-100 mr-4">
                    <x-heroicon-o-check-circle class="w-4 h-4 mr-2 " />
                    Screening passed
                </span>
                @endif
            </div>

            <div x-data="{ cartOpen: false , isOpen: false }" x-cloak class="pr-6 pt-1">
                <div class="flex items-center justify-end w-full relative">
                    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                        <span 
                        class="absolute inline-block w-4 h-4 transform translate-x-1 -translate-y-1 bg-red-600 border-2 
                        border-white rounded-full text-white items-center" style="font-size: 9px">1
                        </span>
                        <x-heroicon-o-shopping-cart class="h-6 w-6 text-white" />
                    </button>
                </div>
                <!-- start view cart -->
                <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
                    class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300 z-40">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                            <x-heroicon-o-x class="h-6 w-6" />
                        </button>
                    </div>
                    <hr class="my-3">
                    <div class="mt-6">
                        <div class="flex">
                            <img class="h-20 w-20 object-cover rounded"
                                src=""
                                alt="">
                            <div class="mx-3">
                                <h3 class="text-sm text-gray-600 font-semibold">GOLD 0.25g</h3>
                                <span class="text-yellow-400 font-semibold">RM 336.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End view cart -->
            </div>

            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Profile menu -->
                <li class="relative">
                    <button class="align-middle rounded-full  focus:outline-none"
                        @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                        aria-haspopup="true">
                        <div class="flex text-white font-semibold">
                            <img class="object-cover w-8 h-8 rounded-full"
                                src="https://image.flaticon.com/icons/png/512/149/149071.png" alt=""
                                aria-hidden="true" />
                            <p class="pt-1 pl-2">{{auth()->user()->name}}</p>
                        </div>
                    </button>
                    <template x-if="isProfileMenuOpen">
                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" @click.away="closeProfileMenu"
                            @keydown.escape="closeProfileMenu"
                            class="z-40 absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                            aria-label="submenu">
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="{{route('profile')}}">
                                    <x-heroicon-o-user class="w-5 h-5 mr-2" />
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <x-heroicon-o-login class="w-5 h-5 mr-2" />
                                    <span>Log out</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>
        </div>
    </div>
</header>