<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xxl:col-span-4">
    <x-stacked.stacked-list title="Announcements" class="">
        <li class="px-2 py-5 bg-white hover:bg-gray-100"  x-data="{ modalOpen: false}">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500" @click="modalOpen = true">
                <h3 class="text-sm font-semibold text-gray-800" >
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        Office closed on July 2nd
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut
                    earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus.
                    Nihil ex tempora neque cum consectetur dolores.
                </p>
            </div>
            <!-- Start modal details -->
            <x-general.modal2 modalActive="modalOpen" title="Announcements" modalSize="lg" headerbg="blue-500" closeBtn="yes">
                <x-slot name="icon">
                    <x-heroicon-s-information-circle class="w-8 h-8 mr-1" />
                </x-slot>
                <div class="p-6">
                    <h1 class="pb-2 text-lg font-semibold">
                        <span class="flex items-center text-blue-500">
                            <x-heroicon-o-calendar class="w-5 h-5 mr-2" />
                            Office closed on July 2nd
                        </span>
                    </h1>
                    <p class="text-base text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting
                        Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut
                        earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus.
                        Nihil ex tempora neque cum consectetur dolores.
                    </p>
                </div>
            </x-general.modal2>
            <!-- End modal details -->
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        New password policy
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Alias inventore ut autem optio voluptas et repellendus. Facere totam
                    quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                    maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                    natus. Est sit autem mollitia.
                </p>
            </div>
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        Office closed on July 2nd
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Tenetur libero voluptatem rerum occaecati qui est molestiae
                    exercitationem. Voluptate quisquam iure assumenda consequatur ex et
                    recusandae. Alias consectetur voluptatibus. Accusamus a ab dicta et.
                    Consequatur quis dignissimos voluptatem nisi.
                </p>
            </div>
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        New password policy
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Alias inventore ut autem optio voluptas et repellendus. Facere totam
                    quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                    maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                    natus. Est sit autem mollitia.
                </p>
            </div>
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        New password policy
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Alias inventore ut autem optio voluptas et repellendus. Facere totam
                    quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                    maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                    natus. Est sit autem mollitia.
                </p>
            </div>
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        New password policy
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Alias inventore ut autem optio voluptas et repellendus. Facere totam
                    quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                    maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                    natus. Est sit autem mollitia.
                </p>
            </div>
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        New password policy
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Alias inventore ut autem optio voluptas et repellendus. Facere totam
                    quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                    maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                    natus. Est sit autem mollitia.
                </p>
            </div>
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        New password policy
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
                    Alias inventore ut autem optio voluptas et repellendus. Facere totam
                    quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus
                    maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel
                    natus. Est sit autem mollitia.
                </p>
            </div>
        </li>

        <li class="px-2 py-5 bg-white hover:bg-gray-100">
            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                <h3 class="text-sm font-semibold text-gray-800">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        New password policy
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-600 truncate line-clamp-2">
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
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none hover:bg-blue-500 hover:text-white">
                    View all
                </a>
            </div>
        </x-slot>
    </x-stacked.stacked-list>
</div>