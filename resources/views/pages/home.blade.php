@extends('default.default')
@section('content')
    <livewire:page.home />

{{-- lineChart --}}
<script>
    var charts = document.querySelector('#chartline')
    var options = {
        series: [{
            name: 'series1',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'series2',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        };
        var charts = new ApexCharts(charts, options);
        charts.render();
</script>
{{-- lineChart --}}

{{-- pie Chart --}}
<script>
    var charts = document.querySelector('#chartpie')
    var options = {
            series: [1, 0.25, 0.1,0.01],
            chart: {
            height: 350,
            type: 'donut',
            },
            title: {
                text: 'Kasih Digital Gold',
                align: 'left'
            },
            labels: ['Kasih Digital Gold 1G', 
                    'Kasih Digital Gold 0.25G',
                    'Kasih Digital Gold 0.1G',
                    'Kasih Digital Gold 0.01G',],
            responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                position: 'bottom'
                }
            }
            }]
        };
        var charts = new ApexCharts(charts, options);
        charts.render();
</script>
{{-- pie Chart --}}
@endsection