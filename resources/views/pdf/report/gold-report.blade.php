<x-reporting.base>
    <x-reporting.header />
    <div>
        <p class="text-xs underline uppercase"><strong>Goldbars Report</strong></p>
        <p class="text-xs uppercase" style="margin-top:.6rem">Print as at : {{ now() }}</p>
    </div>
    <br>
    <hr>
    <br>
    <table class="table text-xxs" style="border: 1px solid rgb(196, 196, 196)">
        <tr class="row" style="background-color:rgb(196, 196, 196); border: 1px solid rgb(196, 196, 196)">
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>No</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>Serial Id</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>Weight</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>Total</strong>
            </td>
        </tr>

        @forelse ($data['data'] as $row)
            <tr class="row">
                <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $loop->iteration }}
                </td>
                <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->serial_id }}
                </td>
                <td class="text-sm text-right cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->weight }}
                </td>
                <td class="text-sm text-right cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ number_format($row->total, 2) }}
                </td>
            </tr>
        @empty
            <tr class="row">
                <td class="cell" colspan="6" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    No Data
                </td>
            </tr>
        @endforelse

    </table>
</x-reporting.base>
