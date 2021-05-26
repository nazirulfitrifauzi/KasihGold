<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Digital Gold Details
            </h2>
        </div>

        <div class="p-4 mt-8 bg-white">

            <div class="flex flex-row p-4 mb-10 bg-gray-300 rounded-md shadow-lg">
                <div class="flex items-center justify-center flex-auto ">
                    <x-gold.goldview type="1g" percentage="25"/>
                </div>
                <div class="flex flex-col flex-auto mr-5">
                    <h1 class="text-base font-bold">My Gold</h1>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Total Grams</p>
                                        <p class="text-lg">RM 500.00</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Total Price Bought</p>
                                        <p class="text-lg">RM 300.00</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-yellow-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-currency-dollar class="w-8 h-8 text-yellow-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Total Price Now</p>
                                        <p class="text-lg">RM 200.00</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                </div>
                <div class="flex flex-col flex-auto " x-data="{ openModal1: false, openModal2: false}">
                    <h1 class="text-base font-bold">Exit / Sell</h1>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal1 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-refresh class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Change Physical</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg" @click="openModal2 = true">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-cash class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Outright</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>
                    <x-general.price-card  class="text-white bg-red-400 rounded-lg">
                        <div class="text-base font-bold text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="flex px-4 py-4 bg-white rounded-full item-center">
                                        <x-heroicon-o-library class="w-8 h-8 text-red-400" />
                                    </div>
                                    <div class="text-xl">
                                        <p>Buy Back</p>
                                    </div>
                                </div>
                            </div>
                    </x-general.price-card>

                    {{-- Start modal 1--}}
                        <x-general.new-modal modalName="openModal1" size="xl">
                            <div>
                                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-blue-100 rounded-full">
                                    <x-heroicon-o-refresh class="w-6 h-6 text-blue-600" />
                                </div>

                                <div class="mt-3 text-center sm:mt-5">
                                    <h1 class="text-lg font-bold">Change to Physical Gold</h1>
                                    <div class="mt-2">
                                        <div>
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Your Gold</h3>
                                            <p class="text-sm text-gray-500">
                                                0.51 gram
                                            </p>
                                    </div>
                                        <div class="px-20 py-5">
                                            <fieldset>
                                                <div class="-space-y-px bg-white rounded-md" x-data="{ isOn1:false, isOn2: false }">
                                                    <label
                                                        @click="isOn1 = true, isOn2 = false"
                                                        :aria-checked="isOn1"
                                                        :class="{'bg-indigo-50 border-indigo-200 z-10': isOn1, 'border-gray-200': !isOn1 }"
                                                        class="relative flex p-4 border border-gray-200 cursor-pointer rounded-tl-md rounded-tr-md">
                                                        <input type="radio" name="privacy_setting" value="Private to Project Members" class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="privacy-setting-1-label" aria-describedby="privacy-setting-1-description">
                                                        <div class="flex flex-col ml-3">
                                                            <span
                                                            @click="isOn1 = true, isOn2 = false"
                                                            :aria-checked="isOn1"
                                                            :class="{'text-indigo-900': isOn1, 'text-gray-900': !isOn1 }"
                                                            id="privacy-setting-1-label" class="block text-sm font-medium text-gray-900">
                                                                0.25 gram physical
                                                            </span>
                                                            <span
                                                                @click="isOn1 = true, isOn2 = false"
                                                                :aria-checked="isOn1"
                                                                :class="{'text-indigo-700': isOn1, 'text-gray-500': !isOn1 }"
                                                                id="privacy-setting-1-description" class="block text-sm text-gray-500">
                                                                Your digital gold is enough for this change.
                                                            </span>
                                                        </div>
                                                    </label>
                                                    <label
                                                        @click="isOn2 = true, isOn1 = false"
                                                        :aria-checked="isOn2"
                                                        :class="{'bg-red-50 border-red-200 z-10': isOn2, 'border-gray-200': !isOn2 }"
                                                        class="relative flex p-4 border border-gray-200 cursor-pointer rounded-bl-md rounded-br-md">
                                                        <input disabled type="radio" name="privacy_setting" value="Private to you" class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="privacy-setting-2-label" aria-describedby="privacy-setting-2-description">
                                                        <div class="flex flex-col ml-3">
                                                            <span
                                                                @click="isOn2 = true, isOn1 = false"
                                                                :aria-checked="isOn2"
                                                                :class="{'text-red-900': isOn2, 'text-gray-900': !isOn2 }"
                                                                id="privacy-setting-2-label" class="block text-sm font-medium text-gray-900">
                                                            1.0 gram
                                                            </span>
                                                            <span
                                                                @click="isOn2 = true, isOn1 = false"
                                                                :aria-checked="isOn2"
                                                                :class="{'text-red-700': isOn2, 'text-gray-500': !isOn2 }"
                                                                id="privacy-setting-2-description" class="block text-sm text-gray-500">
                                                            Your digital gold is not sufficient for this change.
                                                            </span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-general.new-modal>
                    {{-- End modal 1--}}

                    {{-- Start modal 2--}}
                        <x-general.new-modal modalName="openModal2" size="xl">
                            <div>
                                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
                                    <x-heroicon-o-cash class="w-6 h-6 text-green-600" />
                                </div>

                                <div class="mt-3 text-center sm:mt-5">
                                    <h1 class="text-lg font-bold">Surrender your gold</h1>
                                    <div class="mt-2">
                                        <div>
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Your Gold</h3>
                                            <p class="text-sm text-gray-500">
                                                0.51 gram
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900">Current Price</h3>
                                            <p class="text-sm text-gray-500">
                                                RM 200.00
                                            </p>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-xs italic leading-none text-red-500 ">All your certificate will be revoked onced you submit this request and please allow up to 3 working days to process your payment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-general.new-modal>
                    {{-- End modal 2--}}
                </div>
            </div>

            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="text-left" value="Grams" sort="" />
                    <x-table.table-header class="text-left" value="Price Bought" sort="" />
                    <x-table.table-header class="text-left" value="Price Now" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>2.5g</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 300.00</p>
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                            <p>RM 200.00</p>
                        </x-table.table-body>
                    </tr>
                </x-slot>
                <div class="px-2 py-2">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                </div>
            </x-table.table>
        </div>
    </div>
</div>
