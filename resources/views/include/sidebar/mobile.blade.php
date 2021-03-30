    <!-- Mobile sidebar -->
    <div x-show="isSidebarOpenMobile" @click="isSidebarOpenMobile = false"
        class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"></div>
    <nav aria-label="Options"
        class="z-40 fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-gray-700  sm:hidden shadow-t rounded-t-3xl">
        <!-- Menu button -->
        <button
            @click="(isSidebarOpenMobile && currentSidebarTab == 'linksTab') ? isSidebarOpenMobile = false : isSidebarOpenMobile = true; currentSidebarTab = 'linksTab'"
            class="p-2 transition-colors rounded-lg shadow-md hover:bg-yellow-400 text-yellow-400 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
            :class="(isSidebarOpenMobile && currentSidebarTab == 'linksTab') ? 'text-white bg-yellow-400' : 'text-gray-500 bg-white'">
            <span class="sr-only">Toggle sidebar</span>
            <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
        </button>

        <!-- Logo -->
        <div class="p-2 mx-auto  rounded-lg">
            <x-logo class="w-auto h-12 " />
        </div>

        <!-- User avatar button -->
        <div class="relative flex items-center flex-shrink-0 p-2 z-40" x-data="{ isOpen: false }" x-cloak>
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

    <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpenMobile"
        class="fixed inset-y-0 left-0 z-40 flex-shrink-0 w-64 bg-gray-800  shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-60 
        block md:hidden" x-cloak>
        <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex flex-shrink-0 pt-4 pb-1">
                <div class="p-2 mx-auto  rounded-lg">
                    <x-logo class="w-auto h-12 " />
                </div>
            </div>
            <div class="flex flex-shrink-0">
                <div class="p-2 mx-auto  rounded-lg">
                    <img class="w-24 h-24 rounded-full shadow-md border-4 border-yellow-300 "
                    src="https://image.flaticon.com/icons/png/512/149/149071.png" alt=""
                    aria-hidden="true" />
                    <p class="pt-1  text-white text-base font-bold">{{auth()->user()->name}}</p>
                </div>
            </div>

            <!-- Links -->
            <div class="flex-1 px-4 mt-2 pr-0 space-y-2 overflow-auto">

                <x-sidebar.nav-item title="Dashboard" route="{{route('home')}}" uri="home">
                    <x-heroicon-o-home class="w-5 h-5" />
                </x-sidebar.nav-item>

                <x-sidebar.dropdown-nav-item active="open" title="Stock" uri="stock/*">
                    <x-slot name="icon">
                        <x-heroicon-o-archive class="w-5 h-5" />
                    </x-slot>
                    <div class="leading-7">
                        <x-sidebar.dropdown-item title="Stock Management" route="{{route('stock-management')}}"
                            uri="stock/management">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item title="Stock Movement" route="{{route('stock-movement')}}"
                            uri="stock/movement">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                    </div>
                </x-sidebar.dropdown-nav-item>
                

                <x-sidebar.nav-item title="Reporting" route="{{route('reporting')}}" uri="reporting">
                    <x-heroicon-o-clipboard-list class="w-5 h-5" />
                </x-sidebar.nav-item>

                @if (auth()->user()->role == 1)
                <x-sidebar.nav-item title="Suppliers" route="{{route('admin.suppliers')}}" uri="admin/suppliers">
                    <x-heroicon-o-inbox class="w-5 h-5" />
                </x-sidebar.nav-item>
                @endif

                <x-sidebar.dropdown-nav-item active="open" title="Tracking" uri="tracking/*">
                    <x-slot name="icon">
                        <x-heroicon-o-map class="w-5 h-5" />
                    </x-slot>
                    <div class="leading-7">
                        <x-sidebar.dropdown-item title="Ownership" route="{{route('ownership')}}"
                            uri="tracking/ownership">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item title="Delivery" route="{{route('delivery')}}"
                            uri="tracking/delivery">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                    </div>
                </x-sidebar.dropdown-nav-item>

                @if (auth()->user()->role == 2)
                <x-sidebar.nav-item title="Incident Reporting" route="{{route('incidentReporting')}}"
                    uri="incident-reporting">
                    <x-heroicon-o-exclamation-circle class="w-5 h-5" />
                </x-sidebar.nav-item>
                @endif
                @if (auth()->user()->role == 1)
                <x-sidebar.nav-item title="Incident Reporting" route="{{route('admin.incidentReporting')}}"
                    uri="admin/incident-reporting">
                    <x-heroicon-o-exclamation-circle class="w-5 h-5" />
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Screening" route="{{route('admin.screening')}}" uri="admin/screening">
                    <x-heroicon-o-shield-check class="w-5 h-5" />
                </x-sidebar.nav-item>
                @endif

                <x-sidebar.dropdown-nav-item active="open" title="Shop" uri="product/*">
                    <x-slot name="icon">
                        <x-heroicon-o-shopping-bag class="w-5 h-5" />
                    </x-slot>
                    <div class="leading-7">
                        @if (auth()->user()->role == 2)
                        <x-sidebar.dropdown-item title="Buy Product" route="{{route('product-view')}}" 
                            uri="product/view">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item title="Sell Product" route="{{route('product-sell')}}" 
                            uri="product/sell">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        @endif
                        @if (auth()->user()->role == 1)
                        <x-sidebar.dropdown-item title="Sell Product" route="{{route('admin.product-sell-hq')}}"
                            uri="product/admin/product/sell">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        @endif
                    </div>
                </x-sidebar.dropdown-nav-item>

                <x-sidebar.dropdown-nav-item active="open" title="Order" uri="order/*">
                    <x-slot name="icon">
                        <x-heroicon-o-shopping-cart class="w-5 h-5" />
                    </x-slot>
                    <div class="leading-7">
                        <x-sidebar.dropdown-item title="My Order" route="{{route('my-order')}}" 
                            uri="order/my-order">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item title="Customer Order" route="{{route('customer-order')}}" 
                            uri="order/customer-order">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                    </div>
                </x-sidebar.dropdown-nav-item>

                <x-sidebar.nav-item title="Analytics" route="{{route('analytics')}}" uri="analytics">
                    <x-heroicon-o-chart-bar class="w-5 h-5" />
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Shipment" route="{{route('shipment')}}" uri="shipment">
                    <x-heroicon-o-truck class="w-5 h-5" />
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="My Network" route="{{route('my-network')}}" uri="my-network">
                    <x-heroicon-o-globe-alt class="w-5 h-5" />
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="My Commission" route="{{route('commission')}}" uri="commission">
                    <x-heroicon-o-currency-dollar class="w-5 h-5" />
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Upline Details" route="{{route('upline-detail')}}" uri="upline-detail">
                    <x-heroicon-o-collection class="w-5 h-5" />
                </x-sidebar.nav-item>
            </div>
        </nav>

        <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
            <h2 class="text-xl text-white">Cart</h2>
            <div class="mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded"
                        src=""
                        alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-white font-semibold">GOLD 0.25g</h3>
                        <span class="text-yellow-300 font-semibold">RM 336.00</span>
                    </div>
                </div>
            </div>
        </section>
    </div>