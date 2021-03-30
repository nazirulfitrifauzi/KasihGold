<a href="{{$route}}" class="transform  hover:scale-105 transition duration-300 w-full shadow-xl">
    <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-{{$color}}-400">
        <div class="flex items-center">
            <div class="flex items-center p-2 bg-{{$color}}-400 text-white rounded-full mr-3">
                {{$slot}}
            </div>
            <div class="flex flex-col justify-center">
                <div class="text-sm font-semibold text-{{$color}}-500">{{$title}}</div>
            </div>
        </div>
    </div>
</a>