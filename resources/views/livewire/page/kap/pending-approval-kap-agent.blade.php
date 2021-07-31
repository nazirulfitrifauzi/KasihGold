<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Pending Approval
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

        <div class="p-4 mt-8 mb-20 bg-white sm:mb-0">
            <div class="flex justify-between my-4">
                {{-- <div wire:loading>
                    <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                        style="left: 50%; top:50%">
                        <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                        <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                    </div>
                </div> --}}
                <div class="flex items-center">
                    <x-form.search-input />
                </div>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="No" sort="" />
                    <x-table.table-header class="text-left" value="Name" sort="" />
                    <x-table.table-header class="text-left" value="Email" sort="" />
                    <x-table.table-header class="text-left" value="Membership ID" sort="" />
                    <x-table.table-header class="text-left" value="Profile Completion" sort="" />
                    <x-table.table-header class="text-left" value="Action" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @forelse ($list as $index => $lists)
                        <tr wire:key="lists-{{ $lists->id }}">
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $loop->iteration  }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $lists->name }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $lists->email }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <x-form.input wire:model="membership_id.{{ $lists->id }}" name="membership_id" id="membership_id" value="membership_id" label="" type="text" placeholder="Membership ID" />
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($lists->profile_c == 1) ? 'green' : 'yellow'}}-100 text-{{ ($lists->profile_c == 1) ? 'green' : 'yellow'}}-800">{{ ($lists->profile_c == 1) ? 'Complete': 'Incomplete'}}</span>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-2" x-data="{ openModal : false}">
                                    <button  @click="openModal = true"
                                        class="inline-flex items-center px-4 py-2 font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:outline-none">
                                        <x-heroicon-o-clipboard-list class="w-5 h-5 mr-1" />
                                        Details
                                    </button>

                                    <! -- Start modal Details -->
                                    <x-general.modal modalActive="openModal" title="Details" modalSize="2xl">
                                        <div x-data="{ active: 0 }">
                                            <div class="flex w-full my-2 bg-gray-100 shadow-sm">
                                                <x-tab.nav-tab name="0" livewire="">
                                                    <div class="flex items-center font-medium">
                                                        <x-heroicon-o-user-circle class="w-4 h-4 mr-2"/>Personal
                                                    </div>
                                                </x-tab.nav-tab>
                                                <x-tab.nav-tab name="1" livewire="">
                                                    <div class="flex items-center font-medium">
                                                        <x-heroicon-o-currency-dollar class="w-4 h-4 mr-2"/>Bank
                                                    </div>
                                                </x-tab.nav-tab>
                                                <x-tab.nav-tab name="2" livewire="">
                                                    <div class="flex items-center font-medium">
                                                        <x-heroicon-o-clipboard-list class="w-4 h-4 mr-2"/>Nominee
                                                    </div>
                                                </x-tab.nav-tab>
                                            </div>

                                            <! -- Start Personal Details -->
                                            <x-tab.nav-content name="0">
                                                <div class="py-2">
                                                    <x-form.basic-form>
                                                        <x-slot name="content">
                                                            <div class="h-64 mt-2 overflow-auto leading-4">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                                    <x-form.display-input label="Name" value="{{ $lists->name }}"/>
                                                                    <x-form.display-input label="Email" value="{{ $lists->email }}"/>
                                                                    <x-form.display-input label="Phone No" value="{{ $lists->phone_no }}"/>
                                                                    <x-form.display-input label="New IC" value="{{ $lists->profile->ic }}"/>
                                                                    <x-form.display-input label="Old IC" value="{{ $lists->profile->old_ic }}"/>
                                                                    <x-form.display-input label="Pasport" value="{{ $lists->profile->passport }}"/>
                                                                    <x-form.display-input label="Police / Army ID" value="{{ $lists->profile->gov_id }}"/>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.display-input-address label="Address" address1="{{ $lists->profile->address1 }}" address2="{{ $lists->profile->address2 }}" address3="{{ $lists->profile->address3 }}" town="{{ $lists->profile->town }}" postcode="{{ $lists->profile->postcode }}" state="{{ $lists->profile->state->description }}" />
                                                                </div>
                                                            </div>
                                                        </x-slot>
                                                    </x-form.basic-form>
                                                </div>
                                            </x-tab.nav-content>
                                            <! -- End Personal Details -->

                                            <! -- Start Bank Details -->
                                            <x-tab.nav-content name="1">
                                                <div class="px-4 py-4">
                                                    <x-form.basic-form>
                                                        <x-slot name="content">
                                                            <div class="h-64 mt-2 overflow-auto leading-4"">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                                    <x-form.input label="Bank" value="" disable="" />
                                                                    <x-form.input label="Bank Swift Code"  value="" disable="" />
                                                                    <x-form.input label="Bank Account No"  value="" disable="" />
                                                                    <x-form.input label="Bank Account Holder Name"  value="" disable="" />
                                                                    <x-form.input label="Bank Account ID"  value="" disable="" />
                                                                </div>
                                                            </div>
                                                        </x-slot>
                                                    </x-form.basic-form>
                                                </div>
                                            </x-tab.nav-content>
                                            <! -- End Bank Details -->

                                            <! -- Start Nominee Details -->
                                            <x-tab.nav-content name="2">
                                                <div class="px-4 py-4">
                                                </div>
                                            </x-tab.nav-content>
                                            <! -- Start Nominee Details -->

                                        </div>
                                    </x-general.modal>
                                    <! -- End modal Details -->

                                    @if ($lists->profile_c == 1)
                                        <button wire:click="approve({{ $lists->id }})"
                                                class="inline-flex items-center px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600">
                                            <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1" />
                                            Approve
                                        </button>
                                    @endif

                                    <button class="inline-flex items-center px-4 py-2 font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none"
                                            data-id="{{ $lists->id }}"
                                            onclick="deleteConfirmation({{ $lists->id }})"
                                    >
                                    <x-heroicon-o-trash class="w-5 h-5 mr-1" />
                                        Delete
                                    </button>
                                    <x-popup.delete-admin name="deleteConfirmation" variable="id" posturl="{{ url('/pending-approval-kap-agent') }}/"  />

                                </div>
                            </x-table.table-body>
                        </tr>
                    @empty
                        <tr>
                            <x-table.table-body colspan="6" class="text-center text-gray-500">
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