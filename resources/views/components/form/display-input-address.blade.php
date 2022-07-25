<div {{ $attributes }}>
    <label class="block text-sm font-semibold leading-5 text-gray-700">
        {{ $label }}
    </label>
    <div class="flex mt-1 rounded-md shadow-sm">
        <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm  sm:leading-5 bg-gray-200 cursor-not-allowed {{ ($address1 == "") ? "italic" : "" }}">
            @if($address1 == "")
                NO DATA
            @else
                {{ $address1 }}
            @endif
        </p>
    </div>

    <div class="flex mt-1 rounded-md shadow-sm">
        <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm  sm:leading-5 bg-gray-200 cursor-not-allowed {{ ($address2 == "") ? "italic" : "" }}">
            @if($address2 == "")
                NO DATA
            @else
                {{ $address2 }}
            @endif
        </p>
    </div>

    @if ($address3 != "")
    <div class="flex mt-1 rounded-md shadow-sm">
        <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm  sm:leading-5 bg-gray-200 cursor-not-allowed {{ ($address3 == "") ? "italic" : "" }}">
            @if($address3 == "")
                NO DATA
            @else
                {{ $address3 }}
            @endif
        </p>
    </div>
    @endif
</div>
<div class="grid gap-2 mt-3 lg:grid-cols-3 sm:grid-cols-1">
    <div>
        <label class="block text-sm font-semibold leading-5 text-gray-700">
            Town
        </label>
        <div class="flex mt-1 rounded-md shadow-sm">
            <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm  sm:leading-5 bg-gray-200 cursor-not-allowed {{ ($town == "") ? "italic" : "" }}">
                @if($town == "")
                NO DATA
            @else
                {{ $town }}
            @endif
            </p>
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold leading-5 text-gray-700">
            Postcode
        </label>
        <div class="flex mt-1 rounded-md shadow-sm">
            <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm  sm:leading-5 bg-gray-200 cursor-not-allowed {{ ($postcode == "") ? "italic" : "" }}">
                @if($postcode == "")
                NO DATA
            @else
                {{ $postcode }}
            @endif
            </p>
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold leading-5 text-gray-700">
            State
        </label>
        <div class="flex mt-1 rounded-md shadow-sm">
            <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm  sm:leading-5 bg-gray-200 cursor-not-allowed {{ ($state == "") ? "italic" : "" }}">
                @if($state == "")
                NO DATA
            @else
                {{ $state }}
            @endif
            </p>
        </div>
    </div>
</div>