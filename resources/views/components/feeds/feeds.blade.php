<li>
    <div class="relative pb-8">
        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200 {{ $line=='yes' ? 'block'  : 'hidden' }}" aria-hidden="true">
        </span>
        <div class="relative flex space-x-3">
            <div>
                <span
                    class="h-8 w-8 rounded-full bg-{{$iconBg}}-400 flex items-center justify-center ring-8 ring-white">
                    <!-- Heroicon name: solid/user -->
                    {{$icon}}
                </span>
            </div>
            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                <div>
                    <p class="text-sm text-gray-500">{{$title}}</p>
                </div>
                <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                    <time datetime="2020-09-20">{{$date}}</time>
                </div>
            </div>
        </div>
    </div>
</li>