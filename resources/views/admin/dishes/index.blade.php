<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('I tuoi piatti') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="">
            <a class="btn special" href="{{ route('dishes.create') }}">Crea nuovo Piatto</a>
        </div>
    </div>

    <div class="container">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg sm:grid xs:flex sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($dishes as $dish)
                <x-dish-card :dish="$dish" />
            @endforeach
        </div>
    </div>
</x-app-layout>
