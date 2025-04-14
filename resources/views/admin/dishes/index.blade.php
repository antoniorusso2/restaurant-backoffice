<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="btn special" href="{{ route('dishes.create') }}">Crea nuovo Piatto</a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg sm:grid xs:flex sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($dishes as $dish)
                    <x-dish-card :dish="$dish" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
