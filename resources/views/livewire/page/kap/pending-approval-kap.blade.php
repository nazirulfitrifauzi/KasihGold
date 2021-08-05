<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Pending Approval for New Agents
            </h2>
            @if (session('error'))
                <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('info'))
                <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('success'))
                <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('warning'))
                <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}"/>
            @endif
        </div>

        <div class="mb-20 bg-white sm:mb-0">
            <div class="flex justify-between mb-4">
                <div wire:loading>
                    <div class="absolute flex items-center justify-center p-4 text-white bg-yellow-400 rounded"
                        style="left: 50%; top:50%">
                        <x-heroicon-o-cog class="-ml-0.5 mr-2 h-8 w-8 animate-spin" />
                        <p class="text-sm">Waiting<span class="animate-ping">...</span></p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <div class="w-80">
                    <x-form.search-input placeholder="Search by email address" wire:model="search"/>
                </div>
            </div>

            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="No" sort="" />
                    <x-table.table-header class="text-left" value="Name" sort="" />
                    <x-table.table-header class="text-left" value="Email" sort="" />
                    <x-table.table-header class="text-left" value="Profile Completion" sort="" />
                    <x-table.table-header class="text-left" value="Referral Code" sort="" />
                    <x-table.table-header class="text-left" value="Action" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @forelse ($list as $index => $lists)
                        <tr wire:key="{{ $index }}">
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $loop->iteration  }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $lists->name }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <p>{{ $lists->email }}</p>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($lists->profile_c == 1) ? 'green' : 'yellow'}}-100 text-{{ ($lists->profile_c == 1) ? 'green' : 'yellow'}}-800">{{ ($lists->profile_c == 1) ? 'Complete': 'Incomplete'}}</span>
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-2" wire:key="referral-code-{{ $lists->id }}">
                                    <div class="flex mt-1 rounded-md shadow-sm">
                                        <div class="flex">
                                            <input type="text" disabled wire:model="referral_codes.{{ $lists->id }}.code" name="referral_code" id="referral_code"
                                            class="@error('referral_codes.'.$lists->id.'.code') border-red-300 focus:ring-red-500 focus:border-red-500 bg-red-50 @else border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 bg-gray-50 @enderror w-full border rounded-none rounded-l-md sm:text-sm " placeholder="Referral Code">
                                        </div>
                                        <button
                                            wire:click="generate({{ $lists->id }})"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px space-x-2 text-sm font-medium text-white bg-yellow-400 border border-gray-300 rounded-r-md hover:bg-yellow-500 focus:outline-none focus:ring-1 focus:ring-yellow-500 focus:border-yellow-600"
                                        >
                                            <x-heroicon-o-key class="w-5 h-5 mr-1 text-white" />
                                            <span>Generate</span>
                                        </button>
                                    </div>
                                </div>
                                @error('referral_codes.'.$lists->id.'.code')
                                    <small class="italic text-red-500 ">{{ $message }}</small>
                                @enderror
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-2">
                                    @if ($lists->profile_c == 1)
                                        <button wire:click="approve({{ $lists->id }})"
                                                class="inline-flex items-center px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none">
                                            <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1" />
                                            Approve
                                        </button>
                                    @endif

                                    <button class="inline-flex items-center px-4 py-2 font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none"
                                            data-id="{{ $lists->id }}"
                                            onclick="deleteConfirmation({{ $lists->id }})"
                                    >
                                    <x-heroicon-o-trash class="w-5 h-5 mr-1" />
                                        Delete
                                    </button>
                                    <x-popup.delete-admin name="deleteConfirmation" variable="id" posturl="{{ url('/pending-approval-kap') }}/"  />
                                </div>
                            </x-table.table-body>
                        </tr>
                    @empty
                        <tr>
                            <x-table.table-body colspan="6" class="text-center text-gray-500">
                                No New Request
                            </x-table.table-body>
                        </tr>
                    @endforelse
                </x-slot>
                <div class="px-2 py-2">
                    {{ $list->links('pagination-links') }}
                </div>
            </x-table.table>
        </div>
    </div>
</div>