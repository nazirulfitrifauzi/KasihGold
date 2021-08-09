<div>
    @foreach ($users as $user)
        {{ $user->name }} ({{ $user->email }}) : {{ $user->gold->where('active_ownership',1)->sum('weight') }} <br>
    @endforeach

    <button type="button" wire:click="sendEmail" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Button text
    </button>
</div>
