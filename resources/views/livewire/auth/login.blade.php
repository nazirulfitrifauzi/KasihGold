@section('title', 'Sign in to your account')




<div class="-mt-24 pt-24 w-full h-screen bg-white flex flex-wrap">
    <div class="flex items-center justify-center md:-px-0 w-full md:w-4/12 bg-gray-800">
        <div class="shadow-xl md:shadow-none p-8 md:bg-white  relative z-10">
            <div class="mb-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <h2 class="mt-6 text-3xl font-extrabold text-center text-white leading-9 md:text-gray-900">
                        Sign in to your account
                    </h2>
                    <p class="mt-2 text-sm text-center text-white  md:text-gray-900">
                        Or
                        <a href="{{ route('register') }}" class="font-medium text-yellow-400 hover:text-yellow-300 focus:outline-none focus:underline transition ease-in-out duration-150">
                            create a new account
                        </a>
                    </p>
                </div>

                <div class="mt-8">
                    <div class="bg-white px-6 py-6 md:bg-transparent">
                        <form wire:submit.prevent="authenticate">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                                    Email address
                                </label>

                                <div class="mt-1 rounded-md shadow-sm">
                                    <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
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

                            <div class="flex items-center justify-between mt-6">
                                <div class="flex items-center">
                                    <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-yellow-400 transition duration-150 ease-in-out" />
                                    <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                                        Remember
                                    </label>
                                </div>

                                <div class="text-sm leading-5">
                                    <a href="{{ route('password.request') }}" class="font-medium text-yellow-400 hover:text-yellow-300 focus:outline-none focus:underline transition ease-in-out duration-150">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>

                            <div class="mt-6">
                                <span class="block w-full rounded-md shadow-sm">
                                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-md hover:bg-yellow-300 focus:outline-none focus:border-yellow-500 focus:shadow-outline-indigo active:bg-yellow-500 transition duration-150 ease-in-out">
                                        Sign in
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>	
            </div>
        </div>
    </div>
    <div class="-mt-64 md:mt-0 w-full md:flex-1 ">
        <div class="w-full bg-cover bg-center rounded-b-3xl" style="height:100%; background-image: url({{asset('img/banner.jpg')}});">
            <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50"></div>
        </div>
    </div>
</div>
        
        
		
