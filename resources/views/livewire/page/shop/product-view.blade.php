<div>
    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white my-10 rounded-lg">
        <header>
            <div class="px-6 py-3">
                <div class="flex justify-between">
                    <div class="w-full text-gray-700 md:text-2xl font-semibold">
                        Product List
                    </div>
                </div>
            </div>
        </header>

        <!-- Start product detail View-->
        <main class="my-4">
            <div class="px-6">
     
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach ($list as $item)
                    {{-- @if (auth()->user()->role == 1 || auth()->user()->role == 5 || auth()->user()->role == 3) --}}

                    <a  href="{{route('product-detail',['iid'=>$item->id])}}" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden cursor-pointer hover:shadow-2xl">
                        <div class="flex h-56 w-full bg-cover"
                            style="background-image: url('{{ asset('img/gold/'.$item->prod_img1) }}')">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase font-semibold text-xl">{{$item->prod_name}}</h3>
                            <span class="text-yellow-400 mt-2 font-semibold text-lg">RM {{number_format($item->prod_price,2)}}</span>
                        </div>
                    </a> 
                    @endforeach
                    
                </div>
                <div class="flex justify-center">
                    <div class="flex rounded-md mt-8 mb-8">
                    {{-- {{ $list->links('pagination::tailwind') }} --}}
                    </div>
                </div>
            </div>
        </main>
        <!-- End product detail View-->
        
    </div>
</div>
