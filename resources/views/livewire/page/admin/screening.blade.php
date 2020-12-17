<x-general.card class="bg-white px-4 pb-8" x-data="{OpenScreening:false}">

    <div class="grid grid-cols-12 gap-6 mt-2">
        <div class="flex justify-between flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-no-wrap">
            {{-- <div class="flex items-center">
                <div class="relative dropdown" x-data="{open: false}">
                    <button class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none" @click="open = !open">Actions</button>
                    <div class="absolute z-10 w-40 rounded-lg shadow-lg bg-white" x-show="open" style="display: none; top: -17px; left: 90px;">
                        <div class="py-4">
                            <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                            <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to Excel
                            </a>
                            <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                            <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="w-full mt-3 sm:w-auto sm:mt-0 sm:ml-auto md:ml-0">
                <x-form.search-input />
            </div>
        </div>

        {{-- Start Screening List --}}
        @forelse ($list as $lists)
        <div class="col-span-12 intro-y md:col-span-6">
            <div class="bg-gray-100 shadow-lg rounded-xl border-l-4 border-yellow-400">
                <div class="flex flex-row items-center py-4 px-4 lg:p-5">
                    <div class="w-16 lg:h-16 image-fit lg:mr-1">
                        <img alt="avatar" class="border-4 border-white rounded-full"
                            src="https://image.flaticon.com/icons/png/512/149/149071.png">
                    </div>
                    <div class="flex justify-between w-full">
                        <div class="text-sm mt-3  ml-2 lg:mr-auto text-left lg:mt-0">
                            <p class="font-semibold text-base">{{ $lists->name }}</p>
                            <p>{{ $lists->email }}</p>
                            <p>{{ $lists->created_at->format('d F Y') }}</p>
                        </div>
                        <div class="mt-4">
                            <button
                                class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer hover:bg-yellow-300"
                                wire:click="screen({{ $lists->id }})" x-on:click="OpenScreening = true">
                                Screening
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No data at the moment</p>
        @endforelse
    </div>
    {{-- End Screening List --}}

    {{-- Start modal Screening --}}
    <x-general.modal modalActive="OpenScreening" title="Screening" modalSize="4xl" closeBtn="yes">
        <form>
            {{-- <input type="hidden" name="accountId" value="{{ $newUser['accountId'] }}"> --}}
            <div class="col-span-12 pt-4 overflow-auto intro-y lg:overflow-visible">
                <table class="w-full border border-gray-300 table-auto ">
                    <thead class="bg-yellow-400">
                        <tr class="text-white">
                            <th class="px-2 py-2">Institution</th>
                            <th class="px-2 py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($screeningList as $list)
                        <tr>
                            <td class="px-2 py-2 font-semibold border ">
                                <a href="{{ $list->website }}" target="blank"
                                    class="text-blue-600 transition duration-300 ease-in-out cursor-pointer hover:text-blue-400 focus:outline-none">
                                    {{ $list->name }}
                                </a>
                            </td>
                            <td class="px-2 py-4 border ">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="px-3 py-1 text-xs font-semibold text-white transition duration-300 ease-in-out bg-teal-600 rounded hover:bg-teal-400 active:bg-teal-700"
                                        wire:click="">
                                        Approve
                                    </button>
                                    <button
                                        class="px-3 py-1 text-xs font-semibold text-white transition duration-300 ease-in-out bg-red-600 rounded hover:bg-red-400 active:bg-red-700"
                                        wire:click="">
                                        Decline
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </x-general.modal>
    {{-- End Modal Screening --}}

</x-general.card>