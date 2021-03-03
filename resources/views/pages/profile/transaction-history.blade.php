<x-general.card class="mt-5 bg-white shadow-lg">
    <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
        <h2 class="mr-auto text-base font-medium">
            Transaction history
        </h2>
    </div>
    <div class="flex flex-col gap-2 px-4 py-4">
        <p>Received</p>
        <x-table.table>
            <x-slot name="thead">
                <x-table.table-header class="text-left" value="PRODUCT NAME" sort=""/>
                <x-table.table-header class="text-left" value="STOCK" sort=""/>
                <x-table.table-header class="text-left" value="AMOUNT" sort=""/>
                <x-table.table-header class="text-left" value="DATE" sort=""/>
                <x-table.table-header class="text-left" value="ACTIONS" sort=""/>
            </x-slot>
            <x-slot name="tbody">
                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <p>Apple MacBook Pro 13</p>
                        <p class="text-xs text-gray-400">PC & Laptop</p>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <div class="flex text-green-500">
                            <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1"/>
                            <p>Inactive</p>
                        </div>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <p>RM 5000.00</p>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <p>12-12-2018</p>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <div class="flex">
                            <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1 text-blue-500"/>
                            <p class="text-blue-500">Edit</p>

                            <x-heroicon-o-trash class="w-5 h-5 ml-3 mr-1 text-red-500"/>
                            <p class="text-red-500">Delete</p>
                        </div>
                    </x-table.table-body>
                </tr>
            </x-slot>
        </x-table.table>
    </div>
    <div class="flex flex-col gap-2 px-4 py-4">
        <p>Send</p>
        <x-table.table>
            <x-slot name="thead">
                <x-table.table-header class="text-left" value="PRODUCT NAME" sort=""/>
                <x-table.table-header class="text-left" value="STOCK" sort=""/>
                <x-table.table-header class="text-left" value="AMOUNT" sort=""/>
                <x-table.table-header class="text-left" value="DATE" sort=""/>
                <x-table.table-header class="text-left" value="ACTIONS" sort=""/>
            </x-slot>
            <x-slot name="tbody">
                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <p>Apple MacBook Pro 13</p>
                        <p class="text-xs text-gray-400">PC & Laptop</p>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <div class="flex text-green-500">
                            <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1"/>
                            <p>Inactive</p>
                        </div>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <p>RM 5000.00</p>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <p>12-12-2018</p>
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <div class="flex">
                            <x-heroicon-o-pencil-alt class="w-5 h-5 mr-1 text-blue-500"/>
                            <p class="text-blue-500">Edit</p>

                            <x-heroicon-o-trash class="w-5 h-5 ml-3 mr-1 text-red-500"/>
                            <p class="text-red-500">Delete</p>
                        </div>
                    </x-table.table-body>
                </tr>
            </x-slot>
        </x-table.table>
    </div>
</x-general.card>