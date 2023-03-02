

<div>
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-12">
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Exit Report
            </h2>
        </div>

        <x-general.card class="px-5 bg-white">
            <form wire:submit.prevent="">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-4">
                        <label class="block text-sm font-semibold leading-5 text-gray-700 " for="agent">Status Type:</label>
                        <select class="w-52 form-select"  wire:model="status"
                        >
                            <option>Select option</option>
                            <option value="buy">Buying</option>
                            <option value="notbuy">Not Buying</option>
                        </select>
                    </div>
                    <div class ="flex items-center justify-end">
                        <div>
                            <a href="{{route('reporting')}}"
                                class="flex items-center p-2 mt-1 text-xs bg-yellow-300 rounded-full hover:bg-yellow-400 focus:outline-none tooltipbtn"
                                data-title="Back to list of report"
                                data-placement="top"
                                >
                                <x-heroicon-o-arrow-left class="w-4 h-4 text-black"/>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </x-general.card>

        <x-reporting.iframe :parameters="$parameters" />
    </x-general.grid>
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
