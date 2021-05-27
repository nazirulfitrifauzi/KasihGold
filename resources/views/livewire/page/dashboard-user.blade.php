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
                <div class="relative col-span-12 lg:col-span-6 xxl:col-span-6 bg-white shadow-xl rounded-lg">
                    <div>
                        <h1 class="bg-yellow-400 p-4 absolute top-0 w-full text-white rounded-t-lg font-semibold text-lg">News</h1>
                        <div class="mt-14 ">
                            <h1 class="font-semibold text-lg p-4">Announcements</h1>
                        </div>
                        <div class="overflow-y-auto" style="height: 30rem;" x-data="{ modalOpen: false}">
                            <div class="cursor-pointer border-b-2 p-4 bg-white hover:bg-gray-100" @click="modalOpen = true">
                                <h1 class="font-semibold text-lg pb-2">
                                    <span class="flex items-center text-yellow-500">
                                        <x-heroicon-o-calendar class="h-5 w-5 mr-2"/> 
                                        27-5-2021
                                    </span>
                                </h1>
                                <p class="text-gray-600 text-base truncate">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            <!-- Start modal details -->
                            <x-general.modal2 modalActive="modalOpen" title="Announcements" modalSize="lg" headerbg="yellow-400" closeBtn="yes">
                                <x-slot name="icon">
                                    <x-heroicon-s-information-circle class="w-8 h-8 mr-1" />
                                </x-slot>
                                <div class="p-6">
                                    <h1 class="font-semibold text-lg pb-2">
                                        <span class="flex items-center text-yellow-500">
                                            <x-heroicon-o-calendar class="h-5 w-5 mr-2" />
                                            27-5-2021
                                        </span>
                                    </h1>
                                    <p class="text-gray-600 text-base">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    </p>
                                </div>
                            </x-general.modal2>
                            <!-- End modal details -->

                            <div class="cursor-pointer border-b-2 p-4 bg-white hover:bg-gray-100">
                                <h1 class="font-semibold text-lg pb-2">
                                    <span class="flex items-center text-yellow-500">
                                        <x-heroicon-o-calendar class="h-5 w-5 mr-2"/> 
                                        23-5-2021
                                    </span>
                                </h1>
                                <p class="text-gray-600 text-base truncate">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            <div class="cursor-pointer border-b-2 p-4 bg-white hover:bg-gray-100">
                                <h1 class="font-semibold text-lg pb-2">
                                    <span class="flex items-center text-yellow-500">
                                        <x-heroicon-o-calendar class="h-5 w-5 mr-2"/> 
                                        21-5-2021
                                    </span>
                                </h1>
                                <p class="text-gray-600 text-base truncate">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            <div class="cursor-pointer border-b-2 p-4 bg-white hover:bg-gray-100">
                                <h1 class="font-semibold text-lg pb-2">
                                    <span class="flex items-center text-yellow-500">
                                        <x-heroicon-o-calendar class="h-5 w-5 mr-2"/> 
                                        08-5-2021
                                    </span>
                                </h1>
                                <p class="text-gray-600 text-base truncate">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            <div class="cursor-pointer border-b-2 p-4 bg-white hover:bg-gray-100">
                                <h1 class="font-semibold text-lg pb-2">
                                    <span class="flex items-center text-yellow-500">
                                        <x-heroicon-o-calendar class="h-5 w-5 mr-2"/> 
                                        06-5-2021
                                    </span>
                                </h1>
                                <p class="text-gray-600 text-base truncate">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="flex justify-start col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget(
                            {
                                "autosize": true,
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
        </div>
    </div>
</div> 




