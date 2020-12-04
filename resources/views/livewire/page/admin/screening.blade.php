<div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">
        User Screening 
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="flex flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-no-wrap">
        <button class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white">Add New User</button>
        <div class="hidden mx-auto text-gray-600 md:block">{{-- Showing1to10of150entries --}}</div>
        <div class="w-full mt-3 sm:w-auto sm:mt-0 sm:ml-auto md:ml-0">
            <div class="flex w-56 text-gray-700">
                <span class="mt-2 mr-2">Search</span>
                <x-form.input label="" value=""/>
            </div>
        </div>
    </div>

    <div class="col-span-12 intro-y md:col-span-6" x-data="{ OpenScreening: false}">
        <div class="bg-white rounded-xl shadow-lg">
            <div class="flex flex-col items-center p-5 lg:flex-row">
                <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                    <img alt="avatar" class="rounded-full" src="https://image.flaticon.com/icons/png/512/149/149071.png">
                </div>
                <div class="mt-3 text-center lg:ml-2 lg:mr-auto lg:text-left lg:mt-0">
                    <a href="" class="font-medium">test</a>
                </div>
                <div class="flex mt-4 lg:mt-0">
                    <button class="bg-yellow-400  py-1 px-4 rounded flex cursor-pointer font-bold text-sm text-white" wire:click="" @click="OpenScreening = true" >
                        Screening
                    </button>
                </div>
            </div>
        </div>

        {{-- Start modal Screening --}}
        <x-general.modal modalActive="OpenScreening" title="Screening" modalSize="4xl">
            <div class="p-4">
                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                    <x-form.input label="Name" value="Test"  disabled/>
                </div>
                <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                    <table class="table-auto border border-gray-300 w-full ">
                        <thead class="bg-yellow-400">
                            <tr class="text-white">
                                <th class="px-2 py-2">Instituion</th>
                                <th class="px-2 py-2 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class=" border px-2 py-2 font-semibold">
                                    <a href="#" class="transition duration-300 ease-in-out text-blue-600 hover:text-blue-400 cursor-pointer focus:outline-none">
                                        Office of Foreign Asset Control (OFAC) Sanctions
                                    </a>
                                </td>
                                <td class=" border px-2 py-4">
                                    <div class="flex justify-center items-center gap-2">
                                        <button class="transition duration-300 ease-in-out px-3 py-1 rounded text-xs text-white bg-teal-600 hover:bg-teal-400 active:bg-teal-700" wire:click="">
                                            Approve
                                        </button>
                                        <button class="transition duration-300 ease-in-out px-3 py-1 rounded text-xs text-white bg-red-600 hover:bg-red-400 active:bg-red-700" wire:click="">
                                            Decline
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-general.modal>
        {{-- End Modal Screening --}}
    </div>
</div>


