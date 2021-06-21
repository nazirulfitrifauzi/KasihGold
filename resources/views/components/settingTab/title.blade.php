<a href="#"
    class="border-transparent text-gray-900 hover:bg-gray-50 group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
    x-on:click.prevent="active = {{ $name }}" 
    x-bind:class="{'bg-yellow-50 border-yellow-400 text-yellow-400 hover:bg-yellow-50 group ' : active === {{ $name }} }"
    aria-current="page">
    {{ $livewire }}
    {{ $slot }}
</a>



