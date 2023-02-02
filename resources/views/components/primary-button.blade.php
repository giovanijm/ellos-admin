@props(['active' => true, 'icon'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-900 focus:ring-offset-2 transition ease-in-out duration-150'
            : 'inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-green-900 focus:ring-offset-2 transition ease-in-out duration-150 cursor-not-allowed';

//            ? 'inline-flex items-center mx-1 my-1 px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-900 focus:ring-offset-2 transition ease-in-out duration-150'
            //: 'inline-flex items-center mx-1 my-1 px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-green-900 focus:ring-offset-2 transition ease-in-out duration-150 cursor-not-allowed';

$attrib = ($active ?? false)
            ? $attributes->merge(['type' => 'submit', 'class' => $classes])
            : $attributes->merge(['type' => 'submit', 'disabled' => 'disabled', 'class' => $classes]);

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
