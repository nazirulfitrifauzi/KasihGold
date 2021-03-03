<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Check out
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
        <!-- BEGIN: Personal Info -->
        <div class="col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden bg-white mt-5 shadow-lg">
                <x-form.basic-form wire:submit.prevent="submit">
                    <x-slot name="content"> 
                        <div class="border border-gray-200 rounded-md p-5">
                            {{-- @if (session('success')) --}}
                                {{-- <x-toaster.success title="{{ session('success') }}"/> --}}
                            {{-- @endif --}}
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <x-heroicon-o-chevron-down class="w-5 h-5 mr-2  text-gray-600 "/> Contact Information
                            </div>
                            <div class="mt-5">
                                <x-form.dropdown label="" value="" default="no" wire:model="" name="" id="">
                                    <option value="" selected>Select a Category</option>
                                        {{-- @foreach ($categories as $category) --}}
                                            {{-- <option value="{{ $category->id }}">{{ $category->name }}</option>  --}}
                                        {{-- @endforeach --}}
                                </x-form.dropdown>
                            </div>
                            {{-- @if(count($subcategories) > 0) --}}
                            <div class="mt-5">
                                <x-form.dropdown label="" value="" default="no" wire:model="" name="" id="" >
                                    <option value="" selected>Select a sub-category</option>
                                        {{-- @foreach ($subcategories as $subcategory) --}}
                                            {{-- <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option> --}}
                                        {{-- @endforeach --}}
                                </x-form.dropdown>
                            </div>
                            {{-- @endif --}}
                            <div class="mt-5">
                                <x-form.input wire:model="" name="" id="" value="" label="" type="text" placeholder="Title" />
                            </div>
                            <div class="mt-5">
                                <x-form.text-area label="" value="" wire:model="" name="" id="" data-feature="all" rows="8"  placeholder="Your Comment"/>
                            </div>
                            <div class="flex justify-center p-2">
                                <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded cursor-pointer focus:outline-none hover:bg-green-500">Submit</button>
                            </div>
                        </div>
                    </x-slot>
                </x-form.basic-form>
            </div>
            <!-- End: Personal Info -->
        </div>
        <!-- BEGIN: Content -->
        <div class="col-span-12  sm:hidden xl:block intro-y lg:col-span-4">
            <div class="w-full px-5 py-4 mt-4 mb-2 text-white rounded-md bg-yellow-400">
                <div class="flex items-center">
                    <div class="text-lg font-medium">One final step before purchasing this product.</div>
                </div>
                <div class="mt-3 tex-sm">Do you have any discount codes?</div>
                <div class="text-sm">if you do, please enter in the field below</div>
                <div class="mt-5">
                    <x-form.input wire:model="" name="" id="" value="" label="" type="text" placeholder="Discount code" />
                </div>
            </div>
            <div class="w-full px-5 py-4 mt-4 mb-2 text-gray-900 bg-white rounded-md shadow-lg">
                <div class="flex items-center">
                    <div class="text-lg font-medium">Contact us</div>
                </div>
                <div class="mt-2 tex-sm">
                    <span class="flex items-left mt-5 mb-4"><x-heroicon-o-phone class="w-5 h-5 mr-2  text-yellow-400 "/>  606-851 8151 </span>
                    <span class="flex items-center mt-5 mb-4"><x-heroicon-o-mail class="w-5 h-5 mr-2  text-yellow-400 "/>  enquirykasihgold@gmail.com </span>
                    <span class="flex items-center mt-5 mb-4"> <x-heroicon-o-chat class="w-5 h-5 mr-2  text-yellow-400 "/> 601160602291 </span>
                    <span class="flex items-center mt-5 mb-4 "><x-heroicon-o-home class="w-5 h-5 mr-2  text-yellow-400 "/>  Address </span>
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







