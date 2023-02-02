@props(['active', 'icon'])

@php

$classes = ($active ?? false)
            ? 'flex flex-row items-center h-10 px-3 mb-2 rounded-l-lg text-blue-600 bg-gray-100 ml-2'
            : 'flex flex-row items-center h-10 px-3 mb-2 rounded-l-lg text-gray-100 ml-2 hover:bg-gray-100 hover:text-gray-900';

$isIcon = true;
if(empty($icon)){
    $isIcon = false;
}
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if ($isIcon)
        <span class="flex items-center justify-center text-lg">
            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path d="{{ $icon }}" />
            </svg>
        </span>
        <span class="ml-3">{{ $slot }}</span>
    @else
        {{ $slot }}
    @endif
</a>
