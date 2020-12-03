
<li class="relative px-6 py-1">
    {{-- <span x-bind:class="{'absolute inset-y-0 left-0 w-1  bg-yellow-500 rounded-tr-lg rounded-br-lg': active === {{ $name }} }"></span> --}}
    <a class="inline-flex items-center w-full text-base font-semibold text-gray-500 transition-colors duration-150 hover:text-yellow-400"
    href="{{$route}}">
        {{$slot}}
        <span class="ml-4">{{$title}}</span>
    </a>
</li>



