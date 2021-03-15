@section('title', 'Reset password')

<div>
    <div class="bg-teal-700 w-screen h-screen grid grid-cols-12">
        <div class="relative col-span-12 md:col-span-8 lg:col-span-5  bg-white flex flex-col justify-center items-center h-full">
            <div class="w-full absolute top-0 px-4 pt-8">
                <div class="flex justify-between">
                    <div class="flex justify-center">
                        <x-logo class="w-auto h-12 " />
                    </div>
                    <a href="{{ route('login') }}" class="text-xl font-semibold text-yellow-400 hover:text-yellow-300">
                        <p>Login</p>
                    </a>
                </div>
            </div>
            <div class=" px-4 sm:px-24   z-40 w-full">
                <div class="mb-6 sm:mx-auto sm:w-full">
                    <h2 class="text-3xl font-extrabold text-left text-gray-700">
                        Reset password
                    </h2>
                </div>
                @if ($emailSentMessage)
                    <div class="rounded-md bg-green-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>

                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-green-800">
                                    {{ $emailSentMessage }}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <form wire:submit.prevent="sendResetPasswordLink">
                        <div>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus  placeholder="Type your email" class="appearance-none block w-full px-3 py-4 bg-gray-100 focus:outline-none  transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                            </div>

                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-full hover:bg-yellow-300 focus:outline-none">
                                    Send password reset link
                                </button>
                            </span>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <div class="hidden lg:block z-40 col-span-12 md:col-span-4 lg:col-span-7" >
            <div class="w-auto bg-cover bg-center" style="height:100%; background-image: url({{asset('img/bg.jpg')}});">
                <div class="flex items-center justify-center h-full w-full bg-teal-800 bg-opacity-50">
                    <div class="max-w-xl -mt-20">
                        <p class="text-6xl  font-bold text-yellow-400 text-left leading-tight">Memperkasakan Wakaf Ekonomi</p>
                        <p class="border-b mb-2"></p>
                        <p class="text-sm text-white">Adakah anda bersedia untuk menyertai kami membangunkan ekonomi melalui wakaf? Daftar Sekarang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

