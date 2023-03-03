<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">

        <title>{{ config('app.name', 'Sistema Ellos') }}{{ $title ?? false ? ' - '.$title : '' }}</title>
        <meta name="description" content="{{ $metaDescription ?? 'Sistema Ellos' }}" />

        @vite('resources/css/app.scss')
        @vite('resources/js/app.js')
        @vite('resources/js/message-toast.js')
        @routes
        @stack('scripts')
    </head>

    <body>
        <div class="ellos-body">
            @stack('modalGeral')
            <x-admin.layouts.sidebar/>
            <div class="flex-1 flex flex-col overflow-hidden">
                <x-admin.layouts.header/>

                <x-admin.layouts.main>
                    {{ $slot }}
                </x-admin.layouts.main>

                <x-admin.layouts.footer/>
            </div>
        </div>
    </body>

</html>
