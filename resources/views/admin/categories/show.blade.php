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
    <x-delete-modal :type="'category'" :item="$category" action="{{ route('categories.destroy', $category) }}" />
</x-app-layout>
