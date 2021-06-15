<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Upline Details
        </h2>
    </div>
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 mt-8">
        <div class="flex flex-col bg-white rounded-lg shadow">
            <div class="flex items-center justify-center w-full rounded-t-lg" style="height:13rem; background-image: url({{ asset('img/upline.jpg') }}); ">
                <div class="inline-flex w-40 h-40 overflow-hidden border border-gray-200 rounded-full shadow-lg" >
                    <img src="https://image.flaticon.com/icons/png/512/149/149071.png"
                        alt="" class="w-full h-full">
                </div>
            </div>
            <div class="flex items-center px-4 py-2 space-x-2 font-semibold text-white bg-gray-800 ">
                <x-heroicon-o-collection class="w-6 h-6" />
                <h2 class="">
                    Upline Details
                </h2>
            </div>
            <div class="py-4">
                <div class="px-4 py-2">
                    <div class="flex space-x-2">
                        <h2 class="text-sm font-bold">NAME OF INTRODUCER</h2>
                    </div>
                    <div>
                        <h6 class="text-sm font-normal">{{ auth()->user()->upline->user->name }}</h6>
                    </div>
                </div>
                <div class="px-4 py-2">
                    <div>
                        <h2 class="text-sm font-bold">UPLINE CONTACT NUMBER</h2>
                    </div>
                    <div>
                        <h6 class="text-sm font-normal">{{ auth()->user()->upline->user->profile->phone1 }}</h6>
                    </div>
                </div>
                <div class="px-4 py-2">
                    <div>
                        <h2 class="text-sm font-bold">UPLINE AGENT ID</h2>
                    </div>
                    <div>
                        <h6 class="text-sm font-normal">{{ auth()->user()->upline->user->profile->code }}</h6>
                    </div>
                </div>
            </div>

        </div>
    </x-general.grid>
</div>
