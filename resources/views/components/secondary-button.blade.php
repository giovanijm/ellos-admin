@props(['active' => true, 'icon', 'adaptative' => false, 'textHidden' => false])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-100 active:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'
            : 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-100 active:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 cursor-not-allowed';

$attrib = ($active ?? false)
            ? $attributes->merge(['type' => 'button', 'class' => $classes])
            : $attributes->merge(['type' => 'button', 'disabled' => 'disabled', 'class' => $classes]);

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
        @if(!$textHidden)
            <span class="{{ $classesLabelIcon }}">{{ $slot }}</span>
        @endif
    @else
        @if(!$textHidden)
            <span class="{{ $classesLabel }}">{{ $slot }}</span>
        @endif
    @endif
</button>
