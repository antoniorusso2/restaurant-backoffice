<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifica piatto') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">

                <a class="btn special" href="{{ route('dishes.index') }}">Indietro</a>
                {{-- delete --}}
                <button class="btn special delete" id="modal-trigger">Elimina piatto</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form class="flex flex-col my-4 w-full mx-auto justify-center items-start"
                action="{{ route('dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- delete modal trigger --}}
                {{-- <button class="btn special self-end">
                    Elimina
                </button> --}}

                {{-- name --}}
                <div class="form_section">
                    <label class="my_label" for="name">Nome</label>
                    <input class="mb-4 text-ellipsis w-full rounded-md" type="text" id="name" name="name"
                        placeholder="Inserisci il nome del piatto" value="{{ $dish->name }}">
                </div>

                {{-- description --}}
                <div class="form_section">
                    <label class="my_label" for="description">Descrizione</label>
                    <textarea class="mb-4 w-full" name="description" id="description" cols="40"
                        rows="3">{{ $dish->description }}</textarea>
                </div>

                {{-- img --}}
                <div class="form_section">
                    <label class="my_label" for="image">Immagine</label>

                    <input class="mb-4" type="file" id="image" name="image">
                    @if ($dish->image)
                    <img src="{{ asset('storage/' . $dish->image) }}" alt=" {{ $dish->name }} anteprima immagine"
                        class="w-1/4 h-1/4">
                    @endif

                </div>

                {{-- ingredients --}}
                <div class="form_section">
                    <label class="my_label" for="ingredients">Ingredienti</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($ingredients as $ingredient)
                        <div class="flex items-center ">
                            <input type="checkbox" name="ingredients[]" id="{{ $ingredient->id }}"
                                value="{{ $ingredient->id }}" {{ $dish->ingredients->contains($ingredient->id) ?
                            'checked' :
                            '' }}>
                            <label class=" ms-2" for="{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- price --}}
                <div class="form_section">
                    <label class="my_label" for="price" class="block text-sm/6 font-medium">Prezzo</label>
                    <input type="text" inputmode="decimal" id="price" name="price" pattern="[0-9]*[.,]?[0-9]*"
                        value="{{ $dish->price }}">
                </div>

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>

        </div>
    </section>

    {{-- modal --}}
    <div id="modal"
        class="modal-overlay z-10 bg-gray-600 bg-opacity-50 backdrop-filter backdrop-blur h-dvh fixed inset-0 hidden">
        <div class="modal-content bg-opacity-50 p-4 flex flex-col justify-center items-center h-full gap-y-5">
            <h2 class="text-3xl">Sei sicuro di voler eliminare questo piatto?</h2>
            <p class="">Piatto: <span class="font-semibold">{{ $dish->name }}</span></p>
            <p class="texct-thin text-rose-700 uppercase">Una volta eliminato non sarà più disponibile!</p>
            <form action="{{ route('dishes.destroy', $dish) }}" method="POST" class="mt-4 w-full">
                @csrf
                @method('DELETE')
                <button class="btn special delete w-44 mx-auto" type="submit">Elimina</button>
            </form>
        </div>
        {{-- x close icon --}}
        <div id="modal-close" class="cursor-pointer absolute top-4 right-4 p-1 border rounded-md bg-rose-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
</x-app-layout>