<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Ownership
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
                                    <span>1</span>
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
                                    <span>2</span>
                                </div>
                                <div class="flex-1 ml-4 font-medium">Oct 2020 -Master</div>
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
                                    <span>3</span>
                                </div>
                                <div class="flex-1 ml-4 font-medium">Oct 2020 - Customer</div>
                            </div>
                            <div class="ml-12 -mt-2">
                                Lorem Ipsum is simply dummy text
                            </div>
                        </li>
                    </ul>
                </div>
            </x-general.card>
        </div>
        <div class="col-span-12 lg:col-span-6 xxl:col-span-6">
            <x-general.card class="bg-white shadow-lg">
                <h2 class="mr-auto text-lg font-medium bg-yellow-400 text-white py-2 px-2 rounded-lg ">
                    Parcel heading to you
                </h2>
                <div class="py-4">
                    <x-table.table>
                        <x-slot name="thead">
                            <x-table.table-header class="text-left" value="No" sort=""/>
                            <x-table.table-header class="text-left" value="Serial Number" sort=""/>
                            <x-table.table-header class="text-left" value="Action" sort=""/>
                        </x-slot>
                        <x-slot name="tbody">
                            <tr>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    <p>1</p>
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    <p>4561845</p>
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="font-medium text-gray-900">
                                    <a href="#" class="font-semibold py-2 px-4 rounded-lg inline-flex items-center text-white bg-indigo-500 hover:bg-indigo-600">
                                        <x-heroicon-o-truck class="w-5 h-5 mr-1" />
                                        <p>Delivered</p>
                                    </a>
                                </x-table.table-body>
                            </tr>
                        </x-slot>
                    </x-table.table>
                </div>
            </x-general.card>
        </div>
    </div>
</div>

