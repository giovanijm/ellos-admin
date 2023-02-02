@props(['active', 'open'])

<div x-data="{ isActive: {{ $active ?? false ? 'true' : 'false '}}, open: {{ $open ?? false ? 'true' : 'false ' }}}">
    {{ $slot }}
</div>
