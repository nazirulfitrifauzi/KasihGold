<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Delivery
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
            <x-general.card class="bg-white shadow-lg">
                <div class="flex border-b-2 py-2">
                    <div class="w-full">
                        <x-form.input label="" value="" wire:model="" />
                    </div>
                    <button type="submit"
                        class="flex items-center mt-2 ml-2 h-8 px-4 py-1 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                        Search
                    </button>
                </div>
                <div class="relative w-1/2 m-8">
                    <div class="border-r-4 border-yellow-400 absolute h-full " style="left: 20px"></div>
                    <ul class="list-none m-0 p-0">
                        <li class="mb-2">
                            <div class="flex items-center mb-1">
                                <div
                                    class="bg-yellow-400 border-4 border-yellow-400 rounded-full h-10 w-10 text-white z-20 flex items-center justify-center">
                                    <x-heroicon-o-check class="w-6 h-6 " />
                                </div>
                                <div class="flex-1 ml-4 font-medium">Oct 2020 - HQ</div>
                            </div>
                            <div class="ml-12 -mt-2">
                                Lorem Ipsum is simply dummy text
                            </div>
                        </li>
                    </ul>
                    <ul class="list-none m-0 p-0">
                        <li class="mb-2">
                            <div class="flex items-center mb-1">
                                <div
                                    class="bg-white border-4 border-yellow-400 rounded-full h-10 w-10 text-yellow-400 z-20 flex items-center justify-center">
                                    <x-heroicon-o-truck class="w-5 h-5 " />
                                </div>
                                <div class="flex-1 ml-4 font-medium">Oct 2020 - HQ</div>
                            </div>
                            <div class="ml-12 -mt-2">
                                Lorem Ipsum is simply dummy text
                            </div>
                        </li>
                    </ul>
                </div>
            </x-general.card>
        </div>
    </div>
</div>