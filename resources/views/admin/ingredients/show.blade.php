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
    <x-delete-modal :type="'ingredient'" :item="$ingredient" action="{{ route('ingredients.destroy', $ingredient) }}" />
</x-app-layout>
