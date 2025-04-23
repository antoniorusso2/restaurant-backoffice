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
            <form class="flex flex-col my-4 w-full mx-auto justify-center items-start" action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- name --}}
                <div class="form_section">
                    <label class="my_label" for="name">Nome</label>
                    <input class="mb-4 text-ellipsis w-full rounded-md" type="text" id="name" name="name" placeholder="Inserisci il nome del piatto" value="{{ $category->name }}">
                </div>

                {{-- color --}}
                <div class="form_section">
                    <label class="my_label" for="color">Colore</label>
                    <input class="mb-4 text-ellipsis rounded-md w-44 appearance-none border-none" type="color" id="color" name="color" value="{{ $category->color }}">
                </div>

                {{-- submit --}}
                <button class="btn special self-end" type="submit">Invia</button>
            </form>
        </div>
    </section>

    <x-modal name="confirm-category-deletion" focusable>
        <form method="post" action="{{ route('categories.destroy', $category) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Sei sicuro di voler erliminare questa categoria?
            </h2>

            <p class="mt-1 text-sm font-semibold text-rose-600 uppercase">
                Una volta eliminata non sarà più disponibile!
            </p>

            <div class="mt-6 flex justify-end gap-x-2" x-on:click="$dispatch('close')">
                <button type="button" class="btn special">
                    Annulla
                </button>

                <button class="btn special delete">
                    Elimina
                </button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
