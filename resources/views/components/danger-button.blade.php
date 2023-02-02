@props(['active' => true, 'icon'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 bg-red-500 shadow-sm border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2 transition ease-in-out duration-150'
            : 'inline-flex items-center px-4 py-2 bg-red-500 shadow-sm border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2 transition ease-in-out duration-150 cursor-not-allowed';

$attrib = ($active ?? false)
            ? $attributes->merge(['type' => 'button', 'class' => $classes])
            : $attributes->merge(['type' => 'button', 'disabled' => 'disabled', 'class' => $classes]);

$isIcon = true;
if(empty($icon)){
    $isIcon = false;
}
@endphp

<button {{ $attrib }}>
    @if ($isIcon)
        <span class="w-6 h-6">{{ svg( $icon ) }}</span>
        <span class="block flex-auto ml-2">{{ $slot }}</span>
    @else
        <span class="flex-auto">{{ $slot }}</span>
    @endif
</button>
