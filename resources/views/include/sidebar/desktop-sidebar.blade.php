<!-- Desktop sidebar -->
<x-sidebar-loading/>

<div class="flex flex-shrink-0 transition-all printHide">
    <div x-show="isSidebarOpenMobile" class="fixed inset-y-0 z-10 w-16 bg-white" x-cloak></div>

    <!-- Mobile bottom bar -->
    <div class="block md:hidden">
        @include('include.sidebar.mobile-sidebar')
    </div>

    <!-- Left mini bar -->
    <div class="hidden md:block">
        @include('include.sidebar.mini-sidebar')
    </div>

    <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen"
        class="fixed inset-y-0 left-0 z-30 flex-shrink-0 hidden w-64 bg-gray-800 shadow-lg sm:left-16 sm:w-72 lg:static lg:w-60 md:block">
        <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full pb-4">
            <!-- Logo -->
            <div class="flex flex-shrink-0 pb-1">
                <div class="p-2 mx-auto rounded-lg">
                    {{-- @if (auth()->user()->client == 1)
                    <img src="{{ asset('img/kasih-gold-logo.png') }}" alt="" class="w-auto h-12 ">
                    @else
                    <img src="{{ asset('img/kasihAPGold.png') }}" alt="" class="w-auto h-12 p-2 my-2 bg-white rounded-md">
                    @endif --}}
                    <img src="{{ asset('img/kasihAPGold.png') }}" alt="" class="w-auto h-12 p-2 my-2 bg-white rounded-md">
                </div>
            </div>
            <div class="relative flex justify-center">
                <img class="w-24 h-24 border-4 border-yellow-400 rounded-full shadow-md "
                    src="{{ asset('img/defaultUser.png') }}" alt=""
                    aria-hidden="true" />
                <a href="{{route('profile')}}" class="absolute bottom-0 flex items-center justify-center w-6 h-6 text-yellow-400 bg-white border-2 border-yellow-400 rounded-full right-20 tooltipbtn"
                    data-title="Edit Profile" data-placement="right">
                    <x-heroicon-o-pencil-alt class="w-4 h-4" />
                </a>
            </div>
            <div class="pb-2 text-center ">
                <p class="pt-1 mx-auto text-base font-bold text-white">{{auth()->user()->name}}</p>
            </div>
            <div class="flex justify-center pb-2">
                <div class="flex items-center px-2 py-2 text-xs leading-none text-white bg-orange-500 rounded-lg ">
                    {{ strtoupper(auth()->user()->clients->name) }}
                </div>
            </div>

            <!-- Links -->
            <div class="flex-1 px-4 pr-0 mt-2 space-y-2 overflow-auto">

                <x-sidebar.nav-item title="Dashboard" route="{{route('home')}}" uri="home">
                    <x-heroicon-o-home class="w-5 h-5" />
                </x-sidebar.nav-item>

                @if (auth()->user()->isAdminKAP())
                    <x-sidebar.nav-item title="User Management" route="{{ route('admin.userManagement') }}" uri="admin/user-management">
                        <x-heroicon-o-user-group class="w-5 h-5" />
                    </x-sidebar.nav-item>

                    <x-sidebar.nav-item title="User Detailed Info" route="{{ route('admin.user-detailed-info') }}" uri="admin/user-detailed-info">
                        <x-heroicon-o-user class="w-5 h-5" />
                    </x-sidebar.nav-item>

                    <x-sidebar.nav-item title="Reporting" route="{{ route('reporting') }}" uri="reporting">
                        <x-heroicon-o-clipboard-list class="w-5 h-5" />
                    </x-sidebar.nav-item>
                @endif

                @if (auth()->user()->isAdminKAP()) {{-- kg bukan user --}}
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
                            {{-- @if (auth()->user()->isAdminKG() || auth()->user()->isMasterDealerKG() || auth()->user()->isAgentKG())
                                <x-sidebar.dropdown-item title="Stock Movement" route="{{route('stock-movement')}}" uri="stock/movement">
                                    <x-slot name="icon">
                                        <x-heroicon-o-cube class="w-5 h-5" />
                                    </x-slot>
                                </x-sidebar.dropdown-item>
                            @endif --}}
                        </div>
                    </x-sidebar.dropdown-nav-item>
                @endif

                {{-- @if (auth()->user()->client == 1 && auth()->user()->role == 1)
                <x-sidebar.nav-item title="Suppliers" route="{{route('admin.suppliers')}}" uri="admin/suppliers">
                    <x-heroicon-o-inbox class="w-5 h-5" />
                </x-sidebar.nav-item>
                @endif --}}

                @if (auth()->user()->client == 1)
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
                @endif

                {{-- @if (auth()->user()->isAdminKG())
                <x-sidebar.nav-item title="Screening" route="{{route('admin.screening')}}" uri="admin/screening">
                    <x-heroicon-o-shield-check class="w-5 h-5" />
                </x-sidebar.nav-item>
                @endif --}}

                {{-- <x-sidebar.dropdown-nav-item active="open" title="Shop" uri="product/*">
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
                </x-sidebar.dropdown-nav-item> --}}

                @if (auth()->user()->role != 4 && auth()->user()->client == 1)
                <x-sidebar.nav-item title="Analytics" route="{{route('analytics')}}" uri="analytics">
                    <x-heroicon-o-chart-bar class="w-5 h-5" />
                </x-sidebar.nav-item>
                @endif

                {{-- @if (auth()->user()->isMasterDealerKG() || auth()->user()->isAgentKG() || auth()->user()->isUserKG()) <!-- kg bukan admin -->
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

                    <x-sidebar.nav-item title="Shipment" route="{{route('shipment')}}" uri="shipment">
                        <x-heroicon-o-truck class="w-5 h-5" />
                    </x-sidebar.nav-item>

                    <x-sidebar.nav-item title="My Network" route="{{route('my-network')}}" uri="my-network">
                        <x-heroicon-o-globe-alt class="w-5 h-5" />
                    </x-sidebar.nav-item>

                    <x-sidebar.nav-item title="My Commission" route="{{route('commission')}}" uri="commission">
                        <x-heroicon-o-currency-dollar class="w-5 h-5" />
                    </x-sidebar.nav-item>
                @endif --}}



                <x-sidebar.dropdown-nav-item active="open" title="My Agents" uri="my-network/*">
                    <x-slot name="icon">
                        <x-heroicon-o-collection class="w-5 h-5" />
                    </x-slot>
                    <div class="leading-7">
                        @if (auth()->user()->role != 1)
                            <x-sidebar.dropdown-item title="Upline Details" route="{{route('upline-detail')}}"
                                uri="my-network/upline-detail">
                                <x-slot name="icon">
                                    <x-heroicon-o-cube class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>
                        @endif

                        @if (auth()->user()->role != 4)
                            <x-sidebar.dropdown-item title="{{ (auth()->user()->role == 1) ? 'Agent List' : 'Downline Details' }}" route="{{route('downline-detail')}}"
                                uri="my-network/downline-detail">
                                <x-slot name="icon">
                                    <x-heroicon-o-cube class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>
                        @endif
                    </div>
                </x-sidebar.dropdown-nav-item>

                @if (auth()->user()->role == 1)
                <x-sidebar.nav-item title="Promotion" route="{{route('admin.list-promotion')}}"
                    uri="admin/list-promotion">
                    <x-heroicon-o-trending-down class="w-5 h-5" />
                </x-sidebar.nav-item>
                @endif

                @if (auth()->user()->role != 1)
                <x-sidebar.nav-item title="Contact Us" route="{{route('incidentReporting')}}"
                    uri="incident-reporting">
                    <x-heroicon-o-mail class="w-5 h-5" />
                </x-sidebar.nav-item>
                @else
                    <x-sidebar.nav-item title="Request/Inquiry" route="{{route('admin.incidentReporting')}}" uri="admin/incident-reporting">
                        <x-heroicon-o-exclamation-circle class="w-5 h-5" />
                    </x-sidebar.nav-item>
                @endif

                @if (auth()->user()->isAdminKAP())
                    <x-sidebar.nav-item title="Newsletter" route="{{ route('admin.newsletter') }}" uri="admin/newsletter">
                        <x-heroicon-o-newspaper class="w-5 h-5" />
                    </x-sidebar.nav-item>

                    <x-sidebar.nav-item title="Announcement" route="{{route('admin.list-announcements')}}" uri="admin/list-announcements">
                        <x-heroicon-o-speakerphone class="w-5 h-5" />
                    </x-sidebar.nav-item>
                @endif

                {{-- @if (auth()->user()->isAdminKG())
                    <x-sidebar.nav-item title="Settings" route="{{route('setting')}}" uri="setting">
                        <x-heroicon-o-cog class="w-5 h-5" />
                    </x-sidebar.nav-item>
                @else --}}
                @if (auth()->user()->isAdminKAP())
                    <x-sidebar.nav-item title="Settings" route="{{route('setting-kap')}}" uri="setting-kap">
                        <x-heroicon-o-cog class="w-5 h-5" />
                    </x-sidebar.nav-item>
                @endif

                <x-sidebar.nav-item title="Lelongan" route="{{route('lelongan')}}" uri="lelongan">
                    <x-heroicon-o-scale class="w-5 h-5" />
                </x-sidebar.nav-item>

                @if(auth()->user()->client == 2)
                    <x-sidebar.nav-item title="Terms & Conditions" targer="_blank" route="{{ asset('pdf/tnc_5.pdf') }}" uri="">
                        <x-heroicon-o-clipboard-list class="w-5 h-5" />
                    </x-sidebar.nav-item>
                @endif
            </div>
        </nav>

        <section x-show="currentSidebarTab == 'cartTab'" class="px-4 py-6">
            <h2 class="text-xl text-yellow-300">Cart</h2>
            <div class="mt-6">
                <div class="flex">
                    <img class="object-cover w-20 h-20 rounded"
                        src=""
                        alt="">
                    <div class="mx-3">
                        <h3 class="text-sm font-semibold text-white">GOLD 0.25g</h3>
                        <span class="font-semibold text-yellow-300">RM 336.00</span>
                    </div>
                </div>
            </div>
        </section>

        <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
            <h2 class="text-xl text-yellow-300">Notification</h2>
            <div class="mt-6">
                <div class="flex">
                    <img class="object-cover w-12 h-12 rounded"
                        src="https://image.flaticon.com/icons/png/512/149/149071.png"
                        alt="">
                    <div class="mx-3">
                        <h3 class="text-sm font-semibold text-white">Hq</h3>
                        <span class="font-semibold text-yellow-300">message</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
