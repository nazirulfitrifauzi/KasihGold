<div>
    <div class="flex flex-col items-end mt-8 sm:items-center intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Create Annoncement
        </h2>
        <a href="{{route('admin.list-announcements')}}" class="flex items-center px-4 py-1 mt-2 text-sm font-bold text-white bg-yellow-400 rounded cursor-pointer sm:mt-0 focus:outline-none hover:bg-yellow-300">
            <x-heroicon-o-arrow-circle-left class="w-5 h-5 mr-2 text-white" />
            Anouncement
        </a>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 mb-20 pos intro-y sm:mb-0">
        <div class="col-span-12 lg:col-span-8">
            <div class="mt-1 overflow-hidden bg-white shadow-lg post intro-y">
                <x-form.basic-form wire:submit.prevent="">
                    <x-slot name="content">
                        <div class="px-6 py-2 border border-gray-200 rounded-md">
                            <div class="mt-5">
                                <x-form.input wire:model.lazy="title" name="title" id="title" value="title" label="" type="text" placeholder="Title" />
                            </div>
                            <div class="mt-5">
                                <x-form.text-area label="" value="description" wire:model.lazy="description" name="description" id="description" data-feature="all" rows="8"  placeholder="Details"/>
                            </div>
                            <div class="flex justify-center p-2">
                                <button wire:click="create" type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded cursor-pointer focus:outline-none hover:bg-green-500">Submit</button>
                            </div>
                        </div>
                    </x-slot>
                </x-form.basic-form>
            </div>
        </div>
    </div>
</div>
