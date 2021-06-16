
<div>
    <div class="-mt-52">
        <div class="grid grid-cols-12 gap-6">
            <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                <div class="col-span-12 mt-8">
                    <div class="flex items-center">
                        <div>
                            <h2 class="mr-5 text-4xl font-bold text-white" id="lblGreetings"></h2>
                            <p class="text-sm text-white" id="getDate"></p>
                        </div>
                        @if (session('error'))
                            <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
                        @elseif (session('info'))
                            <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}"/>
                        @elseif (session('success'))
                            <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
                        @elseif (session('warning'))
                            <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}"/>
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-10">
                        <x-dashboard.info-card bg="white" title="item Sales" value="4.510" cardRoute="#" >
                            <x-slot name="svg">
                                <x-heroicon-o-shopping-cart class="text-blue-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>

                        <x-dashboard.info-card bg="white" title="New Orders" value="3.521" cardRoute="{{route('new-orders')}}" >
                            <x-slot name="svg">
                                <x-heroicon-o-desktop-computer class="text-yellow-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>

                        <x-dashboard.info-card bg="white" title="Total Products" value="2.145" cardRoute="#" >
                            <x-slot name="svg">
                                <x-heroicon-o-desktop-computer class="text-yellow-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>

                        <x-dashboard.info-card bg="white" title="Total Visitor" value="152.00" cardRoute="#" >
                            <x-slot name="svg">
                                <x-heroicon-o-user class="text-green-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                    <div class="grid grid-cols-12 gap-6">

                        <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
                            <div class="p-4 bg-white shadow-lg" id="chartline"></div>
                        </div>

                        <div class="col-span-12 lg:col-span-6 xxl:col-span-6">
                            <div class="p-4 bg-white shadow-lg" id="chartpie"></div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                            <div class="p-4 bg-white shadow-lg">
                                <div class="mt-4">
                                    <div class="p-4" id="chartbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
