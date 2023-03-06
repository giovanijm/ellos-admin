<div id="{{ $name ?? '' }}-child" class="hs-accordion-content transition-[height] duration-300 hidden submenu">
    <ul>
        {{ $slot }}
    </ul>
</div>
