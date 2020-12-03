<!DOCTYPE html>
<html x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kasih Gold</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>


    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    <script src="{{ asset('js/init-alpine.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>


    @livewireStyles

    </head>
    <body>



    <div class="flex bg-gray-100 h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('include.sidebar.desktop')
        @include('include.sidebar.mobile')

        <div class="flex flex-col flex-1 w-full">
            @include('include.sidebar.navbar')
            <main class="overflow-y-auto">
            <div class="px-8 mx-auto grid pb-10">
                {{-- content --}}
                @yield('content')
            </div>
            </main>
        </div>
    </div>
    @livewireScripts
    </body>
    </html>

