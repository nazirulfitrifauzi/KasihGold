@section('title', 'Create a new account')

<div>
    <div class="grid h-screen grid-cols-12 bg-gray-800">
        <!-- Mobile view -->
        <div class="block w-full h-full col-span-12 md:hidden">
            <div class="bg-center bg-cover " style="height:100%; background-image: url({{asset('img/bg.jpg')}});">

                <div class="items-center justify-center w-full h-full px-4 pt-8 bg-gray-800 bg-opacity-50">
                    <div class="z-40 flex justify-between w-full">
                        <a href="/">
                            <div class="flex justify-center">
                                <x-logo class="w-auto h-12 " />
                            </div>
                        </a>
                        <a href="{{ route('login') }}" class="text-xl font-semibold text-yellow-400 hover:text-yellow-300">
                            <p>Login</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full pt-32 pb-6">
                        <div class="max-w-xl -mt-20 animate__animated animate__zoomIn">
                            <p class="text-xl font-bold leading-tight text-center text-yellow-400">Memperkasakan Wakaf Ekonomi</p>
                            <p class="my-2 border-b"></p>
                            <p class="text-xs text-center text-white">
                                Adakah anda bersedia untuk menyertai kami membangunkan ekonomi melalui wakaf? Daftar Sekarang
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mobile view -->
        <div class="relative flex flex-col items-center justify-center h-full col-span-12 bg-white md:col-span-8 lg:col-span-5 rounded-t-2xl md:rounded-t-none">
            <div class="absolute top-0 hidden w-full px-4 pt-8 md:block">
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
            <div class="z-40 w-full px-4 py-6 mt-0 sm:px-24 md:mt-14"  x-data="{ active: 0 }">
                <div class="my-8 sm:mx-auto sm:w-full">
                    @if (session('error'))
                        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
                    @elseif (session('info'))
                        <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}"/>
                    @elseif (session('success'))
                        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
                    @elseif (session('warning'))
                        <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}"/>
                    @endif
                    <h2 class="text-2xl font-extrabold text-left text-gray-700 md:text-3xl">
                        Register
                    </h2>
                    <h2 class="max-w-sm mt-2 text-xs font-semibold leading-7 text-left text-gray-500 md:text-base">
                        Welcome! Please fill information in below
                    </h2>
                    <div class="flex justify-center w-full px-2 py-2 mt-2 bg-gray-100 rounded-xl">
                        <x-regtab.title name="0" livewire="">
                            <div class="flex justify-center space-x-1">
                                <x-heroicon-o-user class="w-5 h-5" />
                                <p>Users</p>
                            </div>
                        </x-regtab.title>
                        <x-regtab.title name="1" livewire="">
                            <div class="flex justify-center space-x-1">
                                <x-heroicon-o-user-circle class="w-5 h-5" />
                                <p>Agent</p>
                            </div>
                        </x-regtab.title>
                    </div>
                </div>

                <!-- Register Form User  -->
                <x-regtab.content name="0">
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
                        <x-general.grid mobile="2" gap="5" sm="2" md="2" lg="2" xl="2" class="w-full col-span-6">
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
                        </x-general.grid>

                        <div class="mt-6">
                            <div class="block w-full px-3 py-2 transition duration-150 ease-in-out bg-gray-100 appearance-none focus:outline-none sm:text-sm sm:leading-5">
                                <select name="client" wire:model="client" class="w-full bg-gray-100 focus:outline-none">
                                    <option value="0" hidden>-- PLEASE SELECT CLIENTS --</option>
                                    <option value="1">KASIH GOLD</option></option>
                                    <option value="2">KASIH AP</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="block w-full px-3 py-2 transition duration-150 ease-in-out bg-gray-100 appearance-none focus:outline-none sm:text-sm sm:leading-5">
                                <select name="type" wire:model="type" class="w-full bg-gray-100 focus:outline-none">
                                    <option value="0" hidden>-- PLEASE SELECT TYPE --</option>
                                    <option value="1">INDIVIDUAL</option>
                                    <option value="2">INSTITUTION</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center">
                                <input wire:model="tnc" id="tnc" name="tnc" type="checkbox" class="w-4 h-4 text-yellow-400 transition duration-150 ease-in-out form-checkbox">
                                <label for="tnc" class="block ml-2 text-sm text-gray-900">
                                    I agree to the <a class="text-yellow-400 underline " target="_blank" href="{{ asset('pdf/tnc_kap.pdf') }}">terms and conditions.</a>
                                </label>
                            </div>
                            @error('tnc')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-full hover:bg-yellow-300 focus:outline-none">
                                    Register
                                </button>
                            </span>
                        </div>
                    </form>
                </x-regtab.content>


                <!-- Register Form Agent  -->
                <x-regtab.content name="1">
                    <form wire:submit.prevent="registerAgent" x-cloak>
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
                        <x-general.grid mobile="2" gap="5" sm="2" md="2" lg="2" xl="2" class="w-full col-span-6">
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
                        </x-general.grid>

                        <div class="mt-6">
                            <div class="block w-full px-3 py-2 transition duration-150 ease-in-out bg-gray-100 appearance-none focus:outline-none sm:text-sm sm:leading-5">
                                <select name="client" wire:model="client" class="w-full bg-gray-100 focus:outline-none">
                                    <option value="0" hidden>-- PLEASE SELECT CLIENTS --</option>
                                    <option value="1">KASIH GOLD</option></option>
                                    <option value="2">KASIH AP</option>
                                </select>
                            </div>
                        </div>

                        @if($client == 1)
                        <div class="mt-6">
                            <div class="block w-full px-3 py-2 transition duration-150 ease-in-out bg-gray-100 appearance-none focus:outline-none sm:text-sm sm:leading-5">
                                <select name="type" wire:model="type" class="w-full bg-gray-100 focus:outline-none">
                                    <option value="0" hidden>-- PLEASE SELECT TYPE --</option>
                                    <option value="1">INDIVIDUAL</option>
                                    <option value="2">INSTITUTION</option>
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="mt-6">
                            <div class="flex items-center">
                                <input wire:model="tnc" id="tnc" name="tnc" type="checkbox" class="w-4 h-4 text-yellow-400 transition duration-150 ease-in-out form-checkbox">
                                <label for="tnc" class="block ml-2 text-sm text-gray-900">
                                    I agree to the <a class="text-yellow-400 underline " target="_blank" href="{{ asset('pdf/tnc_kap.pdf') }}">terms and conditions.</a>
                                </label>
                            </div>
                            @error('tnc')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-full hover:bg-yellow-300 focus:outline-none">
                                    Register
                                </button>
                            </span>
                        </div>
                    </form>
                </x-regtab.content>

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
    <div wire:loading.inline wire:target="register , registerAgent" class="flex h-screen overflow-y-hidden">
        <div
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            <div class="flex flex-col items-center justify-center mx-auto">
                <img src="{{ asset('img/kasihgold.gif') }}" class="w-72 h-72"/>
            </div>
        </div>
    </div>
</div>
