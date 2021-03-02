<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">

        <h2 class="flex mr-auto text-lg font-medium">
            Stock Management
            <span class="flex items-center mx-2 cursor-pointer" x-data="{ openModal: false}">
                <x-heroicon-o-plus-circle class="w-6 h-6 text-green-400 hover:text-green-500" @click="openModal = true"/>
                {{-- Start modal --}}
                    <x-general.modal modalActive="openModal" title="Stock Management" modalSize="2xl">
                        {{-- <div>
                            <x-form.basic-form wire:submit.prevent="">
                                <x-slot name="content">
                                    <div class="p-4 leading-4">
                                        <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                            <x-form.input label="Category Name" value="addCategoryName" wire:model="addCategoryName" />
                                        </div>
                                        <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                            <x-form.input label="Type Name" value="addTypeName" wire:model="addTypeName" />
                                            <x-form.input label="Type Brand" value="addTypeBrand" wire:model="addTypeBrand" />
                                            <x-form.input label="Type Purity" value="addTypePurity" wire:model="addTypePurity" />
                                        </div>
                                        <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                            <x-form.input label="Item Name" value="addItemName" wire:model="addItemName" />
                                        </div>
                                        <div class="flex justify-end mt-4">
                                            <button
                                                class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-form.basic-form>

                        </div> --}}
                        <div x-data="{ active: 0 }">
                            <div class="flex w-full my-2 bg-gray-100 shadow-sm">
                                <x-tab.nav-tab name="0" livewire="">
                                    <div class="flex font-medium">
                                        <x-heroicon-o-clipboard-list class="w-6 h-6 mr-2"/>Category
                                    </div>
                                </x-tab.nav-tab>
                                <x-tab.nav-tab name="1" livewire="">
                                    <div class="flex font-medium">
                                        <x-heroicon-o-clipboard-list class="w-6 h-6 mr-2"/>Type
                                    </div>
                                </x-tab.nav-tab>
                                <x-tab.nav-tab name="2" livewire="">
                                    <div class="flex font-medium">
                                        <x-heroicon-o-clipboard-list class="w-6 h-6 mr-2"/>Item
                                    </div>
                                </x-tab.nav-tab>
                            </div>
                            <!-- Start Add Category -->
                            <x-tab.nav-content name="0">
                                <x-form.basic-form wire:submit.prevent="addCategory">
                                    <x-slot name="content">
                                        <div class="p-4 leading-4">
                                            <div class="grid gap-2 lg:grid-cols-1 sm:grid-cols-1">
                                                <x-form.input  label="Name" value="addCategoryName" wire:model="addCategoryName"/>
                                            </div>
                                            <div class="flex justify-end mt-4">
                                                <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </x-slot>
                                </x-form.basic-form>
                            </x-tab.nav-content>
                            <!-- End Add Category -->

                            <!-- Start Add Type -->
                            <x-tab.nav-content name="1">
                                <x-form.basic-form wire:submit.prevent="addType">
                                    <x-slot name="content">
                                        <div class="p-4 leading-4">
                                            <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                                <x-form.dropdown label="Category" default="yes" value="addTypeCategoryId" wire:model="addTypeCategoryId">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </x-form.dropdown>
                                                <x-form.input label="Name" value="addTypeName" wire:model="addTypeName"/>
                                                <x-form.input label="Brand" value="addTypeBrand" wire:model="addTypeBrand"/>
                                                <x-form.input label="Purity" value="addTypePurity" wire:model="addTypePurity"/>
                                            </div>
                                            <div class="flex justify-end mt-4">
                                                <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </x-slot>
                                </x-form.basic-form>
                            </x-tab.nav-content>
                            <!-- End Add Type -->

                            <!-- Start Add Item -->
                            <x-tab.nav-content name="2">
                                <x-form.basic-form wire:submit.prevent="addItem">
                                    <x-slot name="content">
                                        <div class="p-4 mt-4 leading-4">
                                            <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                                <x-form.dropdown label="Type" value="addItemTypeId" default="yes" wire:model="addItemTypeId">
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }} {{ ($type->brand != null) ? $type->brand : '' }}</option>
                                                    @endforeach
                                                </x-form.dropdown>
                                                <x-form.input label="Name" value="addItemName" wire:model="addItemName" />
                                            </div>
                                            <div class="flex justify-end mt-4">
                                                <button class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </x-slot>
                                </x-form.basic-form>
                            </x-tab.nav-content>
                            <!-- End Add Item -->
                        </div>
                    </x-general.modal>
                {{-- End modal --}}
            </span>
        </h2>

        <div class="flex w-full mt-4 sm:w-auto sm:mt-0" x-data="{ modalOpen: false}">
            <a href="#" class="flex px-4 py-1 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer" @click="modalOpen = true" >
                Stock In/Out
            </a>

            {{-- Start modal Add Items --}}
            <x-general.modal modalActive="modalOpen" title="Stock In/Out" modalSize="2xl">
                <x-form.basic-form wire:submit.prevent="addStockInOut">
                    <x-slot name="content">
                        <div class="p-4 mt-4 leading-4">
                            <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-2">
                                <x-form.dropdown label="Status" default="yes" value="stockStatus" wire:model="stockStatus">
                                    <option value="1">In</option>
                                    <option value="2">Out</option>
                                </x-form.dropdown>
                                @if($stockStatus == 1) <!-- stock in -->
                                    <x-form.dropdown label="Item" value="stockItem" default="yes" wire:model="stockItem">
                                        @foreach ($stockItems as $stockItem)
                                            <option value="{{ $stockItem->id }}">{{ $stockItem->name }} - {{ $stockItem->type->name }}</option>
                                        @endforeach
                                    </x-form.dropdown>
                                @elseif($stockStatus == 2) <!-- stock out -->
                                    <x-form.dropdown label="Item" value="stockItem" default="yes" wire:model="stockItem">
                                        @foreach ($stockMasters as $stockMaster)
                                            <option value="{{ $stockMaster->serial_no }}">{{ $stockMaster->serial_no }} - {{ $stockMaster->item->name }} ({{ $stockMaster->item->type->name }})</option>
                                        @endforeach
                                    </x-form.dropdown>
                                @endif

                                @if(auth()->user()->role == 1 && $stockStatus == 1) <!-- if admin and stock in -->
                                    <x-form.dropdown label="Supplier" value="stockSupplier" default="yes" wire:model="stockSupplier">
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </x-form.dropdown>
                                @endif

                                @if((auth()->user()->role == 1 && $stockStatus == 2) || auth()->user()->role != 1) <!-- if admin and stock out -->
                                    {{-- <x-form.input label="Customer Name" value="stockCustId" wire:model="stockCustId" /> --}}
                                    <x-form.dropdown label="Customer" value="stockCustId" default="yes" wire:model="stockCustId">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </x-form.dropdown>
                                @endif

                                {{-- <x-form.input label="Unit" value="stockUnit" wire:model="stockUnit" /> --}}
                                <x-form.input label="Serial Number / Ref Number" value="stockSerial" wire:model="stockSerial"/>
                                <x-form.input type="date" label="Shipment Date" value="stockShipDate" wire:model="stockShipDate"/>
                                <x-form.input label="Tracking Number" value="stockTrackingNo" wire:model="stockTrackingNo"/>
                                {{-- <x-form.input label="Total Out" value="stockTotalOut" wire:model="stockTotalOut"/> --}}

                            </div>
                            <x-form.text-area label="Remarks" value="stockRemarks" wire:model="stockRemarks" rows="2" />
                            <div class="flex justify-end mt-4">
                                <button class="flex px-4 py-2 mr-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none" @click="modalOpen = false" >
                                    Cancel
                                </button>
                                <button class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </x-slot>
                </x-form.basic-form>
            </x-general.modal>
            {{-- End Modal Add Items --}}
        </div>
    </div>

    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
        @include('pages.stock.category')

        @if ($categoryId != null)
            @include('pages.stock.type')
        @endif

        @if ($typeId != null)
            @include('pages.stock.item')
        @endif

        @if ($itemId != null)
            @include('pages.stock.master')
        @endif
    </div>

    {{-- loading --}}
        {{-- <div wire:loading wire:target="submit">
            <x-loading.global-loading />
        </div> --}}
</div>
