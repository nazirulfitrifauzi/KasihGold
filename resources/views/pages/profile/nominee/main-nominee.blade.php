<x-general.card class="mt-2 bg-white shadow-lg"  x-data="app()" x-cloak>

    <div class="w-full">
        <div x-show.transition="step != 'complete'">
            
            <x-note-card>  
                1. This nomination is only for dealership. Product and etc is not applied.
                <br>
                2. You are required to fill in the details of your nomation to be updated accordingly
            </x-note-card>  

            <!-- Start Top Navigation -->
            <div class="px-4 py-4 border-b-2">
                <div class="flex justify-between"> 
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1 text-base font-medium leading-tight">
                            <div x-show="step === 1">
                                <div>Insert Nomination Details (Max. 2)</div>
                            </div>
                            <div x-show="step === 2">
                                <div>Preview and Download</div>
                            </div>
                            <div x-show="step === 3">
                                <div>Upload and Submit</div>
                            </div>
                        </div>
                    </div>
                    @if (count($nomineeList) < 2)
                        <div class="mb-1 text-xs font-bold leading-tight tracking-wide text-gray-500 uppercase" x-text="`Step: ${step} of 3`"></div>
                    @else
                        <button type="button" class="px-4 py-2 text-sm font-semibold tracking-wider text-black transition duration-300 ease-in-out bg-gray-300 rounded-lg hover:bg-gray-400" wire:click="resetNominee">Reset Nominee</button>
                    @endif
                </div>
            </div>
            <!-- End Top Navigation -->

            <!-- Start Step Content -->
            <div class="px-4 py-4">	
                <div x-show.transition.in="step === 1">
                    @include('pages.profile.nominee.insert-nominee')
                </div>
                <div x-show.transition.in="step === 2">
                    @include('pages.profile.nominee.download-nominee')
                </div>
                <div x-show.transition.in="step === 3">
                    @include('pages.profile.nominee.upload-nominee')
                </div>
            </div>
            <!-- Step Content -->
        </div>

        <!-- Start Button -->
        <div class="flex justify-between">
            <div class="w-1/2">
                <button x-show="step > 1" @click="step--"
                        class="w-32 px-5 py-2 text-center bg-gray-200 rounded-lg focus:outline-none hover:bg-gray-300 " 
                    >Back
                </button>
            </div>
            <div class="w-1/2 text-right">
                @if (Storage::exists('public/nominee/' . auth()->user()->id) == false)
                    <button x-show="step < 3" @click="step++"
                        class="w-32 px-5 py-2 text-center text-white bg-yellow-400 rounded-lg shadow-sm focus:outline-none hover:bg-yellow-300" 
                        >Next
                    </button>
                    <button x-show="step === 3" 
                        class="w-32 px-5 py-2 text-center text-white bg-yellow-400 rounded-lg shadow-sm focus:outline-none hover:bg-yellow-300" wire:click="nomineeUpload" 
                        >Sumbit
                    </button>
                @endif
            </div>
        </div>
        <!-- End Button -->
    </div>
</x-general.card>

<script>
    function app() {
        return {
            step: 1, 
            togglePassword: false,
        }
    }
</script>