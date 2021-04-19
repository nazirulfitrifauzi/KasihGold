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

    <link rel="stylesheet" href="{{ asset('dist/apexcharts.css')}}" />
    <script src="{{ asset('dist/apexcharts.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js')}}"></script>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @livewireStyles
</head>
<body>
    <div class="" x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
        <div class="absolute right-0 z-50 w-full px-1 py-1 text-sm font-bold text-center text-white bg-red-500">
            <div class="flex items-center justify-center animate-pulse">
                <x-heroicon-o-exclamation class="w-6 h-6" />
                <p>System currently on development. This is not the final version</p>
            </div>
        </div>
        <div class="flex h-screen overflow-y-hidden bg-gray-700">
            <div x-ref="loading"></div>
            @include('misc.main-loading')

            <!--Sidebar-->
            @include('include.sidebar.desktop-sidebar')

            <!-- content -->
            <div class="flex flex-col flex-1 w-full mx-2 my-4 ml-2 bg-white rounded-lg md:ml-0">

                @include('include.sidebar.mobile-navbar')

                <main class="overflow-y-auto">
                <div class="grid px-8 pb-10 mx-auto">

                    @yield('content')
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
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- echo scripts -->
    <script>
        var userId = document.querySelector('meta[name="userId"]').content;
        Echo.private('App.Models.User.' + userId)
            .notification((notification) => {
                toastr.options =
                {
                    "closeButton": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                if (notification.status == 'success') {
                    toastr.success(notification.message,notification.title);
                } else if (notification.status == 'info') {
                    toastr.info(notification.message,notification.title);
                } else if (notification.status == 'warning') {
                    toastr.warning(notification.message,notification.title);
                } else {
                    toastr.error(notification.message,notification.title);
                }
            });
    </script>
    @stack('js')
</html>
