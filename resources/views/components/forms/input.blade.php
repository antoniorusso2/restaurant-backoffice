@props([
    'disabled' => false,
    'value' => '',
    'options' => [],
])

@php
    $basicClasses = 'mb-4 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6';

    $type = $attributes->get('type');

    $additionalClasses = match ($type) {
        'select' => 'mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm',
        'checkbox' => 'h-4 w-4 text-indigo-600 focus:ring-indigo-500',
        'radio' => 'h-4 w-4 text-indigo-600 focus:ring-indigo-500',
        default => '',
    };

@endphp

<input @disabled($disabled) {{ $attributes->merge(['class' => $basicClasses]) }} value="{{ $value }}">
