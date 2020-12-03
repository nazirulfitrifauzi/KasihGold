<div {{ $attributes->merge(['class' => 'sm:rounded-lg shadow px-3 py-3 mt-3 cursor-pointer shadow-sm bg-white transform  hover:scale-105 transition duration-300']) }}  
    x-on:click="active = {{$countTab}}"  x-bind:class="{'bg-yellow-400 text-white': active === {{$countTab}}}">
    <div class="h-full w-full">
        {{ $slot }}
    </div>
</div>


