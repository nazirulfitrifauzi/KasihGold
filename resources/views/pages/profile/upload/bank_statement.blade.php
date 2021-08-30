<div class="mt-6">
    <label for="profile_pic" class="flex text-sm font-medium leading-5 text-gray-700">
        Bank Statement
    </label>
    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('bank_statement') border-red-500 @enderror border-dashed rounded-md cursor-pointer"
        style="display: block;">
        @if(isset(auth()->user()->bank->bank_statement))
            <div>
                <div class="flex justify-center">
                    <img src="{{ asset(auth()->user()->bank->bank_statement)}}">
                </div>
                <div class="flex justify-center mt-3">
                    <button
                        type="button"
                        class="flex px-4 py-2 text-sm font-bold text-white bg-red-500 rounded focus:outline-none hover:bg-red-400"
                        onclick="deleteBankStatement({{ auth()->user()->id }})">
                        Delete
                    </button>
                    <x-popup.delete-profile name="deleteBankStatement" variable="id" posturl="{{ url('/profile/bank_statement/') }}/" successText="Your Bank Statement has been deleted!" failText="Your Bank Statement has not been deleted!" redirectUrl="{{ url('/profile') }}"/>
                </div>
            </div>
        @else
            @if ($bank_statement)
                <div class="flex justify-center">
                    <img src="{{ $bank_statement->temporaryUrl() }}">
                </div>
                <div class="flex justify-center mt-3">
                    <button type="button" class="flex px-4 py-2 text-sm font-bold text-white bg-red-500 rounded focus:outline-none hover:bg-red-400" wire:click="clearBankStatement">
                        Remove
                    </button>
                </div>
            @else
                <div class="text-center" id="bank_statement-div">
                    <input type="file" wire:model.lazy="bank_statement" name="bank_statement" id="bank_statement" class="hidden" />
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
                        Upload your bank statement. Make sure your account number is clearly visible.
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        JPG format only | Max Size: 5MB
                    </p>
                    @error('bank_statement')
                    <p class="mt-4 text-xs italic text-red-500">
                        Supporting Document (Bank Statement) is required
                    </p>
                    @enderror
                </div>
            @endif
        @endif
    </div>
</div>

@push('js')
<script>
    $("#bank_statement-div").click(function (event) {
        if (!$(event.target).is('#bank_statement')) {
            $(this).find("#bank_statement").trigger('click');
        }
    });
</script>
@endpush