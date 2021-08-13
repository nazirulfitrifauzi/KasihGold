<style>
    @media
    only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
        margin: 0 0 2rem 0;
        border: 1px solid #ddd;
    }
    

    td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
    }

    td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 0;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
    }

	}
</style>
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            {{ $thead }}
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{ $tbody }}
                    </tbody>
                </table>
                <div class="border-t border-gray-200">
                    <div class="mx-2 my-2">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

