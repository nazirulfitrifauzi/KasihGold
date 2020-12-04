<div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">
        Incident Reporting
    </h2>
</div>

<div class="mt-8 bg-white p-4">
    <div class="flex justify-between my-4">
        <div class="flex items-center">
            <a href="#" class="flex px-4 py-2 text-sm font-bold text-white bg-green-400 rounded cursor-pointer focus:outline-none">
                <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to Excel
            </a>
            <a href="#" class="flex px-4 py-2 text-sm font-bold text-white bg-orange-400 rounded cursor-pointer focus:outline-none ml-2">
                <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to PDF
            </a>
        </div>
        <div wire:loading  >
            <div class="flex items-center text-white absolute bg-yellow-400 p-4 rounded" style="left: 38%; top:55%">
                <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin"/>
                <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
            </div>
        </div>
        <div class="flex items-center">
            <span class="mr-2 text-base text-gray-500 -mt-4">Search : </span>
            <x-form.input label="" value="" livewire=""/>
        </div>
    </div>
    <x-table.table>
        <x-slot name="thead">
            <x-table.table-header class="text-left" value="NAME" sort="" livewire=""/>
            <x-table.table-header class="text-left" value="TITLE" sort="" livewire=""/>
            <x-table.table-header class="text-left" value="DATE" sort="" livewire=""/>
            <x-table.table-header class="text-left" value="ACTIONS" sort="" livewire=""/>
        </x-slot>
        <x-slot name="tbody">
            <tr>
                <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                    Agent Pertama
                </x-table.table-body>
                <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                    title1
                </x-table.table-body>
                <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                    08-11-2020
                </x-table.table-body>
                <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                    <div x-data="{ openShow: false}">
                        <a href="#" @click="openShow = true">
                            <div class="flex">
                                <x-heroicon-o-eye class="w-5 h-5 mr-1 text-blue-500"/>
                                <p class="text-blue-500">Show</p>
                            </div>
                        </a>

                        {{-- Start modal Show --}}
                        <x-general.modal modalActive="openShow" title="User Incident Reporting" modalSize="lg">
                            <x-form.basic-form action="">
                                <x-slot name="content">
                                    <div class="p-4 mt-4 leading-4">
                                        <div class="mt-5">
                                            <x-form.dropdown label="" value="" default="">
                                                <option value="" seleted>Select a Category</option>
                                            </x-form.dropdown>
                                        </div>
                                        <div class="mt-5">
                                            <x-form.dropdown label="" value="" default="">
                                                <option value="" seleted>Select a Category</option>
                                            </x-form.dropdown>
                                        </div>
                                        <div class="mt-5">
                                            <x-form.input wire:model="" name="title" id="" value="" label="" type="text" placeholder="Title" livewire=""/>
                                        </div>
                                        <div class="mt-5">
                                            <textarea wire:model="" name="comment" id="" data-feature="all" rows="8" class="appearance-none block w-full h-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"  placeholder="Your Comment"></textarea>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-form.basic-form>
                        </x-general.modal>
                        {{-- End modal Show --}}
                        
                    </div>
                </x-table.table-body>
            </tr>
        </x-slot>
    </x-table.table>         
</div>
