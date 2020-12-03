<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0">
    <div class="text-white">

        <div class="flex p-2 bg-yellow-400">
            <div class="bg-white mx-auto text-indigo-600 p-2">
                <x-logo class="w-auto h-8 " />
            </div>
        </div>
        <div>
            <ul class="mt-6 leading-10">
                <x-sidebar.nav-item title="Dashboard" route="{{route('home')}}" name="1">
                    <x-heroicon-o-home class="w-5 h-5"/>
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Stock Management" route="{{route('stock')}}" name="2">
                    <x-heroicon-o-archive class="w-5 h-5"/>
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Reporting" route="" name="3">
                    <x-heroicon-o-clipboard-list class="w-5 h-5"/>
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Incident Reporting" route="" name="4">
                    <x-heroicon-o-exclamation-circle class="w-5 h-5"/>
                </x-sidebar.nav-item>

                <x-sidebar.nav-item title="Screening" route="" name="5">
                    <x-heroicon-o-shield-check class="w-5 h-5"/>
                </x-sidebar.nav-item>
            </ul>
        </div>

        
        <ul class="">
            <x-sidebar.dropdown-nav-item active="open" title="Dropdown Menu" >
                <li class="px-2 py-1 transition-colors duration-150 text-white">
                    <div class="flex">
                        <x-heroicon-o-cube class="w-5 h-5"/>
                        <a class="w-full ml-2" href="#">Child Menu 1</a>
                    </div>
                </li>
            </x-sidebar.dropdown-nav-item>
        </ul>
        
    </div>
</aside>