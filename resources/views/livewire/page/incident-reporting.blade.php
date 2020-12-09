<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Incident Reporting
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
        <!-- BEGIN: Incident Reporting Form -->
        <div class="col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden bg-white mt-5 shadow-lg">
                <x-form.basic-form wire:submit.prevent="submit">
                    <x-slot name="content"> 
                        <div class="border border-gray-200 rounded-md p-5">
                            @if (session('success'))
                                <div class="flex items-center px-5 py-4 mb-5 rounded-md bg-green-500 text-white">
                                    <x-heroicon-o-check-circle class="w-5 h-5 mr-2  text-white "/> {{ session('success') }}
                                </div>
                            @endif
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <x-heroicon-o-chevron-down class="w-5 h-5 mr-2  text-gray-600 "/> Incident Reporting Form 
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
                                <x-form.text-area value="comment" wire:model="comment" name="comment" id="comment" data-feature="all" rows="8"  placeholder="Your Comment"/>
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
        {{-- loading --}}
        <div wire:loading wire:target="category, submit">
            <x-loading.global-loading />
        </div>
    </div>
</div>







