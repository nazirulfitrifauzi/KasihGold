<x-dashboard.info-card bg="white" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap-agent')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-blue-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="white" title="Active User" value="{{ $activeUser->count() }} User{{ ($activeUser->count() > 1) ? 's' : '' }}" cardRoute="{{route('downline-detail')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-yellow-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>