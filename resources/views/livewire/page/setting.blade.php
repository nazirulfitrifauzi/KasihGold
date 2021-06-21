<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Setting
        </h2>
    </div>
    <div class="relative mt-4" x-data="{ active: 0 }">
        <div class="">
            <div class="bg-white rounded-lg shadow overflow-hidden border-2">
                <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                    <aside class="py-6 lg:col-span-3">
                        <nav class="space-y-1">

                            <x-settingTab.title name="0" livewire="">
                                <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 1
                            </x-settingTab.title>
                            
                            <x-settingTab.title name="1" livewire="">
                                <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 2
                            </x-settingTab.title>

                            <x-settingTab.title name="2" livewire="">
                                <x-heroicon-o-home class="w-6 h-6 mr-2"/>content 3
                            </x-settingTab.title>

                        </nav>
                    </aside>

                    <div class="lg:col-span-9">
                        <x-settingTab.content name="0" x-cloak>
                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                content 1
                            </div>
                        </x-settingTab.content>

                        <x-settingTab.content name="1" x-cloak>
                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                content 2
                            </div>
                        </x-settingTab.content>

                        <x-settingTab.content name="2" x-cloak>
                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                content 3
                            </div>
                        </x-settingTab.content>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>