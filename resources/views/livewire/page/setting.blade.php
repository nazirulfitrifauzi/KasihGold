
<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Setting
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6"  x-data="{ active: 0 }">
        <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
            <x-general.card class="relative w-full mt-5 bg-white shadow-lg">
                <div class="absolute top-0 left-0 w-full">
                    <div class="flex-shrink-0 relative overflow-hidden bg-yellow-400 rounded-t-lg ">
                        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                        </svg>
                        <div class="relative p-4 flex items-center">
                            <h2 class="text-base font-semibold text-white uppercase">
                                Title
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <x-tab.title name="0" livewire="">
                        <div class="flex font-semibold">
                            <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 1
                        </div>
                    </x-tab.title>
                    <x-tab.title name="1" livewire="">
                        <div class="flex font-semibold">
                            <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 2
                        </div>
                    </x-tab.title>
                    <x-tab.title name="2" livewire="">
                        <div class="flex font-semibold">
                            <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 3
                        </div>
                    </x-tab.title>
                    <x-tab.title name="3" livewire="">
                        <div class="flex font-semibold">
                            <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 4
                        </div>
                    </x-tab.title>
                    <x-tab.title name="4" livewire="">
                        <div class="flex font-semibold">
                            <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 5
                        </div>
                    </x-tab.title>
                </div>
            </x-general.card>
        </div>

        <div class="col-span-12 lg:col-span-6 xxl:col-span-6">
            <x-general.card class="relative w-full mt-5 bg-white shadow-lg">
                <div class="absolute top-0 left-0 w-full">
                    <div class="flex-shrink-0 relative overflow-hidden bg-yellow-400 rounded-t-lg ">
                        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                        </svg>
                        <div class="relative p-4 flex items-center">
                            <h2 class="text-base font-semibold text-white uppercase">
                                Title
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <x-tab.content name="0">
                        content 1
                    </x-tab.content>
                    <x-tab.content name="1">
                        content 2
                    </x-tab.content>
                    <x-tab.content name="2">
                        content 3
                    </x-tab.content>
                    <x-tab.content name="3">
                        content 4
                    </x-tab.content>
                    <x-tab.content name="4">
                        content 5
                    </x-tab.content>
                </div>
            </x-general.card>
        </div>
    </div>
</div>

