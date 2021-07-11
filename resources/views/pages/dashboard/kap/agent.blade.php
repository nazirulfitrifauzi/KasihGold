<x-dashboard.info-card bg="blue-500" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap-agent')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-blue-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="yellow-400" title="Registered Members" value="{{ $activeUser->count() }} User{{ ($activeUser->count() > 1) ? 's' : '' }}" cardRoute="{{route('downline-detail')}}" >
    <x-slot name="svg">
        <x-heroicon-o-user-group class="text-yellow-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="green-400" title="Today's Transaction" value="RM {{ number_format($todayTrans, 2) }}" cardRoute="#" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="text-green-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="purple-500" title="Cashback" value="RM {{ number_format($cashback, 2) }}" cardRoute="#" >
    <x-slot name="svg">
        <x-heroicon-o-currency-dollar class="text-purple-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>

<x-dashboard.info-card bg="pink-500" title="My Wallet" value="RM {{ number_format($myWallet, 2) }}" cardRoute="{{ route('digital-gold') }}" >
    <x-slot name="svg">
        <x-heroicon-o-cash class="text-pink-400 h-10 w-10"/>
    </x-slot>
</x-dashboard.info-card>