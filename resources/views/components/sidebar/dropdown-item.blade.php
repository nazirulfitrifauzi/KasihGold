<li class="px-2 py-1 text-gray-500 transition-colors duration-150 hover:text-yellow-400">
    <div class=" @if(Route::current()->uri == $uri)  text-yellow-400 bg-yellow-50 py-2 px-1 rounded-lg  @endif">
        <div class="flex items-center">
            {{$icon}}
            <a class="w-full ml-2" {{ $attributes }}>{{$title}}</a>
        </div>
    </div>
</li>
