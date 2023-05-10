@props(['active', 'open'])

<div  class="modulo" x-data="{ isActive: {{ $active ?? false ? 'true' : 'false '}}, open: {{ $open ?? false ? 'true' : 'false ' }}}">
    {{ $slot }}
</div>
