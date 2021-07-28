<div class="h-screen px-3 py-20 bg-blue-500">
    <div class="container mx-auto">
        <div class="max-w-sm mx-auto md:max-w-lg">
            <div class="w-full">
                <div class="h-64 py-3 text-center bg-white rounded">
                    <h1 class="text-2xl font-bold">OTP Verification</h1>
                    <div class="flex flex-col mt-4">
                        <span>Enter the OTP you received at</span> <span class="font-bold">{{ $phone_no }}</span>
                    </div>
                    <div id="otp" class="flex flex-row justify-center px-2 mt-5 text-center">
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="first" maxlength="1" />
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="second" maxlength="1" /> <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="third" maxlength="1" />
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="fourth" maxlength="1" /> <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="fifth" maxlength="1" />
                        <input class="w-10 h-10 m-2 text-center border rounded form-control" type="text" id="sixth" maxlength="1" />
                    </div>
                    <div class="flex justify-center mt-5 text-center">
                        <a class="flex items-center text-blue-700 cursor-pointer hover:text-blue-900">
                            <span class="font-bold">Resend OTP</span>
                            <x-heroicon-s-chevron-right class="w-6 h-6 ml-1"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    function OTPInput() {
        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keydown', function(event) {
                if (event.key==="Backspace" ) {
                    inputs[i].value='' ;
                    if (i !==0) inputs[i - 1].focus();
                } else {
                    if (i===inputs.length - 1 && inputs[i].value !=='' ) {
                        return true;
                    } else if (event.keyCode> 47 && event.keyCode < 58) {
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