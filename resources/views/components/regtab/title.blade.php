
<nav class="flex flex-col sm:flex-row w-full">
<div class="text-center w-full rounded-lg py-2 px-6 block focus:outline-none cursor-pointer " x-on:click.prevent="active = {{ $name }}" x-bind:class="{'text-gray-100 bg-gray-900 rounded-xl shadow-xl': active === {{ $name }} }"
    {{ $livewire }}
    >
        <div class="">
            {{ $slot }}
        </div>
    </div>
</nav>


