<div>
    <div class="-mt-52">
        <div class="grid grid-cols-12 gap-6">
            @if (session('success'))
            <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}" />
            @endif
            <div class="grid grid-cols-12 col-span-12 gap-6">
                <div class="col-span-12 mt-8">
                    <div class="flex items-center">
                        <div>
                            <h2 class="mr-5 text-4xl font-bold text-white" id="lblGreetings"></h2>
                            <p class="text-sm text-white" id="getDate"></p>
                        </div>
                        @if (session('error'))
                        <x-toaster.error title="{{ session('title') }}" message="{{ session('message') }}" />
                        @elseif (session('info'))
                        <x-toaster.info title="{{ session('title') }}" message="{{ session('message') }}" />
                        @elseif (session('success'))
                        <x-toaster.success title="{{ session('title') }}" message="{{ session('message') }}" />
                        @elseif (session('warning'))
                        <x-toaster.warning title="{{ session('title') }}" message="{{ session('message') }}" />
                        @endif
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-10">
                        <x-dashboard.info-card-user bg="white" title="Digital Gold" value="4.510 G" iconColor='yellow'
                            cardRoute="{{route('digital-gold')}}">
                            <x-slot name="svg">
                                <x-heroicon-o-desktop-computer class="text-white h-8 w-8" />
                            </x-slot>
                        </x-dashboard.info-card-user>
                        <x-dashboard.info-card-user bg="white" title="Physical Gold" value="5.510 G" iconColor='teal'
                            cardRoute="{{route('physical-gold')}}">
                            <x-slot name="svg">
                                <x-heroicon-o-user class="text-white h-8 w-8" />
                            </x-slot>
                        </x-dashboard.info-card-user>
                        <x-dashboard.info-card-user bg="white" title="" value="Purchase History" iconColor='pink'
                            cardRoute="{{route('purchase-history')}}">
                            <x-slot name="svg">
                                <x-heroicon-o-clipboard-copy class="text-white h-8 w-8" />
                            </x-slot>
                        </x-dashboard.info-card-user>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                    <div class="grid grid-cols-12 gap-6">
                        <x-stacked.stacked-list headerTitle="News" title="Announcements" class="col-span-12 lg:col-span-6 xxl:col-span-6">
                            <li class="py-5"  x-data="{ modalOpen: false}">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500" @click="modalOpen = true">
                                    <h3 class="text-sm font-semibold text-gray-800" >
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            Office closed on July 2nd
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut
                                        earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus.
                                        Nihil ex tempora neque cum consectetur dolores.
                                    </p>
                                </div>
                                <!-- Start modal details -->
                                <x-general.modal2 modalActive="modalOpen" title="Announcements" modalSize="lg" headerbg="yellow-400" closeBtn="yes">
                                    <x-slot name="icon">
                                        <x-heroicon-s-information-circle class="w-8 h-8 mr-1" />
                                    </x-slot>
                                    <div class="p-6">
                                        <h1 class="font-semibold text-lg pb-2">
                                            <span class="flex items-center text-yellow-500">
                                                <x-heroicon-o-calendar class="h-5 w-5 mr-2" />
                                                Office closed on July 2nd
                                            </span>
                                        </h1>
                                        <p class="text-gray-600 text-base">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut
                                            earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus.
                                            Nihil ex tempora neque cum consectetur dolores.
                                        </p>
                                    </div>
                                </x-general.modal2>
                                <!-- End modal details -->
                            </li>
                            <li class="py-5">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            New password policy
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Alias inventore ut autem optio voluptas et repellendus. Facere totam
                                        quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                                        maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                                        natus. Est sit autem mollitia.
                                    </p>
                                </div>
                            </li>

                            <li class="py-5">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            Office closed on July 2nd
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Tenetur libero voluptatem rerum occaecati qui est molestiae
                                        exercitationem. Voluptate quisquam iure assumenda consequatur ex et
                                        recusandae. Alias consectetur voluptatibus. Accusamus a ab dicta et.
                                        Consequatur quis dignissimos voluptatem nisi.
                                    </p>
                                </div>
                            </li>

                            <li class="py-5">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            New password policy
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Alias inventore ut autem optio voluptas et repellendus. Facere totam
                                        quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                                        maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                                        natus. Est sit autem mollitia.
                                    </p>
                                </div>
                            </li>
                            <li class="py-5">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            New password policy
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Alias inventore ut autem optio voluptas et repellendus. Facere totam
                                        quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                                        maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                                        natus. Est sit autem mollitia.
                                    </p>
                                </div>
                            </li>
                            <li class="py-5">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            New password policy
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Alias inventore ut autem optio voluptas et repellendus. Facere totam
                                        quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                                        maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                                        natus. Est sit autem mollitia.
                                    </p>
                                </div>
                            </li>
                            <li class="py-5">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            New password policy
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Alias inventore ut autem optio voluptas et repellendus. Facere totam
                                        quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                                        maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                                        natus. Est sit autem mollitia.
                                    </p>
                                </div>
                            </li>
                            <li class="py-5">
                                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                        <a href="#" class="hover:underline focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            New password policy
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2 truncate">
                                        Alias inventore ut autem optio voluptas et repellendus. Facere totam
                                        quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                                        maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                                        natus. Est sit autem mollitia.
                                    </p>
                                </div>
                            </li>
                            <x-slot name="button">
                                <div class="mt-6">
                                    <a href="{{route('all-news')}}"  
                                        class="focus:outline-none w-full flex justify-center items-center px-4 py-2 
                                        border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        View all
                                    </a>
                                </div>
                            </x-slot>
                        </x-stacked.stacked-list>
                        <div class="flex justify-start col-span-12 lg:col-span-6 xxl:col-span-6 lg:block z-20"
                            style="max-height: 54rem;">
                            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            <script type="text/javascript">
                                new TradingView.widget({
                                    "autosize": true,
                                    "symbol": "TVC:GOLD",
                                    "timezone": "Asia/Singapore",
                                    "theme": "dark",
                                    "style": "1",
                                    "locale": "en",
                                    "toolbar_bg": "#f1f3f6",
                                    "enable_publishing": false,
                                    "range": "ALL",
                                    "allow_symbol_change": true,
                                    "container_id": "tradingview_61970"
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>