<div>
    <div class="flex flex-col items-center mt-4 intro-y sm:flex-row">
        <h2 class="px-6 mr-auto text-lg font-medium">
            Exit Request
        </h2>
    </div>
    <div class="p-4 mt-4 bg-white">
        <x-table.table>
            <x-slot name="thead">
                <x-table.table-header class="text-left" value="Type of Exit" sort="" />
                <x-table.table-header class="text-left" value="Surrendered Price (RM)" sort="" />
                <x-table.table-header class="text-left" value="Applied Date" sort="" />
                <x-table.table-header class="text-left" value="Approval Status" sort="" />
            </x-slot>
            <x-slot name="tbody">
                @foreach ($exit as $item)
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{$item->xit}}</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM {{ number_format($item->surrendered_amount,2) }}</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{ $item->created_at->format('d F Y') }}</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($item->status == 1) ? 'green' : 'yellow'}}-100 text-{{ ($item->status == 1) ? 'green' : 'yellow'}}-800">{{ ($item->status == 1) ? 'Successful': 'Pending'}}</span>
                        </x-table.table-body>
                    </tr>
                @endforeach
            </x-slot>
            <div class="px-2 py-2">
                {{ $exit->links('pagination-links') }}
            </div>
        </x-table.table>
    </div>
</div>
