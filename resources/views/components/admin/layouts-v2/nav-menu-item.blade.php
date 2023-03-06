@props(['submenu' => false])

<li
    @if ($submenu)
        class="hs-accordion" id="{{ $name ?? '' }}" data-hs-accordion-always-open
    @endif
>
    @if ($submenu)
        <a class="hs-accordion-toggle hs-accordion-active:text-teal-700 hs-accordion-active:hover:bg-transparent dark:hs-accordion-active:text-red-300" href="javascript:;">
            {{ $slot }}
            <svg class="hs-accordion-active:block ml-auto hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
            </svg>
            <svg class="hs-accordion-active:hidden ml-auto block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
            </svg>
        </a>
        @yield('nav-menu-submenu')
    @else
        <a {{ $attributes->merge() }}>
            {{ $slot }}
        </a>
    @endif
</li>
