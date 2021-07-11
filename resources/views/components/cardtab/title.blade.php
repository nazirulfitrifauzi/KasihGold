
<nav class="" x-on:click.prevent="active = {{ $name }}" >
    <div class="overflow-hidden relative transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg intro-y bg-{{$bg}}-500">
        <svg class="absolute" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
        </svg>
        <div class="p-5">
             <div class="flex justify-center">
                <div class="rounded-full p-2 bg-white flex items-center">
                    {{$icon}}
                </div>
             </div>
                {{ $slot }}
        </div>
    </div>
</nav>


