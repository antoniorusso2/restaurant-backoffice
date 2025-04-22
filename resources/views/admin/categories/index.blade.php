<x-app-layout>
    {{-- @dd($categories) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorie') }}
        </h2>
    </x-slot>
    <div class="container">

        <a class="btn special" href="{{ route('categories.create') }}">Crea nuova Categoria</a>

    </div>

    <div class="container">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            @foreach ($categories as $category)
            <x-card :item="$category" :route="route('categories.show', $category)" />
            @endforeach
        </div>
    </div>
</x-app-layout>