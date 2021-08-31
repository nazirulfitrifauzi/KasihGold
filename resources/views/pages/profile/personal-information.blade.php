<x-general.card class="mt-2 mb-20 bg-white shadow-lg sm:mb-0">
    @if (session('success'))
        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
    @endif
    <x-form.basic-form>
        <x-slot name="content">
            <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
                <h2 class="mr-auto text-base font-medium">
                    {{ (auth()->user()->type == 1) ? 'Personal Information' : 'Company Information' }}
                </h2>
            </div>
            <div class="px-4 py-2">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <x-form.input label="KAP Code" wire:model.lazy="code" value="code" disable="true"/>
                        @if (auth()->user()->type == "1")
                            <x-form.input label="Membership ID" wire:model.lazy="membership_id" value="membership_id" disable="true"/>
                        @endif
                        <x-form.input label="Name" wire:model.lazy="name" value="name"/>
                        <x-form.input type="email" label="Email Address" wire:model.lazy="email" value="email" disable="true"/>
                        @if (auth()->user()->type == "1")
                            <x-form.input label="New IC" wire:model.lazy="ic" value="ic"/>
                            <x-form.input label="Old IC" wire:model.lazy="old_ic" value="old_ic"/>
                            <x-form.input label="Passport / Foreign ID" wire:model.lazy="passport" value="passport"/>
                            <x-form.input label="Police / Army ID" wire:model.lazy="gov_id" value="gov_id"/>
                        @endif
                        @if (auth()->user()->type == "2")
                            <x-form.input label="Company No" wire:model.lazy="comp_no" value="comp_no"/>
                        @endif
                        <x-form.input label="Phone No" wire:model.lazy="phone1" value="phone1"/>
                        @if (auth()->user()->type == "2")
                            <x-form.input label="Fax No" wire:model.lazy="fax_no" value="fax_no"/>
                        @endif
                    </div>
                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                        <x-form.address class="" label="Address" value1="address1" value2="address2" value3="address3" value4="town" value5="postcode" value6="state" :state="$states" condition="state"/>
                    </div>

                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                    {{-- Ic upload --}}
                    @include('pages.profile.upload.ic_front')
                    @include('pages.profile.upload.ic_back')
                    </div>

                    <div class="flex justify-end py-4">
                        <button type="button" class="flex px-4 py-2 text-sm font-bold text-white bg-green-500 rounded focus:outline-none hover:bg-green-400" wire:click="savePersonal">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-form.basic-form>
</x-general.card>