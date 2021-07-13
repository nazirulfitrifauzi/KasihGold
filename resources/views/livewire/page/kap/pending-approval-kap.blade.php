<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Pending Approval for New Agents
            </h2>
            @if (session('error'))
                <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('info'))
                <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('success'))
                <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('warning'))
                <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}"/>
            @endif
        </div>

        <div class="p-4 mt-8 bg-white">
            <div class="flex justify-between my-4">
                <div wire:loading>
                    <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                        style="left: 50%; top:50%">
                        <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                        <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                    </div>
                </div>
                <div class="flex items-center">
                    <x-form.search-input />
                </div>
            </div>

            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="No" sort="" />
                    <x-table.table-header class="text-left" value="Name" sort="" />
                    <x-table.table-header class="text-left" value="Email" sort="" />
                    <x-table.table-header class="text-left" value="Pofile Completion" sort="" />
                    <x-table.table-header class="text-left" value="Action" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @forelse ($list as $lists)
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $loop->iteration  }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $lists->name }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $lists->email }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($lists->profile_c == 1) ? 'green' : 'yellow'}}-100 text-{{ ($lists->profile_c == 1) ? 'green' : 'yellow'}}-800">{{ ($lists->profile_c == 1) ? 'Complete': 'Incomplete'}}</span>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-2" x-data="{ openModal : false}">

                                    {{-- <button  @click="openModal = true"
                                        class="inline-flex items-center px-4 py-2 font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:outline-none">
                                        <x-heroicon-o-clipboard-list class="w-5 h-5 mr-1" />
                                        Details
                                    </button>

                                    <! -- Start modal -->
                                    <x-general.new-modal modalName="openModal" size="2xl">
                                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-blue-100 rounded-full">
                                            <x-heroicon-o-identification class="w-6 h-6 text-blue-600" />
                                        </div>
                                        <div class="my-3 text-center sm:mt-5">
                                            <h1 class="text-lg font-bold">Personal Information</h1>
                                        </div>
                                        <div class="px-4 py-4">
                                            <x-form.basic-form>
                                                <x-slot name="content">
                                                    <div class="mt-2 leading-4">
                                                        <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                            <x-form.input label="KAP Code" value="" disable="true" />
                                                            <x-form.input label="Membership ID"  value="" disable="true" />

                                                            <x-form.input label="Name"  value="" />
                                                            <x-form.input type="email" label="Email Address"  value="" disable="true" />

                                                            <x-form.input label="New IC"  value="" />
                                                            <x-form.input label="Old IC" value="" />
                                                            <x-form.input label="Passport / Foreign ID" value="" />
                                                            <x-form.input label="Police / Army" value="" />

                                                            <x-form.input label="Company No"  value="" />

                                                            <x-form.input label="Phone No" value="" />
                                                            <x-form.input label="Fax No" value=""/>
                                                        </div>
                                                        <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                            <x-form.address class="" label="Address" value1="" value2="" value3="" value4="" value5="" value6=""  condition=""/>
                                                        </div>
                                                        <div class="grid gap-2 mt-5 lg:grid-cols-2 sm:grid-cols-1">
                                                            <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm" @click="openModal = false">
                                                                    Cancel
                                                            </button>
                                                            <a href="#" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:col-start-2 sm:text-sm">
                                                                    Submit
                                                            </a>
                                                        </div>
                                                    </div>
                                                </x-slot>
                                            </x-form.basic-form>
                                        </div>
                                    </x-general.new-modal>
                                    <! -- End modal --> --}}

                                    @if ($lists->profile_c == 1)
                                        <button wire:click="approve({{ $lists->id }})"
                                                class="inline-flex items-center px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none">
                                            <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1" />
                                            Approve
                                        </button>
                                    @endif
                                </div>
                            </x-table.table-body>
                        </tr>
                    @empty
                        <tr>
                            <x-table.table-body colspan="4" class="text-center text-gray-500">
                                No New Request
                            </x-table.table-body>
                        </tr>
                    @endforelse
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>
    </div>
</div>