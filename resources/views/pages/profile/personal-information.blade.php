<x-general.card class="mt-2 bg-white shadow-lg">
    @if (session('success'))
        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
    @endif
    <x-form.basic-form>
        <x-slot name="content">
            @if (auth()->user()->client == "1")
                <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
                    <h2 class="mr-auto text-base font-medium">
                        Referrer Information
                    </h2>
                </div>
                <div class="px-4 py-2">
                    <div class="mt-2 leading-4">
                        <div class="grid gap-2 lg:grid-cols-3 sm:grid-cols-1">
                            @if (auth()->user()->client == "1")
                                <x-form.input label="KG Code" wire:model="code" value="code" disable="true"/>
                                <x-form.input label="Introducer" wire:model="introducer" value="introducer" disable="true"/>
                                <x-form.input label="Introducer Name" wire:model="introducerName" value="introducerName" disable="true"/>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
                <h2 class="mr-auto text-base font-medium">
                    {{ (auth()->user()->type == 1) ? 'Personal Information' : 'Company Information' }}
                </h2>
            </div>
            <div class="px-4 py-2">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        @if (auth()->user()->client == "2")
                            <x-form.input label="KAP Code" wire:model="code" value="code" disable="true"/>
                            @if (auth()->user()->type == "1")
                                <x-form.dropdown label="Agent" default="no" wire:model="agentId" value="agentId">
                                    <option value="" hide selected>Select an Agent</option>
                                        @foreach ($agent as $agents)
                                            <option value="{{ $agents->id }}">{{ $agents->name }}</option>
                                        @endforeach
                                </x-form.dropdown>
                                <x-form.input label="Membership ID" wire:model="membership_id" value="membership_id" disable="true"/>
                            @endif
                        @endif
                        <x-form.input label="Name" wire:model="name" value="name"/>
                        <x-form.input type="email" label="Email Address" wire:model="email" value="email" disable="true"/>
                        @if (auth()->user()->type == "1")
                            <x-form.input label="New IC" wire:model="ic" value="ic"/>
                            <x-form.input label="Old IC" value=""/>
                            <x-form.input label="Passport / Foreign ID" value=""/>
                            <x-form.input label="Police / Army ID" value=""/>
                        @endif
                        @if (auth()->user()->type == "2")
                            <x-form.input label="Company No" wire:model="comp_no" value="comp_no"/>
                        @endif
                        <x-form.input label="Phone No" wire:model="phone1" value="phone1"/>
                        @if (auth()->user()->type == "2")
                            <x-form.input label="Fax No" wire:model="fax_no" value="fax_no"/>
                        @endif
                    </div>
                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                        <x-form.address class="" label="Address" value1="address1" value2="address2" value3="address3" value4="town" value5="postcode" value6="state" :state="$states" condition="state"/>
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