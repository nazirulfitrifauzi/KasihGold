<div>
    <style>
        .bar-value {
            background-color: #858282;
            position: absolute;
            left: 52px;
            width: 9.7rem;
            box-sizing: border-box;
            animation: grow 1.5s ease-out forwards;
            transform-origin: bottom;
            opacity: 0.9;
            height: {{$percentage }}%;
        }


        @keyframes grow {
            from {
                transform: scaleY(0);
            }
        }

        .bar-value {
            -webkit-animation: slideIn 10s;
        }

        @-webkit-keyframes slideIn {
            0% {
                height: 100%;
            }
        }


    </style>

    @if ($type == '1g')

    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold1g.png') }}')">
        <div class="bar-value" style="border-radius: 1.5rem; height:{{$percentage }}%;" ></div>
    </div>
    <div class="flex justify-center items-center mt-2">
        <div class='text-center'>
            <p class="font-bold text-2xl ordinal">{{$totalGram}} g <span class="text-gray-400">/ 1 g</span></p>
            <p class="text-xs text-gray-400">{{$reachGram}} g more to reach 1 g</p>
        </div>
    </div>

    @elseif ($type == '2.5g')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold2.5g.png') }}')">
        <div class="bar-value" style="border-radius: 1.5rem; height:{{$percentage }}%;" ></div>
    </div>
    <div class="flex justify-center items-center mt-2">
        <div class='text-center'>
            <p class="font-bold text-2xl ordinal">{{$totalGram}} g <span class="text-gray-400">/ 2.5 g</span></p>
            <p class="text-xs text-gray-400">{{$reachGram}} g more to reach 2.5 g</p>
        </div>
    </div>
    @elseif ($type == '5g')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold5g.png') }}')">
        <div class="bar-value" style="border-radius: 1.5rem; height:{{$percentage }}%;" ></div>
    </div>
    <div class="flex justify-center items-center mt-2">
        <div class='text-center'>
            <p class="font-bold text-2xl ordinal">{{$totalGram}} g <span class="text-gray-400">/ 5 g</span></p>
            <p class="text-xs text-gray-400">{{$reachGram}} g more to reach 5 g</p>
        </div>
    </div>
    @elseif ($type == '10g')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold10g.png') }}')">
        <div class="bar-value" style="border-radius: 1.5rem; height:{{$percentage }}%;" ></div>
    </div>
    <div class="flex justify-center items-center mt-2">
        <div class='text-center'>
            <p class="font-bold text-2xl ordinal">{{$totalGram}} g <span class="text-gray-400">/ 10 g</span></p>
            <p class="text-xs text-gray-400">{{$reachGram}} g more to reach 10 g</p>
        </div>
    </div>
    @elseif ($type == '1kg')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold1kg.png') }}')">
        <div class="bar-value" style="border-radius: 1.5rem; height:{{$percentage }}%;" ></div>
    </div>
    <div class="flex justify-center items-center mt-2">
        <div class='text-center'>
            <p class="font-bold text-2xl ordinal">{{$totalGram}} g <span class="text-gray-400">/ 1000 g</span></p>
            <p class="text-xs text-gray-400">{{$reachGram}} g available gold</p>
        </div>
    </div>
    @endif

</div>