<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Ownership
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
            <x-general.card class="bg-white shadow-lg">
                <div class="flex py-2">
                    <div class="w-full">
                        <x-form.input label="" value="" />
                    </div>
                    <button type="submit"
                        class="flex items-center h-8 px-4 py-1 mt-2 ml-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                        Search
                    </button>
                </div>
                <div class="py-2 px-4">
                    {{-- <ul class="-mb-8">
                        <x-feeds.feeds title="Applied to Front End Developer" date="20sep" line="yes" iconBg="gray"> 
                            <x-slot name="icon">
                                <x-heroicon-s-user class="w-5 h-5 text-white" />
                            </x-slot>
                        </x-feeds.feeds>
                        <x-feeds.feeds title="Advanced to phone screening by Bethany Blake" date="20sep" line="yes" iconBg="blue"> 
                            <x-slot name="icon">
                                <x-heroicon-s-hand class="w-5 h-5 text-white" />
                            </x-slot>
                        </x-feeds.feeds>
                        <x-feeds.feeds title="Completed phone screening with Martha Gardner" date="20sep" line="no" iconBg="green"> 
                            <x-slot name="icon">
                                <x-heroicon-s-check class="w-5 h-5 text-white" />
                            </x-slot>
                        </x-feeds.feeds>
                    </ul> --}}
                </div>
            </x-general.card>
        </div>
    </div>
</div>
