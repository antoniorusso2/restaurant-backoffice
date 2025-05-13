<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crea nuova categoria') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('categories.index') }}">Indietro</a>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('categories.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('POST')

                {{-- name --}}
                <x-forms.form-field field="name" label="Categoria">
                    <x-forms.inputs.text name="name" value="{{ old('name', '') }}" />
                </x-forms.form-field>

                {{-- color --}}
                <x-forms.form-field field="color" label="Colore">
                    <x-forms.inputs.color name="color" value="{{ old('color', '') }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Crea</button>
            </form>
        </div>
    </section>

</x-app-layout>
