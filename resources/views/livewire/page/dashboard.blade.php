<div class="grid grid-cols-12 gap-6">
    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
        <div class="col-span-12 mt-8">
            <div class="flex items-center h-10 intro-y">
                <h2 class="mr-5 text-lg font-medium truncate">General Report</h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <x-dashboard.info-card bg="white" title="item Sales" value="4.510" percentage="30%" percentageBg="green" cardRoute="#" >
                    <x-slot name="svg">
                        <x-heroicon-o-shopping-cart class="h-7 w-7 text-blue-400"/>
                    </x-slot>
                </x-dashboard.info-card>

                <x-dashboard.info-card bg="white" title="New Orders" value="3.521" percentage="2%" percentageBg="red" cardRoute="#" >
                    <x-slot name="svg">
                        <x-heroicon-o-desktop-computer class="h-7 w-7 text-yellow-400"/>
                    </x-slot>
                </x-dashboard.info-card>

                <x-dashboard.info-card bg="white" title="Total Products" value="2.145" percentage="12%" percentageBg="green" cardRoute="#" >
                    <x-slot name="svg">
                        <x-heroicon-o-desktop-computer class="h-7 w-7 text-yellow-400"/>
                    </x-slot>
                </x-dashboard.info-card>

                <x-dashboard.info-card bg="white" title="Total Visitor" value="152.00" percentage="22%" percentageBg="green" cardRoute="#" >
                    <x-slot name="svg">
                        <x-heroicon-o-user class="h-7 w-7 text-green-400"/>
                    </x-slot>
                </x-dashboard.info-card> 
            </div>
        </div>
        <div class="col-span-12 mt-5">
            <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                <div class="bg-white p-4" id="chartline"></div>
            </div>
        </div>
        <div class="col-span-12 mt-5">
            <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                <div class="bg-white p-4" id="chartpie"></div>

                <div class="bg-white p-4">
                    <h1 class="font-bold text-base">Weekly Top Seller</h1>
                    <div class="mt-4">
                        <x-table.table>
                            <x-slot name="thead">
                                <x-table.table-header class="text-left" value="PRODUCT NAME" sort="" livewire=""/>
                                <x-table.table-header class="text-left" value="STOCK" sort="" livewire=""/>
                                <x-table.table-header class="text-left" value="STATUS" sort="" livewire=""/>
                                <x-table.table-header class="text-left" value="ACTIONS" sort="" livewire=""/>
                            </x-slot>
                            <x-slot name="tbody">
                                <tr>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <p>Apple MacBook Pro 13</p>
                                        <p class="text-xs text-gray-400">PC & Laptop</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <p>77</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <div class="flex text-green-500">
                                            <x-heroicon-o-check-circle class="w-5 h-5 mr-1"/>
                                            <p>Active</p>
                                        </div>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <div class="flex">
                                            <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1 text-blue-500"/>
                                            <p class="text-blue-500">Edit</p>

                                            <x-heroicon-o-trash class="w-5 h-5 mr-1 ml-3 text-red-500"/>
                                            <p class="text-red-500">Delete</p>
                                        </div>
                                    </x-table.table-body>
                                </tr>
                                <tr>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <p>Oppo Find X2 Pro</p>
                                        <p class="text-xs text-gray-400">Smartphone & Tablet</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <p>50</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <div class="flex text-green-500">
                                            <x-heroicon-o-check-circle class="w-5 h-5 mr-1"/>
                                            <p>Active</p>
                                        </div>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <div class="flex">
                                            <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1 text-blue-500"/>
                                            <p class="text-blue-500">Edit</p>

                                            <x-heroicon-o-trash class="w-5 h-5 mr-1 ml-3 text-red-500"/>
                                            <p class="text-red-500">Delete</p>
                                        </div>
                                    </x-table.table-body>
                                </tr>
                                <tr>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <p>Dell XPS 13</p>
                                        <p class="text-xs text-gray-400">PC & Laptop</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <p>100</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <div class="flex text-green-500">
                                            <x-heroicon-o-check-circle class="w-5 h-5 mr-1"/>
                                            <p>Active</p>
                                        </div>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        <div class="flex">
                                            <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1 text-blue-500"/>
                                            <p class="text-blue-500">Edit</p>

                                            <x-heroicon-o-trash class="w-5 h-5 mr-1 ml-3 text-red-500"/>
                                            <p class="text-red-500">Delete</p>
                                        </div>
                                    </x-table.table-body>
                                </tr>
                            </x-slot>
                        </x-table.table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 




