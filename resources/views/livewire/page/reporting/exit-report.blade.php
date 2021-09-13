<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Exit Report
        </h2>
    </div>
    <div class="flex justify-between p-4 my-6 space-x-0 space-y-2 bg-white rounded-md shadow-lg">
        <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-4">
            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="exit">Exit Type:</label>
            <select class="block transition duration-150 ease-in-out w-52 form-select sm:text-sm sm:leading-5 select2" id="exit" >
                <option></option>
                <option value="convert">Change Physical</option>
                <option value="outright">Outright Sell</option>
                <option value="buyback">Buy Back</option>
            </select>

            <button id="submit_exit" class="inline-flex items-center px-4 py-2 font-semibold text-white bg-yellow-300 rounded hover:bg-yellow-400 focus:outline-none" >
                <x-heroicon-o-cog class="w-6 h-6 mr-2"/>
                <span>Generate</span>
            </button>

        </div>
        <div>
            <button class="inline-flex items-center px-4 py-2 font-semibold text-white bg-indigo-300 rounded selectReport hover:bg-indigo-400 focus:outline-none" >
                <x-heroicon-o-view-list class="w-6 h-6 mr-2"/>
                <span>Select Report</span>
            </button>
        </div>
    </div>

    <table id="exitTable" class="divide-y divide-gray-200 stripe hover" >
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Name</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">1 gram</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">0.5 gram</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">0.25 gram</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">0.01 gram</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Exit Date</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        </tbody>
    </table>
</div>

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#exitTable').wrap('<div id="hide_exit" style="display:none"/>');
            $('.select2').select2({
                placeholder: "Select option"
            });

            var exitSelection = document.getElementById("exit").value;

            var exitTable = $('#exitTable').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('reporting.exit') }}",
                    data: function (d) {
                        d.exit = $('#exit').val();
                    }
                },
                buttons: [
                    {
                        text: `<div class="flex items-center px-4 py-2 mr-2 space-x-2 text-white bg-green-400 rounded-md">
                                    <x-heroicon-o-document-download class="w-6 h-6"/>
                                    <p>Excel</p>
                                </div>`,
                        extend: 'excelHtml5',
                        title: 'Agent Report '
                    },
                    {
                        text: `<div class="flex items-center px-4 py-2 mr-2 space-x-2 text-white bg-orange-400 rounded-md">
                                    <x-heroicon-o-document-text class="w-6 h-6"/>
                                    <p>PDF</p>
                                </div>`,
                        extend: 'pdfHtml5',
                        title: 'Agent Report '
                    }
                ],
                columns: [
                    {data: 'user_id', name: 'user_id', orderable: true},
                    { render:function(data, type, row){
                        return row.one_gram + " unit"
                        }, orderable: true
                    },
                    { render:function(data, type, row){
                        return row.quarter_gram + " unit"
                        }, orderable: true
                    },
                    { render:function(data, type, row){
                        return row.decigram + " unit"
                        }, orderable: true
                    },
                    { render:function(data, type, row){
                        return row.centigram + " unit"
                        }, orderable: true
                    },
                    {data: 'created_at', name: 'created_at', orderable: true},
                ],
                columnDefs: [
                    {
                        targets: 0,
                        className: 'dt-body-left'
                    },
                    {
                        targets: 1,
                        className: 'dt-body-center'
                    },
                    {
                        targets: 2,
                        className: 'dt-body-center'
                    },
                    {
                        targets: 3,
                        className: 'dt-body-center'
                    },
                    {
                        targets: 4,
                        className: 'dt-body-center'
                    },
                    {
                        targets: 5,
                        className: 'dt-body-center'
                    },
                ],
                bLengthChange: false,
                dom: "<'flex items-center justify-end mb-3'<B>>" +
                    "<'flex'<'w-full'tr>>" +
                    "<'flex'<'w-full col-md-5'i><'w-full col-md-7'p>>",
                initComplete: function () {
                    var api = this.api();
                    if ( exit == 'convert' ) {
                        api.column(3).visible( false );
                        api.column(4).visible( false );
                    }
                }
            })

            $("#submit_exit").click(function(e) {
                $('#hide_exit').css( 'display', 'block' );
                $("#exitTable").css("width",'');
                exitTable.ajax.reload();
                e.preventDefault();
            });

            $(document).on("change","#exit",function(event){
                var selCol = $(this).val();
                exitTable.columns( [0, 1, 2, 3, 4,5] ).visible( true)

                if(selCol == 'convert'){
                    exitTable.columns( [3,4] ).visible( false);
                }

                exitTable.columns.adjust().draw( false );
            });
        });
    </script>
@endpush