<div
    class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end" style="top:auto !important">
    <div class="max-w-sm w-full bg-green-600 shadow-lg rounded-lg pointer-events-auto border-l-4 border-green-500"
        x-data="{ show: true }" 
        x-show="show"
        x-transition:leave-end="transform translate-x-full opacity-0" 
        x-transition:leave-start="transform translate-x-0 opacity-100"
        x-transition:leave="transition ease-out duration-500"
        x-transition:enter-end="transform opacity-100 translate-y-0 sm:translate-x-0"
        x-transition:enter-start="transform opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter="transition ease-in duration-200"
        x-description="Notification panel, show/hide based on alert state."
        x-init="setTimeout(() => show = false, 5000)">
        <div class="relative rounded-lg shadow-xs overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div
                        class="inline-flex items-center bg-white p-2 text-green-600 text-sm rounded-full flex-shrink-0">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="check w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <p class="text-base leading-5 font-medium capitalize  text-white">
                            success
                        </p>
                        <p class="mt-1 text-sm leading-5  text-white ">
                            {{$title}}
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