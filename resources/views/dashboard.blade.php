<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('dishes.index') }}">Piatti</a>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('categories.index') }}">Categorie Piatti</a>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('ingredients.index') }}">Ingredienti</a>
            </div>
        </div>
    </div>

</x-app-layout>