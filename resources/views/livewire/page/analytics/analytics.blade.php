<div class="grid grid-cols-12 gap-6">
    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
        <div class="col-span-12 mt-8 ">
            <div class="flex items-center h-10 intro-y">
                <h2 class="mr-5 text-xl font-medium truncate">Analytics</h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <x-analytics-card value="All Users" title="90% Revenue" percentage="90%"  >
                    <x-slot name="svg">
                        <x-heroicon-o-chart-pie class="h-7 w-7 text-yellow-400"/>
                    </x-slot>
                </x-analytics-card>
                <x-analytics-card value="Add Segment" title="0% Revenue" percentage="0%"  >
                    <x-slot name="svg">
                        <x-heroicon-o-chart-pie class="h-7 w-7 text-yellow-400"/>
                    </x-slot>
                </x-analytics-card> 
            </div>
        </div>
        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- chart -->
                <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                    <div class="bg-white p-2 shadow-lg h-auto" id="chart-container">
                        <div class="flex justify-between" data-html2canvas-ignore="true">
                            <div class="text-lg font-bold px-2">
                                <h1>Revenue</h1>
                            </div>
                            <button onclick="saveAsPDF();" class="flex px-2 py-1 text-sm font-bold text-white bg-orange-400 rounded cursor-pointer focus:outline-none hover:bg-orange-500">
                                <div class="flex space-x-2">
                                    <x-heroicon-o-document-text class="w-5 h-5" />
                                    <p>Export PDF</p>
                                </div>
                            </button>
                        </div>
                        <div class="w-full h-96 mt-2 lg:mt-4" id="chart"></div>
                    </div>
                </div>
                <!-- end chart -->
            </div>
        </div>

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                    <div class="bg-white p-4 shadow-lg">
                        <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-no-wrap">
                            <div class="relative dropdown" x-data="{open: false}">
                                <button class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none hover:bg-yellow-300" @click="open = !open">Actions</button>
                                <div class="absolute z-10 w-40 rounded-lg shadow-lg bg-white" x-show="open" style="display: none; top: -17px; left: 90px;">
                                    <div class="py-4">
                                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                                        <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to Excel
                                        </a>
                                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white rounded-md hover:bg-gray-200">
                                        <x-heroicon-o-document-text class="w-5 h-5 mr-1"/> Export to PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 sm:w-auto sm:mt-0 sm:ml-auto">
                                <x-form.search-input/>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-table.table>
                                <x-slot name="thead">
                                    <x-table.table-header class="text-left" value="Transaction ID" sort=""/>
                                    <x-table.table-header class="text-center" value="Revenue" sort=""/>
                                    <x-table.table-header class="text-center" value="Tax" sort=""/>
                                    <x-table.table-header class="text-center" value="Shipping" sort=""/>
                                    <x-table.table-header class="text-center" value="Refund Amount" sort=""/>
                                    <x-table.table-header class="text-center" value="Quantity" sort=""/>
                                </x-slot>
                                <x-slot name="tbody">
                                    <tr>
                                        <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-lg font-medium text-gray-700">RM 1000.00</p>
                                            <p class="text-xs text-gray-500">of total: 100%</p>
                                            <p class="text-xs text-gray-500">(RM 1000.00)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-lg font-medium text-gray-700">RM 0.00</p>
                                            <p class="text-xs text-gray-500">of total: 0.00%</p>
                                            <p class="text-xs text-gray-500">(0.00)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-lg font-medium text-gray-700">RM 1000.00</p>
                                            <p class="text-xs text-gray-500">of total: 100%</p>
                                            <p class="text-xs text-gray-500">(887,074.52)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-lg font-medium text-gray-700">RM 0.00</p>
                                            <p class="text-xs text-gray-500">of total: 0.00%</p>
                                            <p class="text-xs text-gray-500">(0.00)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-lg font-medium text-gray-700">1789</p>
                                            <p class="text-xs text-gray-500">of total: 100%</p>
                                            <p class="text-xs text-gray-500">(1789)</p>
                                        </x-table.table-body>
                                    </tr>
                                    <tr>
                                        <x-table.table-body colspan="" class=" text-sm font-medium text-gray-700">
                                            <p>64688</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-sm font-medium text-gray-700">RM 1000.00</p>
                                            <p class="text-xs text-gray-500">(0.26%)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-sm font-medium text-gray-700">RM 1000.00</p>
                                            <p class="text-xs text-gray-500">(0.26%)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-sm font-medium text-gray-700">RM 1000.00</p>
                                            <p class="text-xs text-gray-500">(0.26%)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-sm font-medium text-gray-700">RM 1000.00</p>
                                            <p class="text-xs text-gray-500">(0.26%)</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-right">
                                            <p class="text-sm font-medium text-gray-700">RM 1000.00</p>
                                            <p class="text-xs text-gray-500">(0.26%)</p>
                                        </x-table.table-body>
                                    </tr>
                                </x-slot>
                            </x-table.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> 
@push('js')
        <script>
            const chart = new Chartisan({
            el: '#chart',
            url: "@chart('analytics_chart')",
            hooks: new ChartisanHooks()
            .colors(['#16bdca', '#3f83f8','#e74694'])
            .legend({ position: 'bottom' })
            .tooltip()
            .datasets([{ type: 'bar', fill: false }, 'bar']),
            });
        </script>
        <script>
            function saveAsPDF() {
                html2canvas(document.getElementById("chart-container"), {
                    onrendered: function(canvas) {
                        var img = canvas.toDataURL(); //image data of canvas
                        var doc = new jsPDF('landscape');
                        doc.addImage(img, 10, 10);
                        doc.save('Analytics.pdf');
                    }
                });
                }
        </script>
@endpush

