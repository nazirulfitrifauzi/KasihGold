<div class="shadow-lg rounded-lg col-span-12 sm:col-span-6 xl:col-span-4 intro-y bg-white border-2">
    <div class="p-5">
        <div class="flex justify-between mb-2">
            <div>
                <div class="text-xl font-bold leading-8">{{ $value }}</div>
                
                <div class="text-base text-gray-600">{{ $title }}</div>
            </div>
            <div>
                {{ $svg }}
            </div>
        </div>
        <div class="shadow w-full bg-gray-100 ">
            <div class="bg-green-400 text-xs leading-none py-1 text-center text-white" style="width: {{$percentage}}"></div>
        </div>

    </div>
</div>