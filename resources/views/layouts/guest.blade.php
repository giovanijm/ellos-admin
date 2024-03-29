<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Sistema Ellos') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @routes

    <script src="https://kit.fontawesome.com/65edcec876.js" crossorigin="anonymous"></script>

    {{-- Start Google Recaptcha --}}
        <script src="https://www.google.com/recaptcha/api.js?trustedtypes=true"></script>
        <script>
            function onSubmitFrmLogin(token) {
                document.getElementById("frmLogin").submit();
            }

            function onSubmitFrmRegister(token) {
                document.getElementById("frmRegister").submit();
            }

            function onSubmitFrmForgot(token) {
                document.getElementById("frmForgot").submit();
            }
        </script>
    {{-- End Google Recaptcha --}}

</head>

<body>
    <div class="flex h-screen font-roboto">
        <div class="flex flex-1 flex-col">
            <main class="flex-1 items-center justify-items-cente">
                @include('layouts.message')
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
