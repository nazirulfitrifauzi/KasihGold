@section('title', 'Create a new account')

<div class="-mt-24 pt-24 w-full h-screen bg-white flex flex-wrap">
    <div class="flex items-center justify-center md:-px-0 w-full md:w-4/12 bg-gray-800">
        <div class="shadow-xl md:shadow-none p-8 md:bg-white  relative z-10">
            <div>
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <h2 class="mt-6 text-3xl font-extrabold text-center text-white leading-9 md:text-gray-900">
                        Create a new account
                    </h2>

                    <p class="mt-2 text-sm text-center text-white max-w md:text-gray-900">
                        Or
                        <a href="{{ route('login') }}" class="font-medium text-yellow-400 hover:text-yellow-300 focus:outline-none focus:underline transition ease-in-out duration-150">
                            sign in to your account
                        </a>
                    </p>
                </div>

                <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                        <form wire:submit.prevent="register">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 leading-5">
                                    Name
                                </label>

                                <div class="mt-1 rounded-md shadow-sm">
                                    <input wire:model.lazy="name" id="name" type="text" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                                </div>

                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                                    Email address
                                </label>

                                <div class="mt-1 rounded-md shadow-sm">
                                    <input wire:model.lazy="email" id="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                                </div>

                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                                    Password
                                </label>

                                <div class="mt-1 rounded-md shadow-sm">
                                    <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                                </div>

                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                                    Confirm Password
                                </label>

                                <div class="mt-1 rounded-md shadow-sm">
                                    <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                            </div>

                            <div class="mt-6">
                                <span class="block w-full rounded-md shadow-sm">
                                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-md hover:bg-yellow-300 focus:outline-none focus:border-yellow-500 focus:shadow-outline-indigo active:bg-yellow-500 transition duration-150 ease-in-out">
                                        Register
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="-mt-64 md:mt-0 w-full md:flex-1">
        <img src="https://scontent.fkul8-1.fna.fbcdn.net/v/t1.0-9/s960x960/128684889_2740973309566116_5489823759887491015_o.jpg?_nc_cat=111&ccb=2&_nc_sid=110474&_nc_ohc=QQULsDOaq-8AX8uy0yZ&_nc_ht=scontent.fkul8-1.fna&tp=7&oh=2ba026c39c8058978d71d203dcf27b11&oe=5FF572E5" class="w-full h-full object-cover" />
    </div>
</div>
