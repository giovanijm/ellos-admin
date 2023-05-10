@props(['nomemenu', 'nomesubmenu'])

<div id="{{ $nomesubmenu ?? '' }}" class="hs-accordion-content transition-[height] duration-300 hidden submenu active" aria-labelledby="{{ $nomemenu ?? '' }}">
    <ul>
        {{ $slot }}
    </ul>
</div>
