<div {{ $attributes }}>
    @if($label != "")
        <label class="block text-sm font-semibold leading-5 text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1 rounded-md shadow-sm">
        <select class="block w-full transition duration-150 ease-in-out form-select sm:text-sm sm:leading-5">
            @if($default == 'yes')
                <option value="" selected disabled>Select an option</option>
            @endif

            {{ $slot }}
        </select>
    </div>
    @if($value !="" && $errors->has($value)) <p class="text-sm text-red-600">Sila pilih salah satu pilihan diatas</p> @endif
</div>