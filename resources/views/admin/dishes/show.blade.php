<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12 max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
        <div class="w-full">
            <a class="btn special" href="{{ route('dishes.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('dishes.edit', $dish) }}">Modifica</a>
        </div>
        {{-- delete --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('dishes.destroy', $dish) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn special" type="submit">Elimina</button>
            </form>
        </div>
    </div>
    @if ($dish->image)
        <div class="img__wrap py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <img class="w-1/2" src="{{ asset('storage/' . $dish->image) }}" alt=" {{ $dish->name }} anteprima immagine">
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl">{{ $dish->name }}</h1>
            <p class="text-thin mt-8">- {{ $dish->description }}</p>
        </div>
    </div>
</x-app-layout>
