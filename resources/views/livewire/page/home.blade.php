
<div>
    <div class="-mt-52">
        <div class="grid grid-cols-12 gap-6">
            <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                <div class="col-span-12 mt-8">
                    <div class="flex items-center">
                        <div>
                            <h2 class="mr-5 text-4xl font-bold text-white" id="lblGreetings"></h2>
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
                        <div class="grid grid-cols-12 gap-6 mt-10">
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
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                        <div class="grid grid-cols-12 gap-6">

                            <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
                                <div class="p-4 bg-white shadow-lg" id="chartline"></div>
                            </div>

                            <div class="col-span-12 lg:col-span-6 xxl:col-span-6">
                                <div class="p-4 bg-white shadow-lg" id="chartpie"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- chart -->
                            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                                <div class="h-auto p-2 bg-white shadow-lg" id="chart-container">
                                    <div class="flex justify-end" data-html2canvas-ignore="true">
                                        <button onclick="saveAsPDF();" class="flex px-2 py-1 text-sm font-bold text-white bg-orange-400 rounded cursor-pointer focus:outline-none hover:bg-orange-500">
                                            <div class="flex space-x-2">
                                                <x-heroicon-o-document-text class="w-5 h-5" />
                                                <p>Export PDF</p>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="w-full h-96" id="chart"></div>
                                </div>
                            </div>
                            <!-- end chart -->
                        </div>
                    </div>
                @endif

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
            .title('Revenue')
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
