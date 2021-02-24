    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto  bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="px-4 py-2">
            @if(auth()->user()->screen == 1)
            <span
                class="inline-flex items-center px-2.5 py-2 rounded-full text-xs font-medium leading-4 bg-orange-400 text-orange-100 mr-4">
                <svg class="w-4 h-4 mr-2  animate-spin" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
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

        <div>
            <ul class="mt-6 leading-10">
                <x-sidebar.nav-item title="Dashboard" route="{{route('home')}}" uri="home">
                    <x-heroicon-o-home class="w-5 h-5" />
                </x-sidebar.nav-item>

                <x-sidebar.dropdown-nav-item active="open" title="Stock" uri="stock/*">
                    <x-slot name="icon">
                        <x-heroicon-o-archive class="w-5 h-5" />
                    </x-slot>
                    <div class="leading-7">
                        <x-sidebar.dropdown-item title="Stock Management" href="{{route('stock-management')}}"
                            uri="stock/management">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item title="Stock Movement" href="{{route('stock-movement')}}"
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

                <x-sidebar.nav-item title="Tracking" route="{{route('tracking')}}" uri="tracking">
                    <x-heroicon-o-map class="w-5 h-5" />
                </x-sidebar.nav-item>

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
                        <x-sidebar.dropdown-item title="Buy Product" href="{{route('product-view')}}"
                            uri="product/view">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item title="Sell Product" href="{{route('product-sell')}}"
                            uri="product/sell">
                            <x-slot name="icon">
                                <x-heroicon-o-cube class="w-5 h-5" />
                            </x-slot>
                        </x-sidebar.dropdown-item>
                    </div>
                </x-sidebar.dropdown-nav-item>
            </ul>
        </div>
    </aside>