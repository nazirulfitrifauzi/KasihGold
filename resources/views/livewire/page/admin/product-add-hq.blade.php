<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <div class="flex">
            <h2 class="mr-auto text-lg font-medium">
                Sell Product
            </h2>
        </div>
    </div>
    <x-general.card class="bg-white shadow-lg">
        <div class="flex justify-end py-2 px-4">
            <a href="{{route('admin.product-sell-hq')}}" class="cursor-pointer flex items-center px-4 py-1 
                text-sm font-bold text-white bg-yellow-400 rounded  focus:outline-none hover:bg-yellow-300">
                <x-heroicon-o-arrow-circle-left class="w-5 h-5 mr-2 text-white" />
                List Product
            </a>
        </div>
        <div class="grid grid-cols-12 gap-6">
            <div class="flex col-span-12 lg:col-span-12 xxl:col-span-12 lg:block">
                <!-- Start Add Product View -->
                <div class="py-4 px-4">
                    <h1 class="font-semibold text-lg">Upload Product Image</h1>
                    <x-form.basic-form wire:submit.prevent="save">
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
                                        name="product-img1" wire:model="prod_img1">
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
                                        name="product-img2" wire:model="prod_img2">
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
                                        name="product-img3" wire:model="prod_img3">
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
                                        name="product-img4" wire:model="prod_img4">
                                </div>

                            </div>
                            <div class="grid gap-2 sm:grid-cols-1 lg:grid-cols-3  mt-6">
                                <x-form.input label="Product Name" value="prod_name" wire:model="prod_name" name="prod_name"/>
                                <x-form.input label="Price of Product" value="prod_price" wire:model="prod_price" name="prod_price"/>
                            </div>
                            <div class="grid sm:grid-cols-1 gap-2 lg:grid-cols-3  mt-6">
                                <x-form.dropdown label="Category" value="prod_code" wire:model="prod_code" default="yes">
                                    <option value="001">Gold 24 Karat - 0.25g</option>
                                    <option value="018">Gold 22 Karat - 0.25g</option>
                                    <option value="019">Gold 18 Karat - 0.25g</option>
                                    <option value="020">Gold 24 Karat - 1.5g</option>
                                    <option value="021">Gold 22 Karat - 1.5g</option>
                                    <option value="022">Gold 18 Karat - 1.5g</option>
                                    <option value="023">Gold 24 Karat - 2.5g</option>
                                    <option value="024">Gold 22 Karat - 2.5g</option>
                                    <option value="025">Gold 18 Karat - 2.5g</option>
                                    <option value="026">Dinar</option>
                                </x-form.dropdown>
                            </div>
                            <div class="grid gap-2 sm:grid-cols-1 lg:grid-cols-2  mt-2">
                                <x-form.text-area label="Description (Optional)" value="prod_desc" wire:model="prod_desc" name="prod_desc" id=""
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
                <!-- End  Add Product View -->

            </div>
        </div>
    </x-general.card>
</div>