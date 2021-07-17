<style>
.loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(14px); 
    -webkit-backdrop-filter: blur(14px);
    display: flex;
    justify-content: center;
    align-items: center;
    }
    
    .loader.hidden {
        animation: fadeOut 1s;
        animation-fill-mode: forwards;
    }
    @keyframes fadeOut {
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }
</style>
<div  id="myDIV"  class="loader bg-black bg-opacity-50" style="visibility: hidden;">
        {{-- @if (auth()->user()->client == 1)
            <img src="{{ asset('img/kasihgold.gif') }}" class="w-72 h-72"/>
        @else
            <img src="{{ asset('img/kasihAPGold.png') }}" alt="" class="w-auto h-16 animate-bounce">
        @endif --}}
        
        <img src="{{ asset('img/kasihAPGold.png') }}" alt="" class="w-auto h-16 animate-bounce">
</div>
<script>
    function loading() {

        var x = document.getElementById("myDIV");
        if (x.style.visibility === "hidden") {
            x.style.visibility = "visible";
        } else {
            x.style.visibility = "hidden";
        }
    }
</script>