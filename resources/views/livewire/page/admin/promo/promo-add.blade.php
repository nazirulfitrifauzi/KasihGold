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
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Add Promotion
        </h2>
    </div>

    <div class="p-4 mt-1 mb-20 bg-white sm:mb-0">
        <x-general.grid mobile="1" gap="3" sm="1" md="1" lg="1" xl="1" class="col-span-6">
        <x-general.card class="w-full bg-white shadow-lg">
            <div class="px-6 py-4">
                <x-form.basic-form wire:submit.prevent="save">
                    <x-slot name="content">
                        <x-general.grid mobile="1" gap="3" sm="1" md="2" lg="2" xl="2" class="col-span-6">
                            <x-form.dropdown label="Type" wire:model="type" default="no" value="type">
                                <option value="0">Choose type</option>
                                <option value="1">Price Promotion</option>
                                <option value="2">Comission Promotion</option>
                            </x-form.dropdown>
                            <x-form.input label="Name" wire:model.defer="name" value="name" />
                            <x-form.input label="Start Date" type="date" wire:model.defer="start_date" value="start_date" />
                            <x-form.input label="End Date" type="date" wire:model.defer="end_date" value="end_date" />
                            @if ($type == 1)
                                <x-form.dropdown label="Type" wire:model.defer="item_id" default="no" value="item_id">
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </x-form.dropdown>
                                <x-form.input label="Promo Price" wire:model.defer="promo_price" value="promo_price" />
                            @elseif($type == 2)
                                <x-form.input label="Promo Code" wire:model.defer="promo_code" value="promo_code" />
                            @endif
                        </x-general.grid>

                        <x-general.grid mobile="1" gap="3" sm="1" md="1" lg="1" xl="1" class="col-span-6 pb-4 mt-4">
                            <x-form.text-area label="Promotion Description" name="" id="" data-feature="all" rows="8"  wire:model.defer="description" value="description" />
                        </x-general.grid>

                        <div class="flex justify-center mt-6 space-x-2 ">
                            <a href="{{ route('admin.list-promotion') }}" class="flex px-4 py-2 text-sm font-bold text-white bg-red-600 rounded focus:outline-none hover:bg-red-500">
                                Cancel
                            </a>
                            <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                Submit
                            </button>
                        </div>
                    </x-slot>
                </x-form.basic-form>
            </div>
        </x-general.card>
        </x-general.grid>
    </div>
</div>