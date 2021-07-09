<x-dashboard.info-card bg="white" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap-agent')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-blue-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="white" title="Registered Members" value="{{ $activeUser->count() }} User{{ ($activeUser->count() > 1) ? 's' : '' }}" cardRoute="{{route('downline-detail')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-yellow-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="white" title="Today's Transaction" value="RM 6,000.00" cardRoute="#" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="text-green-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="white" title="Cashback" value="RM 700.00" cardRoute="#" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="text-purple-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="white" title="My Wallet" value="RM 260.00" cardRoute="#" >
    <x-slot name="svg">
        <x-heroicon-o-cash class="text-pink-400 h-7 w-7"/>
    </x-slot>
</x-dashboard.info-card>