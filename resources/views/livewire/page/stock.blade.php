<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Stock Management
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
        @include('pages.stock.category')

        @if ($categoryId != null)
            @include('pages.stock.type')
        @endif

        @if ($typeId != null)
            @include('pages.stock.item')
        @endif

        @if ($itemId != null)
            @include('pages.stock.master')
        @endif
    </div>
</div>
