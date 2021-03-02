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

    @livewireStyles
</head>
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

    <script src="{{ url(mix('js/app.js')) }}"></script>
</body>
</html>
