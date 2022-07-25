<style>
    input:checked ~ .dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }
    input:checked ~ .body {
        background-color: #9fecbf;
    }
</style>
<div class="flex items-center w-full">

    <label for="toggle" class="flex items-center cursor-pointer">
        <div class="relative">
            <input {{ $attributes }} type="checkbox" id="toggle" class="sr-only">
            <div class="block h-8 bg-gray-200 rounded-full w-14 body"></div>
            <div class="absolute w-6 h-6 transition bg-white rounded-full shadow-lg s dot left-1 top-1"></div>
        </div>
        <div class="ml-3 font-medium text-gray-700">
            {{ $label }}
        </div>
    </label>
</div>
