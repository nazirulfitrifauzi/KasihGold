<div
    class="flex justify-center  pointer-events-none sm:p-6">
    <div class="w-full bg-blue-500 shadow-lg rounded-lg pointer-events-auto border-l-4 border-blue-500"
        x-transition:leave-end="opacity-0" 
        x-transition:leave-start="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter="transform ease-out duration-300 transition"
        x-description="Notification panel, show/hide based on alert state." 
        x-show="show"
        x-init="setTimeout(() => { show = true }, 500)" x-data="{ show: false }">
        <div class="relative rounded-lg shadow-xs overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="inline-flex items-center bg-white p-2 text-blue-600 text-sm rounded-full flex-shrink-0">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="exclamation-circle w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <p class="text-base leading-5 font-medium capitalize text-white">
                            Note
                        </p>
                        <p class="mt-1 text-sm leading-5  text-white">
                            {{$slot}}
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button @click="show = false;"
                            class="inline-flex text-white focus:outline-none focus:text-white transition ease-in-out duration-150">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>