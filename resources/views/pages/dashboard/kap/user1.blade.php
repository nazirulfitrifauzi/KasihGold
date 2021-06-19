<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xxl:col-span-8">
    <div class="grid grid-cols-12 gap-6 mt-10">
        <x-dashboard.info-card-user bg="yellow-400" title="Digital Gold" value="4.510 G" iconColor='white'
            cardRoute="{{route('digital-gold')}}">
            <x-slot name="svg">
                <x-heroicon-o-desktop-computer class="w-8 h-8 text-yellow-400" />
            </x-slot>
        </x-dashboard.info-card-user>
        <x-dashboard.info-card-user bg="teal-400" title="Physical Gold" value="5.510 G" iconColor='white'
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
    </div>
    <div class="z-20 col-span-12 p-4 mt-4 mb-4 bg-white rounded-lg shadow-xl lg:col-span-12 xxl:col-span-12 lg:block" style="height: 40rem;">
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "autosize": true,
                "symbol": "TVC:GOLD",
                "timezone": "Asia/Singapore",
                "theme": "ligth",
                "style": "1",
                "locale": "en",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "range": "ALL",
                "allow_symbol_change": true,
                "container_id": "tradingview_61970"
            });
        </script>
    </div>
</div>