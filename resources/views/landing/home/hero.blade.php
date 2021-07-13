<div class="relative items-center justify-center w-full overflow-x-hidden lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64">
    <div class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto -mt-32 lg:flex-row xl:px-0">
        <div data-aos="fade-left" class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
            <h1 class="relative mb-4 text-3xl font-black leading-tight text-gray-900 sm:text-6xl xl:mb-8">Empowering Economic Endowment (Waqf)</h1>
            <p class="pr-0 mb-8 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">Are you ready to join us in empowering economy thru Waqf?</p>
            <div class="">
                <a href="{{ route('register') }}" class="relative self-start inline-block w-auto px-8 py-4 mx-auto mt-0 text-base font-bold text-black bg-yellow-300 border-t border-gray-200 rounded-md shadow-xl sm:mt-1 fold-bold lg:mx-0">Register Now</a>
            </div>
        </div>
        <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
            <div class="container relative left-0 w-full max-w-4xl lg:absolute xl:max-w-6xl lg:w-screen">

                <!-- TradingView Widget BEGIN -->
                {{-- mobile view --}}
                <div data-aos="fade-right" class="w-full h-auto mt-20 mb-20 ml-0 lg:mb-0 lg:h-full lg:-ml-12 lg:mt-24 xl:mt-56 xl:-ml-56">
                    <div class="tradingview-widget-container">
                        <div id="tradingview_61970"></div>
                        <div class="tradingview-widget-copyright">
                            <a href="https://www.tradingview.com/symbols/TVC-GOLD/" rel="noopener" target="_blank"><span class="blue-text">GOLD Chart</span></a> by TradingView
                        </div>

                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            var width= 700;
                            var height= 550;

                            if ((screen.width<768)) {
                                width= 300;
                                height= 550;
                            }
                            else if ((screen.width>=768)&&(screen.width<1024)) {
                                width= 700;
                                height= 550;
                            }
                            else if ((screen.width>=1024)&&(screen.width<1280)) {
                                width= 400;
                                height= 550;
                            }
                            else if ((screen.width>=1280)) {
                                width= 700;
                                height= 650;
                            }

                            new TradingView.widget(
                                {
                                    "width": width,
                                    "height": height,
                                    "symbol": "TVC:GOLD",
                                    "timezone": "Asia/Singapore",
                                    "theme": "dark",
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
                <!-- TradingView Widget END -->
            </div>
        </div>
    </div>
</div>