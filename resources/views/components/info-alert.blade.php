
@props([
    'title' => '',
])
<div
    class="flex justify-center pointer-events-none ">
    <div class="w-full bg-blue-500 border-l-4 border-blue-500 rounded-lg shadow-lg pointer-events-auto"
        x-transition:leave-end="opacity-0"
        x-transition:leave-start="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter="transform ease-out duration-300 transition"
        x-description="Notification panel, show/hide based on alert state."
        x-show="show"
        x-init="setTimeout(() => { show = true }, 100)" x-data="{ show: false }">
        <div class="relative overflow-hidden rounded-lg shadow-xs">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="inline-flex items-center flex-shrink-0 p-2 text-sm text-blue-600 bg-white rounded-full">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 exclamation-circle">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 w-0 ml-4">
                        <p class="text-base font-medium leading-5 text-white capitalize">
                           {{$title}}
                        </p>
                        <p class="mt-1 text-sm leading-relaxed text-white">
                            {{$slot}}
                        </p>
                    </div>
                    <div class="flex flex-shrink-0 ml-4">
                        {{-- <button @click="show = false;"
                            class="inline-flex text-white transition duration-150 ease-in-out focus:outline-none focus:text-white">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
