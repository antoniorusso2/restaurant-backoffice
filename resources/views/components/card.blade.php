{{-- @dd($item::class) --}}

@php

@endphp

<div class="card p-4 border rounded-md min-h-56 flex flex-col">

    <div class="card-head">
        <h3 class="text-2xl font-semibold">{{ $item->name }}</h3>
    </div>
    <div class="card-body flex-grow flex flex-col items-start">
        <x-ui.anchor-btn :href="$item->getShowRoute($item)" :classes="'mt-auto self-end'">
            <x-slot name="text">Dettagli</x-slot>
        </x-ui.anchor-btn>

        {{-- {{ $item->getRoutes($item, 'show') }} </div> --}}
    </div>

</div>
