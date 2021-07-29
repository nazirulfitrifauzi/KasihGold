<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                Withdrawal Request
            </h2>
            @if (session('error'))
                <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('info'))
                <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('success'))
                <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}"/>
            @elseif (session('warning'))
                <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}"/>
            @endif
        </div>

        <div class="p-4 mt-8 bg-white mb-20 sm:mb-0" x-data="{ active: 0 }">
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-12 mb-10">
                <x-cardtab.title name="0" livewire="" bg="pink">
                    <x-slot name="icon">
                        <x-heroicon-o-clipboard-list class="w-10 h-10 text-pink-500"/>
                    </x-slot>
                    <div class="flex justify-center text-center">
                        <div class="mt-1 text-xl font-bold text-white">Outright Sell List </div>
                    </div>
                </x-cardtab.title>

                <x-cardtab.title name="1" livewire="" bg="green">
                    <x-slot name="icon">
                        <x-heroicon-o-login class="w-10 h-10 text-green-400"/>
                    </x-slot>
                    <div class="flex justify-center text-center">
                        <div class="mt-1 text-xl font-bold text-white">Buyback</div>
                    </div>
                </x-cardtab.title>

                <x-cardtab.title name="2" livewire="" bg="indigo">
                    <x-slot name="icon">
                        <x-heroicon-o-presentation-chart-bar class="w-10 h-10 text-indigo-400"/>
                    </x-slot>
                    <div class="flex justify-center text-center">
                        <div class="mt-1 text-xl font-bold text-white">Physical conversion</div>
                    </div>
                </x-cardtab.title>
            </x-general.grid>


            <!--Start Outright -->
            <x-cardtab.content name="0">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 ">
                        <x-table.table>
                            <x-slot name="thead">
                                <x-table.table-header class="text-left" value="No" sort="" />
                                <x-table.table-header class="text-left" value="Name" sort="" />
                                <x-table.table-header class="text-left" value="Email" sort="" />
                                <x-table.table-header class="text-left" value="Surrendered Amount" sort="" />
                                <x-table.table-header class="text-left" value="Applied Date" sort="" />
                                <x-table.table-header class="text-left" value="Approval Status" sort="" />
                                <x-table.table-header class="text-left" value="Action" sort="" />
                            </x-slot>
                            <x-slot name="tbody">
                                @forelse ($outright as $outlist)
                                    <tr>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{ $loop->iteration  }}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$outlist->user->name}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$outlist->user->email}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>RM {{number_format($outlist->surrendered_amount,2)}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$outlist->created_at->format('d-m-Y')}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($outlist->status == 1) ? 'green' : 'yellow'}}-100 text-{{ ($outlist->status == 1) ? 'green' : 'yellow'}}-800">{{ ($outlist->status == 1) ? 'Successful': 'Pending'}}</span>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                            <div class="flex" x-data="{ openShow: false ,  openModal : false}">

                                                <a href="#detail_{{$outlist->id}}" @click="openShow = true"
                                                    class="inline-flex items-center px-4 py-2 mr-1 font-semibold text-white bg-orange-400 rounded-lg hover:bg-orange-500 focus:outline-none">
                                                        <x-heroicon-o-eye class="w-5 h-5 mr-1" />
                                                        Show
                                                </a>

                                                <! -- Start modal Show -->
                                                <x-general.modal modalActive="openShow" title="Electronic Fund Transfer" modalSize="lg">
                                                    <x-form.basic-form >
                                                        <x-slot name="content">
                                                            <div class="p-4 mt-4 leading-4">
                                                                <div class="h-full">
                                                                    <h2 class="text-lg font-bold">Customer Bank Information</h2>
                                                                    <div class="mt-5">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$outlist->user->bank->acc_holder_name}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-5">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$outlist->user->bank->swift_code}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-5">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$outlist->user->bank->acc_no}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <h2 class="mt-5 text-lg font-bold">Surrendered Amount</h2>

                                                                    <div class="mt-3">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="RM {{number_format($outlist->surrendered_amount,2)}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>

                                                                    <h2 class="mt-5 text-lg font-bold">Proof of Transfer</h2>

                                                                    <div class="flex mt-5">
                                                                        <label for="product-img1"
                                                                            class="w-full p-10 text-center {{ ($errors->has('proofdoc')) ? 'bg-red-400  hover:bg-red-500': 'bg-gray-200  hover:bg-gray-300' }} rounded-lg shadow cursor-pointer hover:bg-gray-300 group">
                                                                            @if ($proofdoc)
                                                                                <img src="{{ $proofdoc->temporaryUrl() }}">
                                                                            @else
                                                                                <span
                                                                                    class="inline-flex items-center font-medium {{ ($errors->has('proofdoc')) ? 'text-red-400 ': 'text-gray-600' }} {{ ($errors->has('proofdoc')) ? 'group-hover:text-red-500': 'group-hover:text-gray-700' }}">
                                                                                    <x-heroicon-o-plus-circle class="w-10 h-10 mr-2 {{ ($errors->has('proofdoc')) ? 'text-red-600 ': 'text-yellow-400' }} " />
                                                                                </span>
                                                                            @endif
                                                                        </label>
                                                                        <input type="file" class="absolute invisible pointer-events-none" id="product-img1"
                                                                            name="product-img1" wire:model="proofdoc">
                                                                    </div>
                                                                </div>
                                                                <div class="flex justify-end mt-4">
                                                                    <button wire:click="outApp({{$outlist->id}})" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                                        Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-slot>
                                                    </x-form.basic-form>
                                                </x-general.modal>
                                                <! -- Start modal Show -->


                                                <button  @click="openModal = true"
                                                    class="inline-flex items-center px-4 py-2 mr-1 font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:outline-none">
                                                    <x-heroicon-o-clipboard-list class="w-5 h-5 mr-1" />
                                                    Details
                                                </button>

                                                <! -- Start modal Details -->
                                                <x-general.new-modal modalName="openModal" size="2xl">
                                                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-blue-100 rounded-full">
                                                        <x-heroicon-o-identification class="w-6 h-6 text-blue-600" />
                                                    </div>
                                                    <div class="my-3 text-center sm:mt-5">
                                                        <h1 class="text-lg font-bold">Personal Information</h1>
                                                    </div>
                                                    <div class="px-4 py-4">
                                                        <x-form.basic-form>
                                                            <x-slot name="content">
                                                                <div class="mt-2 overflow-auto leading-4 h-96">
                                                                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                                                        <x-form.input label="KAP Code" value="" disable="true" />
                                                                        <x-form.input label="Membership ID"  value="" disable="true" />

                                                                        <x-form.input label="Name"  value="" />
                                                                        <x-form.input type="email" label="Email Address"  value="" disable="true" />

                                                                        <x-form.input label="New IC"  value="" />
                                                                        <x-form.input label="Old IC" value="" />
                                                                        <x-form.input label="Passport / Foreign ID" value="" />
                                                                        <x-form.input label="Police / Army" value="" />

                                                                        <x-form.input label="Company No"  value="" />

                                                                        <x-form.input label="Phone No" value="" />
                                                                        <x-form.input label="Fax No" value=""/>
                                                                    </div>
                                                                    <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                                        <x-form.address class="" label="Address" value1="" value2="" value3="" value4="" value5="" value6=""  condition=""/>
                                                                    </div>
                                                                </div>
                                                                <div class="grid gap-2 mt-5 lg:grid-cols-2 sm:grid-cols-1">
                                                                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm" @click="openModal = false">
                                                                            Cancel
                                                                    </button>
                                                                    <a href="#" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:col-start-2 sm:text-sm">
                                                                            Submit
                                                                    </a>
                                                                </div>
                                                            </x-slot>
                                                        </x-form.basic-form>
                                                    </div>
                                                </x-general.new-modal>
                                                <! -- End modal Details -->


                                                <button
                                                        class="inline-flex items-center px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none">
                                                    <x-heroicon-o-clipboard-check class="w-5 h-5 mr-1" />
                                                    Approve
                                                </button>

                                            </div>
                                        </x-table.table-body>
                                    </tr>
                                @empty
                                    <tr>
                                        <x-table.table-body colspan="7" class="text-center text-gray-500">
                                            No new outright sell request to be approved
                                        </x-table.table-body>
                                    </tr>
                                @endforelse
                            </x-slot>
                            <div class="px-2 py-2">
                            </div>
                        </x-table.table>
                    </div>
                </div>
            </x-cardtab.content>
            <!-- End Outright -->

            <!--Start Buyback -->
            <x-cardtab.content name="1" x-cloak>
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <x-table.table>
                            <x-slot name="thead">
                                <x-table.table-header class="text-left" value="No" sort="" />
                                <x-table.table-header class="text-left" value="Name" sort="" />
                                <x-table.table-header class="text-left" value="Email" sort="" />
                                <x-table.table-header class="text-left" value="Surrendered Amount" sort="" />
                                <x-table.table-header class="text-left" value="Buyback Price" sort="" />
                                <x-table.table-header class="text-left" value="Applied Date" sort="" />
                                <x-table.table-header class="text-left" value="Approval Status" sort="" />
                                <x-table.table-header class="text-left" value="Action" sort="" />
                            </x-slot>
                            <x-slot name="tbody">
                                @forelse ($buybacks as $buyback)
                                    <tr>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{ $loop->iteration  }}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$buyback->user->name}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$buyback->user->email}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>RM {{number_format($buyback->surrendered_amount,2)}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>RM {{number_format($buyback->buyback_price,2)}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$buyback->created_at->format('d-m-Y')}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($buyback->status == 1) ? 'green' : 'yellow'}}-100 text-{{ ($buyback->status == 1) ? 'green' : 'yellow'}}-800">{{ ($buyback->status == 1) ? 'Successful': 'Pending'}}</span>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                            <div x-data="{ openShow: false}">
                                                <a href="#detail_{{$buyback->id}}" @click="openShow = true"
                                                    class="inline-flex items-center px-4 py-2 font-semibold text-white bg-orange-400 rounded-lg hover:bg-orange-500 focus:outline-none">
                                                    <x-heroicon-o-eye class="w-5 h-5 mr-1" />
                                                    Show
                                                </a>

                                                {{-- Start modal Show --}}
                                                <x-general.modal modalActive="openShow" title="Electronic Fund Transfer" modalSize="lg">
                                                    <x-form.basic-form >
                                                        <x-slot name="content">
                                                            <div class="p-4 mt-4 leading-4">
                                                                <div class="h-full">
                                                                    <h2 class="text-lg font-bold">Customer Bank Information</h2>
                                                                    <div class="mt-5">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$buyback->user->bank->acc_holder_name}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-5">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$buyback->user->bank->swift_code}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-5">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$buyback->user->bank->acc_no}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <h2 class="mt-5 text-lg font-bold">Surrendered Amount</h2>

                                                                    <div class="mt-3">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="RM {{number_format($buyback->surrendered_amount,2)}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <h2 class="mt-5 text-lg font-bold">Buyback Price</h2>

                                                                    <div class="mt-3">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="RM {{number_format($buyback->buyback_price,2)}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>

                                                                    <h2 class="mt-5 text-lg font-bold">Proof of Transfer</h2>

                                                                    <div class="flex mt-5">
                                                                        <label for="product-img1"
                                                                            class="w-full p-10 text-center {{ ($errors->has('proofdoc')) ? 'bg-red-400  hover:bg-red-500': 'bg-gray-200  hover:bg-gray-300' }} rounded-lg shadow cursor-pointer hover:bg-gray-300 group">
                                                                            @if ($proofdoc)
                                                                                <img src="{{ $proofdoc->temporaryUrl() }}">
                                                                            @else
                                                                                <span
                                                                                    class="inline-flex items-center font-medium {{ ($errors->has('proofdoc')) ? 'text-red-400 ': 'text-gray-600' }} {{ ($errors->has('proofdoc')) ? 'group-hover:text-red-500': 'group-hover:text-gray-700' }}">
                                                                                    <x-heroicon-o-plus-circle class="w-10 h-10 mr-2 {{ ($errors->has('proofdoc')) ? 'text-red-600 ': 'text-yellow-400' }} " />
                                                                                </span>
                                                                            @endif
                                                                        </label>
                                                                        <input type="file" class="absolute invisible pointer-events-none" id="product-img1"
                                                                            name="product-img1" wire:model="proofdoc">
                                                                    </div>
                                                                </div>
                                                                <div class="flex justify-end mt-4">
                                                                    <button wire:click="bbApp({{$buyback->id}})" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                                        Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-slot>
                                                    </x-form.basic-form>
                                                </x-general.modal>
                                                {{-- End modal Show --}}
                                            </div>
                                        </x-table.table-body>
                                    </tr>
                                @empty
                                    <tr>
                                        <x-table.table-body colspan="8" class="text-center text-gray-500">
                                            No new buyback request to be approved
                                        </x-table.table-body>
                                    </tr>
                                @endforelse
                            </x-slot>
                        </x-table.table>
                    </div>
                </div>
            </x-cardtab.content>
            <!--End Buyback -->

            <!--Start Physical conversion -->
            <x-cardtab.content name="2" x-cloak>
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <x-table.table>
                            <x-slot name="thead">
                                <x-table.table-header class="text-left" value="No" sort="" />
                                <x-table.table-header class="text-left" value="Name" sort="" />
                                <x-table.table-header class="text-left" value="Email" sort="" />
                                <x-table.table-header class="text-left" value="Amount of 1 Gram" sort="" />
                                <x-table.table-header class="text-left" value="Amount of 0.25 Gram" sort="" />
                                <x-table.table-header class="text-left" value="Applied Date" sort="" />
                                <x-table.table-header class="text-left" value="Approval Status" sort="" />
                                <x-table.table-header class="text-left" value="Action" sort="" />
                            </x-slot>
                            <x-slot name="tbody">
                                @forelse ($physical as $physicals)
                                    <tr>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{ $loop->iteration  }}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$physicals->user->name}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$physicals->user->email}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$physicals->one_gram}} Pcs</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$physicals->quarter_gram}} Pcs</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                            <p>{{$physicals->created_at->format('d-m-Y')}}</p>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700">
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-{{ ($physicals->status == 1) ? 'green' : 'yellow'}}-100 text-{{ ($physicals->status == 1) ? 'green' : 'yellow'}}-800">{{ ($physicals->status == 1) ? 'Successful': 'Pending'}}</span>
                                        </x-table.table-body>
                                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                            <div x-data="{ openShow: false}">
                                                <a href="#detail_{{$physicals->id}}" @click="openShow = true"
                                                    class="inline-flex items-center px-4 py-2 font-semibold text-white bg-orange-400 rounded-lg hover:bg-orange-500 focus:outline-none">
                                                    <x-heroicon-o-eye class="w-5 h-5 mr-1" />
                                                    Show
                                                </a>

                                                {{-- Start modal Show --}}
                                                <x-general.modal modalActive="openShow" title="Physical Conversion" modalSize="lg">
                                                    <x-form.basic-form >
                                                        <x-slot name="content">
                                                            <div class="p-4 mt-4 leading-4">
                                                                <div class="h-full">
                                                                    <h2 class="text-lg font-bold">Customer Information</h2>
                                                                    <label class="block mt-3 text-sm font-semibold leading-5 text-gray-700">
                                                                        Name
                                                                    </label>
                                                                    <div>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$physicals->name}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>

                                                                    <label class="block mt-3 text-sm font-semibold leading-5 text-gray-700">
                                                                        Phone Number
                                                                    </label>
                                                                    <div>
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$physicals->phone1}}"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>

                                                                    <h2 class="mt-5 text-lg font-bold">Amount of 1 Gram</h2>

                                                                    <div class="mt-3">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$physicals->one_gram}} Pcs"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                    <h2 class="mt-5 text-lg font-bold">Amount of 0.25 Gram</h2>

                                                                    <div class="mt-3">
                                                                        <div class="flex mt-1 mb-2 rounded-md shadow-sm">
                                                                            <input disabled type="text" value="{{$physicals->quarter_gram}} Pcs"
                                                                                class="block w-full text-gray-400 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex justify-end mt-4">
                                                                    <button wire:click="pConvApp({{$physicals->id}})" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                                        Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-slot>
                                                    </x-form.basic-form>
                                                </x-general.modal>
                                                {{-- End modal Show --}}
                                            </div>
                                        </x-table.table-body>
                                    </tr>
                                @empty
                                    <tr>
                                        <x-table.table-body colspan="8" class="text-center text-gray-500">
                                            No new physical conversion request to be approved
                                        </x-table.table-body>
                                    </tr>
                                @endforelse
                            </x-slot>
                        </x-table.table>
                    </div>
                </div>
            </x-cardtab.content>
            <!--End Physical conversion -->
        </div>
    </div>
</div>