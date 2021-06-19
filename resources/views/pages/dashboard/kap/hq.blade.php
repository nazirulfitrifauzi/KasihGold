<x-dashboard.info-card bg="white" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap')}}" >
    <x-slot name="svg">
        <x-heroicon-o-shield-check class="text-blue-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="white" title="My Agents" value="{{ $myAgent->count() }} Agent{{ ($myAgent->count() > 1) ? 's' : '' }}" cardRoute="{{route('downline-detail')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-yellow-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>