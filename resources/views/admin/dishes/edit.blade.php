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
                <button
                    class="btn special delete md:ms-auto"
                    id="modal-trigger"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-dish-deletion')"
                >Elimina</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('dishes.update', $dish) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                {{-- name --}}
                <x-forms.form-field field="name" label="Nome piatto">
                    <x-forms.inputs.text name="name" value="{{ old('name', $dish->name) }}" />
                </x-forms.form-field>

                {{-- description --}}
                <x-forms.form-field field="description" label="Descrizione">
                    <x-forms.inputs.text name="description" value="{{ old('description', $dish->description) }}" />
                </x-forms.form-field>

                {{-- image --}}
                <x-forms.form-field field="img" label="Immagine">
                    @if ($dish->image)
                        <div class="img-wrap relative max-w-[300px] rounded-sm overflow-hidden py-4">
                            <img
                                src="{{ asset('storage/' . $dish->image) }}"
                                alt=" {{ $dish->name }} anteprima immagine"
                                class="w-full h-full object-cover object-center"
                            >

                            {{-- delete icon --}}
                            <x-buttons.trash :class="'absolute top-[20px] right-[5px] '" :itemToDelete="'image'" />
                        </div>
                    @else
                        <x-forms.inputs.file />
                    @endif
                </x-forms.form-field>

                {{-- category --}}
                <x-forms.form-field field="category_id" label="Categoria">
                    <x-forms.inputs.select
                        name="category_id"
                        id="category_id"
                        :first-option="'Seleziona una categoria'"
                        :selected="$dish->category_id"
                        :options="$categories"
                    />
                </x-forms.form-field>

                {{-- ingredients --}}
                <x-forms.form-field field="ingredients[]" label="Ingredienti">
                    <div class="flex flex-wrap gap-4">
                        @foreach ($ingredients as $ingredient)
                            <x-forms.inputs.checkbox
                                name="ingredients[]"
                                id="ingredients-{{ $ingredient->id }}"
                                label-for="ingredients-{{ $ingredient->id }}"
                                :item="$ingredient"
                                :checked="$dish->ingredients->contains($ingredient->id)"
                            />
                        @endforeach
                    </div>
                </x-forms.form-field>

                {{-- price --}}
                <x-forms.form-field field="price" label="Prezzo">
                    <x-forms.inputs.text name="price" value="{{ old('price', $dish->price) }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Modifica</button>
            </form>
        </div>
    </section>

    {{-- modals --}}
    <x-delete-modal
        :item="$dish"
        :type="'dish'"
        action="{{ route('dishes.destroy', $dish) }}"
    />
    <x-delete-modal
        :item="$dish"
        :type="'image'"
        action="{{ route('dishes.destroy_image', $dish) }}"
    />

</x-app-layout>
