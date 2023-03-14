@props(['temsubmenu' => false, 'nomemenu', 'nomesubmenu'])

<li
    @if ($temsubmenu)
        class="hs-accordion" id="{{ $nomemenu ?? '' }}" data-hs-accordion-always-open
    @endif
>
    @if ($temsubmenu)
        <a class="hs-accordion-toggle hs-accordion-active:text-teal-700 hs-accordion-active:hover:bg-transparent dark:hs-accordion-active:text-red-300" href="javascript:;" aria-controls="{{ $nomesubmenu ?? '' }}">
            {{ $slot }}
            <span class="ml-auto" aria-hidden="true">
                <svg class="w-4 h-4 transition-transform transform  hs-accordion-active:-rotate-90" :class="{ '-rotate-90': hs-accordion-active }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        @yield('nav-menu-submenu')
    @else
        <a {{ $attributes->merge() }}>
            {{ $slot }}
        </a>
    @endif
</li>
