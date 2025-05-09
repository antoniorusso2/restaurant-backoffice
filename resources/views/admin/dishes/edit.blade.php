<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
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
            <form class="mx-auto my-4 flex w-full flex-col items-start justify-center" action="{{ route('dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- name --}}
                <div class="form_section">
                    <label class="my_label" for="name">Nome</label>
                    <input class="{{ $errors->has('name') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }} mb-4 w-full text-ellipsis rounded-md" type="text" id="name" name="name" placeholder="Inserisci il nome del piatto" value="{{ old('name', $dish->name) }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- description --}}
                <div class="form_section">
                    <label class="my_label" for="description">Descrizione</label>
                    <textarea class="{{ $errors->has('description') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }} mb-4 w-full" name="description" id="description" cols="40" rows="3">{{ old('description', $dish->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                {{-- category --}}
                <div class="form_section">
                    <label for="categories" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                        Seleziona una categoria
                    </label>

                    <select id="categories" name="category_id" class="{{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }} block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option>Scegli una categoria</option>
                        @foreach ($categories as $category)
                            <option value={{ $category->id }} {{ $dish->category_id == $category->id ? 'selected' : '' }}>{{ __($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                {{-- img --}}
                <div class="form_section">
                    <label class="my_label" for="image">Immagine</label>

                    <div x-data="{ fileName: '', imagePreview: null }" class="flex flex-col items-center gap-4">

                        <!-- Area caricamento immagine -->
                        <label class="relative flex h-48 w-48 cursor-pointer flex-col items-center justify-center overflow-hidden rounded-lg border-2 border-dashed border-gray-300 text-gray-500 transition hover:bg-gray-100">
                            <!-- Mostra immagine se presente -->
                            <template x-if="imagePreview">
                                <img :src="imagePreview" class="absolute inset-0 h-full w-full rounded-lg object-cover" />
                            </template>

                            <!-- Stato iniziale -->
                            <div x-show="!imagePreview" class="pointer-events-none flex flex-col items-center">
                                <span class="text-5xl font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>

                                </span>
                                <span class="text-sm">Scegli immagine</span>
                            </div>

                            <input type="file" name="image" class="hidden" @change="
                                                                                    const file = $event.target.files[0];
                                                                                    fileName = file?.name || '';
                                                                                    imagePreview = file ? URL.createObjectURL(file) : null;
                                                                                " />
                        </label>

                        <!-- Nome del file -->
                        <span x-text="fileName" class="max-w-xs truncate text-center text-sm text-gray-600"></span>
                    </div>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                {{-- ingredients --}}
                <div class="form_section">
                    <label class="my_label" for="ingredients">Ingredienti</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($ingredients as $ingredient)
                            <div class="flex items-center">
                                <input type="checkbox" name="ingredients[]" id="{{ $ingredient->id }}" value="{{ $ingredient->id }}" {{ $dish->ingredients->contains($ingredient->id) ? 'checked' : '' }}>
                                <label class="ms-2" for="{{ $ingredient->id }}">{{ $ingredient->name }}</label>
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

    {{-- modals --}}
    <x-delete-modal :type="'dish'" :item="$dish" action="{{ route('dishes.destroy', $dish) }}" />
    <x-delete-modal :type="'image'" :item="$dish" action="{{ route('dishes.destroy_image', $dish) }}" />

</x-app-layout>
