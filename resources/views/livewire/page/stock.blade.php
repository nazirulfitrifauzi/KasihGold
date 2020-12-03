<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Stock Management
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
        <!-- BEGIN: Categories List -->
        @include('pages.stock.category')
        @include('pages.stock.type')
        @include('pages.stock.item')
        @include('pages.stock.master')
        
        {{-- @if ($categoryId != null)
            @include('pages.stock.type')
        @endif
        <!-- BEGIN: Item List -->
        @if ($typeId != null)
            @include('pages.stock.item')
        @endif
        <!-- BEGIN: master List -->
        @if ($itemId != null)
            @include('pages.stock.master')
        @endif --}}
    </div>
</div>
