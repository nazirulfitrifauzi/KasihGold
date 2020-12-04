
<li class="relative px-6 py-1">
    <span class="absolute inset-y-0 left-0 w-1   rounded-tr-lg rounded-br-lg 
        @if(Route::current()->uri == $uri)
        bg-yellow-400
        @else
        bg-white
        @endif"
    >
    </span>

    <a class="inline-flex items-center w-full text-base font-semibold text-gray-500 transition-colors duration-150 hover:text-yellow-400
    @if(Route::current()->uri == $uri)
    text-yellow-400
    @else
    text-gray-500
    @endif"
    href="{{$route}}">
        {{$slot}}
        <span class="ml-4">{{$title}}</span>
    </a>
</li>



