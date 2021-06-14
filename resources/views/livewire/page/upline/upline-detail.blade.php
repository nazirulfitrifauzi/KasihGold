<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Upline Details
        </h2>
    </div>
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 mt-8">

        {{-- <x-general.card-tab class="text-white bg-yellow-400 rounded-lg">
            <div class="text-base font-bold text-white">
                <div class="flex justify-between">
                    <p>NAME OF INTRODUCER</p>
                    <x-heroicon-o-user class="w-8 h-8" />
                </div>
                <p class="text-sm">{{ auth()->user()->upline->user->name }}</p>
            </div>
        </x-general.card-tab>
        <x-general.card-tab class="text-white bg-yellow-400 rounded-lg">
            <div class="text-base font-bold text-white">
                <div class="flex justify-between">
                    <p>UPLINE CONTACT NUMBERR</p>
                    <x-heroicon-o-phone class="w-8 h-8" />
                </div>
                <p class="text-sm">{{ auth()->user()->upline->user->profile->phone1 }}</p>
            </div>
        </x-general.card-tab>
        <x-general.card-tab class="text-white bg-yellow-400 rounded-lg">
            <div class="text-base font-bold text-white">
                <div class="flex justify-between">
                    <p>UPLINE AGENT ID</p>
                    <x-heroicon-o-identification class="w-8 h-8" />
                </div>
                <p class="text-sm"> {{ auth()->user()->upline->user->profile->code }}</p>
            </div>
        </x-general.card-tab> --}}

        <div class="flex flex-col  bg-white shadow rounded-lg">
            <div class="w-full flex justify-center items-center rounded-t-lg" style="height:13rem; background-image: url({{ asset('img/upline.jpg') }}); ">
                <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40" >
                    <img src="https://image.flaticon.com/icons/png/512/149/149071.png"
                        alt="" class="h-full w-full">
                </div>
            </div>
            <div class="bg-gray-800 py-2 px-4 text-white font-semibold flex items-center space-x-2 ">
                <x-heroicon-o-collection class="w-6 h-6" />
                <h2 class="">
                    Upline Details
                </h2>
            </div>
            <div class="py-4">
                <div class="py-2 px-4">
                    <div class="flex space-x-2">
                        <h2 class="font-bold text-sm">NAME OF INTRODUCER</h2>
                    </div>
                    <div>
                        <h6 class="text-sm font-normal">{{ auth()->user()->upline->user->name }}</h6>
                    </div>
                </div>
                <div class="py-2 px-4">
                    <div>
                        <h2 class="font-bold text-sm">UPLINE CONTACT NUMBER</h2>
                    </div>
                    <div>
                        <h6 class="text-sm font-normal">{{ auth()->user()->upline->user->profile->phone1 }}</h6>
                    </div>
                </div>
                <div class="py-2 px-4">
                    <div>
                        <h2 class="font-bold text-sm">UPLINE AGENT ID</h2>
                    </div>
                    <div>
                        <h6 class="text-sm font-normal">{{ auth()->user()->upline->user->profile->code }}</h6>
                    </div>
                </div>
            </div>

        </div>
    </x-general.grid>
</div>
