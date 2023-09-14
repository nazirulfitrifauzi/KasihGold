@props([
    'colspan' => '',
    'rowspan' => '',
])
<td {{ ($colspan != '') ? 'colspan = '.$colspan : '' }} {{ ($rowspan != '') ? 'rowspan = '.$rowspan : '' }} {{ $attributes->merge(['class' => 'px-2 py-1 whitespace-no-wrap text-sm leading-5']) }}>
    {{ $slot }}
</td>
