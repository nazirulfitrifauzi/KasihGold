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

                    <div class="grid grid-cols-12 gap-6 mt-10">
                        <x-dashboard.info-card bg="white" title="Pending Approval" value="{{ $pendingApproval->count() }} Users" cardRoute="{{route('pending-approval-kap-agent')}}" >
                            <x-slot name="svg">
                                <x-heroicon-o-user-group class="text-blue-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>

                        <x-dashboard.info-card bg="white" title="Active User" value="{{ $activeUser->count() }} User{{ ($activeUser->count() > 1) ? 's' : '' }}" cardRoute="{{route('downline-detail')}}" >
                            <x-slot name="svg">
                                <x-heroicon-o-user-group class="text-yellow-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>

                        <x-dashboard.info-card bg="white" title="Total Products" value="2.145"  cardRoute="#" >
                            <x-slot name="svg">
                                <x-heroicon-o-desktop-computer class="text-yellow-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>

                        <x-dashboard.info-card bg="white" title="Total Visitor" value="152.00"  cardRoute="#" >
                            <x-slot name="svg">
                                <x-heroicon-o-user class="text-green-400 h-7 w-7"/>
                            </x-slot>
                        </x-dashboard.info-card>
                    </div>
                </div>
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
                            <div class="bg-white p-2 shadow-lg h-auto" id="chart-container">
                                <div class="flex justify-end" data-html2canvas-ignore="true">
                                    <button onclick="saveAsPDF();" class="flex px-2 py-1 text-sm font-bold text-white bg-orange-400 rounded cursor-pointer focus:outline-none hover:bg-orange-500">
                                        <div class="flex space-x-2">
                                            <x-heroicon-o-document-text class="w-5 h-5" />
                                            <p>Export PDF</p>
                                        </div>
                                    </button>
                                </div>
                                <div class="h-96 w-full" id="chart"></div>
                            </div>
                        </div>
                        <!-- end chart -->
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
