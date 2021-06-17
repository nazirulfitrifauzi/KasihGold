<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Delivery
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
            <x-general.card class="bg-white shadow-lg">
                <div class="flex py-2">
                    <div class="w-full">
                        <x-form.input label="" value=""/>
                    </div>
                    <button type="submit"
                        class="flex items-center h-8 px-4 py-1 mt-2 ml-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                        Search
                    </button>
                </div>
                {{-- <div class="py-2 px-4">
                    <ul class="-mb-8">
                        <x-feeds.feeds title="Applied to Front End Developer" date="20sep" line="yes" iconBg="gray"> 
                            <x-slot name="icon">
                                <x-heroicon-s-user class="w-5 h-5 text-white" />
                            </x-slot>
                        </x-feeds.feeds>
                        <x-feeds.feeds title="Advanced to phone screening by Bethany Blake" date="20sep" line="yes" iconBg="blue"> 
                            <x-slot name="icon">
                                <x-heroicon-s-hand class="w-5 h-5 text-white" />
                            </x-slot>
                        </x-feeds.feeds>
                        <x-feeds.feeds title="Completed phone screening with Martha Gardner" date="20sep" line="no" iconBg="green"> 
                            <x-slot name="icon">
                                <x-heroicon-s-check class="w-5 h-5 text-white" />
                            </x-slot>
                        </x-feeds.feeds>
                    </ul>
                </div> --}}
            </x-general.card>
        </div>
        <div class="col-span-12 lg:col-span-6 xxl:col-span-6">
            <x-general.card class="bg-white shadow-lg">
                <h2 class="px-2 py-2 mr-auto text-lg font-medium text-white bg-yellow-400 rounded-lg ">
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
                                    <a href="#" class="inline-flex items-center px-4 py-2 font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
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
