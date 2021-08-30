<div class="mt-6">
    <label for="profile_pic" class="flex text-sm font-medium leading-5 text-gray-700">
        IC Copy (Front)
    </label>
    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('ic_front') border-red-500 @enderror border-dashed rounded-md cursor-pointer"
        style="display: block;">
        @if(isset(auth()->user()->profile->ic_front))
            <div class="flex" x-data="{ open: false }">
                <div class="justify-center">
                    <span class="inline-flex rounded-md shadow-sm">
                        <a href="{{ asset(auth()->user()->profile->ic_front) }}"
                            target="_blank" type="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            View/Download
                        </a>
                    </span>
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700"
                            @click.prevent="open = true">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Delete
                        </button>
                    </span>
                </div>

                {{-- delete gambar modal --}}
                {{-- end delete gambar modal --}}
            </div>
        @else
            @if ($ic_front)
                <div class="flex justify-center">
                    <img src="{{ $ic_front->temporaryUrl() }}">
                </div>
                <div class="flex justify-center mt-3">
                    <button type="button" class="flex px-4 py-2 text-sm font-bold text-white bg-red-500 rounded focus:outline-none hover:bg-red-400" wire:click="clearIcFront">
                        Remove
                    </button>
                </div>
            @else
                <div class="text-center" id="ic_front-div">
                    <input type="file" wire:model.lazy="ic_front" name="ic_front" id="ic_front" class="hidden" />
                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none"
                        viewBox="0 0 48 48">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="mt-1 text-sm text-gray-600">
                        <a
                            class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                            Upload
                        </a>
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        Upload the front side of your IC here.
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        JPG format only | Max Size: 5MB
                    </p>
                    @error('ic_front')
                    <p class="mt-4 text-xs italic text-red-500">
                        Supporting Document (NRIC-front) is required
                    </p>
                    @enderror
                </div>
            @endif
        @endif
    </div>
</div>

@push('js')
<script>
    $("#ic_front-div").click(function (event) {
        if (!$(event.target).is('#ic_front')) {
            $(this).find("#ic_front").trigger('click');
        }
    });
</script>
@endpush