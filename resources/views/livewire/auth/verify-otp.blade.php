<div class="fixed inset-0 top-0 left-0 z-50 flex items-center justify-center h-screen overflow-auto outline-none min-w-screen focus:outline-none"
    style="background: rgba(0, 0, 0, 0.5);">
    <div
        class="relative w-full max-w-lg p-5 mx-auto my-auto bg-white shadow-lg animate__animated animate__bounceInDown rounded-xl">
        <!--content-->
        <div class="">
            <!--body-->
            <div class="justify-center flex-auto p-5 text-center">
                <x-logo class="w-auto h-10 mx-auto" />
                <img src="{{ asset('img/otp.png') }}" class="w-auto h-48 mx-auto" />
                    <h1 class="text-xl font-bold">OTP Verification</h1>
                    <div class="flex flex-col mt-1">
                        <span>Enter the OTP you received at</span> <span class="text-sm font-bold">{{ $phone_no }}</span>
                    </div>
                    <div class="flex flex-row justify-center px-2 mx-20 mt-5 text-center" >
                        <input class="w-10 h-10 m-2 text-center border rounded form-control inputs" type="text" maxlength="1" wire:model="first"  />
                        <input class="w-10 h-10 m-2 text-center border rounded form-control inputs" type="text" maxlength="1" wire:model="second"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control inputs" type="text" maxlength="1" wire:model="third"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control inputs" type="text" maxlength="1" wire:model="fourth"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control inputs" type="text" maxlength="1" wire:model="fifth"/>
                        <input class="w-10 h-10 m-2 text-center border rounded form-control inputs" type="text" maxlength="1" wire:model="sixth" />
                        <input class="w-10 h-10 m-2 text-center border rounded form-control inputs" type="hidden" maxlength="1" />
                    </div>
                    <div class="mt-5">
                        <p class="text-gray-700 text-sm">didn't you receive the OTP? 
                            <span>
                                <button  wire:click="resend" class="text-yellow-400 hover:text-yellow-300 text-lg font-semibold ml-1"> Resend</button>
                            </span>
                        </p>
                    </div>
                    <div class="border-t-2 my-2"></div>
                    <div class="flex justify-center mt-5 text-center space-x-2">
                        <div>
                            <button wire:click="verifyOTP" class="flex items-center justify-center px-6 py-4 text-white bg-yellow-400 rounded-lg hover:bg-yellow-300">
                                <p class="ml-2 font-bold">Verify OTP</p>
                                <x-heroicon-s-chevron-right class="w-6 h-6 "/>
                            </button>
                        </div>
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
    $(".inputs").keyup(function () {
        if (this.value.length == this.maxLength) {
        var $next = $(this).next('.inputs');
        if ($next.length)
            $(this).next('.inputs').focus();
        else
            $(this).blur();
        }if (event.key==="Backspace"){
            $(this).prev('.inputs').focus();
        }
    });
</script>
