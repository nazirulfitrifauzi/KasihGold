<div x-data="{ {{$active}}:  @if(\Request::is($uri)) true @else false @endif }">
    <div class="relative flex items-center w-full space-x-2 text-white text-base font-semibold  hover:text-yellow-300 cursor-pointer"
        x-on:click="{{$active}} = !{{$active}}">
        <span aria-hidden="true" class="p-2  
        ">
            {{ $icon }}
        </span>
        <span>{{$title}}</span>
        <span class=" absolute right-0 px-2">
            <x-heroicon-o-chevron-left x-show="!{{$active}}" class="ml-1  text-white w-4 h-4"  style="display: none;"/>
            <x-heroicon-o-chevron-down x-show="{{$active}}" class="ml-1  text-white w-4 h-4"  style="display: none;"/>
        </span>
    </div>
    <div x-show.transition="{{$active}}">
        <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
            class="p-2 pr-0 mt-2 mr-0 mx-2 space-y-2 overflow-hidden text-sm font-medium  rounded-md rounded-r-none shadow-inner bg-teal-600"
            aria-label="submenu" x-cloak>
            {{$slot}}
            
        </ul>
    </div>
</div>