<div>
    <x-table.table>
        <x-slot name="thead">
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex w-32">
                    <span class="mr-2">Name of Beneficiaries according <br> to identification document</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex  w-32">
                    <span class="mr-2">identification number/birth <br> certificate/passport/others</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex  w-32">
                    <span class="mr-2">Date of birth <br> (yyy-mm-dd)</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex  w-44">
                    <span class="mr-2">relationship <br> with member</span>
                </div>
            </th>
            <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                <div class="flex  w-52">
                    <span class="mr-2">percentage</span>
                </div>
            </th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($nomineeList as $nominee)
                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{ $nominee->nominee_name }}
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{ $nominee->nominee_id }}
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{ date('d F Y', strtotime($nominee->nominee_dob)) }}
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{ $nominee->memberRelationship->description }}
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="flex items-center gap-5 text-sm font-medium text-gray-700">
                        {{ $nominee->percentage }}%
                    </x-table.table-body>
                </tr>
            @empty
                <tr>
                    <x-table.table-body colspan="5" class="text-sm italic font-medium tracking-wider text-gray-400">
                        No nominee data has been registered.
                    </x-table.table-body>
                </tr>
            @endforelse

            @if (count($nomineeList) < 2)
                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="name" wire:model="nom_name"/>
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="text" label="" value="ic" wire:model="nom_id"/>
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.input type="date" label="" value="date_birth" wire:model="nom_dob"/>
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        <x-form.dropdown label="" value="" default="no" wire:model="nom_mem_rel">
                            <option value="0" selected>Select Relation</option>
                            @foreach ($memberRelationshipList as $relationship)
                                <option value="{{ $relationship->id }}">{{ ucwords($relationship->description) }}</option>
                            @endforeach
                        </x-form.dropdown>
                    </x-table.table-body>

                    <x-table.table-body colspan="" class="flex items-center gap-5 text-sm font-medium text-gray-700">
                        <x-form.input type="text" label="" value="date_birth" wire:model="nom_perc"/>
                        <button type="button" class="px-5 py-2 text-sm text-center text-white bg-blue-500 rounded shadow-sm focus:outline-none hover:bg-blue-400" wire:click="addNominee">Add Nominee</button>
                    </x-table.table-body>
                </tr>
            @endif
        </x-slot>
    </x-table.table>
</div>

@if (Storage::exists('public/nominee/' . auth()->user()->id) == true)
    <div class="mt-5">
        <p>View uploaded documents</p>

        <x-table.table>
            <x-slot name="thead">
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">Document Name</span>
                    </div>
                </th>
                <th class = "px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                    <div class="flex cursor-pointer">
                        <span class="mr-2">Action</span>
                    </div>
                </th>
            </x-slot>
            <x-slot name="tbody">
                @forelse ($docDirList['name'] as $key => $name)
                    <tr>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{ $name }}
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            <a href="{{ asset($docDirList['dir'][$key]) }}" target="blank" class="px-4 py-2 text-sm font-semibold tracking-wider text-white transition duration-300 ease-in-out bg-green-500 rounded-lg hover:bg-green-400">View</a>
                        </x-table.table-body>
                    </tr>
                @empty
                    <tr>
                        <x-table.table-body colspan="5" class="text-sm italic font-medium tracking-wider text-gray-400">
                            No nominee data has been registered.
                        </x-table.table-body>
                    </tr>
                @endforelse
            </x-slot>
        </x-table.table>
    </div>
@endif