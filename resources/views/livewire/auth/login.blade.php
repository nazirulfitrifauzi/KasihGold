@section('title', 'Sign in to your account')
<div>
    <div class="bg-gray-800 w-screen h-screen grid grid-cols-12">
        <div class="relative col-span-12 md:col-span-8 lg:col-span-5  bg-white flex flex-col justify-center items-center h-full">
            <div class="w-full absolute top-0 px-4 pt-8">
                <div class="flex justify-between">
                    <a href="/">
                        <div class="flex justify-center">
                            <x-logo class="w-auto h-12 " />
                        </div>
                    </a>
                    <a href="{{ route('register') }}" class="text-xl font-semibold text-yellow-400 hover:text-yellow-300">
                        <p>Register</p>
                    </a>
                </div>
            </div>
            <div class=" px-4 sm:px-24   z-40 w-full">
                <div class="mb-6 sm:mx-auto sm:w-full">
                    <h2 class="text-3xl font-extrabold text-left text-gray-700">
                        Login
                    </h2>
                    <h2 class="mt-2 text-base font-semibold text-left text-gray-500 leading-7 max-w-sm">
                        Welcome! Please fill username and password to sign in into your account
                    </h2>
                </div>
                <form wire:submit.prevent="authenticate">
                    <div>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus placeholder="Type your email"
                                class="appearance-none block w-full px-3 py-4 bg-gray-100 focus:outline-none  transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="password" id="password" type="password" required placeholder="Type your password"
                                class="appearance-none block w-full px-3 py-4 bg-gray-100 focus:outline-none  transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input wire:model.lazy="remember" id="remember" type="checkbox"
                                class="form-checkbox w-4 h-4 text-yellow-400 transition duration-150 ease-in-out" />
                            <label for="remember" class="block ml-2 text-sm text-gray-600 leading-5">
                                Remember
                            </label>
                        </div>

                        <div class="text-sm leading-5">
                            <a href="{{ route('password.request') }}"
                                class="font-medium text-yellow-400 hover:text-yellow-300 focus:outline-none focus:underline transition ease-in-out duration-150">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class=" flex justify-center w-full px-4 py-3 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-full hover:bg-yellow-300 focus:outline-none">
                                Sign in
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="hidden lg:block z-40 col-span-12 md:col-span-4 lg:col-span-7" >
            <div class="w-auto bg-cover bg-center" style="height:100%; background-image: url({{asset('img/bg.jpg')}});">
                <div class="flex items-center justify-center h-full w-full bg-gray-800 bg-opacity-50">
                    <div class="max-w-xl -mt-20 animate__animated animate__zoomIn">
                        <p class="text-6xl  font-bold text-yellow-400 text-left leading-tight">Memperkasakan Wakaf Ekonomi</p>
                        <p class="border-b mb-2"></p>
                        <p class="text-sm text-white">Adakah anda bersedia untuk menyertai kami membangunkan ekonomi melalui wakaf? Daftar Sekarang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:loading.inline wire:target="authenticate" class="flex h-screen overflow-y-hidden">
        <div
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            <div class="flex flex-col items-center justify-center mx-auto">
                <img src="{{ asset('img/kasihgold.gif') }}" class="w-72 h-72"/>
            </div>
        </div>
    </div>
</div>
