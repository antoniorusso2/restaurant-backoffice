@props(['classes' => '', 'href' => '#'])

<a href="{{ $href }}" class="btn special border-gray-500 cursor-pointer {{ $classes }}">
    {{ $text ?? $slot }}
</a>
