<x-dashboard.info-card bg="blue-500" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap')}}" >
    <x-slot name="svg">
        <x-heroicon-o-shield-check class="w-10 h-10 text-blue-400"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="yellow-400" title="My Agents" value="{{ $myAgent->count() }} Agent{{ ($myAgent->count() > 1) ? 's' : '' }}" cardRoute="{{route('downline-detail')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="w-10 h-10 text-yellow-400"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="pink-500" title="Withdrawal Request" value="RM 1,300.00" cardRoute="{{route('withdrawal-request')}}" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="w-10 h-10 text-pink-400"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="green-400" title="Today's Transaction" value="RM {{ number_format($todayTrans, 2) }}" cardRoute="#" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="w-10 h-10 text-green-400"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="purple-500" title="Cashback Reporting" value="RM {{ number_format($cashback, 2) }}" cardRoute="{{route('cashback')}}" >
    <x-slot name="svg">
        <x-heroicon-o-cash class="w-10 h-10 text-purple-400"/>
    </x-slot>
</x-dashboard.info-card>