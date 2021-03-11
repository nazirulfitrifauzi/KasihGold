<!DOCTYPE html>
<html x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kasih Gold</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/kasihgoldicon.jpg')}}">

    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />

    <link rel="stylesheet" href="{{ asset('dist/apexcharts.css')}}" />
    <script src="{{ asset('dist/apexcharts.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <script src="{{ asset('js/init-alpine.js')}}"></script>

    @livewireStyles
</head>
{{-- <style>
    .tippy-box[data-theme~='tomato'] {
        background-color: #e3a008;
        color: white;
        border-right-color: #e3a008;
    }
    .tippy-box[data-theme~='tomato'][data-placement^='right'] > .tippy-arrow::before {
        border-right-color: #e3a008;
    }
</style>
<body>
    
    <div class="flex h-screen bg-gray-100" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('include.sidebar.desktop')
        @include('include.sidebar.mobile')

        <div class="flex flex-col flex-1 w-full">
            @include('include.sidebar.navbar')
            <main class="overflow-y-auto">
            <div class="grid px-8 pb-10 mx-auto">
                
                @yield('content')
            </div>
            </main>
        </div>
    </div>
    @livewireScripts
    @stack('js')
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
	tippy('button', {
        theme: 'tomato',
        content:(reference)=>reference.getAttribute('data-title'),
        onMount(instance) {
            instance.popperInstance.setOptions({
            placement :instance.reference.getAttribute('data-placement')
            });
        },
        allowHTML: true,
    });
    </script>
    <script src="{{ url(mix('js/app.js')) }}"></script>
</body> --}}

<body>
    <div class="" x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
        <div class="flex h-screen bg-teal-700">
            <!-- Loading screen -->
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-indigo-800">
                Loading.....
            </div>

            <!--Sidebar-->
            @include('include.sidebar.desktop')

            <!-- content -->
            <div class="flex flex-col flex-1 w-full bg-white rounded-lg my-4">
                {{-- @include('include.sidebar.navbar') --}}
                <main class="overflow-y-auto">
                <div class="grid px-8 pb-10 mx-auto">
                    
                    @yield('content')
                </div>
                </main>
            </div>
        </div>

        <!-- Panels -->
    </div>
</body>
<script>
    const setup = () => {
    return {
        isSidebarOpen: true,
        currentSidebarTab: "linksTab",
        isSettingsPanelOpen: false,
        isSubHeaderOpen: false,
        watchScreen() {
        if (window.innerWidth <= 1024) {
            this.isSidebarOpen = false
        }
        },
    }
}
    
</script>
</html>
