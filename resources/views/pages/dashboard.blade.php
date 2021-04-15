@extends('default.default')
@section('content')
    <livewire:page.dashboard/>

{{-- lineChart --}}
<script>
    var chart = document.querySelector('#chartline')
    var options = {
        chart: {
            height: 350,
            type: "line",
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF1654", "#247BA0"],
        series: [
            {
            name: "This Month RM 14,000",
            data: [0, 200, 400, 300, 500, 200, 100, 800,1000,200,150,1200]
            },
            {
            name: "Last Month 9,000",
            data: [10, 400, 500, 200, 300, 100, 200, 500,100,200,150,1000]
            }
        ],
        stroke: {
            width: [4, 4],
            curve: 'smooth',
        },
        plotOptions: {
            bar: {
            columnWidth: "20%"
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','Dec']
        },
        yaxis: [
            {
                axisTicks: {
                    show: true
                },
                axisBorder: {
                    show: true,
                    color: "#FF1654"
                },
                labels: {
                    style: {
                    colors: "#FF1654"
                    }
                },
            },
            {
                opposite: true,
                axisTicks: {
                    show: true
                },
                axisBorder: {
                    show: true,
                    color: "#247BA0"
                },
                labels: {
                    style: {
                    colors: "#247BA0"
                    }
                },
            }
        ],
        tooltip: {
            shared: false,
            intersect: true,
            x: {
            show: false
            }
        },
        title: {
            text: 'Weekly Top Seller',
            align: 'left'
        },
        legend: {
            horizontalAlign: "left",
            offsetX: 40
        }
    };
        var chart = new ApexCharts(chart, options);
        chart.render();
</script>
{{-- lineChart --}}

{{-- pie Chart --}}
<script>
    var chart = document.querySelector('#chartpie')
    var options = {
            series: [44, 55, 13,],
            chart: {
            height: 350,
            type: 'pie',
            },
            title: {
                text: 'Weekly Top Seller',
                align: 'left'
            },
            labels: ['17 - 30 Years old', '31 - 50 Years old', '>= 50 Years old'],
            responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                position: 'bottom'
                }
            }
            }]
        };
        var chart = new ApexCharts(chart, options);
        chart.render();
</script>
{{-- pie Chart --}}
@endsection
