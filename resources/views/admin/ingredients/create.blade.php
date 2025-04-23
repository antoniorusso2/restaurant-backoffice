<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Aggiungi Ingrediente') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('ingredients.index') }}">Indietro</a>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <div class="instructions">
                <p class="text-justify text-2xl text-orange-400">Inserisci i nomi degli ingredienti separati da una
                    virgola</p>
            </div>
            <form class="flex flex-col my-4 w-full mx-auto justify-center items-start"
                action="{{ route('ingredients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- name --}}
                <div class="form_section">
                    <label class="my_label" for="name">Nome</label>
                    <input class="mb-4 text-ellipsis w-full rounded-md" type="text" id="names" name="names"
                        placeholder="Ingrediente1, ingrediente2, ingrediente3">
                </div>

                {{-- img --}}
                {{-- <div class="form_section">
                    <label class="my_label" for="image">Immagine</label>
                    <input class="mb-4" type="file" id="image" name="image">
                </div> --}}

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>
        </div>
    </section>

</x-app-layout>