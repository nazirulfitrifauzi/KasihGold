<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            User Report (Buying & Not Buying)
        </h2>
    </div>
    <div class="flex justify-between p-4 my-6 space-x-0 space-y-2 bg-white rounded-md shadow-lg">
        <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-4">
            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="status">Status:</label>
            <select class="block transition duration-150 ease-in-out w-52 form-select sm:text-sm sm:leading-5 select2" id="status" >
                <option></option>
                <option value="buy">Buying</option>
                <option value="notbuy">Not Buying</option>
            </select>

            <button id="submit_user" class="inline-flex items-center px-4 py-2 font-semibold text-white bg-yellow-300 rounded hover:bg-yellow-400 focus:outline-none" >
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


    <table id="userTable" class="divide-y divide-gray-200 stripe hover" >
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Name</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Email</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Phone No</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">Agent</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        </tbody>
    </table>
</div>

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#userTable').wrap('<div id="hide_user" style="display:none"/>');
            $('.select2').select2({
                placeholder: "Select option"
            });

            var userTable = $('#userTable').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('userBuyOrNot') }}",
                    data: function (d) {
                        d.status = $('#status').val();
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
                    {data: 'name', name: 'name', orderable: true},
                    {data: 'email', name: 'email', orderable: true},
                    {data: 'phone_no', name: 'phone_no', orderable: true},
                    {data: 'agent', name: 'agent', orderable: true},
                ],
                bLengthChange: false,
                dom: "<'flex items-center justify-end mb-3'<B>>" +
                    "<'flex'<'w-full'tr>>" +
                    "<'flex'<'w-full col-md-5'i><'w-full col-md-7'p>>"
            })

            $("#submit_user").click(function(e) {
                $('#hide_user').css( 'display', 'block' );
                $("#userTable").css("width",'');
                userTable.ajax.reload();
                e.preventDefault();
            });
        });
    </script>
@endpush