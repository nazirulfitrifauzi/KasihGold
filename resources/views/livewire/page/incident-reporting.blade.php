<div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">
        Incident Reporting
    </h2>
</div>
<div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
    <!-- BEGIN: Incident Reporting Form -->
    <div class="col-span-12 lg:col-span-8">
        <div class="post intro-y overflow-hidden bg-white mt-5 shadow-lg">
            <x-form.basic-form action="submit">
                <x-slot name="content"> 
                    <div class="border border-gray-200 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                            <x-heroicon-o-chevron-down class="w-5 h-5 mr-2  text-yellow-400 "/> Incident Reporting Form 
                        </div>
                        <div class="mt-5">
                            <x-form.dropdown label="" value="" default="">
                                <option value="" seleted>Select a Category</option>
                            </x-form.dropdown>
                        </div>
                        <div class="mt-5">
                            <x-form.dropdown label="" value="" default="">
                                <option value="" seleted>Select a Category</option>
                            </x-form.dropdown>
                        </div>
                        <div class="mt-5">
                            <x-form.input wire:model="" name="title" id="" value="" label="" type="text" placeholder="Title" livewire=""/>
                        </div>
                        <div class="mt-5">
                            <textarea wire:model="" name="comment" id="" data-feature="all" rows="8" class="appearance-none block w-full h-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"  placeholder="Your Comment"></textarea>
                        </div>
                        <div class="flex justify-center p-2">
                            <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none">Submit</button>
                        </div>
                    </div>
                </x-slot>
            </x-form.basic-form>
        </div>
        <!-- End: Incident Reporting Form -->
    </div>
    <!-- BEGIN: Content -->
    <div class="col-span-12  sm:hidden xl:block intro-y lg:col-span-4">
        <div class="w-full px-5 py-4 mt-4 mb-2 text-white rounded-md bg-yellow-400">
            <div class="flex items-center">
                <div class="text-lg font-medium">Send us your incident reporting</div>
            </div>
            <div class="mt-3 tex-sm">Do you have a suggestion or found some bug?</div>
            <div class="text-sm">let us know the field below</div>
        </div>
        <div class="w-full px-5 py-4 mt-4 mb-2 text-gray-900 bg-white rounded-md shadow-lg">
            <div class="flex items-center">
                <div class="text-lg font-medium">Contact us</div>
            </div>
            <div class="mt-2 tex-sm">
                <span class="flex items-center mt-5 mb-4"><x-heroicon-o-phone class="w-5 h-5 mr-2  text-yellow-400 "/>  606-851 8151 </span>
                <span class="flex items-center mt-5 mb-4"><x-heroicon-o-mail class="w-5 h-5 mr-2  text-yellow-400 "/>  enquirykasihgold@gmail.com </span>
                <span class="flex items-center mt-5 mb-4"> <x-heroicon-o-chat class="w-5 h-5 mr-2  text-yellow-400 "/> 601160602291 </span>
                <span class="flex items-center mt-5 mb-4 "><x-heroicon-o-home class="w-5 h-5 mr-2  text-yellow-400 "/>  Address </span>
                <div class="flex justify-center mapouter">
                    <div class="w-full gmap_canvas">
                        <iframe  height="220" width="100%" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=Business%20Square%2C%20Lavender%20Height%2C%2070450%20Seremban%2C%20Negeri%20Sembilan&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            >
                        </iframe>
                        <a href="https://www.whatismyip-address.com/divi-discount/"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
</div>


