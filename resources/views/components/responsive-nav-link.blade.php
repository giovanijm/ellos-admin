@props(['active', 'icon'])

@php
$classes = ($active ?? false)
            ? 'flex block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-left text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'flex block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-white hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';

$isIcon = true;
if(empty($icon)){
    $isIcon = false;
}
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if ($isIcon)
        <span class="w-6 h-6">{{ svg( $icon ) }}</span>
    @endif
    <span class="mx-2">{{ $slot }}</span>
</a>
