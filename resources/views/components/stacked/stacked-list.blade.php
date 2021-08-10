<!-------------------------------------------- start jgn padam ------------------------------------>

{{-- <div {{ $attributes->merge(['class' => 'relative bg-white shadow-xl rounded-lg']) }}>
    <h1 class="bg-yellow-400 p-4 absolute top-0 w-full text-white rounded-t-lg font-semibold text-lg">{{$headerTitle}}</h1>
    <div class="mt-14 ">
        <h1 class="font-semibold text-lg px-4 py-2">{{$title}}</h1>
    </div>
    <div class="p-4" x-data="{ expanded: false }">
        <div class="h-full ">
            <ul class="-my-5 divide-y divide-gray-200 overflow-hidden "
                x-bind:class="{'max-h-96': !expanded}" x-ref="container"
                x-bind:style="expanded ? 'max-height: ' + $refs.container.offsetHeight + 'px' : ''">
                {{$slot}}
            </ul>
        </div>
        <div class="mt-6">
            <button href="#" @click="expanded = !expanded" x-text="expanded ? 'View less' : 'View all'"
                class="focus:outline-none w-full flex justify-center items-center px-4 py-2 
                border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
            </button>
        </div>
    </div>
</div> --}}

<!-------------------------------------------- end jgn padam ------------------------------------>

<div {{ $attributes->merge(['class' => 'relative bg-white shadow-lg rounded-lg']) }}>
    <div class="mt-10">
        <h1 class="font-semibold text-lg px-6 py-4 bg-blue-500 text-white rounded-t-lg">{{$title}}</h1>
    </div>
    <div class="p-4 mt-2">
        <div class="h-full ">
            <ul class="-mt-4 divide-y divide-gray-200 overflow-hidden" style="max-height: 39.9rem;">
                {{$slot}}
            </ul>
        </div>
        {{$button}}
    </div>
</div>


