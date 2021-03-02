<li class="relative" x-data="{ {{$active}}:  @if(\Request::is($uri)) true @else false @endif }">
    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
        x-on:click="{{$active}} = !{{$active}}">
        <span class="px-6 py-1 relative inline-flex items-center">
            @if(\Request::is($uri))
                <span class="absolute inset-y-0 left-0 w-1   rounded-tr-lg rounded-br-lg bg-yellow-400"></span>
            @endif
            {{ $icon }}
            <span class="ml-4">{{$title}}</span>
        </span>
        
        <div class="px-6">
            <x-heroicon-o-chevron-left x-show="!{{$active}}" class="ml-1  text-gray-500 w-4 h-4"  style="display: none;"/>
            <x-heroicon-o-chevron-down x-show="{{$active}}" class="ml-1  text-gray-500 w-4 h-4"  style="display: none;"/>
        </div>

    </div>

    <div x-show.transition="{{$active}}" >
        <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
            class="p-2 mt-2 mx-4 space-y-2 overflow-hidden text-sm font-medium  rounded-md shadow-inner bg-gray-50"
            aria-label="submenu">

            {{$slot}}
            

        </ul>
    </div>
</li>