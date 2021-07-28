<div class="fixed inset-0 top-0 left-0 z-50 flex items-center justify-center h-screen overflow-auto outline-none min-w-screen focus:outline-none"
    style="background: rgba(0, 0, 0, 0.5);">
    <div
        class="relative w-full max-w-lg p-5 mx-auto my-auto bg-white shadow-lg animate__animated animate__bounceInDown rounded-xl">
        <!--content-->
        <div class="">
            <!--body-->
            <div class="justify-center flex-auto p-5 text-center">
                <x-logo class="w-auto h-16 mx-auto" />
                <img src="{{ asset('img/otp.png') }}" class="w-auto h-64 mx-auto" />
                    <h1 class="text-2xl font-bold">OTP Verification</h1>
                    <div class="flex flex-col mt-3">
                        <span>Enter the OTP you received at</span> <span class="font-bold">{{ $phone_no }}</span>
                    </div>
                    <div id="otp" class="flex flex-row justify-center px-2 mx-20 mt-5 text-center">
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="first" maxlength="1" wire:model="first" />
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="second" maxlength="1" wire:model="second"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="third" maxlength="1" wire:model="third"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="fourth" maxlength="1" wire:model="fourth"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="fifth" maxlength="1" wire:model="fifth"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="sixth" maxlength="1" wire:model="sixth" onchange="submit()"/>
                    </div>
                    {{-- {{ $first }}{{ $second }}{{ $third }}{{ $fourth }}{{ $fifth }}{{ $sixth }} --}}
                    <div class="flex justify-center mt-5 text-center">
                        <button wire:click="resend" class="flex items-center justify-center px-6 py-4 text-white bg-yellow-400 rounded-lg hover:bg-yellow-300">
                            <p class="ml-2 font-bold">Resend OTP</p>
                            <x-heroicon-s-chevron-right class="w-6 h-6 "/>
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>

@if (session('error'))
    <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
@elseif (session('info'))
    <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}"/>
@elseif (session('success'))
    <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
@elseif (session('warning'))
    <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}"/>
@endif

<script>
    $("#sixth").on('input', function(){
        setTimeout(
            function() {
                Livewire.emit('submitData');
            }, 3000);
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    function OTPInput() {
        // const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keydown', function(event) {
                if (event.key==="Backspace" ) {
                    inputs[i].value='' ;
                    if (i !==0) inputs[i - 1].focus();
                } else {
                    if (i===inputs.length - 1 && inputs[i].value !=='' ) {
                        return true;
                    } else if (event.keyCode> 47 && event.keyCode < 58 || event.keyCode > 58  ) {
                        inputs[i].value=event.key;
                        if (i !==inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    } else if (event.keyCode> 64 && event.keyCode < 91) {
                        inputs[i].value=String.fromCharCode(event.keyCode);
                        if (i !==inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    }
                }
            });
        }
    }
OTPInput(); });
</script>