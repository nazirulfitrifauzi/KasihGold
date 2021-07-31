<div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">
        Reporting
    </h2>
</div>

<div class="grid grid-cols-12 gap-6"  x-data="{ active: 0 }">
    <!-- BEGIN: Profile Menu -->
    <div class="flex col-span-12 lg:col-span-12 xxl:col-span-12 lg:block">
            <x-general.card class="mt-5 bg-white shadow-lg w-full">
                    <div class="flex overflow-x-auto">
                        <x-tab.nav-tab name="0" livewire="">
                            <div class="flex font-semibold">
                                <x-heroicon-o-presentation-chart-line class="w-6 h-6 mr-2"/>Performance
                            </div>
                        </x-tab.nav-tab>
                        <x-tab.nav-tab name="1" livewire="">
                            <div class="flex font-semibold">
                                <x-heroicon-o-currency-dollar class="w-6 h-6 mr-2"/>Insurance
                            </div>
                        </x-tab.nav-tab>
                        <x-tab.nav-tab name="2" livewire="">
                            <div class="flex font-semibold">
                                <x-heroicon-o-clipboard-list class="w-6 h-6 mr-2"/>Regulatory
                            </div>
                        </x-tab.nav-tab>
                    </div>
            </x-general.card>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-12 xxl:col-span-12 mb-20 sm:mb-0">
            <x-tab.nav-content name="0">
                @include('pages.reporting.performance')
            </x-tab.nav-content>

            <x-tab.nav-content name="1">
                @include('pages.reporting.insurance')
            </x-tab.nav-content>

            <x-tab.nav-content name="2">
                @include('pages.reporting.regulatory')
            </x-tab.nav-content>
        </div>
</div>
