<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Aggiungi Ingrediente') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('ingredients.index') }}">Indietro</a>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <div class="instructions">
                <p class="text-justify text-2xl text-orange-400">Inserisci i nomi degli ingredienti separati da una
                    virgola</p>
            </div>
            <form
                class="flex flex-col my-4 w-full mx-auto justify-center items-start"
                action="{{ route('ingredients.store') }}"
                method="POST"
            >
                @csrf

                {{-- name --}}
                <x-forms.form-field field="names" label="Ingredienti">
                    <x-forms.inputs.text
                        name="names"
                        value="{{ old('names', '') }}"
                        placeholder="Ingrediente1, ingrediente2, ingrediente3"
                    />
                </x-forms.form-field>

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>
        </div>
    </section>

</x-app-layout>
