<x-app-layout>
    <div class="container">
        <div class="flex gap-4 w-full justify-start flex-wrap">
            <a class="btn special" href="{{ route('ingredients.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('ingredients.edit', $ingredient) }}">Modifica</a>

            {{-- delete --}}
            <button class="btn special delete md:ms-auto" id="modal-trigger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-ingredient-deletion')">Elimina</button>
        </div>
    </div>

    <div class="container">
        <h1 class="text-4xl">{{ $ingredient->name }}</h1>
        <p class="text-thin mt-8">- {{ $ingredient->description }}</p>
    </div>

    {{-- modal --}}
    <x-modal name="confirm-ingredient-deletion" focusable>
        <form method="post" action="{{ route('ingredients.destroy', $ingredient) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Sei sicuro di voler erliminare questo ingrediente?
            </h2>

            <p class="mt-1 text-sm font-semibold text-rose-600 uppercase">
                Una volta eliminato non sarà più disponibile!
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
