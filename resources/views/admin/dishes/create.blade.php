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

    {{-- errors --}}
    @if ($errors->any())
        {{-- @dd($errors) --}}
        <section class="errors">
            {{-- @dd($errors) --}}
            <div class="container">
                <div class="alert alert-danger px-2 py-3 bg-red-500 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ __($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    <section class="modify_form">
        <div class="container">
            <form class="flex flex-col my-4 w-full mx-auto justify-center items-start" action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- name --}}
                <div class="form_section">
                    <label class="my_label" for="name">Nome</label>
                    <input class="mb-4 text-ellipsis w-full rounded-md {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}" type="text" id="name" name="name" placeholder="Inserisci il nome del piatto" value="{{ old('name') }}">
                </div>

                {{-- description --}}
                <div class=" form_section">
                    <label class="my_label" for="description">Descrizione</label>
                    <textarea class="mb-4 w-full {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}" name="description" id="description" cols="40" rows="3">{{ old('description') }}</textarea>
                </div>

                {{-- category --}}
                <div class="form_section">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Seleziona una categoria
                    </label>

                    <select id="categories" name="category_id" class=" {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }} bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Scegli una categoria</option>
                        @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value={{ $category->id }}>{{ $category->name }}</option>
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
                    <input class="{{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}" type="text" inputmode="decimal" id="price" name="price" pattern="[0-9]*[.,]?[0-9]*" value="{{ old('price') }}">
                </div>

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>
        </div>
    </section>

</x-app-layout>
