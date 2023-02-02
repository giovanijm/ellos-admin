@props(['active'])
@php
    $classes = $active ?? false
        ? "block flex items-center p-2 text-sm text-gray-100 font-bold transition-colors duration-200 rounded-md hover:text-gray-300"
        : "block flex items-center p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md hover:text-gray-100";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} role="menuitem">
    {{ $slot }}
</a>
