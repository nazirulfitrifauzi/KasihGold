@section('title', 'Sign in to your account')
<div>
    <div class="grid w-screen h-screen grid-cols-12 bg-gray-800">
        <!-- Mobile view -->
        <div class="h-full col-span-12 w-full block md:hidden">
            <div class="bg-center bg-cover " style="height:100%; background-image: url({{asset('img/bg.jpg')}});">

                <div class="items-center justify-center w-full h-full bg-gray-800 bg-opacity-50 px-4 pt-8">
                    <div class="z-40 flex justify-between w-full">
                        <a href="/">
                            <div class="flex justify-center">
                                <x-logo class="w-auto h-12 " />
                            </div>
                        </a>
                        <a href="{{ route('register') }}" class="text-xl font-semibold text-yellow-400 hover:text-yellow-300">
                            <p>Register</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full pt-32 pb-6">
                        <div class="max-w-xl -mt-20 animate__animated animate__zoomIn">
                            <p class="text-xl font-bold leading-tight text-center text-yellow-400">Empowering Economic Endowment (Waqf)</p>
                            <p class="my-2 border-b"></p>
                            <p class="text-xs text-white text-center">
                               Are you ready to join us in empowering economy thru Waqf?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mobile view -->
        <div class="relative flex flex-col items-center justify-center h-full col-span-12 bg-white md:col-span-8 lg:col-span-5 rounded-t-2xl
        md:rounded-t-none">
            <div class="absolute top-0 w-full px-4 pt-8 hidden md:block">
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
            <div class="z-40 w-full px-4 py-6 sm:px-24 ">
                <div class="mb-6 sm:mx-auto sm:w-full">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-left text-gray-700">
                        Login
                    </h2>
                    <h2 class="max-w-sm mt-2 text-xs md:text-base font-semibold leading-7 text-left text-gray-500">
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
                                class="w-4 h-4 text-yellow-400 transition duration-150 ease-in-out form-checkbox" />
                            <label for="remember" class="block ml-2 text-sm leading-5 text-gray-600">
                                Remember
                            </label>
                        </div>

                        <div class="text-sm leading-5">
                            <a href="{{ route('password.request') }}"
                                class="font-medium text-yellow-400 transition duration-150 ease-in-out hover:text-yellow-300 focus:outline-none focus:underline">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-full hover:bg-yellow-300 focus:outline-none">
                                Sign in
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="z-40 hidden col-span-12 lg:block md:col-span-4 lg:col-span-7" >
            <div class="w-auto bg-center bg-cover" style="height:100%; background-image: url({{asset('img/bg.jpg')}});">
                <div class="flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-50">
                    <div class="max-w-xl -mt-20 animate__animated animate__zoomIn">
                        <p class="text-5xl font-bold leading-tight text-left text-yellow-400">Empowering Economic Endowment (Waqf)</p>
                        <p class="mb-2 border-b"></p>
                        <p class="text-sm text-white">Are you ready to join us in empowering economy thru Waqf?</p>
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
