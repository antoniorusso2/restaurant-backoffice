<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">

        {{-- dishes --}}
        <x-dashboard-dropdown :list="$dishes" :type="'dishes'" :name="'Piatti'" />

        {{-- categories --}}
        <x-dashboard-dropdown :list="$categories" :type="'categories'" :name="'Categorie'" />

        {{-- ingredients --}}
        <x-dashboard-dropdown :list="$ingredients" :type="'ingredients'" :name="'Ingredienti'" />

    </div>
</x-app-layout>
