<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Stock Management
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
                                <x-form.dropdown label="Category" default="yes" value="stockCategory" wire:model="stockCategory">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </x-form.dropdown>
                                <x-form.dropdown label="Type" value="stockType" default="yes" wire:model="stockType">
                                    @foreach ($stockTypes as $stockType)
                                        <option value="{{ $stockType->id }}">{{ $stockType->name }} {{ ($stockType->brand != null) ? $stockType->brand : '' }}</option>
                                    @endforeach
                                </x-form.dropdown>
                                <x-form.dropdown label="Item" value="stockItem" default="yes" wire:model="stockItem">
                                    @foreach ($stockItems as $stockItem)
                                        <option value="{{ $stockItem->id }}">{{ $stockItem->name }} - {{ ucwords(strtolower($stockItem->supplier->name)) }} </option>
                                    @endforeach
                                </x-form.dropdown>
                                @if(auth()->user()->role == 1 && $stockStatus == 1) <!-- if admin and stock in -->
                                    <x-form.dropdown label="Supplier" value="stockSupplier" default="yes" wire:model="stockSupplier">
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </x-form.dropdown>
                                @endif

                                @if(auth()->user()->role == 1 && $stockStatus == 2) <!-- if admin and stock out -->
                                    <x-form.input label="Customer Name" value="stockCustId" wire:model="stockCustId" />
                                @elseif(auth()->user()->role != 1)
                                    <x-form.input label="Customer Name" value="stockCustId" wire:model="stockCustId" />
                                @endif

                                <x-form.input label="Unit" value="stockUnit" wire:model="stockUnit" />
                                <x-form.input label="Serial Number / Ref Number" value="stockSerial" wire:model="stockSerial"/>
                                <x-form.input type="date" label="Shipment Date" value="stockShipDate" wire:model="stockShipDate"/>
                                <x-form.input label="Tracking Number" value="stockTrackingNo" wire:model="stockTrackingNo"/>
                                <x-form.input label="Total Out" value="stockTotalOut" wire:model="stockTotalOut"/>
                                <x-form.input label="Remarks" value="stockRemarks" wire:model="stockRemarks"/>
                            </div>
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

        {{-- @if ($itemId != null)
            @include('pages.stock.master')
        @endif --}}
    </div>
</div>
