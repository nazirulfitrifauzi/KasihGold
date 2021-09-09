@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<style>
    /*Form fields*/
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a5568; 			/*text-gray-700*/
        padding-left: 1rem; 		/*pl-4*/
        padding-right: 1rem; 		/*pl-4*/
        padding-top: .5rem; 		/*pl-2*/
        padding-bottom: .5rem; 		/*pl-2*/
        line-height: 1.25; 			/*leading-tight*/
        border-width: 2px; 			/*border-2*/
        border-radius: .25rem;
        border-color: #edf2f7; 		/*border-gray-200*/
        background-color: #edf2f7; 	/*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;	/*bg-indigo-100*/
    }

    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button		{
        font-weight: 700;				/*font-bold*/
        border-radius: .25rem;			/*rounded*/
        border: 1px solid transparent;	/*border border-transparent*/
    }

    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }

    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }

    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #667eea !important; /*bg-indigo-500*/
    }
</style>
@endsection

<div class="overflow-hidden ">
    <section id="section" class="absolute top-0 bottom-0 left-0 z-10 flex max-w-full md:top-32" aria-labelledby="slide-over-heading">
        <div class="w-screen max-w-md my-20 md:my-0">
            <div id="reportList" class="flex flex-col h-auto py-6 pt-0 overflow-y-auto bg-white shadow-xl animate__animated animate__fadeInLeft md:h-full">
                <div class="relative flex-shrink-0 overflow-hidden bg-yellow-400 ">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative flex items-center p-4">
                        <h2 class="text-base font-semibold text-white uppercase">
                            List Of Reports
                        </h2>
                    </div>
                </div>

                <div class="relative flex-1 mt-6">
                    <!-- Replace with your content -->
                    <div class="px-4 pb-20 sm:px-6 md:pb-10">
                        <div class="h-full pb-8 leading-6 border-2 border-yellow-400" aria-hidden="true">
                            <button id="goldbarReportMenu" class="inline-flex items-center w-full px-4 py-2 text-base font-semibold text-gray-500 reportMenu hover:text-yellow-400">
                                <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                <span>Goldbars Report</span>
                            </button>
                            <button id="agentReportMenu" class="inline-flex items-center w-full px-4 py-2 text-base font-semibold text-gray-500 reportMenu hover:text-yellow-400">
                                <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                <span>Agents Report</span>
                            </button>
                            <button id="commissionReportMenu" class="inline-flex items-center w-full px-4 py-2 text-base font-semibold text-gray-500 reportMenu hover:text-yellow-400">
                                <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                <span>Commission Report</span>
                            </button>
                            <button id="userReportMenu" class="inline-flex items-center w-full px-4 py-2 text-base font-semibold text-gray-500 reportMenu hover:text-yellow-400">
                                <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                <span>User Report (Buying & Not Buying)</span>
                            </button>
                        </div>
                    </div>
                    <!-- /End replace -->
                </div>
            </div>
        </div>
    </section>

    <div id="goldbarReport" class="hidden">
        <livewire:page.reporting.gold-report/>
    </div>

    <div id="agentReport" class="hidden">
        <livewire:page.reporting.agent-report/>
    </div>

    <div id="commissionReport" class="hidden">
        <livewire:page.reporting.commission-report/>
    </div>

    <div id="userReport" class="hidden">
        <livewire:page.reporting.user-report/>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            var section = document.getElementById("section");
            var slide = document.getElementById("reportList");
            var goldbar = document.getElementById("goldbarReport");
            var agent = document.getElementById("agentReport");
            var commission = document.getElementById("commissionReport");
            var user = document.getElementById("userReport");

            $(".reportMenu").click(function(e) {
                slide.classList.remove("animate__fadeInLeft");
                slide.classList.add("animate__fadeOutLeft");

                setTimeout(function() {
                    section.classList.remove("block");
                    section.classList.add("hidden");
                }, 1000);
            });

            $(".selectReport").click(function(e) {
                section.classList.remove("hidden");
                section.classList.add("block");
                slide.classList.remove("animate__fadeOutLeft");
                slide.classList.add("animate__fadeInLeft");
            });

            $("#goldbarReportMenu").click(function(e) {
                if(agent.classList.contains("block")) {
                    agent.classList.remove("block");
                    agent.classList.add("hidden");
                }

                if(commission.classList.contains("block")) {
                    commission.classList.remove("block");
                    commission.classList.add("hidden");
                }

                if(user.classList.contains("block")) {
                    user.classList.remove("block");
                    user.classList.add("hidden");
                }

                goldbar.classList.remove("hidden");
                goldbar.classList.add("block");
            });

            $("#agentReportMenu").click(function(e) {
                if(goldbar.classList.contains("block")) {
                    goldbar.classList.remove("block");
                    goldbar.classList.add("hidden");
                }

                if(commission.classList.contains("block")) {
                    commission.classList.remove("block");
                    commission.classList.add("hidden");
                }

                if(user.classList.contains("block")) {
                    user.classList.remove("block");
                    user.classList.add("hidden");
                }

                agent.classList.remove("hidden");
                agent.classList.add("block");
            });

            $("#commissionReportMenu").click(function(e) {
                if(goldbar.classList.contains("block")) {
                    goldbar.classList.remove("block");
                    goldbar.classList.add("hidden");
                }

                if(agent.classList.contains("block")) {
                    agent.classList.remove("block");
                    agent.classList.add("hidden");
                }

                if(user.classList.contains("block")) {
                    user.classList.remove("block");
                    user.classList.add("hidden");
                }

                commission.classList.remove("hidden");
                commission.classList.add("block");
            });

            $("#userReportMenu").click(function(e) {
                if(goldbar.classList.contains("block")) {
                    goldbar.classList.remove("block");
                    goldbar.classList.add("hidden");
                }

                if(agent.classList.contains("block")) {
                    agent.classList.remove("block");
                    agent.classList.add("hidden");
                }

                if(commission.classList.contains("block")) {
                    commission.classList.remove("block");
                    commission.classList.add("hidden");
                }

                user.classList.remove("hidden");
                user.classList.add("block");
            });
        });
    </script>
@endpush