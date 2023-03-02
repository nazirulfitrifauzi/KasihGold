{{-- <div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Goldbars Report
        </h2>
    </div>
    <div class="flex justify-between p-4 my-6 space-x-0 space-y-2 bg-white rounded-md shadow-lg">
        <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-4">
            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="serial">Gold Serial:</label>
            <select
                class="block transition duration-150 ease-in-out select2 w-52 form-select sm:text-sm sm:leading-5"
                id="serial"
                >
                <option value="0" hidden>Select a Goldbar Serial</option>
                @foreach($goldbar as $gold)
                    <option value="{{ $gold->id }}">{{ $gold->serial_id }}</option>
                @endforeach
            </select>

            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="report_date">Report Month:</label>
            <input
                class="block transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                type="month"
                id="report_date"
                name="report_date"
                min="2021-07"
                value="{{ now()->format('Y-m') }}"
            >

            <button id="submit" class="inline-flex items-center px-4 py-2 font-semibold text-white bg-yellow-300 rounded hover:bg-yellow-400 focus:outline-none" >
                <x-heroicon-o-cog class="w-6 h-6 mr-2"/>
                <span>Generate</span>
            </button>

        </div>
        <div>
            <button class="inline-flex items-center px-4 py-2 font-semibold text-white bg-indigo-300 rounded selectReport hover:bg-indigo-400 focus:outline-none" >
                <x-heroicon-o-view-list class="w-6 h-6 mr-2"/>
                <span>Select Report</span>
            </button>
        </div>
    </div>


    <table id="goldTable" class="divide-y divide-gray-200 stripe hover" >
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Serial Id</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">weight</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Total</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        </tbody>
    </table>
</div> --}}

<div>
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-12">
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Goldbars Report
            </h2>
        </div>

        <x-general.card class="px-5 bg-white">
            <form wire:submit.prevent="">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-4">
                        <label class="block text-sm font-semibold leading-5 text-gray-700 " for="agent">Agent:</label>
                        <select class="w-64 form-select"  wire:model="serial"
                        >
                            <option>Select a Goldbar Serial</option>
                            @foreach($goldbar as $gold)
                                <option value="{{ $gold->id }}">{{ $gold->serial_id }}</option>
                            @endforeach
                        </select>
                        <label class="block text-sm font-semibold leading-5 text-gray-700"  for="report_date">Report Month:</label>
                        <input
                            class="block transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                            type="month"
                            id="report_date_agent"
                            name="report_date"
                            min="2021-07"
                            wire:model="report_date"
                        >
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
