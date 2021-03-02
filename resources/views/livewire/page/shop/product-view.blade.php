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
                {{-- <div class="w-64">
                    <x-form.dropdown label="Category" value="" default="yes">
                        <option value="" selected>Gold 0.25g</option>
                        <option value="">Gold 0.5g</option>
                        <option value="">Gold 1.0g</option>
                        <option value="">Gold 1.5g</option>
                    </x-form.dropdown>
                </div> --}}
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <a  href="{{route('product-detail',['id'=>2])}}" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden cursor-pointer hover:shadow-2xl">
                        <div class="flex h-56 w-full bg-cover"
                            style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq_Dst9k3LDWfrpfwYbzOQMkNJqHEptIMFOw&usqp=CAU')">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase font-semibold text-xl">Gold 0.25g</h3>
                            <span class="text-yellow-400 mt-2 font-semibold text-lg">RM 100.00</span>
                        </div>
                    </a> 

                    {{-- <a  href="#" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden cursor-pointer hover:shadow-2xl">
                        <div class="flex h-56 w-full bg-cover"
                            style="background-image: url('https://instabio.cdn.fotoee.com/20200923/05493425598?imageView2/2/w/240/h/240/q/100')">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase font-semibold text-xl">Gold 1.5g</h3>
                            <span class="text-yellow-400 mt-2 font-semibold text-lg">RM 180.00</span>
                        </div>
                    </a> 
                    <a  href="#" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden cursor-pointer hover:shadow-2xl">
                        <div class="flex h-56 w-full bg-cover"
                            style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS92G4nBb4rsdK5EJhutPz_n3biNd6ia8LOyQ&usqp=CAU')">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase font-semibold text-xl">Gold 2.5g</h3>
                            <span class="text-yellow-400 mt-2 font-semibold text-lg">RM 250.00</span>
                        </div>
                    </a> 
                    <a  href="#" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden cursor-pointer hover:shadow-2xl">
                        <div class="flex h-56 w-full bg-cover"
                            style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_AnWR195G0gl2OtQRaqeYpLYKNwxBpRGK-w&usqp=CAU')">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase font-semibold text-xl">Dinar</h3>
                            <span class="text-yellow-400 mt-2 font-semibold text-lg">RM 400.00</span>
                        </div>
                    </a>  --}}
                    
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
