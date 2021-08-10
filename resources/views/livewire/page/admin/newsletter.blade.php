<div>
    {{-- @foreach ($users as $user)
        {{ $user->name }} ({{ $user->email }}) : {{ $user->gold->where('active_ownership',1)->sum('weight') }} <br>
    @endforeach

    <button type="button" wire:click="sendEmail" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Button text
    </button> --}}
    <div>
        <div class="flex flex-col items-center my-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Newsletter
            </h2>
        </div>
        <div class="mb-20 bg-white sm:mb-0">
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
                            <p>monthly newsletter July 2021</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>sent out</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-2">
                                <button wire:click=""
                                    class="inline-flex items-center px-4 py-2 font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:outline-none">
                                    <x-heroicon-o-mail class="w-5 h-5 mr-1" />
                                    Blast
                                </button>
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
