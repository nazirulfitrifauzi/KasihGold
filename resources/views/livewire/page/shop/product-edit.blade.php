<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <div class="flex">
            <h2 class="mr-auto text-lg font-medium">
                Sell Product
            </h2>
        </div>
    </div>
    <x-general.card class="bg-white shadow-lg">
        <div class="grid grid-cols-12 gap-6">
            <div class="flex col-span-12 lg:col-span-12 xxl:col-span-12 lg:block">
                <div class="flex justify-end py-2 px-4">

                    <a href="{{route('product-sell')}}" class="cursor-pointer flex items-center px-4 py-1 
                        text-sm font-bold text-white bg-yellow-400 rounded  focus:outline-none hover:bg-yellow-300">
                        <x-heroicon-o-arrow-circle-left class="w-5 h-5 mr-2 text-white" />
                        List Product
                    </a>
                </div>

                <!-- Start Edit Product View -->
                <div class="py-4 px-4">
                    <h1 class="font-semibold text-lg">Upload Product Image</h1>
                    <x-form.basic-form wire:submit.prevent="">
                        <x-slot name="content">
                            <div class="grid gap-2 grid-cols-3  lg:grid-cols-6 ">

                                <!-- upload product img 1 -->
                                <div class="flex mt-3">
                                    <label for="product-img1"
                                        class="w-full p-10 text-center  bg-gray-200 rounded-lg shadow cursor-pointer hover:bg-gray-300 group">
                                        <span
                                            class="inline-flex items-center font-medium text-gray-600 group-hover:text-gray-700">
                                            <x-heroicon-o-plus-circle class="w-10 h-10 mr-2 text-yellow-400 " />
                                        </span>
                                    </label>
                                    <input type="file" class="absolute invisible pointer-events-none" id="product-img1"
                                        name="product-img1" wire:model="">
                                </div>

                                <!-- upload product img 2 -->
                                <div class="flex mt-3">
                                    <label for="product-img2"
                                        class="w-full p-10 text-center  bg-gray-200 rounded-lg shadow cursor-pointer hover:bg-gray-300 group">
                                        <span
                                            class="inline-flex items-center font-medium text-gray-600 group-hover:text-gray-700">
                                            <x-heroicon-o-plus-circle class="w-10 h-10 mr-2 text-yellow-400 " />
                                        </span>
                                    </label>
                                    <input type="file" class="absolute invisible pointer-events-none" id="product-img2"
                                        name="product-img2" wire:model="">
                                </div>

                                <!-- upload product img 3 -->
                                <div class="flex mt-3">
                                    <label for="product-img3"
                                        class="w-full p-10 text-center  bg-gray-200 rounded-lg shadow cursor-pointer hover:bg-gray-300 group">
                                        <span
                                            class="inline-flex items-center font-medium text-gray-600 group-hover:text-gray-700">
                                            <x-heroicon-o-plus-circle class="w-10 h-10 mr-2 text-yellow-400 " />
                                        </span>
                                    </label>
                                    <input type="file" class="absolute invisible pointer-events-none" id="product-img3"
                                        name="product-img3" wire:model="">
                                </div>

                                <!-- upload product img 4 -->
                                <div class="flex mt-3">
                                    <label for="product-img4"
                                        class="w-full p-10 text-center  bg-gray-200 rounded-lg shadow cursor-pointer hover:bg-gray-300 group">
                                        <span
                                            class="inline-flex items-center font-medium text-gray-600 group-hover:text-gray-700">
                                            <x-heroicon-o-plus-circle class="w-10 h-10 mr-2 text-yellow-400 " />
                                        </span>
                                    </label>
                                    <input type="file" class="absolute invisible pointer-events-none" id="product-img4"
                                        name="product-img4" wire:model="">
                                </div>

                            </div>
                            <div class="grid gap-2 sm:grid-cols-1 lg:grid-cols-3  mt-6">
                                <x-form.input label="Product Name" value="" wire:model="" />
                                <x-form.input label="Price of Product" value="" wire:model="" />
                            </div>
                            <div class="grid sm:grid-cols-1 gap-2 lg:grid-cols-3  mt-6">
                                <x-form.input label="Offer price of product" value="" wire:model="" />
                                <x-form.dropdown label="Category" value="" default="yes">
                                    <option value="">Gold 0.25g</option>
                                    <option value="">Gold 0.5g</option>
                                    <option value="">Gold 1.0g</option>
                                    <option value="">Gold 1.5g</option>
                                </x-form.dropdown>
                            </div>
                            <div class="grid gap-2 sm:grid-cols-1 lg:grid-cols-2  mt-2">
                                <x-form.text-area label="Description (Optional)" value="" wire:model="" name="" id=""
                                    data-feature="all" rows="8"
                                    placeholder="Describe what you are selling and include any details a buyer might be interested in. People love items with strories! (Optional)" />
                            </div>

                            <div class="flex justify-center mt-16">
                                <button type="submit"
                                    class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded cursor-pointer focus:outline-none hover:bg-green-500">
                                    Submit
                                </button>
                            </div>
                        </x-slot>
                    </x-form.basic-form>
                </div>
                <!-- End  Edit Product View -->
                
            </div>
        </div>
    </x-general.card>
</div>