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
                <button class="btn special delete" id="modal-trigger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')">Elimina categoria</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            {{-- form --}}
            <x-forms.form :action="route('categories.update', $category)" :method="'PUT'" :fields="[
                [
                    'name' => 'name',
                    'label' => 'Nome',
                    'type' => 'text',
                    'value' => $category->name,
                ],
                [
                    'name' => 'color',
                    'label' => 'Colore',
                    'type' => 'color',
                    'value' => $category->color,
                    'width' => 'w-1/2',
                ],
            ]" />
        </div>
    </section>

    {{-- modal --}}
    <x-delete-modal :type="'category'" :item="$category" action="{{ route('categories.destroy', $category) }}" />

</x-app-layout>
