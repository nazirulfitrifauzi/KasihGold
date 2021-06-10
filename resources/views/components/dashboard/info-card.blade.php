<a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-{{ $bg }} hover:bg-gray-50"
href="{{ $cardRoute }}" >
    <div class="p-5">
        <div class="flex-1 w-full mt-3">
            <div class="flex">
                {{ $svg }}
                <div class="ml-4 text-base font-semibold text-gray-600">{{ $title }}</div>
            </div>
        </div>
        <div class="flex">
            <div class="mt-2 text-3xl font-bold leading-8">{{ $value }}</div>
            {{-- <div class="bg-{{$percentageBg}}-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                <span class="flex items-center">{{$percentage}}</span>
            </div> --}}
        </div>
    </div>
</a>
