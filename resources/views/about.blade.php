@extends('layouts.base')

@push('after-styles')
    <style>
        @media(max-width:1520px){
            .left-svg{
                display:none;
            }
        }
        html {
            scroll-behavior: smooth;
        }
        /* small css for the mobile nav close */
        #nav-mobile-btn.close span:first-child{
            transform: rotate(45deg);
            top: 4px;
            position: relative;
            background:#a0aec0;
        }
        #nav-mobile-btn.close span:nth-child(2){
            transform: rotate(-45deg);
            margin-top: 0px;
            background:#a0aec0;
        }
    </style>
@endpush

@section('body')
    <div class="overflow-x-hidden antialiased">
        <!-- Header Section -->
        @include('landing.header')

        <!-- hero -->
        @include('landing.about.hero')

        <!-- content -->
        @include('landing.about.content')

        <!-- misi & visi -->
        @include('landing.about.misi-visi')

        <!-- Start footer -->
        @include('landing.footer')

        <!-- a little JS for the mobile nav button -->
        <script>
            if( document.getElementById('nav-mobile-btn') ){
                document.getElementById('nav-mobile-btn').addEventListener('click', function(){
                    if( this.classList.contains('close') ){
                        document.getElementById('nav').classList.add('hidden');
                        this.classList.remove('close');
                    } else {
                        document.getElementById('nav').classList.remove('hidden');
                        this.classList.add('close');
                    }
                });
            }
        </script>
    </div>
@endsection