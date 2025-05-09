@props(['item', 'action', 'type' => null])

@php
    $messages = [
        'dish' => 'Sei sicuro di voler eliminare questo piatto?',
        'image' => 'Sei sicuro di voler eliminare questa immagine?',
        'category' => 'Sei sicuro di voler eliminare questa categoria?',
        'ingredient' => 'Sei sicuro di voler eliminare questo ingrediente?',
    ];

    $alerts = [
        'dish' => 'Una volta eliminato non sarà più disponibile!',
        'image' => 'Una volta eliminata non sarà più disponibile!',
        'category' => 'Una volta eliminata non sarà più disponibile!',
        'ingredient' => 'Una volta eliminato non sarà più disponibile!',
    ];

@endphp

{{-- @dd($item); --}}

<x-modal name="confirm-{{ $item->name }}-deletion" focusable>
    <form method="post" action="{{ $action }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $messages[$type] }}
        </h2>

        <p class="mt-1 text-sm font-semibold text-rose-600 uppercase">
            {{ $alerts[$type] }}
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
