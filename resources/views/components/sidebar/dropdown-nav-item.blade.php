<li class="relative px-6 py-3" x-data="{ {{$active}}: false }">
    <div 
    class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
    x-on:click="{{$active}} = !{{$active}}"
    >
        <span class="inline-flex items-center">
            <x-heroicon-o-cube class="w-5 h-5"/>
            <span class="ml-4">{{$title}}</span>
        </span>

        <x-heroicon-o-chevron-left  x-show="!{{$active}}" class="ml-1  text-gray-500 w-4 h-4"/>
        <x-heroicon-o-chevron-down x-show="{{$active}}" class="ml-1  text-gray-500 w-4 h-4"/>
        
    </div>

    <div x-show.transition="{{$active}}" >
        <ul
            x-transition:enter="transition-all ease-in-out duration-300"
            x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl"
            x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl"
            x-transition:leave-end="opacity-0 max-h-0"
            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-700 "
            aria-label="submenu"
        >

        {{$slot}}

        </ul>
    </div>
</li>