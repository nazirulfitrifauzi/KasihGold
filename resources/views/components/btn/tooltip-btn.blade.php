
    <style>
        .tooltip .tooltip-text {
            visibility: hidden;
            text-align: center;
            padding: 2px 6px;
            position: absolute;
            z-index: 100;
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
        }
    </style>

    <a href="{{$btnRoute}}" class="tooltip">
        <div {{ $attributes->merge(['class' => 'flex items-center px-2 py-2']) }} >
            {{$slot}}
            <span class="tooltip-text bg-black border rounded opacity-75 text-white -mt-14">{{$tooltipTitle}}</span>
        </div>
    </a>
