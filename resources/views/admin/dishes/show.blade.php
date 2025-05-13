<x-app-layout>

    <div class="container">
        <div class="flex w-full flex-wrap justify-start gap-4">
            <a class="btn special" href="{{ route('dishes.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('dishes.edit', $dish) }}">Modifica</a>

            {{-- delete --}}
            <button
                class="btn special delete md:ms-auto"
                id="modal-trigger"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-dish-deletion')"
            >Elimina</button>
        </div>
    </div>

    @if ($dish->image)
        <div class="img__wrap container">
            <img
                class="max-w-xs"
                src="{{ asset('storage/' . $dish->image) }}"
                alt=" {{ $dish->name }} anteprima immagine"
            >
            {{-- @dd(asset('storage/' . $dish->image)) --}}
        </div>
    @endif

    <div class="container">
        <div class="title_price flex items-center justify-between">
            <div class="name">
                <h1 class="text-4xl mb-2">{{ $dish->name }}</h1>
                <span class="badge rounded-sm px-3 py-1" style="background-color: {{ $dish->category->color }}">{{ $dish->category->name }}</span>
            </div>
            <span class="rounded-md bg-emerald-500 p-2 text-3xl">€ {{ $dish->price }}</span>
        </div>

        <hr class="mt-4">

        <p class="text-thin mt-8">- {{ $dish->description }}</p>
    </div>

    {{-- dishes ingredients --}}
    @if ($dish->ingredients->count() > 0)
        <div class="container">
            <h2 class="mb-4 text-3xl">Ingredienti:</h2>
            <ul class="flex flex-col flex-wrap gap-4">
                @foreach ($dish->ingredients as $ingredient)
                    <li class="badge my-2">
                        - {{ $ingredient->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-delete-modal
        :item="$dish"
        :type="'dish'"
        action="{{ route('dishes.destroy', $dish) }}"
    />
</x-app-layout>
