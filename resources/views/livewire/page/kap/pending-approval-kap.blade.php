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

        <div class="mb-20 bg-white sm:mb-0">
            <div class="flex justify-between mb-4">
                <div wire:loading>
                    <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                        style="left: 50%; top:50%">
                        <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                        <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <div class="w-80">
                    <x-form.search-input placeholder="Search by email address" wire:model="search"/>
                </div>
            </div>

            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="No" sort="" />
                    <x-table.table-header class="text-left" value="Name" sort="" />
                    <x-table.table-header class="text-left" value="Email" sort="" />
                    <x-table.table-header class="text-left" value="Profile Completion" sort="" />
                    <x-table.table-header class="text-left" value="Referral Code" sort="" />
                    <x-table.table-header class="text-left" value="Action" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @forelse ($list as $index => $lists)
                        <tr wire:key="{{ $index }}">
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
                                <div class="flex space-x-2" wire:key="referral-code-{{ $lists->id }}">
                                    {{-- <div class="flex mt-1 rounded-md shadow-sm"> --}}
                                        <div class="flex">
                                            <input type="text" wire:model.lazy="referral_codes.{{ $lists->id }}.code" name="referral_code" id="referral_code"
                                            class="@error('referral_codes.'.$lists->id.'.code') border-red-300 focus:ring-red-500 focus:border-red-500 bg-red-50 @else border-gray-300 focus:ring-yellow-500 focus:border-yellow-500  @enderror w-full border rounded-md sm:text-sm " placeholder="Referral Code">
                                        </div>
                                    {{-- </div> --}}
                                </div>
                                @error('referral_codes.'.$lists->id.'.code')
                                    <small class="italic text-red-500 ">{{ $message }}</small>
                                @enderror
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-2" x-data="{ openModal : false}">
                                    <x-heroicon-o-eye class="w-5 h-5 mr-1 text-blue-500 cursor-pointer tooltipbtn" @click="openModal = true" data-title="View Details" data-placement="top"/>

                                    <! -- Start modal Details -->
                                    <x-general.modal modalActive="openModal" title="Details" modalSize="2xl">
                                        <div x-data="{ active: 0 }">
                                            <div class="flex w-full my-2 bg-gray-100 shadow-sm justify-evenly">
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
                                                <x-tab.nav-tab name="3" livewire="">
                                                    <div class="flex items-center font-medium">
                                                        <x-heroicon-o-clipboard-list class="w-4 h-4 mr-2"/>Supporting Documents
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
                                                                    <x-form.display-input label="Name" value="{{ ($lists->profile == null) ? '' : strtoupper($lists->name) }}"/>
                                                                    <x-form.display-input label="Email" value="{{ ($lists->profile == null) ? '' : $lists->email }}"/>
                                                                    <x-form.display-input label="Phone No" value="{{ ($lists->profile == null) ? '' : $lists->phone_no }}"/>
                                                                    <x-form.display-input label="New IC" value="{{ ($lists->profile == null) ? '' : $lists->profile->ic }}"/>
                                                                    <x-form.display-input label="Old IC" value="{{ ($lists->profile == null) ? '' : $lists->profile->old_ic }}"/>
                                                                    <x-form.display-input label="Pasport" value="{{ ($lists->profile == null) ? '' : $lists->profile->passport }}"/>
                                                                    <x-form.display-input label="Police / Army ID" value="{{ ($lists->profile == null) ? '' : $lists->profile->gov_id }}"/>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <x-form.display-input-address label="Address" address1="{{ ($lists->profile->address1 == null) ? '' : strtoupper($lists->profile->address1) }}" address2="{{ ($lists->profile->address2 == null) ? '' : strtoupper($lists->profile->address2) }}" address3="{{ ($lists->profile->address3 == null) ? '' : strtoupper($lists->profile->address3) }}" town="{{ ($lists->profile->town == null) ? '' : strtoupper($lists->profile->town) }}" postcode="{{ ($lists->profile->postcode == null) ? '' : $lists->profile->postcode }}" state="{{ ($lists->profile->state_id == null) ? '' : strtoupper($lists->profile->state->description) }}" />
                                                                </div>
                                                            </div>
                                                        </x-slot>
                                                    </x-form.basic-form>
                                                </div>
                                            </x-tab.nav-content>
                                            <! -- End Personal Details -->

                                            <! -- Start Bank Details -->
                                            <x-tab.nav-content name="1">
                                                <div class="py-2">
                                                    <x-form.basic-form>
                                                        <x-slot name="content">
                                                            <div class="h-64 mt-2 overflow-auto leading-4"">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                                    <x-form.display-input label="Bank" value="{{ ($lists->bank == null) ? '' : strtoupper($lists->bank->bankName->name) }}"/>
                                                                    <x-form.display-input label="Bank Swift Code" value="{{ ($lists->bank == null) ? '' : strtoupper($lists->bank->swift_code) }}"/>
                                                                    <x-form.display-input label="Bank Account No" value="{{ ($lists->bank == null) ? '' : $lists->bank->acc_no }}"/>
                                                                    <x-form.display-input label="Bank Account Holder Name" value="{{ ($lists->bank == null) ? '' : strtoupper($lists->bank->acc_holder_name) }}"/>
                                                                    <x-form.display-input label="Bank Account ID" value="{{ ($lists->bank == null) ? '' : $lists->bank->acc_id }}"/>
                                                                </div>
                                                            </div>
                                                        </x-slot>
                                                    </x-form.basic-form>
                                                </div>
                                            </x-tab.nav-content>
                                            <! -- End Bank Details -->

                                            <! -- Start Nominee Details -->
                                            <x-tab.nav-content name="2">
                                                <div class="py-2">
                                                    <x-table.table>
                                                        <x-slot name="thead">
                                                            <x-table.table-header class="text-left" value="Name" sort=""/>
                                                            <x-table.table-header class="text-left" value="ID" sort=""/>
                                                            <x-table.table-header class="text-left" value="Relationship" sort=""/>
                                                            <x-table.table-header class="text-left" value="Percentage" sort=""/>
                                                        </x-slot>
                                                        <x-slot name="tbody">
                                                            @if ($lists->nominees == null)
                                                                <tr>
                                                                    <x-table.table-body colspan="4" class="font-medium text-gray-900">
                                                                        <p class="italic">NO DATA AVALAIBLE</p>
                                                                    </x-table.table-body>
                                                                </tr>
                                                            @else
                                                                @foreach ($lists->nominees as $nominee)
                                                                <tr>
                                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                                        {{ strtoupper($nominee->nominee_name) }}
                                                                    </x-table.table-body>
                                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                                        {{ $nominee->nominee_id }}
                                                                    </x-table.table-body>
                                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                                        {{ strtoupper($nominee->memberRelationship->description) }}
                                                                    </x-table.table-body>
                                                                    <x-table.table-body colspan="" class="font-medium text-gray-900">
                                                                        {{ $nominee->percentage }}%
                                                                    </x-table.table-body>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </x-slot>
                                                    </x-table.table>
                                                </div>
                                            </x-tab.nav-content>
                                            <! -- Start Nominee Details -->

                                            <! -- Start Supporting Document -->
                                            <x-tab.nav-content name="3">
                                                <!-- IC Front -->
                                                <div class="py-2">
                                                    <label for="profile_pic" class="flex text-sm font-medium leading-5 text-gray-700">
                                                        NRIC Copy (Front)
                                                    </label>
                                                    <div class="flex justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer"
                                                        style="display: block;">
                                                        @if($lists->profile != NULL && $lists->profile->ic_front != NULL)
                                                            <div class="flex justify-center">
                                                                <span class="inline-flex rounded-md shadow-sm">
                                                                    <a href="{{ asset($lists->profile->ic_front) }}"
                                                                        target="_blank" type="button"
                                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                                                                        <x-heroicon-o-document-download class="w-5 h-5" />
                                                                        View/Download
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        @else
                                                            <div class="flex justify-center">
                                                                <p class="italic">NO DATA AVALAIBLE</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- IC Back -->
                                                <div class="py-2">
                                                    <label for="profile_pic" class="flex text-sm font-medium leading-5 text-gray-700">
                                                        NRIC Copy (Back)
                                                    </label>
                                                    <div class="flex justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer"
                                                        style="display: block;">
                                                        @if($lists->profile != NULL && $lists->profile->ic_back != NULL)
                                                            <div class="flex justify-center">
                                                                <span class="inline-flex rounded-md shadow-sm">
                                                                    <a href="{{ asset($lists->profile->ic_back) }}"
                                                                        target="_blank" type="button"
                                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                                                                        <x-heroicon-o-document-download class="w-5 h-5" />
                                                                        View/Download
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        @else
                                                            <div class="flex justify-center">
                                                                <p class="italic">NO DATA AVALAIBLE</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- Bank Statement-->
                                                <div class="py-2">
                                                    <label for="profile_pic" class="flex text-sm font-medium leading-5 text-gray-700">
                                                        Bank Statement
                                                    </label>
                                                    <div class="flex justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer"
                                                        style="display: block;">
                                                        @if($lists->bank != NULL && $lists->bank->bank_statement != NULL)
                                                            <div class="flex justify-center">
                                                                <span class="inline-flex rounded-md shadow-sm">
                                                                    <a href="{{ asset($lists->bank->bank_statement) }}"
                                                                        target="_blank" type="button"
                                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                                                                        <x-heroicon-o-document-download class="w-5 h-5" />
                                                                        View/Download
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        @else
                                                            <div class="flex justify-center">
                                                                <p class="italic">NO DATA AVALAIBLE</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </x-tab.nav-content>
                                            <! -- Start Supporting Document -->

                                        </div>
                                    </x-general.modal>
                                    <! -- End modal Details -->



                                    @if ($lists->profile_c == 1)
                                        <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1 text-green-500 cursor-pointer tooltipbtn" wire:click="approve({{ $lists->id }}, '{{ $lists->member_id ?? 0 }}')" data-title="Approve Agent" data-placement="top"/>
                                    @endif

                                    <x-heroicon-o-trash class="w-5 h-5 mr-1 text-red-600 cursor-pointer tooltipbtn" data-id="{{ $lists->id }}" onclick="deleteConfirmation({{ $lists->id }})" data-title="Reject Agent" data-placement="top"/>
                                    <x-popup.delete-admin name="deleteConfirmation" variable="id" posturl="{{ url('/pending-approval-kap') }}/"  />


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
                    {{ $list->links('pagination-links') }}
                </div>
            </x-table.table>
        </div>
    </div>
</div>