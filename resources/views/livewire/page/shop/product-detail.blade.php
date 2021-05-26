<div>
    <div class="py-6 my-10 bg-white">
        <div class="w-full px-4 mt-1 sm:px-6 lg:px-8">
            <div class="px-1 mb-8">
                <div class="flex justify-between">
                    <div class="font-semibold text-gray-700 md:text-2xl">
                        Product Detail
                    </div>
                    <div>
                        <a href="{{route('product-view')}}" class="flex items-center px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer focus:outline-none hover:bg-yellow-300">
                            <x-heroicon-o-arrow-circle-left class="w-5 h-5 mr-2 text-white" />
                            Product List
                        </a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="flex flex-col -mx-4 md:flex-row">
                    <!-Start detail of image -->
                    <div class="px-4 md:flex-1">
                        <div x-data="{imageUrl: '{{ asset('storage/'.$info->prod_img1) }}'}" x-cloak>
                            <div class="h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                                <div class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                                    <img id="main" :src="imageUrl" class="object-contain w-full h-full bg-cover" />
                                </div>
                            </div>
                            @if (auth()->user()->role != '3')
                            <div class="grid grid-cols-4 gap-6 mt-6 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                                <button class="flex items-center justify-center w-full h-24 bg-gray-100 rounded-lg focus:outline-none md:h-32">
                                    <img src="{{ asset('storage/'.$info->prod_img1) }}"
                                        class="object-contain w-full h-full bg-cover"
                                        @click="imageUrl = '{{ asset('storage/'.$info->prod_img1) }}'"
                                        />
                                </button>
                                <button
                                    class="flex items-center justify-center w-full h-24 bg-gray-100 rounded-lg focus:outline-none md:h-32">
                                    <img src="{{ asset('storage/'.$info->prod_img2) }}"
                                        class="object-contain w-full h-full bg-cover"
                                        @click="imageUrl = '{{ asset('storage/'.$info->prod_img2) }}'"
                                        />
                                </button>
                                <button
                                    class="flex items-center justify-center w-full h-24 bg-gray-100 rounded-lg focus:outline-none md:h-32">
                                    <img src="{{ asset('storage/'.$info->prod_img3) }}"
                                        class="object-contain w-full h-full bg-cover"
                                        @click="imageUrl = '{{ asset('storage/'.$info->prod_img3) }}'"
                                        />
                                </button>
                                <button
                                    class="flex items-center justify-center w-full h-24 bg-gray-100 rounded-lg focus:outline-none md:h-32">
                                    <img src="{{ asset('storage/'.$info->prod_img4) }}"
                                        class="object-contain w-full h-full bg-cover"
                                        @click="imageUrl = '{{ asset('storage/'.$info->prod_img4) }}'"
                                        />
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!--End detail of image -->

                    <!--Start detail for buying -->
                    <div class="px-4 mt-8 lg:flex-1 md:mt-0">
                        <h2 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-800 md:text-3xl">{{$info->prod_name}}</h2>
                        @if (auth()->user()->role != '3')
                        <p class="text-sm text-gray-500">By
                            <span class="text-yellow-400">{{$userInfo->name}}</span>
                        </p>
                        @endif
                        <div class="flex items-center my-4 space-x-4">
                            <div>
                                <div class="flex px-3 py-2 bg-gray-100 rounded-lg">
                                    <span class="text-xl font-bold text-yellow-400">RM {{$info->prod_price}}</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-xl font-semibold text-green-500">Save 12%</p>
                                <p class="text-sm text-gray-400">Inclusive of all Taxes.</p>
                            </div>
                        </div>
                        <p class="text-gray-500">{{$info->prod_desc}}
                        </p>
                        <x-form.basic-form wire:submit.prevent="buy">
                            <x-slot name="content">
                                <div class="flex py-4 space-x-4">
                                    <div class="relative">
                                        <div>
                                            <select value="prod_qty" wire:model="prod_qty" default="yes"
                                                class="flex items-end pt-5 pb-1 pl-4 pr-8 border border-gray-200 appearance-none cursor-pointer rounded-xl h-14">
                                                @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>

                                            <svg class="absolute bottom-0 right-0 w-5 h-5 mb-2 mr-2 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                            </svg>
                                        </div>
                                        <div
                                            class="absolute top-0 block px-4 py-1 text-xs font-semibold tracking-wide text-center text-gray-400 uppercase">
                                            Qty
                                        </div>
                                    </div>

                                    <div class="flex">
                                        <button type="button" @if ($prod_qty==null) wire:click="buyNow({{1}})" @else wire:click="buyNow({{$prod_qty}})" @endif
                                            class="h-14 px-6 py-2 font-semibold rounded-xl bg-green-400 hover:bg-green-300 text-white focus:outline-none">
                                            Buy Now
                                        </button>
                                        <button type="button" @if ($prod_qty==null) wire:click="addCart({{1}})" @else wire:click="addCart({{$prod_qty}})" @endif
                                            class="ml-2 h-14 px-6 py-2 font-semibold rounded-xl bg-yellow-400 hover:bg-yellow-300 text-white focus:outline-none">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </x-slot>
                        </x-form.basic-form>
                    </div>
                    <!--End detail for buying -->

                </div>
            </div>
        </div>
    </div>
</div>