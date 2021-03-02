<x-general.card class="mt-5 bg-white shadow-lg">
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Personal Information
        </h2>
    </div>
    <div class="px-4 py-2">
        <x-form.basic-form action="">
            <x-slot name="content">
                <div class="mt-2 leading-4">
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <x-form.input label="Name" value=""/>
                        <x-form.input label="Ic No" value=""/>
                        <x-form.input label="Email" value=""/>
                        <x-form.dropdown label="Gender" value="" default="yes">
                            <option value="">Male</option>
                            <option value="">Female</option>
                        </x-form.dropdown>
                        <x-form.input label="House No" value=""/>
                        <x-form.input label="Phone No" value=""/>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                        <x-form.address class="" label="Address" value1="address1" value2="address2" value3="address3" value4="town" value5="postcode" value6="state" condition=""/>
                    </div>
                    <div class="flex justify-end py-4">
                        <button class="flex px-4 py-2 text-sm font-bold text-white bg-green-500 rounded focus:outline-none hover:bg-green-400">
                            Save
                        </button>
                    </div>
                </div>
            </x-slot>
        </x-form.basic-form>   
    </div>
</x-general.card>