@section('title', 'Create a new account')

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
                        Register
                    </h2>
                    <h2 class="mt-2 text-base font-semibold text-left text-gray-500 leading-7 max-w-sm">
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
                            <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" placeholder="Confirm password" required class="appearance-none block w-full px-3 py-4 bg-gray-100 focus:outline-none  transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
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
