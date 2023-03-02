<x-reporting.base>
    <x-reporting.header />
    <div>
        <p class="text-xs underline uppercase"><strong>Exit Report</strong></p>
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
                <strong>Name</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>1 gram</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>0.5 gram</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>0.25 gram</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>0.01 gram</strong>
            </td>
            <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                <strong>Exit Date</strong>
            </td>
        </tr>

        @forelse ($data['data'] as $row)
            <tr class="row">
                <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $loop->iteration }}
                </td>
                <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->user->name}}
                </td>
                <td class="text-sm text-right cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->one_gram }} unit
                </td>
                <td class="text-sm text-right cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->quarter_gram }} unit
                </td>
                <td class="text-sm text-right cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->decigram }} unit
                </td>
                <td class="text-sm text-right cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->centigram }} unit
                </td>
                <td class="text-sm cell" style="padding:.4rem; border: 1px solid rgb(196, 196, 196)">
                    {{ $row->created_at->format('d/m/Y, h:i a'); }}
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
