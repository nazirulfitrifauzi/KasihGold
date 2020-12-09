<div {{ $attributes->merge(['class' => 'w-full sm:rounded-lg shadow px-3 py-3 mt-3 cursor-pointer shadow-sm bg-white transform hover:scale-105 transition duration-300']) }} >
    <div class="h-full w-full">
        {{ $slot }}
    </div>
</div>


