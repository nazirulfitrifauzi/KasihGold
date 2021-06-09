
<nav class="flex flex-col sm:flex-row">
    <div class="block px-6 py-2 text-gray-600 cursor-pointer focus:outline-none" x-on:click.prevent="active = {{ $name }}" x-bind:class="{'text-yellow-400 border-b-4 border-yellow-400 ': active === {{ $name }} }"
    {{ $livewire }}
    >
        <div class="">
            {{ $slot }}
        </div>
    </div>
</nav>
