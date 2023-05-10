<li class="{{ $selected ?? '' }}">
    <a {{ $attributes->merge() }}>
        {{ $slot }}
    </a>
</li>
