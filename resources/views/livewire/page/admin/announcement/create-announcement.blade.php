<div>
    <div class="flex flex-col items-end sm:items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Create Annoncement
        </h2>
        <a href="{{route('admin.list-announcements')}}" class="cursor-pointer flex items-center px-4 py-1 mt-2 sm:mt-0
            text-sm font-bold text-white bg-yellow-400 rounded  focus:outline-none hover:bg-yellow-300">
            <x-heroicon-o-arrow-circle-left class="w-5 h-5 mr-2 text-white" />
            Anouncement
        </a>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y mb-20 sm:mb-0">
        <div class="col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden bg-white mt-1 shadow-lg">
                <x-form.basic-form wire:submit.prevent="">
                    <x-slot name="content"> 
                        <div class="border border-gray-200 rounded-md px-6 py-2">
                            <div class="mt-5">
                                <x-form.input wire:model="title" name="title" id="title" value="title" label="" type="text" placeholder="Title" />
                            </div>
                            <div class="mt-5">
                                <x-form.text-area label="" value="comment" wire:model="" name="comment" id="" data-feature="all" rows="8"  placeholder="Details"/>
                            </div>
                            <div class="flex justify-center p-2">
                                <button type="submit" class="flex px-4 py-2 text-sm font-bold text-white bg-green-600 rounded cursor-pointer focus:outline-none hover:bg-green-500">Submit</button>
                            </div>
                        </div>
                    </x-slot>
                </x-form.basic-form>
            </div>
        </div>
    </div>
</div>







