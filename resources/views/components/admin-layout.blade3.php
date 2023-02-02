<!doctype html>
<html lang="{{ $page->language ?? 'en' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://unpkg.com/tailwindcss@1.4.6/dist/tailwind.min.css" rel="stylesheet">



    <title>Admin</title>
</head>

<body class="bg-gray-200">
    @if (Session::has('message'))
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-indigo-600" x-data="{ bannerOpen: true }" x-show="bannerOpen">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden"> {{ Session::get('message') }} </span>
                            <span class="hidden md:inline"> {{ Session::get('message') }} </span>
                        </p>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                        <button type="button" @click="bannerOpen = false"
                            class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                            <span class="sr-only">Dismiss</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="flex flex-row min-h-screen bg-gray-100 text-gray-800">
        @include('layouts.sidebar')
        <main class="main flex flex-col flex-grow -ml-64 md:ml-0 transition-all duration-150 ease-in">
            @include('layouts.header')
            <!-- CONTEÚDO  -->
            <div class="main-content flex flex-col flex-grow p-4">
                {{ $slot }}
            </div>
            @include('layouts.footer')
        </main>
    </div>
</body>
</html>
