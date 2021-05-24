<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Sell Product
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6" x-data="{ active: 0 }">
        <div class="flex col-span-12 lg:col-span-12 xxl:col-span-12 lg:block">
            <x-general.card class="mt-5 bg-white shadow-lg w-full">
                <div class="flex space-x-4 overflow-x-auto">
                    <x-tab2.nav-tab name="0" livewire="" class="bg-yellow-400  hover:bg-yellow-300 text-white rounded-lg">
                        <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-xl">
                                    <p>Buy Physical</p>
                                </div>
                            </div>
                        </div>
                    </x-tab2.nav-tab>
                    <x-tab2.nav-tab name="1" livewire="" class="bg-teal-500  hover:bg-teal-600 text-white rounded-lg">
                        <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-collection class="w-8 h-8 text-teal-600" />
                                </div>
                                <div class="text-xl">
                                    <p>Out Right</p>
                                </div>
                            </div>
                        </div>
                    </x-tab2.nav-tab>
                    <x-tab2.nav-tab name="2" livewire="" class="bg-pink-500  hover:bg-pink-600 text-white rounded-lg">
                        <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-copy class="w-8 h-8 text-pink-600" />
                                </div>
                                <div class="text-xl">
                                    <p>Buy Back</p>
                                </div>
                            </div>
                        </div>
                    </x-tab2.nav-tab>
                </div>
            </x-general.card>
        </div>

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <x-tab2.nav-content name="0">
                <x-general.card class="mt-2 bg-white shadow-lg">
                    1
                </x-general.card>
            </x-tab2.nav-content>

            <x-tab2.nav-content name="1">
                <x-general.card class="mt-2 bg-white shadow-lg">
                    2
                </x-general.card>
            </x-tab2.nav-content>

            <x-tab2.nav-content name="2">
                <x-general.card class="mt-2 bg-white shadow-lg">
                    3
                </x-general.card>
            </x-tab2.nav-content>
        </div>
    </div>
</div>