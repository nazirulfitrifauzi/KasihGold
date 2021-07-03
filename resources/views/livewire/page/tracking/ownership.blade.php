<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Ownership
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="flex col-span-12 lg:col-span-6 xxl:col-span-6 lg:block">
            <x-general.card class="bg-white shadow-lg">
                <x-form.basic-form wire:submit.prevent="submit">
                    <x-slot name="content">
                        <div class="flex py-2">
                            <div class="w-full">
                                <x-form.input label="" placeholder="Insert Serial No here..." value="" wire:model="serial_no"/>
                            </div>
                            <button type="submit"
                                class="flex items-center h-8 px-4 py-1 mt-2 ml-2 text-sm font-bold text-white bg-green-600 rounded focus:outline-none hover:bg-green-500">
                                Search
                            </button>
                        </div>
                    </x-slot>
                </x-form.basic-form>

                @if ($list != "")
                    <div class="px-4 py-2">
                        <div class="flex flex-col items-center mb-8 intro-y sm:flex-row">
                            <h2 class="mr-auto text-lg font-medium">
                                Ownership Tracking for {{ $serial_no }}
                            </h2>
                        </div>
                        <ul class="-mb-8">
                            @foreach ($list as $item)
                                {{-- @dump($item->user->profile->code) --}}
                                <x-feeds.feeds
                                    title="{{ $item->user->name }} {{ ($loop->first) ? '' : '('.$item->user->profile->code.')' }}"
                                    date="{{ $item->created_at->format('d F Y') }}"
                                    iconBg="{{ ($loop->last) ? 'green' : 'blue' }}"
                                    line="{{ ($loop->last) ? 'no' : 'yes' }}">
                                    <x-slot name="icon">
                                        <x-heroicon-s-home class="w-5 h-5 text-white" />
                                    </x-slot>
                                </x-feeds.feeds>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </x-general.card>
        </div>
    </div>
</div>
