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
        <x-form.basic-form wire:submit.prevent="savePersonalInformation">
            <x-slot name="content">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                    <x-form.dropdown label="Bank" value="" wire:model="" default="no" >
                        <option value="">Select Bank</option>
                    </x-form.dropdown>
                    <x-form.input type="text" label="Bank Swift Code" value="" wire:model=""/> 
                    <x-form.input type="text" label="Bank Account No" value="" wire:model=""/>
                    <x-form.input type="text" label="Bank Account Holder Name" value="" wire:model=""/>
                    <x-form.input type="text" label="Bank Account ID (IC or others ID registered with bank)" value="" wire:model=""/> 
                    <x-form.input type="text" label="Bank Account ID (IC or others ID registered with bank)" value="" wire:model=""/> 
                    <x-form.input type="file" label="Bank Copy Attachement (1st page of bank's Pass book) (Max size 2MB)" value="" wire:model=""/>   
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