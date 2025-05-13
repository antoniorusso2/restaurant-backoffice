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

    <section class="create_form">
        <div class="container">
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('dishes.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('POST')

                {{-- name --}}
                <x-forms.form-field field="name" label="Nome piatto">
                    <x-forms.inputs.text name="name" value="{{ old('name', '') }}" />
                </x-forms.form-field>

                {{-- description --}}
                <x-forms.form-field field="description" label="Descrizione">
                    <x-forms.inputs.text name="description" value="{{ old('description', '') }}" />
                </x-forms.form-field>

                {{-- image --}}
                <x-forms.form-field field="image" label="Immagine">

                    <x-forms.inputs.file />

                </x-forms.form-field>

                {{-- category --}}
                <x-forms.form-field field="category" label="Categoria">
                    <x-forms.inputs.select
                        name="category_id"
                        id="category_id"
                        :first-option="'Seleziona una categoria'"
                        :options="$categories"
                        :selected="old('category_id')"
                    />
                </x-forms.form-field>

                {{-- ingredients --}}
                <x-forms.form-field field="ingredients" label="Ingredienti">
                    @foreach ($ingredients as $ingredient)
                        <div class="flex flex-wrap gap-4">
                            <x-forms.inputs.checkbox
                                name="ingredients[]"
                                value="{{ $ingredient->id }}"
                                id="ingredient-{{ $ingredient->id }}"
                                :item="$ingredient"
                                :checked="old('ingredients') && in_array($ingredient->id, old('ingredients'))"
                            />
                        </div>
                    @endforeach
                </x-forms.form-field>

                {{-- price --}}
                <x-forms.form-field field="price" label="Prezzo">
                    <x-forms.inputs.text name="price" value="{{ old('price', '') }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Crea</button>
            </form>
        </div>
    </section>

</x-app-layout>
