<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xxl:col-span-8">
    <div class="grid grid-cols-12 gap-6 mt-10">
        <x-dashboard.info-card-user bg="yellow-400" title="Digital Gold" value="{{$this->tGold}} G" iconColor='white'
            cardRoute="{{route('digital-gold')}}">
            <x-slot name="svg">
                <x-heroicon-o-desktop-computer class="w-8 h-8 text-yellow-400" />
            </x-slot>
        </x-dashboard.info-card-user>
        <x-dashboard.info-card-user bg="teal-400" title="Physical Gold" value="0.00 G" iconColor='white'
            cardRoute="{{route('physical-gold')}}">
            <x-slot name="svg">
                <x-heroicon-o-user class="w-8 h-8 text-teal-400" />
            </x-slot>
        </x-dashboard.info-card-user>
        <x-dashboard.info-card-user bg="pink-400" title="" value="Purchase History" iconColor='white'
            cardRoute="{{route('purchase-history')}}">
            <x-slot name="svg">
                <x-heroicon-o-clipboard-copy class="w-8 h-8 text-pink-400" />
            </x-slot>
        </x-dashboard.info-card-user>
        <x-dashboard.info-card-user bg="indigo-400" title="" value="Buy Product" iconColor='white'
            cardRoute="{{route('product-view')}}">
            <x-slot name="svg">
                @json($mainchart1)
                <x-heroicon-o-shopping-bag class="w-8 h-8 text-indigo-400" />
            </x-slot>
        </x-dashboard.info-card-user>
    </div>
    <div class="z-20 col-span-12 p-4 mt-4 mb-4 bg-white rounded-lg shadow-xl lg:col-span-12 xxl:col-span-12 lg:block" id="chartpie"></div>
</div>
@push('js')
{{-- pie Chart --}}

<script>
    var charts = document.querySelector('#chartpie')
    var chart_data = @json($mainchart1);
    var options = {
            series: chart_data,
            chart: {
            height: 350,
            type: 'donut',
            },
            title: {
                text: 'Kasih Digital Gold',
                align: 'left'
            },
            labels: [
                'Kasih Digital Gold 0.01G',
                'Kasih Digital Gold 0.1G',
                'Kasih Digital Gold 0.25G',
                'Kasih Digital Gold 1G',
            ],
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
@endpush