@props([
    'title' => '',
])
<div class="">
    <section id="section" class="absolute top-0 bottom-0 left-0 z-10 flex max-w-full md:top-32" aria-labelledby="slide-over-heading">
        <div class="w-screen max-w-md my-20 md:my-0">
            <div class="flex flex-col h-screen py-6 pt-0 overflow-y-auto bg-white shadow-xl animate__animated animate__fadeInLeft md:h-full">
                <div class="relative flex-shrink-0 overflow-hidden bg-yellow-400 ">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative flex items-center p-4">
                        <h2 class="text-base font-semibold text-white uppercase">
                            {{$title}}
                        </h2>
                    </div>
                </div>

                <div class="relative flex-1 mt-6">
                    <!-- Replace with your content -->
                    <div class="px-4 pb-20 sm:px-6 md:pb-10">
                        <div class="h-full pb-8 leading-6 border-2 border-yellow-400" aria-hidden="true">
                        {{$slot}}
                        </div>
                    </div>
                    <!-- /End replace -->
                </div>
            </div>
        </div>
    </section>
</div>