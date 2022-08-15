<div>
    <div>
        <div class="flex flex-col items-center my-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Newsletter
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
            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                        <x-table.table>
                            <x-slot name="thead">
                                <x-table.table-header class="text-left" value="No" sort="" />
                                <x-table.table-header class="text-left" value="Newsletter detail" sort="" />
                                <x-table.table-header class="text-left" value="Status" sort="" />
                                <x-table.table-header class="text-left" value="Action" sort="" />
                            </x-slot>
                            <x-slot name="tbody">
                                <tr>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <p>1</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <p>Monthly Newsletter {{ now()->subMonthsNoOverflow()->format('F Y') }}</p>
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        @if($newsletter != NULL && $newsletter->status == 1)
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Sent Out</span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Waiting to be sent</span>
                                        @endif
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <div class="flex space-x-2">
                                            @if($newsletter == NULL)
                                                <button wire:click="sendEmail"
                                                    class="inline-flex items-center px-4 py-2 font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:outline-none">
                                                    <x-heroicon-o-mail class="w-5 h-5 mr-1" />
                                                    Blast Email
                                                </button>
                                            @endif
                                        </div>
                                    </x-table.table-body>
                                </tr>
                            </x-slot>
                            {{-- <div class="px-2 py-2">
                                {{ $list->links('pagination-links') }}
                            </div> --}}
                        </x-table.table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
