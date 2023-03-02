<div>
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-12">
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Exit Report
            </h2>
        </div>

        <x-general.card class="px-5 bg-white">
            <form wire:submit.prevent="">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-4">
                        <label class="block text-sm font-semibold leading-5 text-gray-700 " for="agent">Exit Type:</label>
                        <select class="w-52 form-select"  wire:model="status"
                        >
                            <option>Select option</option>
                            <option value="convert">Change Physical</option>
                            <option value="outright">Outright Sell</option>
                            <option value="buyback">Buy Back</option>
                        </select>
                    </div>
                    <div class ="flex items-center justify-end">
                        <div>
                            <a href="{{route('reporting')}}"
                                class="flex items-center p-2 mt-1 text-xs bg-yellow-300 rounded-full hover:bg-yellow-400 focus:outline-none tooltipbtn"
                                data-title="Back to list of report"
                                data-placement="top"
                                >
                                <x-heroicon-o-arrow-left class="w-4 h-4 text-black"/>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </x-general.card>

        <x-reporting.iframe :parameters="$parameters" />
    </x-general.grid>
</div>

