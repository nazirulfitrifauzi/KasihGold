<div {{ $attributes->merge(['class' => 'overflow-hidden relative w-full sm:rounded-lg shadow px-3 py-3 mt-3 shadow-sm bg-white  hover:scale-105 transition duration-300']) }} >
    <svg class="absolute" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
    </svg>
    <div class="w-full h-full">
        {{ $slot }}
    </div>
</div>
