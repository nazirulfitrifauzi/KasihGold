<!-- Desktop sidebar -->
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white md:block">
    <div class="text-white">

        <div class="flex p-2 bg-yellow-400">
            <div class="p-2 mx-auto bg-white rounded-lg">
                <x-logo class="w-auto h-8 " />
            </div>
        </div>
        <div>
            <ul class="mt-6 leading-10">
                <x-sidebar.nav-item title="Dashboard" route="{{route('home')}}" uri="home">
                    <x-heroicon-o-home class="w-5 h-5"/>
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Stock Management" route="{{route('stock')}}" uri="stock">
                    <x-heroicon-o-archive class="w-5 h-5"/>
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Reporting" route="{{route('reporting')}}" uri="reporting">
                    <x-heroicon-o-clipboard-list class="w-5 h-5"/>
                </x-sidebar.nav-item>

                @if (auth()->user()->role == 2)
                    <x-sidebar.nav-item title="Incident Reporting" route="{{route('incidentReporting')}}" uri="incident-reporting">
                        <x-heroicon-o-exclamation-circle class="w-5 h-5"/>
                    </x-sidebar.nav-item>
                @endif
                @if (auth()->user()->role == 1)
                    <x-sidebar.nav-item title="Incident Reporting" route="{{route('admin.incidentReporting')}}" uri="admin/incident-reporting">
                        <x-heroicon-o-exclamation-circle class="w-5 h-5"/>
                    </x-sidebar.nav-item>

                    <x-sidebar.nav-item title="Screening" route="{{route('admin.screening')}}" uri="admin/screening">
                        <x-heroicon-o-shield-check class="w-5 h-5"/>
                    </x-sidebar.nav-item>
                @endif
            </ul>
        </div>


        <ul class="">
            <x-sidebar.dropdown-nav-item active="open" title="Dropdown Menu" >
                <li class="px-2 py-1 text-white transition-colors duration-150">
                    <div class="flex">
                        <x-heroicon-o-cube class="w-5 h-5"/>
                        <a class="w-full ml-2" href="#">Child Menu 1</a>
                    </div>
                </li>
            </x-sidebar.dropdown-nav-item>
        </ul>

    </div>
</aside>