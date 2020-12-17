@extends('default.default')
@section('content')
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            User Screening
        </h2>
    </div>
    @livewire('page.admin.screening')
@endsection
