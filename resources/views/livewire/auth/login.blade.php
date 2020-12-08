@section('title', 'Sign in to your account')

<div class="relative z-10 w-full h-24 px-12 bg-white flex justify-between">
    <a href="#" class="h-full flex items-center text-lg md:text-2xl font-bold tracking-widest text-gray-700 uppercase hover:text-gray-400">
        <x-logo class="w-auto h-16 mx-auto" />
    </a>
    <a href="/" class="relative block px-3 h-32 bg-yellow-300 text-white text-center tracking-widest uppercase text-xs font-bold pt-8 pb-6 flex flex-col items-center justify-between hover:bg-gray-900">
        <div class="flex items-end justify-center">
            <x-heroicon-o-home class="w-8 h-8"/>
        </div>
        <span>Home</span>
    </a>
</div>


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
                    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
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
                                    <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-indigo-600 transition duration-150 ease-in-out" />
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
    <div class="-mt-64 md:mt-0 w-full md:flex-1">
        <img src="https://scontent.fkul8-1.fna.fbcdn.net/v/t1.0-9/s960x960/128684889_2740973309566116_5489823759887491015_o.jpg?_nc_cat=111&ccb=2&_nc_sid=110474&_nc_ohc=QQULsDOaq-8AX8uy0yZ&_nc_ht=scontent.fkul8-1.fna&tp=7&oh=2ba026c39c8058978d71d203dcf27b11&oe=5FF572E5" class="w-full h-full object-cover" />
    </div>
</div>
        
        
		
