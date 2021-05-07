<div>
    <x-table.table>
        <x-slot name="thead">
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex cursor-pointer">
                    <span class="mr-2">Name of Beneficiaries according <br> to identification document</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex cursor-pointer">
                    <span class="mr-2">identification number/birth <br> ceterficate/passport/others</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex cursor-pointer">
                    <span class="mr-2">Date of birth <br> (yyy-mm-dd)</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex cursor-pointer">
                    <span class="mr-2">relationship <br> with member</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex cursor-pointer">
                    <span class="mr-2">Percentange</span>
                </div>
            </th>
        </x-slot>
        <x-slot name="tbody">
            <tr>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    <x-form.input type="text" label="" value="name" wire:model=""/>
                </x-table.table-body>

                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    <x-form.input type="text" label="" value="ic" wire:model=""/>
                </x-table.table-body>

                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    <x-form.input type="date" label="" value="date_birth" wire:model=""/>
                </x-table.table-body>

                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    <x-form.dropdown label="" value="" default="no" >
                        <option value="">Select Relation</option>
                    </x-form.dropdown>
                </x-table.table-body>

                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    <x-form.input type="text" label="" value="date_birth" wire:model=""/>
                </x-table.table-body>
            </tr>
        </x-slot>
    </x-table.table>
</div>