<div>
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Stock Management {{ auth()->user()->isAdmin() }}
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 pos intro-y">
        @include('pages.stock.category')
        @include('pages.stock.type')
        @include('pages.stock.item')
        @include('pages.stock.master')
    </div>
</div>
