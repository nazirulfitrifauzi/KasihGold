@section('title', 'Create a new account')

<div>
    <div class="grid w-screen h-screen grid-cols-12 bg-gray-800">
        <div class="relative flex flex-col items-center justify-center h-full col-span-12 bg-white md:col-span-8 lg:col-span-5">
            <div class="absolute top-0 w-full px-4 pt-8">
                <div class="flex justify-between">
                    <a href="/">
                        <div class="flex justify-center">
                            <x-logo class="w-auto h-12 " />
                        </div>
                    </a>
                    <a href="{{ route('login') }}" class="text-xl font-semibold text-yellow-400 hover:text-yellow-300">
                        <p>Login</p>
                    </a>
                </div>
            </div>
            <div class="z-40 w-full px-4 sm:px-24">
                <div class="mb-6 sm:mx-auto sm:w-full">
                    <h2 class="text-3xl font-extrabold text-left text-gray-700">
                        Register
                    </h2>
                    <h2 class="max-w-sm mt-2 text-base font-semibold leading-7 text-left text-gray-500">
                        Welcome! Please fill information in below
                    </h2>
                </div>
                <form wire:submit.prevent="register">
                    <div>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="name" id="name" type="text" required autofocus placeholder="Type your name" class="appearance-none block w-full px-3 py-4 bg-gray-100 focus:outline-none  transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="email" id="email" type="email" required  placeholder="Type your email" class="appearance-none block w-full px-3 py-4 bg-gray-100 focus:outline-none  transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="password" id="password" type="password" placeholder="Type your password" required class="appearance-none block w-full px-3 py-4 bg-gray-100 focus:outline-none  transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" placeholder="Confirm password" required class="block w-full px-3 py-4 transition duration-150 ease-in-out bg-gray-100 appearance-none focus:outline-none sm:text-sm sm:leading-5" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="mt-1 rounded-md shadow-sm">
                            <select name="client" wire:model="client">
                                <option value="0" disabled selected>-- PLEASE SELECT CLIENTS --</option>
                                <option value="1">KASIH GOLD</option></option>
                                <option value="2">KASIH AP</option>
                            </select>
                        </div>
                        {{ $client }}
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-full hover:bg-yellow-300 focus:outline-none">
                                Register
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
                        <p class="text-6xl font-bold leading-tight text-left text-yellow-400">Memperkasakan Wakaf Ekonomi</p>
                        <p class="mb-2 border-b"></p>
                        <p class="text-sm text-white">Adakah anda bersedia untuk menyertai kami membangunkan ekonomi melalui wakaf? Daftar Sekarang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
