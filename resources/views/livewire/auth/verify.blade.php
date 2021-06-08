@section('title', 'Verify your email address')

<div class="min-w-screen h-screen fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none"
    style="background: rgba(0, 0, 0, 0.5);">
    <div
        class="animate__animated animate__bounceInDown w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
        @if (session('resent'))
        <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-green-500 rounded shadow" role="alert">
            <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"></path>
            </svg>
            <p>A fresh verification link has been sent to your email address.</p>
        </div>
        @endif
        <!--content-->
        <div class="">
            <!--body-->
            <div class="text-center p-5 flex-auto justify-center">
                <x-logo class="w-auto h-16 mx-auto" />
                <img src="{{ asset('img/Confirmed.gif') }}" class="w-auto h-64 mx-auto" />
                <h2 class="text-xl font-bold pt-2">Verify your email address</h3>
                    <p class="text-sm text-gray-500 px-8">
                        Or
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="border-b-2  border-yellow-400 font-bold text-lg text-yellow-300 hover:text-yellow-400 focus:outline-none focus:underline transition ease-in-out duration-150">
                            sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </p>
            </div>
            <div class="p-3 text-center space-x-4 md:block">
                <div class="text-sm text-gray-700">
                    <p>Before proceeding, please check your email for a verification link.</p>
                    <p class="mt-3">
                        If you did not receive the email,
                    </p>
                </div>
                <div class="pt-8 pb-4">
                    <a wire:click="resend"
                        class=" cursor-pointer mb-2 md:mb-0 bg-yellow-300 px-5 py-4 text-sm shadow-sm font-medium tracking-wider text-white rounded-lg hover:shadow-lg hover:bg-yellow-400">
                        click here to request another
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>