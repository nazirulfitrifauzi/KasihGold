<div>
    <label class="block text-sm font-semibold leading-5 text-gray-700">
        {{ $label }}
    </label>
    <div class="flex mt-1 mb-2 rounded-md shadow-sm">
        <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 bg-gray-200 cursor-not-allowed {{ ($value == "") ? "italic" : "" }}">
            @if($value == "")
                NO DATA
            @else
                {{ $value}}
            @endif
        </p>
    </div>
</div>