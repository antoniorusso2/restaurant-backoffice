{{-- @dd('sei nella create') --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crea nuovo piatto') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('dishes.index') }}">Indietro</a>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form class="flex flex-col my-4 w-full mx-auto justify-center items-start"
                action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- name --}}
                <div class="form_section">
                    <label class="my_label" for="name">Nome</label>
                    <input class="mb-4 text-ellipsis w-full rounded-md" type="text" id="name" name="name"
                        placeholder="Inserisci il nome del piatto" ">
                </div>

                {{-- description --}}
                <div class=" form_section">
                    <label class="my_label" for="description">Descrizione</label>
                    <textarea class="mb-4 w-full" name="description" id="description" cols="40" rows="3"></textarea>
                </div>

                {{-- category --}}
                <div class="form_section">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Seleziona una categoria
                    </label>

                    <select id="categories" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Scegli una categoria</option>
                        @foreach ($categories as $category)
                        <option value={{$category->id}}>{{__($category->name)}}</option>
                        @endforeach

                    </select>
                </div>

                {{-- img --}}
                <div class="form_section">
                    <label class="my_label" for="image">Immagine</label>
                    <input class="mb-4" type="file" id="image" name="image">
                </div>

                {{-- price --}}
                <div class="form_section">
                    <label class="my_label" for="price" class="block text-sm/6 font-medium">Prezzo</label>
                    <input type="text" inputmode="decimal" id="price" name="price" pattern="[0-9]*[.,]?[0-9]*">
                </div>

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>
        </div>
    </section>

</x-app-layout>