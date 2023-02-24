<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">

    <title>@yield('title') - {{ config('app.name', 'Sistema Ellos') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/message-toast.js')
    @routes
</head>

<body>
    <div class="flex h-screen font-roboto">
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-2 lg:p-4 bg-gray-100">
                @include('layouts.message')

                @yield('content')
            </main>

            @include('layouts.footer')
        </div>
    </div>
    @stack('scripts')
</body>
</html>
