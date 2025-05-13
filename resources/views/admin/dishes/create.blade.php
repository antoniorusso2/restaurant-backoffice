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
            <x-forms.form
                :action="route('dishes.store')"
                :method="'POST'"
                :fields="[
                    [
                        'name' => 'name',
                        'label' => 'Nome',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'description',
                        'label' => 'Descrizione',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'category_id',
                        'label' => 'Categoria',
                        'type' => 'select',
                        'options' => $categories,
                    ],
                    [
                        'name' => 'ingredients',
                        'label' => 'Ingredienti',
                        'type' => 'checkbox',
                        'options' => $ingredients,
                    ],
                    [
                        'name' => 'image',
                        'label' => 'Immagine',
                        'type' => 'file',
                    ],
                    [
                        'name' => 'price',
                        'label' => 'Prezzo',
                        'type' => 'text',
                        'class' => 'w-1/6',
                    ],
                ]"
            />
        </div>
    </section>

</x-app-layout>
