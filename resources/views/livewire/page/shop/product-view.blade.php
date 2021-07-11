<div>
    <div x-data="{ cartOpen: false , isOpen: false }" class="my-10 bg-white rounded-lg">
        <header>
            <div class="px-6 py-3">
                <div class="flex justify-between">
                    <div class="w-full font-semibold text-gray-700 md:text-2xl">
                        Product List
                    </div>
                </div>
            </div>
        </header>

        <!-- Start product detail View-->
        <main class="my-4">
            <div class="px-6">
                <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($list as $item)
                    <a  href="{{ route('product-detail',['iid'=>$item->info->id]) }}" class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md cursor-pointer hover:shadow-2xl">
                        <div class="flex w-full h-56 bg-cover"
                            style="background-image: url('{{ asset('img/gold/'.$item->info->prod_img1) }}')">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-xl font-semibold text-gray-700 uppercase">{{$item->info->prod_name}}</h3>
                            @if(auth()->user()->isAgentKAP())
                                <span class="mt-2 text-lg font-semibold text-yellow-400">
                                    RM {{ number_format(($item->marketPrice->price - $item->commissionKAP->agent_rate),2) }}
                                </span>
                            @else
                                <span class="mt-2 text-lg font-semibold text-yellow-400">RM {{number_format($item->marketPrice->price,2)}}</span>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="flex justify-center">
                    <div class="flex mt-8 mb-8 rounded-md">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                    </div>
                </div>
            </div>
        </main>
        <!-- End product detail View-->
    </div>
</div>
