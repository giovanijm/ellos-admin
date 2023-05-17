<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <link rel="canonical" href="https://preline.co/">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name', 'Sistema Ellos') }}{{ $title ?? false ? ' - '.$title : '' }}</title>
        <meta name="description" content="{{ $metaDescription ?? 'Sistema Ellos' }}" />

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                 document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

        @vite('resources/css/appv2.scss')
        @vite('resources/js/app.js')
        @routes
        @stack('scripts')
    </head>


    <body id="geral" class="bg-gray-50 dark:bg-slate-900">
        @stack('modalGeral')

        @include('admin.manager-user._partials.toastmessage')

        <x-admin.layouts-v2.header />

        <x-admin.layouts-v2.sidebar-toggle />

        <x-admin.layouts-v2.sidebar />

        <x-admin.layouts-v2.main>
            {{ $slot }}
        </x-admin.layouts-v2.main>

        <x-admin.layouts-v2.footer />

        {{-- @include('admin._partials.sobre')
        @include('admin._partials.politica-privacidade')
        @include('admin._partials.licenciamento')
        @include('admin._partials.contato') --}}
        <!-- ========== END MAIN CONTENT ========== -->
    </body>

</html>
