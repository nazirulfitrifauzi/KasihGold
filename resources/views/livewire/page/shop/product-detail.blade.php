<div>
    @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
    @elseif (session('info'))
        <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}"/>
    @elseif (session('success'))
        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
    @elseif (session('warning'))
        <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}"/>
    @endif
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
            <div class="container px-4 py-6 border-2 rounded-lg">
                <div class="flex flex-col -mx-4 md:flex-row">
                    <!-Start detail of image -->
                    <div class="px-4 md:flex-1">
                        <div x-data="{imageUrl: '{{ asset('img/gold/'.$info->prod_img1) }}'}" x-cloak>
                            <div class="h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                                <div class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                                    <img id="main" :src="imageUrl" class="object-contain w-full h-full bg-cover" />
                                </div>
                            </div>
                            @if (auth()->user()->isUserKG()) <!-- bukan agent kg -->
                            <div class="grid grid-cols-4 gap-6 mt-6 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                                <button class="flex items-center justify-center w-full h-24 bg-gray-100 rounded-lg focus:outline-none md:h-32">
                                    <img src="{{ asset('img/gold/'.$info->prod_img1) }}"
                                        class="object-contain w-full h-full bg-cover"
                                        @click="imageUrl = '{{ asset('img/gold/'.$info->prod_img1) }}'"
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
                        @if (auth()->user()->client != 2)
                        <p class="text-sm text-gray-500">By
                            <span class="text-yellow-400">{{$userInfo->name}}</span>
                        </p>
                        @endif
                        <div class="flex items-center my-4 space-x-4">
                            <div>
                                <div class="flex px-3 py-2 bg-gray-100 rounded-lg">
                                    @if(auth()->user()->isAgentKAP())
                                        <span class="text-xl font-bold text-yellow-400">
                                            RM {{ number_format(($info->item->marketPrice->price - $info->item->commissionKAP->agent_rate),2) }}
                                        </span>
                                    @else
                                        <span class="text-xl font-bold text-yellow-400">RM {{ number_format($info->item->marketPrice->price,2) }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="flex-1">
                                <p class="text-xl font-semibold text-green-500">Save 12%</p>
                                <p class="text-sm text-gray-400">Inclusive of all Taxes.</p>
                            </div> --}}
                        </div>
                        <p class="text-gray-500">{{$info->prod_desc}}
                        </p>
                        <x-form.basic-form wire:submit.prevent="buy">
                            <x-slot name="content">
                                <div class="flex flex-col py-4 space-x-0 lg:flex-row lg:space-x-4">
                                    <div class="relative mb-4 lg:mb-0 ">
                                        <div>
                                            <select value="prod_qty" wire:model="prod_qty" default="yes"
                                                class="flex items-start pt-5 pb-1 pl-4 pr-8 border border-gray-200 appearance-none cursor-pointer rounded-xl h-14">
                                                @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div
                                            class="absolute top-0 block px-4 py-1 text-xs font-semibold tracking-wide text-center text-gray-400 uppercase">
                                            Qty
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button type="button" @if ($prod_qty==null) wire:click="buyNow({{1}})" @else wire:click="buyNow({{$prod_qty}})" @endif
                                            class="px-2 py-2 font-semibold text-white bg-green-400 h-14 rounded-xl hover:bg-green-300 focus:outline-none">
                                            Buy Now
                                        </button>
                                        <button type="button" @if ($prod_qty==null) wire:click="addCart({{1}})" @else wire:click="addCart({{$prod_qty}})" @endif
                                            class="px-2 py-2 ml-2 font-semibold text-white bg-yellow-400 h-14 rounded-xl hover:bg-yellow-300 focus:outline-none">
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