<div x-data="{OpenScreening:false}">
     
    <div class="flex justify-between my-4">
        <div class="flex items-center">
            <span class="mr-2">Search :</span>
            <x-form.input type="text" label="" value="" />
        </div>
        {{-- <div class="flex items-center">
            <x-general.button.icon-button href="{{ route('admin.userListExcel') }}" target="_blank" label="Excel" color="green" livewire="">
                <x-heroicon-o-document-text class="-ml-0.5 mr-2 h-6 w-6"/>
            </x-general.button.icon-button>
            <x-general.button.icon-button href="{{ route('admin.userListPdf') }}" target="_blank" label="PDF" color="orange" livewire="">
                <x-heroicon-o-document-report class="-ml-0.5 mr-2 h-6 w-6"/>
            </x-general.button.icon-button>
        </div> --}}
    </div>

    {{-- Start Screening List --}}
    @forelse ($list as $lists)
        <div class="col-span-12 intro-y md:col-span-6">
            <div class="bg-gray-100 shadow-lg rounded-xl border-l-4 border-yellow-400">
                <div class="flex flex-col items-center p-5 lg:flex-row">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="avatar" class="border-4 border-white rounded-full"
                            src="https://image.flaticon.com/icons/png/512/149/149071.png">
                    </div>
                    <div class="mt-3 text-center lg:ml-2 lg:mr-auto lg:text-left lg:mt-0">
                        <p>{{ $lists->name }}</p>
                        <p>{{ $lists->email }}</p>
                        <p>{{ $lists->created_at->format('d F Y') }}</p>
                    </div>
                    <div class="flex mt-4 lg:mt-0">
                        <button
                            class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer hover:bg-yellow-300"
                            wire:click="screen({{ $lists->id }})" x-on:click="OpenScreening = true">
                            Screening
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No data at the moment</p>
    @endforelse
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
                                        <button class="px-3 py-1 text-xs font-semibold text-white transition duration-300 ease-in-out bg-teal-600 rounded hover:bg-teal-400 active:bg-teal-700" wire:click="">
                                            Approve
                                        </button>
                                        <button class="px-3 py-1 text-xs font-semibold text-white transition duration-300 ease-in-out bg-red-600 rounded hover:bg-red-400 active:bg-red-700" wire:click="">
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
    
</div>