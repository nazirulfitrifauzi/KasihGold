<div>
    <style>
        .bar-value {
            background-color: #858282;
            position: absolute;
            left: 52px;
            width: 9.7rem;
            height: auto;
            box-sizing: border-box;
            animation: grow 1.5s ease-out forwards;
            transform-origin: bottom;
            opacity: 0.9;
        }

        .bar-value::before {
            position: absolute;
            bottom: 10px;
            left: 5px;
            color: white;

        }

        @keyframes grow {
            from {
                transform: scaleY(0);
            }
        }

        .bar-value {
            -webkit-animation: slideIn 10s;
            -moz-animation: slideIn 10s;
            -o-animation: slideIn 10s;
            animation: slideIn 10s;
        }

        @-webkit-keyframes slideIn {
            0% {
                height: 0;
            }

            100% {
                height: normal;
            }
        }

        @-moz-keyframes slideIn {
            0% {
                height: 0;
            }

            100% {
                height: normal;
            }
        }

        @-ms-keyframes slideIn {
            .progress-bar 0% {
                height: 0;
            }

            .progress-bar 100% {
                height: normal;
            }
        }

        @-o-keyframes slideIn {
            0% {
                height: 0;
            }

            100% {
                height: normal;
            }
        }

        @keyframes slideIn {
            0% {
                height: 0;
            }

            100% {
                height: normal;
            }
        }
    </style>

    @if ($type == '1g')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold1g.png') }}')">
        <div class="bar-value" style="height:{{$percentage }}%; border-radius: 1.5rem" ></div>
    </div>
    @elseif ($type == '2.5g')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold2.5g.png') }}')">
        <div class="bar-value" style="height:{{$percentage }}%; border-radius: 1.5rem" ></div>
    </div>
    @elseif ($type == '5g')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold5g.png') }}')">
        <div class="bar-value" style="height:{{$percentage }}%; border-radius: 1.5rem" ></div>
    </div>
    @elseif ($type == '10g')
    <div class="relative w-64 h-64 bg-no-repeat bg-center" style="background-image: url('{{ asset('img/gold/gold10g.png') }}')">
        <div class="bar-value" style="height:{{$percentage }}%; border-radius: 1.5rem" ></div>
    </div>
    @endif

</div>