@props([
    'disabled' => false,
    'type' => 'text',
    'value' => '',
    'name' => '',
    'placeholder' => '',
    'class' => '',
    'width' => $type == 'color' ? 'w-16' : 'w-full',
])

<input class="{{ $width }} border-gray-300 dark:border-gray-600 border-1 rounded-md bg-slate-700 focus:outline-offset-1 focus:outline-indigo-400 focus:text-gray-900 dark:focus:bg-gray-50 dark:text-gray-500 {{ $class }}" @disabled($disabled) type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
