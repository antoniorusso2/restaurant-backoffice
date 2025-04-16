<x-app-layout>
    <div class="container">
        <h1 class="text-3xl mt-4 text-center">Modifica piatto</h1>
        <form class="flex flex-col my-4 sm:w-full lg:w-1/2 mx-auto justify-center items-start p-4" action="{{ route('dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- delete modal trigger --}}
            {{-- <button class="btn special self-end">
                Elimina
            </button> --}}

            {{-- name --}}
            <label class="" for="name">Nome</label>
            <input class="my-4 text-ellipsis w-full rounded-md" type="text" id="name" name="name" placeholder="Inserisci il nome del piatto" value="{{ $dish->name }}">

            {{-- description --}}
            <label for="description">Descrizione</label>
            <textarea class="mb-4 w-full" name="description" id="description" cols="40" rows="3">{{ $dish->description }}</textarea>

            {{-- img --}}
            <label for="image">Immagine</label>
            <div class="flex items-center flex-wrap justify-between">
                <input class="mb-4" type="file" id="image" name="image">
                @if ($dish->image)
                    <img src="{{ asset('storage/' . $dish->image) }}" alt=" {{ $dish->name }} anteprima immagine" class="w-1/4 h-1/4">
                @endif
            </div>

            {{-- price --}}
            <label for="price" class="block text-sm/6 font-medium">Prezzo</label>
            <div class="flex items-center justify-center w-full">
                <input type="number" name="price" id="price" class="w-full block" value="{{ $dish->price }}">
            </div>

            {{-- submit --}}
            <button class="btn special self-end" type="submit">Invia</button>
        </form>
    </div>
</x-app-layout>
