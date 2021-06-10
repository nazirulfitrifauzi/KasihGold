<div>
    <div class="z-20 relative mx-auto px-0 my-3">
        <div class="grid grid-cols-12 gap-6">
            <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                <div class="col-span-12 mt-8">
                    <div class="flex items-center">
                        <div>
                            <h2 class="mr-5 text-4xl font-bold text-white" id="lblGreetings"></h2>
                            <p class="text-sm text-white" id="getDate"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-8">
                        <x-dashboard.info-card bg="white" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap-agent')}}" >
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
    </div>
    <div class="absolute top-0 left-0 right-2 z-0">
        <header >
            <div class="w-full bg-cover bg-center" style="height:13rem; background-image: url({{ asset('img/header.jpg') }});">
                <div class=" px-8 py-4 h-full w-full bg-opacity-75">
                </div>
            </div>
        </header>
    </div>
</div>
