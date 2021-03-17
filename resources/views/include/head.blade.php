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
    <script src="{{ asset('js/init-alpine.js')}}"></script>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    @livewireStyles
</head>
<body>
    <div class="" x-data="setup()" x-init="$refs.loading.classList.add('hidden');" >
        <div class="flex h-screen bg-gray-700 overflow-y-hidden">
            <!-- Loading screen -->
            <div x-ref="loading">
                @include('misc.loading')
            </div>
            
            <!--Sidebar-->
            @include('include.sidebar.desktop')

            <!-- content -->
            <div class="flex flex-col flex-1 w-full bg-white rounded-lg my-4 mx-2 ml-2 md:ml-0">
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
        isSidebarOpenMobile: false,
        currentSidebarTab: "linksTab",
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
</html>
