@props(['isActive' => 'false', 'open' => 'true'])

@php
    $classes = "menu-item";
@endphp
<a
    href="#"
    {{ $attributes->merge(['class' => $classes]) }}
    :class="{'menu-item-active': isActive && !open, 'menu-item-open': open && !isActive, 'menu-item-active-open': isActive && open,}"
    @click="$event.preventDefault(); open = !open"
    role="button"
    aria-haspopup="true"
    :aria-expanded="(open || isActive) ? '{{ $open }}' : '{{ $isActive }}'"
>
    {{ $slot }}
    <span class="ml-auto" aria-hidden="true">
        <svg class="w-4 h-4 transition-transform transform" :class="{ '-rotate-90': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </span>
</a>
