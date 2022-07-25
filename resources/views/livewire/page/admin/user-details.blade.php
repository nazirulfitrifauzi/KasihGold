<div>
    <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            User Details
        </h2>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('info'))
        <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('success'))
        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('warning'))
        <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}" />
        @endif
    </div>

    <div class="p-4 mt-6 mb-20 bg-gray-100 sm:mb-0">
        <div>
            <! -- Start Introducer -->
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Intoducer Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed publicly so be careful what you share.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <x-form.basic-form>
                                <x-slot name="content">
                                    <div class="mt-2 leading-4"">
                                        <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                            <x-form.display-input label="Introducer Code" value="{{ ($upline== null) ? 'NO DATA' : strtoupper($upline->user->profile->code) }}"/>
                                            <x-form.display-input label="Introducer Name" value="{{ ($upline== null) ? 'NO DATA' : strtoupper($upline->user->name ) }}"/>
                                            <x-form.display-input label="Introducer Email" value="{{ ($upline== null) ? 'NO DATA' : strtoupper($upline->user->email ) }}"/>
                                            <x-form.display-input label="Introducer Phone No" value="{{ ($upline== null) ? 'NO DATA' : strtoupper($upline->user->phone_no ) }}"/>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-form.basic-form>
                        </div>
                    </div>
                </div>
            </div>
            <! -- End Introducer -->

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-300"></div>
                </div>
            </div>

            <! -- Start Personal Details -->
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed publicly so be careful what you share.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <x-form.basic-form>
                            <x-slot name="content">
                                <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                                    <div class="mt-2 overflow-auto leading-4 ">
                                        <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                            <x-form.display-input label="Name" value="{{ ($lists->profile == null) ? '' : strtoupper($lists->name) }}"/>
                                            <x-form.input label="Email" value="email" wire:model.defer="email" mandatory="" disable="false" />
                                            <x-form.input label="Phone No" value="phone" wire:model.defer="phone" mandatory="" disable="false" />
                                            <x-form.input label="New IC" value="ic" wire:model.defer="ic" mandatory="" disable="false" />
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
                                </div>
                                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                    <div class="flex justify-end">
                                        <a wire:click="submitProfile({{ $userId }})" class="flex px-4 py-2 ml-2 text-sm font-bold text-white bg-green-600 rounded cursor-pointer focus:outline-none hover:bg-green-500">
                                            Submit
                                        </a>
                                    </div>
                                </div>
                            </x-slot>
                        </x-form.basic-form>
                    </div>
                </div>
            </div>
            <! -- End Personal Details -->

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-300"></div>
                </div>
            </div>

            <! -- Start Bank Details -->
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Bank Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed publicly so be careful what you share.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <x-form.basic-form>
                                <x-slot name="content">
                                    <div class="mt-2 leading-4"">
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
                    </div>
                </div>
            </div>
            <! -- End Bank Details -->

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-300"></div>
                </div>
            </div>

            <! -- Start Nominee Details -->
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Nominee Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed publicly so be careful what you share.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
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
                    </div>
                </div>
            </div>
            <! -- End Nominee Details -->

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-300"></div>
                </div>
            </div>

            <! -- Start Supporting Documents Details -->
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Supporting Documents</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed publicly so be careful what you share.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
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
                                    @if($lists->bank != NULL && $lists->bank->attachment != NULL)
                                        <div class="flex justify-center">
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="{{ asset($lists->bank->attachment) }}"
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
                        </div>
                    </div>
                </div>
            </div>
            <! -- End Supporting Documents Details -->

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-300"></div>
                </div>
            </div>

            <! -- Start Transfer User Details -->
            @if ($lists->role == 4 && $lists->active == 0)
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Transfer User to another Upline</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    This information will be displayed publicly so be careful what you share.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                                <div>
                                    <div class="mt-3 text-center sm:mt-5">
                                        <div class="mt-2">
                                            <div class="p-4 border-l-4 border-blue-400 bg-blue-50">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <x-heroicon-o-information-circle class="w-5 h-5 text-blue-400"/>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm text-blue-700">Please note that changing the upline can <span class="font-bold ">ONLY</span> be done to customers who have yet made any purchase .</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900">Current {{ $lists->name }}'s Upline :</h3>
                                                <p class="text-sm text-gray-500">
                                                    {{ $upline == NULL ? 'No Data Available' : $upline->upline->name }}
                                                </p>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900">Transfer to new Upline :</h3>
                                                <div class="px-44 ">
                                                    <x-form.input label="" value="newUpline" wire:model.defer="newUpline" mandatory="" disable="false" placeholder="Insert new upline KG code"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <div class="flex justify-end">
                                    <button class="flex px-4 py-2 ml-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none hover:bg-red-500">
                                        Cancel
                                    </button>
                                    <button wire:click="submit({{ $lists->id }})" class="flex px-4 py-2 ml-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-300"></div>
                    </div>
                </div>
            @endif
            <! -- End Transfer User Details -->

            <! -- Start Deceased user Details -->
            @if($lists->active == 1 && $lists->deceased == NULL)
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Deceased User</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    This information will be displayed publicly so be careful what you share.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="">
                                <x-form.basic-form wire:submit.prevent="submitDeceased({{ $lists->id }})">
                                    <x-slot name="content">

                                            <div class="px-4 bg-white sm:p-6">
                                                <x-form.switch-toggle
                                                    label="{{ $check == true ? 'YES' : 'NO'}}"
                                                    wire:click="toggleDeceased"
                                                />
                                                @if($check ==true)
                                                <div class="text-center">
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
                                                <div class="relative flex">
                                                    <label for="death_cert" class="mt-2 w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300
                                                        @error('death_cert') border-red-500 @enderror border-dashed rounded-md cursor-pointer">

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
                                                        </span>
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
                                            </div>
                                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                                <div class="flex justify-end">
                                                    <a type="button" class="flex px-4 py-2 text-sm font-bold text-white bg-red-600 rounded cursor-pointer focus:outline-none hover:bg-red-500">
                                                        Cancel
                                                    </a>
                                                    <button type="cancel" class="flex px-4 py-2 ml-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                            @endif
                                    </x-slot>
                                </x-form.basic-form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <! -- End Deceased user Details -->
        </div>
    </div>
</div>

@push('js')
    <script>

    window.livewire.on('message', message => {
        Swal.fire({
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 2500
        });
    })
    </script>
@endpush
