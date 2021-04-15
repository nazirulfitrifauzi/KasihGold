<!DOCTYPE html>
<html x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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


    @livewireStyles
</head>
<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
        <div class="bg-red-500 py-1 px-1 text-white text-center text-sm font-bold absolute z-50 right-0 w-full">
            <div class="flex justify-center items-center animate-pulse">
                <x-heroicon-o-exclamation class="w-6 h-6" />
                <p>System currently on development. This is not the final version</p>
            </div>
        </div>
        <div class="flex h-screen overflow-y-hidden bg-gray-700">
            <div 
                id="global-loader" 
                x-ref="loading" 
                class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" 
                style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
                <img src="{{ asset('img/kasihgold.gif') }}" class="w-72 h-72"/>
            </div>

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
</body>
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
<script>
    document.onreadystatechange = function () {
        if (document.readyState !== "complete") {
            document.querySelector("#global-loader").style.display = "block"
        }
        else {
            document.querySelector("#global-loader").style.display = "none";
        }
    }
</script>
@stack('js')
</html>
