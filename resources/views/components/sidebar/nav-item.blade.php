<a href="{{$route}}" class="flex items-center w-full space-x-2 text-white hover:text-yellow-300 text-base font-semibold
    @if(Route::current()->uri == $uri) bg-white text-yellow-400  rounded-lg rounded-r-none
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
        {{$slot}}
    </span>
    <span>{{$title}}</span>
</a>



