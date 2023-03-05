@props(['typeMessage' => 'info'])

@php
    switch ($typeMessage) {
        case "success":
            $typeMessage = "ellos-toast-success";
            break;
        case "warning":
            $typeMessage = "ellos-toast-warning";
            break;
        case "danger":
            $typeMessage = "ellos-toast-danger";
            break;
        default:
            $typeMessage = "ellos-toast-info";
    }
@endphp

<div
    id="{{ $typeMessage }}"
    role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
    class="{{ $typeMessage }} hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300"
>
    <div class="flex">
        <div class="flex items-center justify-center">
            @switch($typeMessage)
                @case("ellos-toast-success")
                    <x-eos-thumb-up class='icon-item' />
                    @break
                @case("ellos-toast-warning")
                <x-eos-warning class='icon-item' />
                    @break
                @case("ellos-toast-danger")
                    <x-eos-dangerous class='icon-item' />
                    @break
                @default
                    <x-eos-info class='icon-item' />
            @endswitch
        </div>
        <div class="content">
            {{ $slot }}
        </div>
        <button type="button" class="button-close" data-hs-remove-element="#{{ $typeMessage }}">
            <span class="sr-only">Dismiss</span>
            <x-eos-close class="icon-item" />
        </button>
    </div>
</div>
