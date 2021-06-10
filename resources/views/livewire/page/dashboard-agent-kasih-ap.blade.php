<div class="grid grid-cols-12 gap-6">
    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
        <div class="col-span-12 mt-8">
            <div class="flex items-center h-10 intro-y">
                <h2 class="mr-5 text-lg font-medium truncate">Dashboard Agent Kasih AP</h2>
            </div>

            <div class="grid grid-cols-12 gap-6 mt-5">
                <x-dashboard.info-card bg="white" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="#" >
                    <x-slot name="svg">
                        <x-heroicon-o-user-group class="text-blue-400 h-7 w-7"/>
                    </x-slot>
                </x-dashboard.info-card>

                <x-dashboard.info-card bg="white" title="New Orders" value="3.521"  cardRoute="{{route('new-orders')}}" >
                    <x-slot name="svg">
                        <x-heroicon-o-desktop-computer class="text-yellow-400 h-7 w-7"/>
                    </x-slot>
                </x-dashboard.info-card>

                <x-dashboard.info-card bg="white" title="Total Products" value="2.145"  cardRoute="#" >
                    <x-slot name="svg">
                        <x-heroicon-o-desktop-computer class="text-yellow-400 h-7 w-7"/>
                    </x-slot>
                </x-dashboard.info-card>

                <x-dashboard.info-card bg="white" title="Total Visitor" value="152.00"  cardRoute="#" >
                    <x-slot name="svg">
                        <x-heroicon-o-user class="text-green-400 h-7 w-7"/>
                    </x-slot>
                </x-dashboard.info-card>
            </div>
        </div>
    </div>
</div>
