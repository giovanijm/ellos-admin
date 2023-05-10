<nav class="hs-accordion-group nav-menu">
    @if (isSet($label))
        <label>{{ $label ?? '' }}</label>
    @endif
    <ul>
        {{ $slot }}
    </ul>
</nav>
