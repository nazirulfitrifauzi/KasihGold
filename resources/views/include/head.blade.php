<!DOCTYPE html>
<html x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Logged user ID -->
    <meta name="userId" content="{{ auth()->user()->id }}">
    <title>Kasih Gold</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/kasihgoldicon.jpg')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/print.css')}}" />
    <link rel="stylesheet" href="{{ asset('dist/apexcharts.css')}}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('swipper/swipper.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="{{ asset('dist/apexcharts.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js')}}"></script>
    <script src="{{ asset('js/accounting.js')}}"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('style')
    @livewireStyles
    <style>
        .myInput {
            -webkit-appearance: none;
        }
    </style>
</head>
<body>
    <div class="" x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
        <div class="flex h-auto bg-white md:h-screen md:bg-gray-700">
            <div x-ref="loading"></div>
            @include('misc.main-loading')

            <!--Sidebar-->
            @include('include.sidebar.desktop-sidebar')

            <!-- content -->
            <div class="relative flex flex-col flex-1 w-full mx-0 bg-white">
                @include('include.sidebar.mobile-navbar')
                <main class="overflow-y-auto printContent">
                    <div class="hidden md:block">
                        <div @if(Route::current()->uri == 'home')
                                class="hidden"
                            @else
                                class="flex justify-between px-6 pt-6 bg-center bg-cover"
                                style="height:8rem; background-image: url({{ asset('img/header.jpg') }});"
                            @endif>
                            <div>
                                @if(Route::current()->uri == 'home')
                                @else
                                <h2 class="mt-2 mr-5 text-xl font-bold text-white lg:text-4xl" id="lblGreetings"></h2>
                                @endif
                            </div>
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="">
                                <div class="flex items-center px-2 py-2 mt-4 text-yellow-400 align-middle bg-white rounded-md hover:text-white hover:bg-yellow-400 focus:outline-none">
                                    <x-heroicon-o-logout class="w-5 h-5 mr-1" />
                                    <p class="font-semibold">Log out</p>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                    @if(Route::current()->uri == 'home')
                        <header class="printHide">
                            <div class="w-full bg-center bg-cover" style="height:13rem;
                                background-image: url({{ asset('img/header.jpg') }});">
                                <div class="w-full h-full px-8 py-4 bg-opacity-75 "></div>
                            </div>
                        </header>

                    @endif
                    <!-- User avatar -->
                    <div class="grid px-4 pb-10 mx-auto lg:px-8">
                        <div class="mt-10 md:mt-0">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- Panels -->
    </div>

    @livewireScripts
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('swipper/swipper.js')}}"></script>

    <script>
        const setup = () => {
        return {
            isSidebarOpen: true,
            isSidebarOpenMobile: false,
            currentSidebarTab: "linksTab",
            isSettingsPanelOpen: false,
            isSubHeaderOpen: false,
        }
    }

    </script>
    <script>
        tippy('.tooltipbtn', {
            content:(reference)=>reference.getAttribute('data-title'),
            onMount(instance) {
                instance.popperInstance.setOptions({
                placement :instance.reference.getAttribute('data-placement')
                });
            },
            allowHTML: true,
        });
    </script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>
        var myDate = new Date();
        var hrs = myDate.getHours();
        var greet;
        if (hrs < 12)
            greet = 'Good Morning';
        else if (hrs >= 12 && hrs <= 17)
            greet = 'Good Afternoon';
        else if (hrs >= 17 && hrs <= 24)
            greet = 'Good Evening';
        document.getElementById('lblGreetings').innerHTML = greet + ' {{ Auth()->user()->name }}';
    </script>
    <script>
        const date = new Date();
        const formattedDate = date.toLocaleDateString('en-GB', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        }).replace(/ /g, ' ');
        document.getElementById('getDate').innerHTML = 'Here are your stats for Today, ' + formattedDate;
    </script>
    @stack('js')
</html>
