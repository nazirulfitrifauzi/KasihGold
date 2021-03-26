<x-general.card class="mt-2 bg-white shadow-lg">
    @if (session('success'))
        <x-toaster.success title="{{ session('success') }}"/>
    @endif
    <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
        <h2 class="mr-auto text-base font-medium">
            Personal Information
        </h2>
    </div>
    <div class="px-4 py-2">
        <x-form.basic-form wire:submit.prevent="savePersonalInformation">
            <x-slot name="content">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <x-form.input type="text" label="PG Code" value="" wire:model=""/>
                        <x-form.input type="text" label="Name" value="" wire:model=""/>
                        <x-form.input type="email" label="Email Address" value="" wire:model=""/>
                        <x-form.input type="text" label="Introducer" value="" wire:model=""/>
                        <x-form.input type="text" label="Introducer Name" value="" wire:model=""/>
                        <x-form.input type="text" label="Preferred Branch" value="" wire:model=""/>
                        <x-form.input type="text" label="New IC" value="" wire:model=""/>
                        <x-form.input type="text" label="Old IC" value="" wire:model=""/>
                        <x-form.input type="text" label="Passport / Foreign ID" value="" wire:model=""/>
                        <x-form.input type="text" label="Police / Army" value="" wire:model=""/>
                        <x-form.input type="text" label="Phone No" value="" wire:model=""/>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                        <x-form.address class="" label="Address" value1="address1" value2="address2" value3="address3" value4="town" value5="postcode" value6="state" :states="$states" condition="state"/>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1 mt-4">
                        <x-form.input type="text" label="Bank" value="" wire:model=""/>
                        <x-form.input type="text" label="Bank Swift Code" value="" wire:model=""/>
                        <x-form.input type="text" label="Bank Account No." value="" wire:model=""/>
                        <x-form.input type="text" label="Bank Account Holder Name" value="" wire:model=""/>
                        <x-form.input type="text" label="Bank Account ID" value="" wire:model=""/>
                    </div>
                    <div class="flex justify-end py-4">
                        <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-500 rounded focus:outline-none hover:bg-green-400">
                            Save
                        </button>
                    </div>
                </div>
            </x-slot>
        </x-form.basic-form>   
    </div>
</x-general.card>