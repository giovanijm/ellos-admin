@props(['active'])
@php
    $classes = $active ?? false
        ? "submenu-item-active"
        : "submenu-item";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} role="menuitem">
    {{ $slot }}
</a>
