<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Setting
        </h2>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('info'))
        <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('success'))
        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}" />
        @elseif (session('warning'))
        <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}" />
        @endif
    </div>
    <div class="relative mt-4" x-data="{ active: 0 }">
        <div class="">

            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                        <div class="overflow-hidden bg-white border-2 rounded-lg shadow">
                            <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                                <aside class="py-6 lg:col-span-2">
                                    <nav class="space-y-1">

                                        <x-settingTab.title name="0" livewire="">
                                            <x-heroicon-o-archive class="w-6 h-6 mr-2" />Stock Management
                                        </x-settingTab.title>

                                        <x-settingTab.title name="1" livewire="">
                                            <x-heroicon-o-currency-dollar class="w-6 h-6 mr-2" />Commission
                                        </x-settingTab.title>

                                        <x-settingTab.title name="2" livewire="">
                                            <x-heroicon-o-home class="w-6 h-6 mr-2" />content 3
                                        </x-settingTab.title>

                                    </nav>
                                </aside>

                                <div class="lg:col-span-10">
                                    <x-settingTab.content name="0" x-cloak>
                                        <livewire:page.setting.stock />
                                    </x-settingTab.content>

                                    <x-settingTab.content name="1" x-cloak>
                                        <livewire:page.setting.commission />
                                    </x-settingTab.content>

                                    <x-settingTab.content name="2" x-cloak>
                                        <div class="px-4 py-6 sm:p-6 lg:pb-8">
                                            content 3
                                        </div>
                                    </x-settingTab.content>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>