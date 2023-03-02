
<div class="overflow-hidden">
    <section class="absolute top-0 bottom-0 left-0 z-10 flex max-w-full md:top-32" aria-labelledby="slide-over-heading">
        <div class="relative w-screen max-w-md">

            <div class="flex flex-col h-full py-6 pt-0 overflow-auto bg-white shadow-xl">
                <div class="relative flex-shrink-0 overflow-hidden bg-yellow-300 ">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative flex items-center p-4">
                        <h2 class="text-base font-semibold text-black uppercase">
                            Reporting List
                        </h2>
                    </div>
                </div>

                <div class="relative flex-1 px-4 mt-6 sm:px-6">
                    <!-- Replace with your content -->
                    <div class="flex items-center space-x-2">
                        <x-form.search-input label="" placeholder="Search"  value="" id="myInput" onkeyup="myFunction()" />
                    </div>
                    <div class="pb-8 mt-4 border-2 border-gray-200 ">
                        <div class="h-full leading-6" aria-hidden="true">
                            <ul id="myUL">
                                <li>
                                    <a href="{{route('reporting.gold-report')}}" class="inline-flex items-center w-full px-4 py-2 text-sm font-semibold text-gray-500 hover:text-yellow-300">
                                        <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                        <span>Goldbars Report</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('reporting.agent-report')}}" class="inline-flex items-center w-full px-4 py-2 text-sm font-semibold text-gray-500 hover:text-yellow-300">
                                        <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                        <span>Agents Report</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('reporting.commission-report')}}" class="inline-flex items-center w-full px-4 py-2 text-sm font-semibold text-gray-500 hover:text-yellow-300">
                                        <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                        <span>Commission Report</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('reporting.user-report')}}" class="inline-flex items-center w-full px-4 py-2 text-sm font-semibold text-gray-500 hover:text-yellow-300">
                                        <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                        <span>User Report (Buying & Not Buying)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('reporting.exit-report')}}" class="inline-flex items-center w-full px-4 py-2 text-sm font-semibold text-gray-500 hover:text-yellow-300">
                                        <x-heroicon-o-document-text  class="w-4 h-4 mr-2"/>
                                        <span>Exit Report</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /End replace -->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
