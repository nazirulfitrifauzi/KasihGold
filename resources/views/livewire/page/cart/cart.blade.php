<div>
    <div>
        <div class="flex flex-col  mt-8 intro-y sm:flex-row w-full">
            <h2 class="text-lg font-medium">
                Cart
            </h2>
        </div>


        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                    <div class="p-4 mt-8 bg-white">

                        <x-table.table>
                            <x-slot name="thead">
                                    <x-table.table-header class="text-left" value="Product" sort="" />
                                    <x-table.table-header class="text-left" value="Unit Price" sort="" />
                                    <x-table.table-header class="text-left" value="Quantity" sort="" />
                                    <x-table.table-header class="text-left" value="Total Price" sort="" />
                                    <x-table.table-header class="text-center" value="Actions" sort="" />
                                </div>
                            </x-slot>
                            <x-slot name="tbody">
                                @php
                                $total=0;
                                @endphp
                                @foreach ($cart as $carts)
                                @php
                                $total+=$carts->products->prod_price*$carts->prod_qty;
                                @endphp
                                <tr>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <div class="flex flex-col lg:flex-row space-x-3 items-center">
                                            <img class="object-cover w-16 h-16 rounded"
                                                src="{{ asset('img/gold/'.$carts->products->prod_img1) }}" alt="">
                                            <div class="mt-4 lg:mt-0">
                                                <h3 class="text-sm font-semibold">{{$carts->products->prod_name}}</h3>
                                            </div>
                                        </div>
                                    </x-table.table-body>

                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <p>RM {{$carts->products->prod_price}}</p>
                                    </x-table.table-body>

                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                            <button data-action="decrement"
                                                class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer focus:outline-none">
                                                <span class="m-auto text-2xl font-thin">−</span>
                                            </button>
                                            <input type="text" class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                                hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                                justify-center
                                                text-gray-700 
                                                outline-none" name="custom-input-number" value="{{$carts->prod_qty}}"></input>
                                            <button data-action="increment"
                                                class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none">
                                                <span class="m-auto text-2xl font-thin">+</span>
                                            </button>
                                        </div>
                                    </x-table.table-body>

                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                        <p>RM {{number_format($carts->products->prod_price*$carts->prod_qty,2)}}</p>
                                    </x-table.table-body>

                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 relative">
                                        <div x-data="{ deleteOpen3 : false  }" class="flex justify-center">
                                            <x-btn.tooltip-btn
                                                class="flex items-center justify-center text-xs bg-red-600 rounded-full hover:bg-red-700"
                                                btnRoute="#" tooltipTitle="Delete" x-on:click="deleteOpen3 = true">
                                                <x-heroicon-o-trash class="w-4 h-4 text-white" />
                                            </x-btn.tooltip-btn>

                                            {{-- Start modal delete --}}
                                            <div class="cursor-default">
                                                <x-general.new-modal modalName="deleteOpen3" size="sm" modalSize="sm"
                                                    closeBtn="yes">
                                                    <div class="">
                                                        <div
                                                            class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full">
                                                            <x-heroicon-o-trash class="w-8 h-8 text-red-600" />
                                                        </div>
                                                        <div class="py-4 font-semibold text-center text-black ">
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
                                                </x-general.new-modal>
                                            </div>
                                            {{-- End modal delete  --}}
                                        </div>
                                    </x-table.table-body>
                                </tr>
                                @endforeach
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
                            <div class="bg-white py-4 px-4  rounded-lg w-full lg:w-1/2 border-2">
                                <div class="border-b-2 py-4">
                                    <h1 class="text-3xl font-semibold">Cart totals</h1>
                                </div>
                                <div class="flex flex-col lg:flex-row justify-between border-b-2 py-4">
                                    <div class="font-semibold text-sm lg:text-lg">
                                        <p>Shipping</p>
                                    </div>
                                    <div class="font-semibold text-sm lg:text-lg">
                                        <p>Will be calculated on checkout page</p>
                                    </div>
                                </div>
                                <div class="flex justify-between border-b-2 py-4">
                                    <div class="font-semibold text-lg">
                                        <p>Total</p>
                                    </div>
                                    <div class="font-semibold text-lg">
                                        <p>RM {{number_format($total,2)}}</p>
                                    </div>
                                </div>

                                <div class="flex justify-center my-6">
                                    <a href="product/buy"
                                        class="w-full flex items-center justify-center px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500">
                                        <p>Proceed to checkout</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <! -- End Checkout -->
                    </div>
                </div>
            </div>
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
        if (value > 1) {
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
        if (value < 10) {
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