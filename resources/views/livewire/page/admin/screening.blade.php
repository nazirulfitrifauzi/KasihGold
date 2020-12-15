<div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">
        User Screening
    </h2>
</div>
<x-general.card class="bg-white px-4 pb-8" x-data="{ OpenScreening: false}">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="flex flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-no-wrap">
            <button
                class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer hover:bg-yellow-300">Add
                New User</button>
            <div class="hidden mx-auto text-gray-600 md:block">{{-- Showing1to10of150entries --}}</div>
            <div class="w-full mt-3 sm:w-auto sm:mt-0 sm:ml-auto md:ml-0">
                <div class="flex w-56 text-gray-700">
                    <span class="mt-2 mr-2">Search</span>
                    <x-form.input type="text" label="" value="search" />
                </div>
            </div>
        </div>

        <div class="col-span-12 intro-y md:col-span-6">
            <div class="bg-gray-100 shadow-lg rounded-xl">
                <div class="flex flex-col items-center p-5 lg:flex-row">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="avatar" class="rounded-full border-4 border-white"
                            src="https://image.flaticon.com/icons/png/512/149/149071.png">
                    </div>
                    <div class="mt-3 text-center lg:ml-2 lg:mr-auto lg:text-left lg:mt-0">
                        <a href="" class="font-medium">test</a>
                    </div>
                    <div class="flex mt-4 lg:mt-0">
                        <button
                            class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer hover:bg-yellow-300"
                            wire:click="" @click="OpenScreening = true">
                            Screening
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Start modal Screening --}}
        <x-general.modal modalActive="OpenScreening" title="Screening" modalSize="4xl" closeBtn="yes">
            <div class="p-4">
                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                    <x-form.input type="text" label="Name" value="Test" disabled />
                </div>
                <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
                    <table class="w-full border border-gray-300 table-auto ">
                        <thead class="bg-yellow-400">
                            <tr class="text-white">
                                <th class="px-2 py-2">Instituion</th>
                                <th class="px-2 py-2 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-2 py-2 font-semibold border ">
                                    <a href="#"
                                        class="text-blue-600 transition duration-300 ease-in-out cursor-pointer hover:text-blue-400 focus:outline-none">
                                        Office of Foreign Asset Control (OFAC) Sanctions
                                    </a>
                                </td>
                                <td class="px-2 py-4 border ">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="px-3 py-1 text-xs text-white transition duration-300 ease-in-out bg-teal-600 rounded hover:bg-teal-400 active:bg-teal-700"
                                            wire:click="">
                                            Approve
                                        </button>
                                        <button
                                            class="px-3 py-1 text-xs text-white transition duration-300 ease-in-out bg-red-600 rounded hover:bg-red-400 active:bg-red-700"
                                            wire:click="">
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
</x-general.card>