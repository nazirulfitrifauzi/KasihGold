<div class="w-full shadow-xl">
    <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 ">
        <div class="flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <div class="flex space-x-4 text-base uppercase font-semibold">
                    {{$title}}
                </div>
                <div class="text-lg font-semibold text-gray-500">
                    {{$value}}
                </div>
            </div>
            <div class="flex space-x-4">
                {{$slot}}
            </div>
        </div>
    </div>
</div>