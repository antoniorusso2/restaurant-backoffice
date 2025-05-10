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
            <x-forms.form :action="route('categories.store')" :method="'POST'" :fields="[
                [
                    'name' => 'name',
                    'label' => 'Nome',
                    'type' => 'text',
                ],
                [
                    'name' => 'color',
                    'label' => 'Colore',
                    'type' => 'color',
                ],
            ]" />
        </div>
    </section>

</x-app-layout>
