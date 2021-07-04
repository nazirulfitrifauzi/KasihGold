<li>
    <div class="relative pb-8">
        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200 {{ $line=='yes' ? 'block'  : 'hidden' }}" aria-hidden="true">
        </span>
        <div class="relative flex space-x-3">
            <div>
                @if($tracking == "yes")
                    <span class="h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white
                        @if($title == "Item picked up" || $title == "Item posted over the counter")
                            bg-blue-400
                        @elseif($title == "Arrive at delivery facility at")
                            bg-yellow-400
                        @elseif($title == "Item out for delivery")
                            bg-orange-400
                        @elseif(strpos($title, 'Item delivered') !== false)
                            bg-green-400
                        @else
                            bg-gray-400
                        @endif
                        ">
                        {{ $icon }}
                    </span>
                @else
                    <span class="h-8 w-8 rounded-full bg-{{ $iconBg }}-400 flex items-center justify-center ring-8 ring-white">
                        {{ $icon }}
                    </span>
                @endif
            </div>
            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                <div>
                    <div>
                        <p class="text-base font-semibold text-gray-600">{{ $title }}</p>
                    </div>
                    @if ($subtitle != "")
                        <div>
                            <p class="text-sm text-gray-500">{{ $subtitle }}</p>
                        </div>
                    @endif
                </div>
                <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                    <time datetime="2020-09-20">{{$date}}</time>
                </div>
            </div>
        </div>
    </div>
</li>