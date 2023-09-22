<div>
    <div>
        <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
               Arrahnu Pawn
            </h2>
        </div>
        @if (session('error'))
        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}"/>
        @endif
        <div class="p-4 mt-8 bg-white mb-20 sm:mb-0">
            <x-general.grid mobile="1" gap="5" sm="4" md="4" lg="4" xl="4" class="col-span-6 mb-4">
                <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                    <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-xl">
                                    <p>Total Flexible Gold </p>
                                    <p class="text-lg">{{$total}} g</p>
                                </div>
                            </div>
                        </div>
                </x-general.price-card>
                <x-general.price-card  class="bg-yellow-400 text-white rounded-lg">
                    <div class="font-bold text-base text-white">
                            <div class="flex space-x-4 items-center">
                                <div class="rounded-full py-4 px-4 flex item-center bg-white">
                                    <x-heroicon-o-clipboard-list class="w-8 h-8 text-yellow-400" />
                                </div>
                                <div class="text-xl">
                                    <p>Total Digital Gold</p>
                                    <p class="text-lg">{{$totalD}} g</p>
                                </div>
                            </div>
                        </div>
                </x-general.price-card>
            </x-general.grid>

            <!--Start desktop view-->
            <div class="hidden lg:block">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Product" sort="" />
                        <x-table.table-header class="text-left" value="Grammage (g)" sort="" />
                    </x-slot>
                    <x-slot name="tbody">

                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-3 items-center">
                                    <img class="object-cover w-16 h-16 rounded" 
                                    src="{{ asset('img/product/1/9/d1.png') }}" alt="">
                                    <div>
                                        <h3 class="text-sm font-semibold">Kasih AP Flexible Gold</h3>
                                    </div>
                                </div>
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                    <input type="text"
                                        class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                        hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                        justify-center
                                        text-gray-700 
                                        outline-none"
                                        name="custom-input-number" wire:model="GoldMintGram" >
                                    
                                    </input>
                                </div>
                            </x-table.table-body>
                        </tr>
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex space-x-3 items-center">
                                    <img class="object-cover w-16 h-16 rounded" 
                                    src="{{ asset('img/product/1/9/d1.png') }}" alt="">
                                    <div>
                                        <h3 class="text-sm font-semibold">Kasih AP Digital Gold</h3>
                                    </div>
                                </div>
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                    <input type="text"
                                        class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                        hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                        justify-center
                                        text-gray-700 
                                        outline-none"
                                        name="custom-input-number" wire:model="GoldMintGramD" >
                                    
                                    </input>
                                </div>
                            </x-table.table-body>
                        </tr>
                        

                    </x-slot>
                    <div class="px-2 py-2">
                    </div>
                </x-table.table>
            </div>
            <!--End desktop view-->

            <!--Start Mobile view-->
            <div class="block lg:hidden">
                <div class="border-2 p-4 rounded-md">
                        <div class="border-b-2 py-2">
                            <div class="flex justify-between items-center">
                                <div>
                                    <img class="object-cover w-16 h-16 rounded" 
                                    src="{{ asset('img/product/1/9/d1.png') }}" alt="">
                                    <h3 class="text-sm font-semibold">Kasih AP Gold Wafer</h3>
                                </div>
                                <div class="flex flex-row h-10 w-24 rounded-lg relative bg-transparent mt-1">
                                    <input type="text"
                                        class="focus:outline-none text-center w-full bg-gray-300 font-semibold text-md 
                                        hover:text-black focus:text-black  md:text-basecursor-default flex items-center
                                        justify-center
                                        text-gray-700 
                                        outline-none"
                                        name="custom-input-number" value="" wire:model="GoldMintGram">
                                    </input>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!--End Mobile view-->

           

            <! -- Start Checkout -->
            <x-general.grid mobile="1" gap="8" sm="1" md="2" lg="2" xl="2" class="w-full col-span-12 mt-6">
                <div class="bg-white py-2">
                    <div class="rounded-lg shadow-sm bg-yellow-50">
                        <div class="overflow-hidden text-sm">
                            <table class="w-full divide-y divide-yellow-100">
                                <thead>
                                    <tr>
                                        <th class="p-4 text-left">Produk</th>
                                        <th class="p-4 text-right">Pembiayaan Maksima (RM)</th>
                                        {{-- <th class="p-4 text-right">Keuntungan 1 Bulan (RM)</th>
                                        <th class="p-4 text-right">Keuntungan 18 Bulan (RM)</th> --}}
                                    </tr>
                                </thead>
        
                                <tbody class="divide-y divide-yellow-50">
                                    @foreach ($financing as $row)
                                        <tr>
                                            <td class="p-4 font-semibold">{{ $row['name'] }}</td>
                                            <td class="p-4 font-mono text-right">{{ $row['max_financing'] }}</td>
                                            {{-- <td class="p-4 font-mono text-right">{{ $row['one_month'] }}</td>
                                            <td class="p-4 font-mono text-right">{{ $row['full_month'] }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="bg-white py-2 px-4  rounded-lg  border-2">
                    <div class="border-b-2 py-4">
                        <h1 class="text-3xl font-semibold">Ar-Rahnu Pawn Brief Summary</h1>
                    
                    </div>
                    
                    <div class="flex justify-between border-b-2 py-4">
                        <div class="font-semibold text-lg">
                            <p>Total Collateral Grammage</p>
                        </div>
                        <div class="font-semibold text-lg">
                            <p>{{$GoldMintGram+$GoldMintGramD}} Gram</p>
                        </div>
                    </div>

                
                
                    <div class="flex justify-center my-6">
                        <button type="button" class="w-full flex items-center justify-center px-2 py-2 text-sm font-bold text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500" wire:click="next()">
                            <p>Proceed to checkout</p>
                        </button>
                    </div>
                </div>
            </x-general.grid>
            <! -- End Checkout -->
        </div>
    </div>
</div>


@push('js')
    <script>
       
       window.livewire.on('message', message => {
    alert(message);
})
    </script>
@endpush
