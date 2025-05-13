<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifica piatto') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('categories.index') }}">Indietro</a>
                {{-- delete --}}
                <button
                    class="btn special delete"
                    id="modal-trigger"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')"
                >Elimina categoria</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            {{-- form --}}
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('categories.update', $category) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                {{-- name --}}
                <x-forms.form-field field="name" label="Categoria">
                    <x-forms.inputs.text name="name" value="{{ old('name', $category->name) }}" />
                </x-forms.form-field>

                {{-- color --}}
                <x-forms.form-field field="color" label="Colore">
                    <x-forms.inputs.color name="color" value="{{ old('color', $category->color) }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Crea</button>
            </form>
        </div>
    </section>

    {{-- modal --}}
    <x-delete-modal
        :type="'category'"
        :item="$category"
        action="{{ route('categories.destroy', $category) }}"
    />

</x-app-layout>
