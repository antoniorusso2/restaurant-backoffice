<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifica ingrediente') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">

                <a class="btn special" href="{{ route('ingredients.index') }}">Indietro</a>
                {{-- delete --}}
                <button
                    class="btn special delete md:ms-auto"
                    id="modal-trigger"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-ingredient-deletion')"
                >Elimina</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form
                class="flex flex-col my-4 w-full mx-auto justify-center items-start"
                action="{{ route('ingredients.update', $ingredient) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                {{-- name --}}
                <x-forms.form-field field="name" label="Nome ingrediente">
                    <x-forms.inputs.text name="name" value="{{ old('names', $ingredient->name) }}" />
                </x-forms.form-field>

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>
        </div>
    </section>

    {{-- modal --}}
    <x-delete-modal
        :type="'ingredient'"
        :item="$ingredient"
        action="{{ route('ingredients.destroy', $ingredient) }}"
    />
</x-app-layout>
