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

        @vite('resources/css/appv2.scss')
        @vite('resources/js/app.js')
        @routes
    </head>


    <body id="geral" class="bg-gray-50 dark:bg-slate-900">

        @include('admin.manager-user._partials.toastmessage')

        <x-admin.layouts-v2.header />

        <x-admin.layouts-v2.sidebar-toggle />

        <x-admin.layouts-v2.sidebar />
        <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
            <div class="hidden lg:block">
                @include('admin.manager-user._partials.breadcumbs')
            </div>
            <div class="content">
                {{ $slot }}
            </div>
        </div>
        <x-admin.layouts-v2.footer />

        @include('admin._partials.sobre')
        @include('admin._partials.politica-privacidade')
        @include('admin._partials.licenciamento')
        @include('admin._partials.contato')
        <!-- ========== END MAIN CONTENT ========== -->

        @vite('resources/js/hs.component-appearance.js')
    </body>

</html>