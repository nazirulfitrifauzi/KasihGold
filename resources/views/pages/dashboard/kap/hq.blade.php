<x-dashboard.info-card bg="blue-500" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap')}}" >
    <x-slot name="svg">
        <x-heroicon-o-shield-check class="text-blue-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="yellow-400" title="My Agents" value="{{ $myAgent->count() }} Agent{{ ($myAgent->count() > 1) ? 's' : '' }}" cardRoute="{{route('downline-detail')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-yellow-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="pink-500" title="Withdrawal Request" value="RM 1,300.00" cardRoute="{{route('withdrawal-request')}}" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="text-pink-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="green-400" title="Today's Transaction" value="RM {{ number_format($todayTrans, 2) }}" cardRoute="#" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="text-green-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="purple-500" title="Cashback" value="RM {{ number_format($cashback, 2) }}" cardRoute="{{route('cashback')}}" >
    <x-slot name="svg">
        <x-heroicon-o-cash class="text-purple-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>