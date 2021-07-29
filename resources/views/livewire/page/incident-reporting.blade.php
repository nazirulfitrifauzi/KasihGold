<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Contact us
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y mb-20">
        <!-- BEGIN: Incident Reporting Form -->
        <div class="col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden bg-white mt-5 shadow-lg">
                <x-form.basic-form wire:submit.prevent="submit">
                    <x-slot name="content"> 
                        <div class="border border-gray-200 rounded-md p-5">
                            @if (session('success'))
                                <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
                            @endif
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <x-heroicon-o-chevron-down class="w-5 h-5 mr-2  text-gray-600 "/> Contact us form 
                            </div>
                            <div class="mt-5">
                                <x-form.dropdown label="" value="category" default="no" wire:model="category" name="category" id="category">
                                    <option value="" selected>Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                        @endforeach
                                </x-form.dropdown>
                            </div>
                            @if(count($subcategories) > 0)
                            <div class="mt-5">
                                <x-form.dropdown label="" value="subcategory" default="no" wire:model="subcategory" name="subcategory" id="subcategory" >
                                    <option value="" selected>Select a sub-category</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                </x-form.dropdown>
                            </div>
                            @endif
                            <div class="mt-5">
                                <x-form.input wire:model="title" name="title" id="title" value="title" label="" type="text" placeholder="Title" />
                            </div>
                            <div class="mt-5">
                                <x-form.text-area label="" value="comment" wire:model="comment" name="comment" id="comment" data-feature="all" rows="8"  placeholder="Your Comment"/>
                            </div>
                            <div class="flex justify-center p-2">
                                <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded cursor-pointer focus:outline-none hover:bg-green-500">Submit</button>
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
                    <div class="text-lg font-medium">Send us your feedback</div>
                </div>
                <div class="mt-3 tex-sm">Do you have any suggestions or found some bugs?</div>
                <div class="text-sm">Let us know in the form given</div>
            </div>
            <div class="w-full px-5 py-4 mt-4 mb-2 text-gray-900 bg-white rounded-md shadow-lg">
                <div class="flex items-center">
                    <div class="text-lg font-medium">Contact us</div>
                </div>
                <div class="mt-2 tex-sm">
                    <span class="flex items-center mt-5 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2  text-yellow-400 " fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>
                        012 749 9771
                    </span>
                    <span class="flex items-center mt-5 mb-4"><x-heroicon-o-mail class="w-5 h-5 mr-2  text-yellow-400 "/>customersupport@kasihapgold.com</span>
                    {{-- <span class="flex items-center mt-5 mb-4"> <x-heroicon-o-chat class="w-5 h-5 mr-2  text-yellow-400 "/> 601160602291 </span> --}}
                    <span class="flex items-center mt-5 mb-4 "><x-heroicon-o-home class="w-5 h-5 mr-2  text-yellow-400 "/>  Address </span>
                    <div class="flex justify-center mapouter">
                        
                        <div class="w-full gmap_canvas">
                            <iframe  height="220" width="100%" id="gmap_canvas"
                                src="https://www.google.com/maps/embed/v1/place?q=Address+No+18,+Menara+2,+Menara+Kembar+Bank+Rakyat,+No+33,+Jalan+Rakyat,+Brickfields,+50470+Kuala+Lumpur&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                                >
                            </iframe>
                            <a href="https://www.whatismyip-address.com/divi-discount/"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
        {{-- loading --}}
        <div wire:loading wire:target="category, submit">
            <x-loading.global-loading />
        </div>
    </div>
</div>







