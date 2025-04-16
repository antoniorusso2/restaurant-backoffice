<x-app-layout>
    <div class="container">
        <h1 class="text-3xl mt-4 text-center">Modifica piatto</h1>
        <form class="flex flex-col my-4 sm:w-full lg:w-1/2 mx-auto justify-center items-start p-4" action="{{ route('dishes.update', $dish) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="" for="name">Nome</label>
            <input class="my-4 text-ellipsis w-full rounded-md" type="text" id="name" name="name" placeholder="Inserisci il nome del piatto" value="{{ $dish->name }}">

            <label for="description">Descrizione</label>
            <textarea class="mb-4 w-full" name="description" id="description" cols="40" rows="2">{{ $dish->description }}</textarea>

            <label for="image">Immagine</label>
            <div class="flex items-center flex-wrap justify-between">
                <input class="mb-4" type="file" id="image" name="image">
                <img src="{{ asset('storage/' . $dish->image) }}" alt=" {{ $dish->name }} anteprima immagine" class="w-1/4 h-1/4">
            </div>

            <label for="price" class="block text-sm/6 font-medium">Prezzo</label>
            {{-- tailwind css component --}}
            {{-- <div class=" number-input flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                <input type="number" name="price" id="price" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base  placeholder:text-gray-400 focus:outline-none sm:text-sm/6 border-none" value="0.00">
                <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                    <select id="currency" name="currency" aria-label="Currency"
                        class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base placeholder:text-gray-400 bg-slate-500 focus:outline-indigo-600 sm:text-sm/6">
                        <option>EUR</option>
                        <option>USD</option>
                        <option>CAD</option>
                    </select>
                </div>
            </div> --}}
            <div class="flex items-center justify-center w-full">
                <input type="number" name="price" id="price" class="w-full block" value="{{ $dish->price }}">
                {{-- <select name="currency" id="currency" class="border-2 border-gray-400 rounded-md appearance-none bg-slate-500 focus:outline-indigo-600 focus:bg-slate-50 dark:focus:text-gray-900" aria-label="Currency">
                    <option value="EUR">EUR</option>
                    <option value="USD">USD</option>
                </select> --}}
            </div>

            <button class="btn special self-end" type="submit">Invia</button>
        </form>
    </div>
</x-app-layout>
