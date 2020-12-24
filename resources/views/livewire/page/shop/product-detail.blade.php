<div>
    <div class="py-6 bg-white my-10">
        <div class="w-full px-4 sm:px-6 lg:px-8 mt-1">

            <header x-data="{ cartOpen: false , isOpen: false }" x-cloak>
                <div class="px-1 mb-8">
                    <div class="flex justify-between">
                        <div class="w-full text-gray-700 md:text-2xl font-semibold">
                            Product Detail
                        </div>
                        <div class="flex items-center justify-end w-full relative">
                            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                                <span 
                                class="absolute inline-block w-6 h-6 transform translate-x-1 -translate-y-1 bg-red-600 border-2 
                                border-white rounded-full text-sm text-white items-center">1
                                </span>
                                <x-heroicon-o-shopping-cart class="h-8 w-8" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- start view cart -->
                <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
                    class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                            <x-heroicon-o-x class="h-6 w-6" />
                        </button>
                    </div>
                    <hr class="my-3">
                    <div class="mt-6">
                        <div class="flex">
                            <img class="h-20 w-20 object-cover rounded"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_AnWR195G0gl2OtQRaqeYpLYKNwxBpRGK-w&usqp=CAU"
                                alt="">
                            <div class="mx-3">
                                <h3 class="text-sm text-gray-600 font-semibold">Gold 0.25g</h3>
                                <span class="text-yellow-400 font-semibold">RM 180.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End view cart -->

            </header>

            <div class="flex flex-col md:flex-row -mx-4">

                <!-Start detail of image -->
                <div class="md:flex-1 px-4">
                    <div x-data="{imageUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_AnWR195G0gl2OtQRaqeYpLYKNwxBpRGK-w&usqp=CAU'}" x-cloak>
                        <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                            <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                <img id="main" :src="imageUrl" class="h-full w-full bg-cover" />
                            </div>
                        </div>
                        <div class="grid gap-6 grid-cols-4 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 mt-6">
                            <button class=" focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_AnWR195G0gl2OtQRaqeYpLYKNwxBpRGK-w&usqp=CAU" 
                                    class="h-full w-full bg-cover"
                                    @click="imageUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_AnWR195G0gl2OtQRaqeYpLYKNwxBpRGK-w&usqp=CAU'" 
                                    />
                            </button>
                            <button
                                class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                <img src="https://waqafa.com/wp-content/uploads/2020/08/116432621_3774400585909391_2839691980544145634_o.jpg" 
                                    class="h-full w-full bg-cover"
                                    @click="imageUrl = 'https://waqafa.com/wp-content/uploads/2020/08/116432621_3774400585909391_2839691980544145634_o.jpg'" 
                                    />
                            </button>
                            <button
                                class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                <img src="https://www.kasihgold.com/wp-content/uploads/2020/06/waqf-1dinar-300x225.png" 
                                    class="h-full w-full bg-cover"
                                    @click="imageUrl = 'https://www.kasihgold.com/wp-content/uploads/2020/06/waqf-1dinar-300x225.png'" 
                                    />
                            </button>
                            <button
                                class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcebMx0HroJXmjcu18fRUwhPU0fYxgD1dxVw&usqp=CAU" 
                                    class="h-full w-full bg-cover"
                                    @click="imageUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcebMx0HroJXmjcu18fRUwhPU0fYxgD1dxVw&usqp=CAU'" 
                                    />
                            </button>
                        </div>
                    </div>
                </div>
                <!--End detail of image -->

                <!--Start detail for buying -->
                <div class="mt-8 lg:flex-1 px-4 md:mt-0">
                    <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">Gold 0.25g</h2>
                    <p class="text-gray-500 text-sm">By 
                        <span class="text-yellow-400">Hq Kasih Gold</span>
                    </p>
                    <div class="flex items-center space-x-4 my-4">
                        <div>
                            <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                                <span class="font-bold text-yellow-400 text-xl">RM 180.00</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-green-500 text-xl font-semibold">Save 12%</p>
                            <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
                        </div>
                    </div>
                    <p class="text-gray-500">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Vitae
                        exercitationem porro saepe ea harum corrupti vero id laudantium enim, libero blanditiis expedita
                        cupiditate a est.
                    </p>
                    <div class="flex py-4 space-x-4">
                        <div class="relative">
                            <div
                                class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">
                                Qty</div>
                            <select
                                class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                            <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                        <div class="flex">
                            <button type="button"
                                class="h-14 px-6 py-2 font-semibold rounded-xl bg-green-400 hover:bg-green-300 text-white focus:outline-none">
                                Buy Now
                            </button>
                            <button type="button" @click="cartOpen = !cartOpen"
                                class="ml-2 h-14 px-6 py-2 font-semibold rounded-xl bg-yellow-400 hover:bg-yellow-300 text-white focus:outline-none">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!--End detail for buying -->
                
            </div>
        </div>
    </div>
</div>