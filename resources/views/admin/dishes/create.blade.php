{{-- @dd('sei nella create') --}}

<x-app-layout>
    <div class="container">
        <h1 class="text-3xl mt-4 text-center">Crea nuovo piatto</h1>
        <form class="flex flex-col my-4 sm:w-full md:w-1/2 mx-auto justify-center items-start p-4" action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="" for="name">Nome</label>
            <input class="my-4 text-ellipsis w-full rounded-md" type="text" id="name" name="name" placeholder="Inserisci il nome del piatto">

            <label for="description">Descrizione</label>
            <textarea class="mb-4 w-full" name="description" id="description" cols="40" rows="2"></textarea>

            <label for="image">Immagine</label>
            <div class="flex items-center flex-wrap justify-between">
                <input class="mb-4" type="file" id="image" name="image">
            </div>

            <label for="price" class="block text-sm/6 font-medium">Prezzo</label>

            <div class="flex items-center justify-center w-full">
                <input type="number" name="price" id="price" class="w-full block">

            </div>

            <button id="open-modal" class="btn special self-end">Invia</button>
        </form>
    </div>

</x-app-layout>
