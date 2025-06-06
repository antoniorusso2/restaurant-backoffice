<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('I tuoi piatti') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="flex flex-col sm:flex-row justify-between items-start">
            <a class="btn special" href="{{ route('dishes.create') }}">Crea nuovo Piatto</a>
            {{-- <x-select-items-per-page
                action="{{ route('dishes.index') }}"
                :limits="[4, 8, 12]"
                :selected="$dishes->perPage()"
            /> --}}

            <x-items-per-page
                action="{{ route('dishes.index') }}"
                :limits="[4, 8, 12]"
                :selected="$dishes->perPage()"
            />
        </div>
    </div>

    <div class="container">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            @if (count($dishes) == 0)
                <div class="no-content">
                    Nessun piatto trovato
                </div>
            @endif
            @foreach ($dishes as $dish)
                <x-card :item="$dish" :route="route('dishes.show', $dish)" />
            @endforeach
        </div>

        {{ $dishes->links() }}
    </div>
</x-app-layout>
