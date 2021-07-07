
<div>
    <div class="-mt-52 printContent">
        <div class="grid grid-cols-12 gap-6">
            <div class="grid grid-cols-12 col-span-12 gap-6">
                <div class="col-span-12 mt-8 printHide">
                    <div class="flex items-center">
                        <div>
                            <h2 class="mr-5 text-xl font-bold text-white lg:text-4xl" id="lblGreetings"></h2>
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

                    @if (auth()->user()->isUserKAP())
                    @else
                        <div class="grid grid-cols-12 gap-6 mt-10 ">
                            @if (auth()->user()->isAdminKAP())
                                @include('pages.dashboard.kap.hq')
                            @elseif (auth()->user()->isAgentKAP())
                                @include('pages.dashboard.kap.agent')
                            @elseif (auth()->user()->isAdminKG() || auth()->user()->isMasterDealerKG() || auth()->user()->isAgentKG() || auth()->user()->isUserKG())
                                @include('pages.dashboard.kg.all')
                            @endif

                            <x-dashboard.info-card bg="white" title="Total Products" value="2.145" percentage="12%" percentageBg="green" cardRoute="#" >
                                <x-slot name="svg">
                                    <x-heroicon-o-desktop-computer class="text-yellow-400 h-7 w-7"/>
                                </x-slot>
                            </x-dashboard.info-card>

                            <x-dashboard.info-card bg="white" title="Total Visitor" value="152.00" percentage="22%" percentageBg="green" cardRoute="#" >
                                <x-slot name="svg">
                                    <x-heroicon-o-user class="text-green-400 h-7 w-7"/>
                                </x-slot>
                            </x-dashboard.info-card>
                        </div>
                    @endif
                </div>

                @if (auth()->user()->isUserKAP())
                    @include('pages.dashboard.kap.user1')
                @endif

                <!--Start Slider View -->
                {{-- <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                            <div class="h-full p-4 bg-gray-200 rounded-lg shadow-lg">
                                <div class="swiper-container mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="bg-center bg-no-repeat swiper-slide">
                                            <img src="https://cdn.statically.io/img/www.kasihgold.com/f=auto/wp-content/uploads/2021/03/WhatsApp-Image-2021-04-19-at-12.28.13.jpeg"/>
                                        </div>
                                        <div class="bg-center bg-no-repeat swiper-slide">
                                            <img src="https://cdn.statically.io/img/www.kasihgold.com/f=auto/wp-content/uploads/2021/06/promo_tq.png"/>
                                        </div>
                                        <div class="bg-center bg-no-repeat swiper-slide">
                                            <img src="https://cdn.statically.io/img/www.kasihgold.com/f=auto/wp-content/uploads/2020/06/WhatsApp-Image-2021-04-19-at-11.14.34-3.jpeg"/>
                                        </div>
                                        <div class="bg-center bg-no-repeat swiper-slide">
                                            <img src="https://cdn.statically.io/img/www.kasihgold.com/f=auto/wp-content/uploads/2020/06/WhatsApp-Image-2021-04-19-at-11.14.34-3.jpeg"/>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--End Slider View -->

                @if (auth()->user()->isUserKAP())
                    @include('pages.dashboard.kap.user2')
                @else
                    <div class="col-span-12 mt-8 bg-gray-50 border-2 border-gray-100 rounded-lg shadow-xl p-4 ">
                        <div class="flex justify-end mb-3">
                            <button onclick="window.print()" class="printHide flex px-2 py-1 text-sm font-bold text-white bg-yellow-300 rounded cursor-pointer focus:outline-none hover:bg-yellow-400">
                                <div class="flex space-x-1">
                                    <x-heroicon-o-printer class="w-5 h-5" />
                                    <p>Print</p>
                                </div>
                            </button>
                        </div>
                        <div class="grid grid-cols-12 gap-6" id="DIV_ID">
                            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                                <x-general.grid mobile="1" gap="5" sm="3" md="3" lg="3" xl="3" class="col-span-6">
                                    <div class="mb-4 bg-white shadow-lg p-4 rounded-lg" id="chart-spark1"></div>
                                    <div class="mb-4 bg-white shadow-lg p-4 rounded-lg" id="chart-spark2"></div>
                                    <div class="mb-4 bg-white shadow-lg p-4 rounded-lg" id="chart-spark3"></div>
                                </x-general.grid>
                            </div>
                            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                                <div class="mt-4 flex flex-col printContent">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                                                <table class="min-w-full divide-y divide-gray-200 bg-white">
                                                    <thead>
                                                        <tr class="bg-gray-200 rounded-lg">
                                                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Total Value</th>
                                                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Percentage of Portfolio</th>
                                                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Last 10 Days</th>
                                                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Monthly Volume</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border-b-2 border-gray-100">
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">Kasih Digital <br>0.01 g</td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                RM {{ number_format( array_sum($chart1->where('weight',0.01)->pluck('bought_price')->toArray()),2) }}
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                {{ number_format(($chart1->where('weight',0.01)->count()) / ($chart1->count()) * 100, 2) }}%
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class="min-h-160" id="chart-1"></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class=" min-h-160" id="chart-5"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b-2 border-gray-100">
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">Kasih Digital <br>0.10 g</td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                RM {{ number_format( array_sum($chart1->where('weight',0.1)->pluck('bought_price')->toArray()),2) }}
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                {{ number_format(($chart1->where('weight',0.1)->count()) / ($chart1->count()) * 100, 2) }}%
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class="min-h-160" id="chart-2"></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class=" min-h-160" id="chart-6"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b-2 border-gray-100">
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">Kasih Digital <br>0.25 g</td>
                                                            <td class="text-center">
                                                                RM {{ number_format( array_sum($chart1->where('weight',0.25)->pluck('bought_price')->toArray()),2) }}
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                {{ number_format(($chart1->where('weight',0.25)->count()) / ($chart1->count()) * 100, 2) }}%
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class="min-h-160" id="chart-3"></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class="min-h-160" id="chart-7"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b-2 border-gray-100">
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">Kasih Digital <br>1.00 g</td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                RM {{ number_format( array_sum($chart1->where('weight',1)->pluck('bought_price')->toArray()),2) }}
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                {{ number_format(($chart1->where('weight',1)->count()) / ($chart1->count()) * 100, 2) }}%
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class="min-h-160" id="chart-4"></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                                <div class="flex justify-center">
                                                                    <div class=" min-h-160" id="chart-8"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div/>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    // Settings object that controls default parameters for library methods:
    accounting.settings = {
        currency: {
            symbol : "RM ",   // default currency symbol is '$'
            format: "%s%v", // controls output: %s = symbol, %v = value/number (can be object: see below)
            decimal : ".",  // decimal point separator
            thousand: ",",  // thousands separator
            precision : 2   // decimal places
        },
        number: {
            precision : 0,  // default precision on numbers is 0
            thousand: ",",
            decimal : "."
        }
    }

    var data_chart1 = @json(array_reverse($mainchart1));
    var sparklineData = [42, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

    var options = {
        series: [{
            data: data_chart1
        }],
        chart: {
            type: 'area',
            height: 160,
            renderTo: 'chart-1-container',
            sparkline: {
                enabled: true
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: true,
                format: 'dd MMM YYYY',
            },
            y: {
                title: {
                    formatter: (seriesName) => "Value: RM",
                },
            },
        },
        stroke: {
            curve: 'straight'
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0
        },
        colors: ['#84ff80'],
        title: {
            text: accounting.formatMoney(@json(array_sum($chart1->pluck('bought_price')->toArray()))),
            offsetX: 0,
            style: {
                fontSize: '24px',
            }
        },
        subtitle: {
            text: 'Sales',
            offsetX: 0,
            style: {
                fontSize: '14px',
            }
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart-spark1"), options);
    chart.render();

    var data_chart2 = @json(array_reverse($mainchart2));

    var optionsSpark2 = {
        series: [{
            data: data_chart2
        }],
        chart: {
            type: 'area',
            height: 160,
            sparkline: {
                enabled: true
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: true,
                format: 'dd MMM YYYY',
            },
            y: {
                title: {
                    formatter: (seriesName) => "Value: RM",
                },
            },
        },
        stroke: {
            curve: 'straight'
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0
        },
        colors: ['#ff70b8'],
        title: {
            text: accounting.formatMoney(@json(array_sum($chart2->pluck('bought_price')->toArray()))),
            offsetX: 0,
            style: {
                fontSize: '24px',
            }
        },
        subtitle: {
            text: 'Expenses',
            offsetX: 0,
            style: {
                fontSize: '14px',
            }
        }
    };

    var chartSpark2 = new ApexCharts(document.querySelector("#chart-spark2"), optionsSpark2);
    chartSpark2.render();

    var optionsSpark3 = {
        series: [{
                data: sparklineData
            }],
        chart: {
            type: 'area',
            height: 160,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            curve: 'straight'
        },
        fill: {
            opacity: 0.3
        },
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        yaxis: {
            min: 0
        },
       
        title: {
            text: '$135,965',
            offsetX: 0,
            style: {
                fontSize: '24px',
            }
        },
        subtitle: {
            text: 'Profits',
            offsetX: 0,
            style: {
                fontSize: '14px',
            }
        }
        
    };

    var chartSpark3 = new ApexCharts(document.querySelector("#chart-spark3"), optionsSpark3);
    chartSpark3.render();

    // last 10 days
    var options1 = {
        series: [{
            data: @json(array_reverse($subchart1day))
        }],
        chart: {
            type: 'line',
            width: 100,
            height: 35,
            sparkline: {
            enabled: true
            }
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: (seriesName) => "Value: RM",
                },
            },
            marker: {
                show: false
            }
        }
    };

    var chart1 = new ApexCharts(document.querySelector("#chart-1"), options1);
    chart1.render();

    var options2 = {
        series: [{
            data: @json(array_reverse($subchart2day))
        }],
        chart: {
            type: 'line',
            width: 100,
            height: 35,
            sparkline: {
            enabled: true
            }
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: (seriesName) => "Value: RM",
                },
            },
            marker: {
                show: false
            }
        }
    };

    var chart2 = new ApexCharts(document.querySelector("#chart-2"), options2);
    chart2.render();

    var options3 = {
        series: [{
            data: @json(array_reverse($subchart3day))
        }],
        chart: {
            type: 'line',
            width: 100,
            height: 35,
            sparkline: {
            enabled: true
            }
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: (seriesName) => "Value: RM",
                },
            },
            marker: {
                show: false
            }
        }
    };

    var chart3 = new ApexCharts(document.querySelector("#chart-3"), options3);
    chart3.render();

    var options4 = {
        series: [{
            data: @json(array_reverse($subchart4day))
        }],
        chart: {
            type: 'line',
            width: 100,
            height: 35,
            sparkline: {
            enabled: true
            }
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: (seriesName) => "Value: RM",
                },
            },
            marker: {
                show: false
            }
        }
    };

    // monthly volume
    var chart4 = new ApexCharts(document.querySelector("#chart-4"), options4);
    chart4.render();

    var options5 = {
        series: [{
            data: @json(array_reverse($subchart1month))
        }],
        chart: {
            type: 'bar',
            width: 100,
            height: 35,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                columnWidth: '80%'
            }
        },
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        tooltip: {
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                return (
                    '<div class="arrow_box">' +
                    "<span>" +
                    w.config.series[seriesIndex].data[dataPointIndex].x +
                    ": " +
                    w.config.series[seriesIndex].data[dataPointIndex].y +
                    "</span>" +
                    "</div>"
                );
            }
        }
    };

    var chart5 = new ApexCharts(document.querySelector("#chart-5"), options5);
    chart5.render();

    var options6 = {
        series: [{
            data: @json(array_reverse($subchart2month))
        }],
        chart: {
            type: 'bar',
            width: 100,
            height: 35,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                columnWidth: '80%'
            }
        },
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        tooltip: {
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                return (
                    '<div class="arrow_box">' +
                    "<span>" +
                    w.config.series[seriesIndex].data[dataPointIndex].x +
                    ": " +
                    w.config.series[seriesIndex].data[dataPointIndex].y +
                    "</span>" +
                    "</div>"
                );
            }
        }
    };

    var chart6 = new ApexCharts(document.querySelector("#chart-6"), options6);
    chart6.render();

    var options7 = {
        series: [{
            data: @json(array_reverse($subchart3month))
        }],
        chart: {
            type: 'bar',
            width: 100,
            height: 35,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                columnWidth: '80%'
            }
        },
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        tooltip: {
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                return (
                    '<div class="arrow_box">' +
                    "<span>" +
                    w.config.series[seriesIndex].data[dataPointIndex].x +
                    ": " +
                    w.config.series[seriesIndex].data[dataPointIndex].y +
                    "</span>" +
                    "</div>"
                );
            }
        }
    };

    var chart7 = new ApexCharts(document.querySelector("#chart-7"), options7);
    chart7.render();

    var options8 = {
        series: [{
            data: @json(array_reverse($subchart4month))
        }],
        chart: {
            type: 'bar',
            width: 100,
            height: 35,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                columnWidth: '80%'
            }
        },
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        tooltip: {
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                return (
                    '<div class="arrow_box">' +
                    "<span>" +
                    w.config.series[seriesIndex].data[dataPointIndex].x +
                    ": " +
                    w.config.series[seriesIndex].data[dataPointIndex].y +
                    "</span>" +
                    "</div>"
                );
            }
        }
    };

    var chart8 = new ApexCharts(document.querySelector("#chart-8"), options8);
    chart8.render();

</script>



@endpush
