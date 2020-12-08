@section('title', 'Reset password')

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
            <div>
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <h2 class="mt-6 text-3xl font-extrabold text-center text-white leading-9 md:text-gray-900">
                        Reset password
                    </h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
                    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
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
                                    <span class="block w-full rounded-md shadow-sm">
                                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-yellow-400 border border-transparent rounded-md hover:bg-yellow-300 focus:outline-none focus:border-yellow-500 focus:shadow-outline-indigo active:bg-yellow-500 transition duration-150 ease-in-out">
                                            Send password reset link
                                        </button>
                                    </span>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="-mt-64 md:mt-0 w-full md:flex-1">
        <img src="https://scontent.fkul8-1.fna.fbcdn.net/v/t1.0-9/s960x960/128684889_2740973309566116_5489823759887491015_o.jpg?_nc_cat=111&ccb=2&_nc_sid=110474&_nc_ohc=QQULsDOaq-8AX8uy0yZ&_nc_ht=scontent.fkul8-1.fna&tp=7&oh=2ba026c39c8058978d71d203dcf27b11&oe=5FF572E5" class="w-full h-full object-cover" />
    </div>
</div>

