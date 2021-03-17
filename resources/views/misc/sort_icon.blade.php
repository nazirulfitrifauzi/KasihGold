@if ($this->sortField !== $field)
    <x-heroicon-o-selector class="h-4 w-4"/>
@elseif ($this->sortAsc)
    <x-heroicon-o-chevron-up class="h-4 w-4"/>
@else
    <x-heroicon-o-chevron-down class="h-4 w-4"/>
@endif