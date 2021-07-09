<a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg intro-y bg-{{ $bg }} hover:bg-gray-50"
href="{{ $cardRoute }}" >
    <div class="p-5">
        <div class="flex-1 w-full">
            <div class="flex">
                {{ $svg }}
                <div class="ml-4 text-base font-semibold text-gray-600">{{ $title }}</div>
            </div>
        </div>
        <div class="flex">
            <div class="mt-2 text-3xl font-bold leading-8">{{ $value }}</div>
        </div>
    </div>
</a>
