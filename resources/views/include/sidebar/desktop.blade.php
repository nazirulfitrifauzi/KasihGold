<!-- Desktop sidebar -->
<div class="flex flex-shrink-0 transition-all ">
    <div x-show="isSidebarOpenMobile" class="fixed inset-y-0 z-10 w-16 bg-white" x-cloak></div>
    
    
    <!-- Mobile bottom bar -->
    @include('include.sidebar.mobile')

    <!-- Left mini bar -->
    @include('include.sidebar.mini-sidebar')


    <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen"
        class="fixed inset-y-0 left-0 z-30 flex-shrink-0 w-64 bg-teal-800  shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-60 
        hidden md:block">
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
                            uri="admin/product/sell-add">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        @endif
                    </div>
                </x-sidebar.dropdown-nav-item>
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

</div>