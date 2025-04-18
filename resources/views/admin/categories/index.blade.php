<x-app-layout>
    {{-- @dd($categories) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorie') }}
        </h2>
    </x-slot>
    <div class="container">

        <a class="btn special" href="{{ route('categories.create') }}">Crea nuovo Piatto</a>

    </div>

    <div class="container">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg sm:grid xs:flex sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-4">
            @foreach ($categories as $category)
            <x-category-card :category="$category" />
            @endforeach
        </div>
    </div>
</x-app-layout>