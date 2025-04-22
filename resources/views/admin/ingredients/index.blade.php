<x-app-layout>
    {{-- @dd($ingredients) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingredienti') }}
        </h2>
    </x-slot>
    <div class="container">

        <a class="btn special" href="{{ route('ingredients.create') }}">Aggiungi nuovo Ingrediente</a>

    </div>

    <div class="container">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            {{-- @dd($ingredients) --}}
            @foreach ($ingredients as $ingredient)
            <x-card :item="$ingredient" :route="route('ingredients.show', $ingredient)" />
            @endforeach
        </div>
    </div>
</x-app-layout>