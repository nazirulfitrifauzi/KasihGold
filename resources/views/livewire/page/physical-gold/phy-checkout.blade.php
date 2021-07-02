<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Physical Gold Checkout
            </h2>
        </div>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
        @endif
        <div class="p-4 mt-8 bg-white">
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Product" sort="" />
                    <x-table.table-header class="text-left" value="Grammage" sort="" />
                    <x-table.table-header class="text-left" value="Quantity" sort="" />
                    <x-table.table-header class="text-left" value="Total Grammage" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    
                    @if($this->gb63>0)
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-3 items-center">
                                <img class="object-cover w-16 h-16 rounded" src="{{ asset('storage/d1.png') }}" alt="">
                                <div>
                                    <h3 class="text-sm font-semibold">Kasih Digital Gold 0.25g</h3>
                                </div>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>0.25 Gram</p>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                <button  wire:click="exitProd({{-1}},'0.25')"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="text"
                                    class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                    hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                    justify-center
                                    text-gray-700 
                                    outline-none"
                                    name="custom-input-number" wire:model="goldbar063" value="goldbar063" ></input>
                                <button  wire:click="exitProd({{1}},'0.25')"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{$this->goldbar063*0.25}} Gram</p>
                        </x-table.table-body>

                    </tr>
                    @endif
                    
                    @if($this->gb64>0)
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-3 items-center">
                                <img class="object-cover w-16 h-16 rounded" src="{{ asset('storage/d1.png') }}" alt="">
                                <div>
                                    <h3 class="text-sm font-semibold">Kasih Digital Gold 1g</h3>
                                </div>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>1 Gram</p>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                <button  wire:click="exitProd({{-1}},'1.00')"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="text"
                                    class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                    hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                    justify-center
                                    text-gray-700 
                                    outline-none"
                                    name="custom-input-number" wire:model="goldbar064" value="goldbar064" ></input>
                                <button  wire:click="exitProd({{1}},'1.00')"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>{{$this->goldbar064}} Gram</p>
                        </x-table.table-body>

                    </tr>
                    @endif


                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>


            <! -- Start Checkout -->
            <div class="flex justify-end my-6">
                <div class="bg-white py-4 px-4  rounded-lg w-2/5 border-2">
                    <div class="border-b-2 py-4">
                        <h1 class="text-3xl font-semibold">Total Physical Gold Conversion</h1>
                    </div>
                    
                    <div class="flex justify-between border-b-2 py-4">
                        <div class="font-semibold text-lg">
                            <p>Total Grams</p>
                        </div>
                        <div class="font-semibold text-lg">
                            <p>{{($this->goldbar063*0.25)+($this->goldbar064)}} grams </p>
                        </div>
                    </div>

                    <div class="flex justify-center my-6">
                        <a href="physical-gold-confirmation"  class="w-full flex items-center justify-center px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500">
                            <p>Proceed to checkout</p>
                        </a>
                    </div>
                </div>
            </div>
            <! -- End Checkout -->
        </div>
    </div>
</div>
