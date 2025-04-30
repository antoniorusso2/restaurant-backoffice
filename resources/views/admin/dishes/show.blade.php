<x-app-layout>

    <div class="container">
        <div class="flex gap-4 w-full justify-start flex-wrap">
            <a class="btn special" href="{{ route('dishes.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('dishes.edit', $dish) }}">Modifica</a>

            {{-- delete --}}
            <button class="btn special delete md:ms-auto" id="modal-trigger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-dish-deletion')">Elimina</button>
        </div>
    </div>

    @if ($dish->image)
        <div class="img__wrap container">
            <img class="max-w-xs" src="{{ asset('storage/' . $dish->image) }}" alt=" {{ $dish->name }} anteprima immagine">
            {{-- @dd(asset('storage/' . $dish->image)) --}}
        </div>
    @endif

    <div class="container">
        <div class="title_price flex justify-between items-center">
            <div class="name">
                <h1 class="text-4xl">{{ $dish->name }}</h1>
                <span class="badge rounded-sm px-3 py-1" style="background-color: {{ $dish->category->color }}">{{ $dish->category->name }}</span>
            </div>
            <span class="text-3xl bg-emerald-500 p-2 rounded-md">€ {{ $dish->price }}</span>
        </div>

        <hr class="mt-4">

        <p class="text-thin mt-8">- {{ $dish->description }}</p>
    </div>

    {{-- dishes ingredients --}}
    @if ($dish->ingredients->count() > 0)
        <div class="container">
            <h2 class="text-3xl mb-4">Ingredienti:</h2>
            <ul class="flex flex-col flex-wrap gap-4 ">
                @foreach ($dish->ingredients as $ingredient)
                    <li class="badge">
                        - {{ $ingredient->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- modal --}}
    <x-modal name="confirm-dish-deletion" focusable>
        <form method="post" action="{{ route('dishes.destroy', $dish) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Sei sicuro di voler erliminare questo piatto?
            </h2>

            <p class="mt-1 text-sm font-semibold text-rose-600 uppercase">
                Una volta eliminata non sarà più disponibile!
            </p>

            <div class="mt-6 flex justify-end gap-x-2" x-on:click="$dispatch('close')">
                <button type="button" class="btn special">
                    Annulla
                </button>

                <button class="btn special delete">
                    Elimina
                </button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
