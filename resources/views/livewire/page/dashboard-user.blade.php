<div class="grid grid-cols-12 gap-6">

    <div class="grid grid-cols-12 col-span-12 gap-6">
        <div class="col-span-12 mt-8">
            <div class="flex items-center h-10 intro-y">
                <h2 class="mr-5 text-lg font-medium truncate">General Report</h2>
            </div>

            <div class="grid grid-cols-12 gap-6 mt-5">
                <x-dashboard.info-card-user   bg="white" title="Digital Gold" value="4.510 G" iconColor='yellow' cardRoute="{{route('digital-gold')}}">
                    <x-slot name="svg">
                        <x-heroicon-o-desktop-computer class="text-white h-8 w-8"/>
                    </x-slot>
                </x-dashboard.info-card-user>
                <x-dashboard.info-card-user   bg="white" title="Physical Gold" value="5.510 G" iconColor='teal' cardRoute="{{route('physical-gold')}}">
                    <x-slot name="svg">
                        <x-heroicon-o-user class="text-white h-8 w-8"/>
                    </x-slot>
                </x-dashboard.info-card-user>
                <x-dashboard.info-card-user   bg="white" title="" value="Purchase History" iconColor='pink' cardRoute="{{route('purchase-history')}}">
                    <x-slot name="svg">
                        <x-heroicon-o-clipboard-copy class="text-white h-8 w-8"/>
                    </x-slot>
                </x-dashboard.info-card-user>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-6 xxl:col-span-6 rounded-lg" >
                    <div class= "w-full lg:flex p-4  shadow-lg">
                        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" 
                        style="background-image: url('https://mocah.org/uploads/posts/519166-business-global.jpg')">
                        </div>
                        <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <h1 class="text-2xl font-semibold">News</h1>
                                <div class="max-w-lg">
                                    <p class="text-base text-gray-600">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block p-4 bg-white shadow-lg">
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        var width= 700;
                        var height= 550;

                        if ((screen.width<768)) {
                            width= 250;
                            height= 250;
                        }
                        else if ((screen.width>=768)&&(screen.width<1024)) {
                            width= 500;
                            height= 300;
                        }
                        else if ((screen.width>=1024)&&(screen.width<1280)) {
                            width= 500;
                            height= 300;
                        }
                        else if ((screen.width>=1280)) {
                            width= 500;
                            height= 300;
                        }

                        new TradingView.widget(
                            {
                                "width": width,
                                "height": height,
                                "symbol": "TVC:GOLD",
                                "timezone": "Asia/Singapore",
                                "colorTheme": "light",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "range": "ALL",
                                "allow_symbol_change": true,
                                "container_id": "tradingview_61970"
                            }
                        );
                    </script>
                </div>
            </div>
        </div>

    </div>
</div> 




