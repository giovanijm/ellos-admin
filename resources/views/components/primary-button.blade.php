@props(['active' => true, 'icon', 'adaptative' => false])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-900 focus:ring-offset-2 transition ease-in-out duration-150'
            : 'inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-green-900 focus:ring-offset-2 transition ease-in-out duration-150 cursor-not-allowed';

$attrib = ($active ?? false)
            ? $attributes->merge(['type' => 'submit', 'class' => $classes])
            : $attributes->merge(['type' => 'submit', 'disabled' => 'disabled', 'class' => $classes]);

$classesLabel = ($adaptative ?? false)
            ? "hidden lg:flex"
            : "flex-auto";

$classesLabelIcon = ($adaptative ?? false)
            ? "hidden lg:flex ml-2"
            : "flex-auto ml-2";

$isIcon = true;
if(empty($icon)){
    $isIcon = false;
}
@endphp

<button {{ $attrib }}>
    @if ($isIcon)
        <span class="w-6 h-6">{{ svg( $icon ) }}</span>
        <span class="{{ $classesLabelIcon }}">{{ $slot }}</span>
    @else
        <span class="{{ $classesLabel }}">{{ $slot }}</span>
    @endif
</button>
