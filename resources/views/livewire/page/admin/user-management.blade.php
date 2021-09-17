<div>
    <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            User Management
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

    <div class="p-4 mb-20 bg-white sm:mb-0">
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
                <x-table.table-header class="text-left" value="Role" sort="" />
                <x-table.table-header class="text-left" value="Status" sort="" />
                <x-table.table-header class="text-left" value="Action" sort="" />
            </x-slot>
            <x-slot name="tbody">
                @php $i = 1 + $list->currentPage() * $list->perPage() - $list->perPage(); @endphp
                @forelse ($list as $index => $lists)
                    <tr wire:key="lists-{{ $lists->id }}">
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{ $i++ }}</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{ $lists->name }}</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{ $lists->email }}</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($lists->role == 4) ? 'green' : 'yellow'}}-100 text-{{ ($lists->role == 4) ? 'green' : 'yellow'}}-800">{{ ($lists->role == 4) ? 'User': 'Agent'}}</span>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
                                @if($lists->active == 1) bg-green-100 @elseif($lists->active == 0) bg-yellow-100 @elseif($lists->active == 9) bg-red-100 @endif
                                @if($lists->active == 1) text-green-800 @elseif($lists->active == 0) text-yellow-800 @elseif($lists->active == 9) text-red-800 @endif"
                            >
                                @if($lists->active == 1) Active @elseif($lists->active == 0) Inactive @elseif($lists->active == 9) Deceased @endif
                            </span>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-2" x-data="{ openModal : false, openModal2 : false, openModal3 : false}">
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
                                                                <x-form.display-input-address label="Address"
                                                                    address1="{{ ($lists->profile == null || $lists->profile->address1 == null) ? '' : strtoupper($lists->profile->address1) }}"
                                                                    address2="{{ ($lists->profile == null || $lists->profile->address2 == null) ? '' : strtoupper($lists->profile->address2) }}"
                                                                    address3="{{ ($lists->profile == null || $lists->profile->address3 == null) ? '' : strtoupper($lists->profile->address3) }}"
                                                                    town="{{ ($lists->profile == null || $lists->profile->town == null) ? '' : strtoupper($lists->profile->town) }}"
                                                                    postcode="{{ ($lists->profile == null || $lists->profile->postcode == null) ? '' : $lists->profile->postcode }}"
                                                                    state="{{ ($lists->profile == null || $lists->profile->state_id == null) ? '' : strtoupper($lists->profile->state->description) }}" />
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

                                @if ($lists->role == 4 && $lists->active == 0)
                                    <x-heroicon-o-external-link class="w-5 h-5 mr-1 text-yellow-300 cursor-pointer tooltipbtn" @click="openModal2 = true" x-on:close-modal.window="openModal2 = false" data-title="Transfer User" data-placement="top"/>

                                    <! -- Start modal trasnfer user -->
                                    <x-general.new-modal modalName="openModal2" size="2xl">
                                        <div>
                                            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-yellow-100 rounded-full">
                                                <x-heroicon-o-external-link class="w-6 h-6 text-orange-600" />
                                            </div>
                                            <div class="mt-3 text-center sm:mt-5">
                                                <h1 class="text-lg font-bold">Transfer User to another Agent</h1>
                                                <div class="mt-2">
                                                    <div class="p-4 border-l-4 border-blue-400 bg-blue-50">
                                                        <div class="flex">
                                                            <div class="flex-shrink-0">
                                                                <x-heroicon-o-information-circle class="w-5 h-5 text-blue-400"/>
                                                            </div>
                                                            <div class="ml-3">
                                                                <p class="text-sm text-blue-700">Please note that only inactive user can be transfer to another agent.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <h3 class="text-base font-semibold leading-6 text-gray-900">Current {{ $lists->name }}'s Agent :</h3>
                                                        <p class="text-sm text-gray-500">
                                                            {{ $lists->profile == NULL || $lists->profile->tempAgent == NULL ? 'No Data Available' : $lists->profile->tempAgent->name }}
                                                        </p>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h3 class="text-base font-semibold leading-6 text-gray-900">Transfer to Agent :</h3>
                                                        <div class="px-44 ">
                                                            <select class="block w-full text-center border border-indigo-500 rounded-md focus:ring-indigo-800 focus:border-indigo-800 sm:text-sm" wire:model="selectedAgent">
                                                                <option value="0" hidden>Select an Agent</option>
                                                                @foreach($agent as $agents)
                                                                    <option value="{{ $agents->id }}">
                                                                        {{ $agents->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-center mt-4">
                                                        <div class="mr-4">
                                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Current Agent</h3>
                                                            <p class="text-sm text-gray-500">
                                                                {{ $lists->profile == NULL || $lists->profile->tempAgent == NULL ? 'No Data Available' : $lists->profile->tempAgent->name }}
                                                            </p>
                                                        </div>
                                                        <div class="flex items-center ">
                                                            <x-heroicon-o-chevron-double-right class="h-8 text-green-500 -8 "/>
                                                        </div>
                                                        <div class="ml-4">
                                                            <h3 class="text-base font-semibold leading-6 text-yellow-600">New Agent</h3>
                                                            <p class="text-sm text-yellow-500">
                                                                {{ $selectedAgent != null ? App\Models\User::find($selectedAgent)->name : ''}}
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex justify-center mt-8">
                                                <button wire:click="submit({{ $lists->id }})" class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                    Submit
                                                </button>
                                                <button @click="openModal2 = false" class="flex px-4 py-2 ml-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none hover:bg-red-500">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </x-general.new-modal>
                                    <! -- End modal trasnfer user -->
                                @endif

                                @if($lists->active == 1 && $lists->deceased == NULL)
                                    <x-heroicon-o-user-remove
                                        class="w-5 h-5 mr-1 text-red-500 cursor-pointer tooltipbtn"
                                        data-title="Deceased User" data-placement="top"
                                        @click="openModal3 = true" x-on:close-modal.window="openModal3 = false"
                                        x-on:close-modal3.window="openModal3 = false"/>

                                    <! -- Start modal deceased user -->
                                    <x-general.new-modal modalName="openModal3" size="2xl">
                                        <x-form.basic-form wire:submit.prevent="submitDeceased({{ $lists->id }})">
                                            <x-slot name="content">
                                                <div class="p-4 mt-4 leading-4">
                                                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full">
                                                        <x-heroicon-o-user-remove class="w-6 h-6 text-red-600" />
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 class="text-lg font-bold">Deceased User</h1>
                                                        <div class="p-4 mt-2 border-l-4 border-blue-400 bg-blue-50">
                                                            <div class="flex">
                                                                <div class="flex-shrink-0">
                                                                    <x-heroicon-o-information-circle class="w-5 h-5 text-blue-400"/>
                                                                </div>
                                                                <div class="ml-3">
                                                                    <p class="text-sm text-blue-700">Please note that only inactive user can be transfer to another agent.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex mt-5">
                                                        <label for="death_cert" class="mt-2 w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('death_cert') border-red-500 @enderror border-dashed rounded-md cursor-pointer">

                                                            @if ($death_cert)
                                                                {{ $death_cert->getClientOriginalName() }}
                                                            @endif

                                                            <span class="text-center group {{ $death_cert ? 'hidden' : '' }}" id="death_cert-div">
                                                                <div class="cursor-pointer ">
                                                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 48 48">
                                                                        <path
                                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    <p class="mt-1 text-sm text-gray-600">
                                                                        <a
                                                                            class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                                                                            Upload
                                                                        </a>
                                                                    </p>
                                                                    <p class="mt-1 text-xs text-gray-500">
                                                                        Upload the user's death Certificate here.
                                                                    </p>
                                                                    <p class="mt-1 text-xs text-gray-500">
                                                                        PDF format only | Max Size: 10MB
                                                                    </p>
                                                            </div>
                                                            <span class="text-center group">
                                                                <div class="cursor-pointer ">
                                                                    @error('death_cert')
                                                                    <p class="mt-4 text-xs italic text-red-500">
                                                                        Only PDF file (max 10MB) is accepted.
                                                                    </p>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </label>
                                                        <input type="file" class="absolute invisible pointer-events-none" id="death_cert"
                                                            name="death_cert" wire:model="death_cert">
                                                    </div>

                                                    <div class="flex justify-end mt-4 space-x-2">
                                                        <a type="button" @click="openModal3 = false" class="flex px-4 py-2 text-sm font-bold text-white bg-red-600 rounded cursor-pointer focus:outline-none hover:bg-red-500">
                                                            Cancel
                                                        </a>
                                                        <button type="cancel" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </x-slot>
                                        </x-form.basic-form>
                                    </x-general.new-modal>
                                    <! -- End modal deceased user -->
                                @endif

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