<x-general.card class="mt-2 bg-white shadow-lg">
    <x-note-card>  
        1. Please take note that the information submitted will not be reflected on your account untill it has been reviewd by Public Gold's staffs.
        <br>
        2. To change information in locked field, please contact your nearest branch.
    </x-note-card>  
    <div class="flex items-center px-5 py-5 border-b border-gray-200 sm:py-3">
        <h2 class="mr-auto text-base font-medium">
            Bank Information
        </h2>
    </div>
    <div class="px-4 py-2">
        <x-form.basic-form wire:submit.prevent="saveBank">
            <x-slot name="content">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                    <x-form.dropdown label="Bank" wire:model="bankId" default="no" >
                        <option value="0">Choose Bank</option>
                        @foreach ($banks as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-form.dropdown>
                    <x-form.input label="Bank Swift Code" wire:model=""/> 
                    <x-form.input label="Bank Account No" wire:model=""/>
                    <x-form.input label="Bank Account Holder Name" wire:model=""/>
                    <x-form.input label="Bank Account ID (IC or others ID registered with bank)" wire:model=""/> 
                    <x-form.input label="Bank Account ID (IC or others ID registered with bank)" wire:model=""/> 
                    <x-form.input type="file" label="Bank Copy Attachement (1st page of bank's Pass book) (Max size 2MB)" wire:model=""/>   
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