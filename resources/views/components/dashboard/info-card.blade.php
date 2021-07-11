<a class="overflow-hidden relative transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg intro-y bg-{{ $bg }}"
href="{{ $cardRoute }}" >
    <svg class="absolute" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
    </svg>
    <div class="p-5">
        <div class="flex justify-center">
            <div class="rounded-full p-2 bg-white flex items-center">
                {{ $svg }}
            </div>
        </div>
        <div class="flex justify-center text-center">
            <div class="text-base font-semibold text-gray-50 mt-4">{{ $title }}</div>
        </div>
        <div class="flex justify-center text-center">
            <div class="mt-1 text-2xl font-bold text-white">{{ $value }}</div>
        </div>
    </div>
</a>
