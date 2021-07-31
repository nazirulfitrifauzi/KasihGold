@extends('layouts.base')

@section('body')
{{-- 503 --}}
<div class="flex items-center justify-center  h-screen bg-gray-100">
    <div class="container flex flex-col items-center justify-center px-5 text-gray-700  md:flex-row">
        <div class="flex-col justify-center text-center md:text-left">
            <div class='flex justify-center sm:justify-start'>
                <img src="{{asset('img/kasihAPGold.png')}}" class="w-auto h-6 "/>
            </div>
            <div class="-mb-4 text-6xl font-bold font-dark">503</div>
            <p class="mb-5 text-2xl font-light md:text-xl">Service Unavailable</p>
        </div>
        <div>
            <img src="{{asset('img/error/503.png')}}" class="relative z-10 w-auto h-96"alt="">
        </div>
    </div>
</div>
@endsection

