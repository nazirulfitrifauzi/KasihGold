<div {{ $attributes }}>
    <label class="block text-sm font-semibold leading-5 text-gray-700">
        {{ $label }}
    </label>
    <div class="flex mt-1 rounded-md shadow-sm">
        <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
            {{ $address1 }}
        </p>
    </div>

    <div class="flex mt-1 rounded-md shadow-sm">
        <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
            {{ $address2 }}
        </p>
    </div>

    @if ($address3 != "")
    <div class="flex mt-1 rounded-md shadow-sm">
        <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
            {{ $address3 }}
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
            <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                {{ $town }}
            </p>
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold leading-5 text-gray-700">
            Postcode
        </label>
        <div class="flex mt-1 rounded-md shadow-sm">
            <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                {{ $postcode }}
            </p>
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold leading-5 text-gray-700">
            State
        </label>
        <div class="flex mt-1 rounded-md shadow-sm">
            <p class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5">
                {{ $state }}
            </p>
        </div>
    </div>
</div>