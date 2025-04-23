<x-app-layout>
    <div class="container">
        <div class="flex gap-4 w-full justify-start flex-wrap">
            <a class="btn special" href="{{ route('categories.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('categories.edit', $category) }}">Modifica</a>

            {{-- delete --}}
            <button class="btn special delete ms-auto" id="modal-trigger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')">Elimina</button>
        </div>
    </div>

    <div class="container">
        <h1 class="text-4xl">{{ $category->name }}</h1>
        <div class="badge my-4 text-xl flex gap-4">
            Colore: <span class="block badge p-3 w-16" style="background-color: {{ $category->color }}"></span>
        </div>
    </div>

    {{-- modal --}}
    <x-modal name="confirm-category-deletion" focusable>
        <form method="post" action="{{ route('categories.destroy', $category) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Sei sicuro di voler erliminare questa categoria?
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
