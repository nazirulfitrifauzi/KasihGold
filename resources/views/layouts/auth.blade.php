@extends('layouts.base')

@section('body')
    <div class="flex flex-col justify-center min-h-screen bg-gray-50 ">
        <div class="relative z-10 w-full h-24 px-12 bg-white flex justify-between">
            <a href="/" class="h-full flex items-center text-lg md:text-2xl font-bold tracking-widest text-gray-700 uppercase hover:text-gray-400">
                <x-logo class="w-auto h-16 mx-auto" />
            </a>
            <a href="/" class="relative block px-3 h-32 bg-yellow-300 text-white text-center tracking-widest uppercase text-xs font-bold pt-8 pb-6 flex flex-col items-center justify-between hover:bg-gray-900">
                <div class="flex items-end justify-center">
                    <x-heroicon-o-home class="w-8 h-8"/>
                </div>
                <span>Home</span>
            </a>
        </div>
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
