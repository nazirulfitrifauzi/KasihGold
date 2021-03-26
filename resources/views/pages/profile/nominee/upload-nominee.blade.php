<div>
    <x-general.grid mobile="1" gap="5" sm="3" md="3" lg="3" xl="3" class="col-span-6 py-4">

        <div class="border-2 bg-white shadow-xl py-4 px-4">
            <div class="font-bold text-lg">
                Nominee Form
            </div>
            <div class="py-3 border-b-2 font-semibold text-base text-gray-500">
                <p>Upload your nominee form.(Max size 2MB)</p><span class="text-red-500 font-bold">*Required</span>
            </div>
            <div class="pt-4">
                <x-form.input type="file" label="" value="" wire:model=""/>
            </div>
        </div>

        <div class="border-2 bg-white shadow-xl py-4 px-4">
            <div class="font-bold text-lg">
                Own IC Document
            </div>
            <div class="py-3 border-b-2 font-semibold text-base text-gray-500">
                <p>Upload your own IC or related document. (Max size 2MB)</p><span class="text-red-500 font-bold">*Required</span>
            </div>
            <div class="pt-4">
                <x-form.input type="file" label="" value="" wire:model=""/>
            </div>
        </div>

        <div class="border-2 bg-white shadow-xl py-4 px-4">
            <div class="font-bold text-lg">
                Nominee IC Document
            </div>
            <div class="py-3 border-b-2 font-semibold text-base text-gray-500">
                <p>Upload your nominee IC or related document. (Max size 2MB)</p><span class="text-red-500 font-bold">*Required</span>
            </div>
            <div class="pt-4">
                <x-form.input type="file" label="" value="" wire:model=""/>
            </div>
        </div>
        
    </x-general.grid>
</div>