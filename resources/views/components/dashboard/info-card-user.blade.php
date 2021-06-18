<a class="overflow-hidden relative  transform  hover:scale-105 transition duration-300 shadow-lg rounded-lg col-span-12 sm:col-span-12 xl:col-span-4 intro-y bg-{{ $bg }}"
    href="{{ $cardRoute }}" >
    <svg class="absolute" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="{{$iconColor}}"/>
        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="{{$iconColor}}"/>
    </svg>
    <div class="p-5">
        <div class="flex justify-center">
            <div class="bg-white py-4 px-4 rounded-full flex items-center border-2 border-{{$iconColor}}-500">
                {{ $svg }}
            </div>
        </div>
        <div class="flex justify-center">
            <div>
                <div class="text-center mt-3 text-2xl font-bold leading-8 text-white">{{ $value }}</div>
                <div class="text-center mt-1 text-base text-gray-100">{{ $title }}</div>
            </div>
        </div>
    </div>
</a>