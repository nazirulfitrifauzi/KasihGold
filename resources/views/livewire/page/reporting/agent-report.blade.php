<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Agents Report
        </h2>
    </div>
    <div class="flex justify-between p-4 my-6 space-x-0 space-y-2 bg-white rounded-md shadow-lg">
        <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-4">
            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="agent">Agent:</label>
            <select class="w-52 select2" id="agent"
            >
                <option></option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                @endforeach
            </select>
            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="report_date">Report Month:</label>
            <input
                class="block transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                type="month"
                id="report_date_agent"
                name="report_date"
                min="2021-07"
                value="{{ now()->format('Y-m') }}"
            >

            <button id="submit_agent" class="inline-flex items-center px-4 py-2 font-semibold text-white bg-yellow-300 rounded hover:bg-yellow-400 focus:outline-none" >
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


    <table id="agentTable" class="divide-y divide-gray-200 stripe hover" >
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Denomination</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">No. of Unit Sell</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Commision (RM)</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        </tbody>
    </table>
</div>

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#agentTable').wrap('<div id="hide_agent" style="display:none"/>');
            $('.select2').select2({
                placeholder: "Select an Agent"
                
            });

            var agenttable = $('#agentTable').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('summaryAgent') }}",
                    data: function (d) {
                        d.agent = $('#agent').val();
                        d.report_date = document.getElementById("report_date_agent").value;
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
                    {data: 'denomination', name: 'denomination', orderable: true},
                    {data: 'unit_sell', name: 'unit_sell', orderable: true},
                    { render:function(data, type, row) {
                        return parseFloat(row.total).toFixed(2)
                        }, orderable: true
                    },
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
                    }
                ],
                bLengthChange: false,
                dom: "<'flex items-center justify-end mb-3'<B>>" +
                    "<'flex'<'w-full'tr>>" +
                    "<'flex'<'w-full col-md-5'i><'w-full col-md-7'p>>"
            })

            $("#submit_agent").click(function(e) {
                $('#hide_agent').css( 'display', 'block' );
                $("#agentTable").css("width",'');
                agenttable.ajax.reload();
                e.preventDefault();
            });
        });
    </script>
@endpush