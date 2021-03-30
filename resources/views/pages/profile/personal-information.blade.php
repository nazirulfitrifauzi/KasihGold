<x-general.card class="mt-2 bg-white shadow-lg">
    @if (session('success'))
        <x-toaster.success title="{{ session('success') }}"/>
    @endif
    <x-form.basic-form>
        <x-slot name="content">
            <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
                <h2 class="mr-auto text-base font-medium">
                    Referrer Information
                </h2>
            </div>
            <div class="px-4 py-2">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <x-form.input label="PG Code" wire:model="pgCode" value="pgCode"/>
                        <x-form.input label="Introducer" wire:model="introducer" value="introducer"/>
                        <x-form.input label="Introducer Name" wire:model="introducerName" value="introducerName"/>
                        <x-form.input label="Preferred Branch" wire:model="preferredBranch" value="preferredBranch"/>
                    </div>
                    <div class="flex justify-end py-4">
                        <button type="button" class="flex px-4 py-2 text-sm font-bold text-white bg-green-500 rounded focus:outline-none hover:bg-green-400" wire:click="saveReferrer">
                            Save
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
                <h2 class="mr-auto text-base font-medium">
                    Personal Information
                </h2>
            </div>
            <div class="px-4 py-2">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <x-form.input label="Name" wire:model="name" value="name"/>
                        <x-form.input type="email" label="Email Address" wire:model="email" value="email"/>
                        <x-form.input label="New IC" wire:model="ic" value="ic"/>
                        <x-form.input label="Old IC" wire:model="" value=""/>
                        <x-form.input label="Passport / Foreign ID" wire:model="" value=""/>
                        <x-form.input label="Police / Army" wire:model="" value=""/>
                        <x-form.input label="Phone No" wire:model="phone1" value="phone1"/>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                        <x-form.address class="" label="Address" value1="address1" value2="address2" value3="address3" value4="town" value5="postcode" value6="state" :states="$states" condition="state"/>
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