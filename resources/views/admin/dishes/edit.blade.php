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
                <button class="btn special delete md:ms-auto" id="modal-trigger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-dish-deletion')">Elimina</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form class="flex flex-col my-4 w-full mx-auto justify-center items-start" action="{{ route('dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- name --}}
                <div class="form_section">
                    <label class="my_label" for="name">Nome</label>
                    <input class="mb-4 text-ellipsis w-full rounded-md {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}" type="text" id="name" name="name" placeholder="Inserisci il nome del piatto" value="{{ old('name', $dish->name) }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- description --}}
                <div class="form_section">
                    <label class="my_label" for="description">Descrizione</label>
                    <textarea class="mb-4 w-full {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}" name="description" id="description" cols="40" rows="3">{{ old('description', $dish->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                {{-- category --}}
                <div class="form_section">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Seleziona una categoria
                    </label>

                    <select id="categories" name="category_id" class="{{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }} bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Scegli una categoria</option>
                        @foreach ($categories as $category)
                            <option value={{ $category->id }} {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ __($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                {{-- img --}}
                <div class="form_section">
                    <label class="my_label" for="image">Immagine</label>

                    <input class="mb-4" type="file" id="image" name="image">
                    @if ($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" alt=" {{ $dish->name }} anteprima immagine" class="w-1/4 h-1/4">
                    @endif
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                {{-- ingredients --}}
                <div class="form_section">
                    <label class="my_label" for="ingredients">Ingredienti</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($ingredients as $ingredient)
                            <div class="flex items-center ">
                                <input type="checkbox" name="ingredients[]" id="{{ $ingredient->id }}" value="{{ $ingredient->id }}" {{ $dish->ingredients->contains($ingredient->id) ? 'checked' : '' }}>
                                <label class=" ms-2" for="{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- price --}}
                <div class="form_section">
                    <label class="my_label" for="price" class="block text-sm/6 font-medium">Prezzo</label>
                    <input type="text" inputmode="decimal" id="price" name="price" pattern="[0-9]*[.,]?[0-9]*" value="{{ old('price', $dish->price) }}">
                    <x-input-error :messages="$errors->get('price')" class="mx-2 mt-2" />
                </div>

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>

        </div>
    </section>

    {{-- modal --}}
    <x-modal name="confirm-dish-deletion" focusable>
        <form method="post" action="{{ route('dishes.destroy', $dish) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Sei sicuro di voler erliminare questo piatto?
            </h2>

            <p class="mt-1 text-sm font-semibold text-rose-600 uppercase">
                Una volta eliminata non sarà più disponibile!
            </p>

            <div class="mt-6 flex justify-end gap-x-2" x-on:click="$dispatch('close')">
                <button type="button" class="btn special">
                    Annulla
                </button>

                <button class="btn special delete">
                    Elimina
                </button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
