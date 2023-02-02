@props(['labelName'])

<div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ $labelName }}">
    {{ $slot }}
</div>
