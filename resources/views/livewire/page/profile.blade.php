<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Profile
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
    <div class="grid grid-cols-12 gap-6"  x-data="{ active: 0 }">
        <!-- BEGIN: Profile Menu -->
        <div class="flex col-span-12 lg:col-span-12 xxl:col-span-12 lg:block">
            <x-general.card class="w-full mt-5 bg-white shadow-lg">
                <div class="relative flex items-center p-5">
                    <div class="w-20 h-20 image-fit">
                        <img alt="Midone" class="rounded-full" src="https://image.flaticon.com/icons/png/512/149/149071.png">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="text-base font-medium">{{ $name }}</div>
                        <div class="text-gray-600">KAP Code: {{ (auth()->user()->profile != NULL) ? auth()->user()->profile->code : $temp_code }}</div>
                        <div class="text-gray-600">Referral Code: {{ $referral_code }}</div>
                        {{-- @if ($referral_code != "")
                            <button type="button" class="flex px-4 py-2 mt-2 text-sm font-bold text-white bg-blue-500 rounded focus:outline-none hover:bg-blue-400 tooltipbtn" data-title="Click to copy and share your link with referral code." data-placement="right" onclick="copyLink()">
                                <x-heroicon-o-document-duplicate class="w-5 h-5 mr-2" />
                                Referral Link: <input type="text" id="email" class="bg-blue-500 border-none hover:bg-blue-400">
                            </button>
                            <input class="" type="text" value="{{ config('app.url') }}/register/{{ $referral_code  }}" id="myInput">
                        @endif --}}
                    </div>
                </div>
                    <div class="flex flex-col p-4 border-t border-gray-200 sm:flex-row">
                        <x-tab.title name="0" livewire="">
                            <div class="flex font-semibold">
                                <x-heroicon-o-home class="w-6 h-6 mr-2"/>{{ (auth()->user()->type == 1) ? 'Personal Information' : 'Company Information' }}
                            </div>
                        </x-tab.title>
                        <x-tab.title name="1" livewire="">
                            <div class="flex font-semibold">
                                <x-heroicon-o-clipboard-list class="w-6 h-6 mr-2"/>Bank Information
                            </div>
                        </x-tab.title>
                        <x-tab.title name="2" livewire="">
                            <div class="flex font-semibold">
                                <x-heroicon-o-presentation-chart-line class="w-6 h-6 mr-2"/>Nominee
                            </div>
                        </x-tab.title>
                    </div>
            </x-general.card>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <x-tab.content name="0">
                @include('pages.profile.personal-information')
            </x-tab.content>
            <x-tab.content name="1">
                @include('pages.profile.bank-info')
            </x-tab.content>
            <x-tab.content name="2">
                @include('pages.profile.nominee.main-nominee')
            </x-tab.content>
        </div>
    </div>
</div>

<script>
    function copyLink() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        Swal.fire({
            icon: 'success',
            title: 'Copied to clipboard!',
            text: 'Now you can share the link with your client.',
            showConfirmButton: false,
            timer: 2500
        })
    }
</script>