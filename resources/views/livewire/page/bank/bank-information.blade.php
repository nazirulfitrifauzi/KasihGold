<div class="">
    <div class="bg-white rounded-lg">
        <main class="my-8 py-6 px-4">
            <div class="container mx-auto">
                <h3 class="text-gray-700 text-2xl font-medium">Bank Information</h3>
                <div class="flex flex-col lg:flex-row mt-2">
                    <div class="w-full lg:w-1/2 order-2">
                        <x-form.basic-form >
                            <x-slot name="content">
                                <div class="pb-8">
                                    <div class="lg:w-full">
                                        <div>
                                            <div class="mt-4">
                                                <div class="flex items-center justify-between w-full bg-white border  p-4 focus:outline-none">
                                                    <label class="flex items-center">
                                                            <span class="ml-2 text-base text-gray-700">Bank Information</span>
                                                    </label>
                                                </div>
                                                <div class="overflow-hidden bg-white">
                                                    <div class="border-2 px-4 py-4">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                                    <x-form.dropdown label="Bank" default="no" value="">
                                                                        <option value="0">Choose Bank</option>
                                                                        <option value="1" selected>Maybank</option>
                                                                        <option value="2">CIMB</option>
                                                                        <option value="3">Affin Bank</option>
                                                                        <option value="4">RHB</option>
                                                                        <option value="5">Hong Leong Bank</option>
                                                                        <option value="6">HSBC Bank</option>
                                                                        <option value="7">AmBank</option>
                                                                        <option value="8">Standard Chartered Bank</option>
                                                                        <option value="9">Public Bank</option>
                                                                        <option value="10">Alliance Bank</option>
                                                                        <option value="11">Agro Bank</option>
                                                                        <option value="12">Bank Muamalat</option>
                                                                        <option value="13">UOB</option>
                                                                        <option value="14">OCBC Bank</option>
                                                                        <option value="15">Exim Bank</option>
                                                                    </x-form.dropdown>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Swift Code
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="PMFAUS66"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account No
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="1210014610727"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account Holder Name
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="Client AP"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold leading-5 text-gray-700">
                                                                            Bank Account ID (IC or others ID registered with bank)
                                                                        </label>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input value="971212104088"
                                                                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 "
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center justify-end mt-2">
                                                                    <button class="flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600 focus:outline-none">
                                                                        <x-heroicon-o-clipboard-check class="w-5 h-5 mr-2" />
                                                                        <span>CONFIRM</span>
                                                                    </button>
                                                                </div>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </x-slot>
                        </x-form.basic-form>
                    </div>
                    <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2 mt-4">
                        <div class="flex justify-center lg:justify-end">
                            <div class="border  max-w-md w-full px-4 py-3">
                                <div class="flex items-center justify-between">
                                    
                                    <h3 class="text-gray-700 font-medium">Order total </h3>
                                </div>

                                
                                    
                                <div class="flex justify-between mt-6 border-b-2 pb-4">
                                    <div class="flex">
                                        <img class="h-20 w-20 object-cover rounded"
                                            src=""
                                            alt="">
                                        <div class="mx-3 my-3">
                                            <h3 class="text-sm text-gray-600"></h3>
                                        </div>
                                    </div>
                                    <span class="font-semibold text-gray-600 my-3">RM </span>
                                </div>
                                <x-form.basic-form wire:submit.prevent="">
                                    <x-slot name="content">
                                        <div class=" mt-6 border-b-2 pb-4">
                                            <x-form.input label="Gift card or discount code" value=""  />
                                            <button class="flex items-center px-3 py-2 my-auto bg-indigo-500 text-white text-sm font-medium rounded-md hover:bg-indigo-600 focus:outline-none">
                                                <x-heroicon-o-badge-check class="w-5 h-5 mr-2" />
                                                <span>Apply</span>
                                        </button>
                                        </div>
                                    </x-slot>
                                </x-form.basic-form>

                                <div class="mt-6 border-b-2 pb-4">
                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Subtotal</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>RM </p>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div class="text-gray-500">
                                            <p>Shipping</p>
                                        </div>
                                        <div class="font-semibold">
                                            <p>RM 0.00</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between mt-6 border-b-2 pb-4">
                                    <div class="font-semibold">
                                        <p>Total</p>
                                    </div>
                                    <div class="font-semibold text-lg">
                                        <p>RM </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</div>>
