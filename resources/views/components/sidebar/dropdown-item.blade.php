<div class="pb-1">
    <a href="{{$route}}" class="flex items-center w-full space-x-2 text-white text-base font-semibold
        @if(Route::current()->uri == $uri) bg-white text-teal-700  rounded-lg rounded-r-none
        @else
            bg-transparent
        @endif
        ">
        <span aria-hidden="true" class="p-2  
        @if(Route::current()->uri == $uri) bg-yellow-300 rounded-lg text-white
        @else
            bg-transparent
        @endif
        ">
        {{$icon}}
        </span>
        <span>{{$title}}</span>
    </a>
</div>