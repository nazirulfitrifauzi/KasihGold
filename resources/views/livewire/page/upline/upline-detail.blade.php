<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Upline Details
        </h2>
    </div>
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 mt-8">

        <x-general.card-tab class="text-white bg-yellow-400 rounded-lg">
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
        </x-general.card-tab>
    </x-general.grid>
</div>
