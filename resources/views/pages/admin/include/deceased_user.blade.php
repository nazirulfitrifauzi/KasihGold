<div class="mt-6">
    <label for="profile_pic" class="flex text-sm font-medium leading-5 text-gray-700">
        Death Certificate
    </label>
    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('death_cert') border-red-500 @enderror border-dashed rounded-md cursor-pointer"
        style="display: block;">
        @if(isset($lists->deceased->doc_name))
            <div>
                <div class="flex justify-center">
                    {{ $lists->deceased->doc_name }}
                </div>
                <div class="flex justify-center mt-3">
                    <button
                        type="button"
                        class="flex px-4 py-2 text-sm font-bold text-white bg-red-500 rounded focus:outline-none hover:bg-red-400"
                        onclick="deleteIcFront({{ $lists->id }})">
                        Delete
                    </button>
                    <x-popup.delete-profile name="deleteIcFront" variable="id" posturl="{{ url('/profile/ic_front/') }}/" successText="Your IC Front has been deleted!" failText="Your IC Front has not been deleted!" redirectUrl="{{ url('/profile') }}"/>
                </div>
            </div>
        @else
            @if ($death_cert)
                <div class="flex justify-center">
                    {{ $death_cert->temporaryUrl() }}
                </div>
                <div class="flex justify-center mt-3">
                    <button type="button" class="flex px-4 py-2 text-sm font-bold text-white bg-red-500 rounded focus:outline-none hover:bg-red-400" wire:click="clearIcFront">
                        Remove
                    </button>
                </div>
            @else
                <div class="flex text-center" id="death_cert-div">
                    <div class="cursor-pointer group">
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
                            Upload the user's death Certificate here.
                        </p>
                        <p class="mt-1 text-xs text-gray-500">
                            PDF format only | Max Size: 5MB
                        </p>
                        @error('death_cert')
                        <p class="mt-4 text-xs italic text-red-500">
                            Supporting Document (Death Certificate) is required
                        </p>
                        @enderror
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>