<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Physical Gold Checkout
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white">
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Product" sort="" />
                    <x-table.table-header class="text-left" value="Bought Price" sort="" />
                    <x-table.table-header class="text-left" value="Quantity" sort="" />
                    <x-table.table-header class="text-left" value="Current Market Price" sort="" />
                    <x-table.table-header class="text-center" value="Actions" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-3 items-center">
                                <img class="object-cover w-16 h-16 rounded" src="{{ asset('storage/d1.png') }}" alt="">
                                <div>
                                    <h3 class="text-sm font-semibold">Kasih Gold Digital 1g</h3>
                                </div>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 252.00</p>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                <button data-action="decrement"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="text"
                                    class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                    hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                    justify-center
                                    text-gray-700 
                                    outline-none"
                                    name="custom-input-number" value="3" ></input>
                                <button data-action="increment"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 262.15</p>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div x-data="{ deleteOpen3 : false  }" class="flex justify-center">
                                <x-btn.tooltip-btn
                                    class="flex items-center justify-center text-xs bg-red-600 rounded-full hover:bg-red-700"
                                    btnRoute="#" tooltipTitle="Delete" x-on:click="deleteOpen3 = true">
                                    <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                </x-btn.tooltip-btn>

                                {{-- Start modal delete --}}
                                <div class="cursor-default">
                                    <x-general.modal modalActive="deleteOpen3" title="Delete Confirmation"
                                        modalSize="sm" closeBtn="yes">
                                        <div class="">
                                            <div class="py-4 font-semibold text-center text-black font">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="flex justify-center mt-3">
                                                <button
                                                    class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none">
                                                    Yes
                                                </button>
                                                <button
                                                    class="flex px-4 py-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none"
                                                    x-on:click="deleteOpen3 = false">
                                                    No
                                                </button>
                                            </div>
                                        </div>
                                    </x-general.modal>
                                </div>
                                {{-- End modal delete  --}}
                            </div>
                        </x-table.table-body>
                    </tr>
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex space-x-3 items-center">
                                <img class="object-cover w-16 h-16 rounded" src="{{ asset('storage/d025.png') }}" alt="">
                                <div>
                                    <h3 class="text-sm font-semibold">Kasih Gold Digital 0.25g</h3>
                                </div>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 63.00</p>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                <button data-action="decrement"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="text"
                                    class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                    hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                    justify-center
                                    text-gray-700 
                                    outline-none"
                                    name="custom-input-number" value="4" ></input>
                                <button data-action="increment"
                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 66.17</p>
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <div x-data="{ deleteOpen3 : false  }" class="flex justify-center">
                                <x-btn.tooltip-btn
                                    class="flex items-center justify-center text-xs bg-red-600 rounded-full hover:bg-red-700"
                                    btnRoute="#" tooltipTitle="Delete" x-on:click="deleteOpen3 = true">
                                    <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                </x-btn.tooltip-btn>

                                {{-- Start modal delete --}}
                                <div class="cursor-default">
                                    <x-general.modal modalActive="deleteOpen3" title="Delete Confirmation"
                                        modalSize="sm" closeBtn="yes">
                                        <div class="">
                                            <div class="py-4 font-semibold text-center text-black font">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="flex justify-center mt-3">
                                                <button
                                                    class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-700 rounded focus:outline-none">
                                                    Yes
                                                </button>
                                                <button
                                                    class="flex px-4 py-2 text-sm font-bold text-white bg-gray-400 rounded focus:outline-none"
                                                    x-on:click="deleteOpen3 = false">
                                                    No
                                                </button>
                                            </div>
                                        </div>
                                    </x-general.modal>
                                </div>
                                {{-- End modal delete  --}}
                            </div>
                        </x-table.table-body>
                    </tr>
                    
{{-- 
                    <tr>
                        <x-table.table-body colspan="5" class="text-xs font-medium text-gray-700 ">
                            <div class="flex justify-between">
                                <div  class="flex space-x-2">
                                    <div>
                                        <x-form.input type="text" label="" value="" livewire="" placeholder="Coupon code" /> 
                                    </div>
                                    <div class="mt-2">
                                        <a href="#"  class="flex items-center px-2 py-1 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500">
                                            <p>Apply coupon</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <a href="#"  class=" cursor-not-allowed flex items-center px-2 py-1 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500">
                                        <p>Update Cart</p>
                                    </a>
                                </div>
                            </div>
                        </x-table.table-body>
                    </tr> --}}
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
                            <p>4 grams </p>
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

<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value > 1){
            value--;
        }
        target.value = value;
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value < 10){
            value++;
        }
        target.value = value;
    }
    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );
    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );
    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });
    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>