<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg sm:grid xs:flex sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($dishes as $dish)
                    <div class="card h-60 p-5 border-gray-400 border flex flex-col">
                        <div class="card-head">
                            <h3 class="text-2xl font-semibold">{{ $dish->name }}</h3>
                        </div>
                        <div class="card-body flex flex-col h-full text-nowrap">
                            <p class="overflow-hidden text-ellipsis h-25">{{ $dish->description }}</p>
                        </div>
                        <a class="btn special align-self-end max-w-min" href="{{ route('dishes.show', $dish) }}">Dettagli</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
