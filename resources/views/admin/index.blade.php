@extends('layouts.app')
@section('title', 'Dasboard')
@section('content')
    <nav aria-label="Breadcrumb">
        <ol role="list" class="mx-auto flex items-center space-x-2 ">
            <li>
                <div class="flex items-center">
                    <a href="#" class="flex mr-2 text-sm font-medium text-gray-900">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-1">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                    </a>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-4 text-gray-300">
                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                    </svg>
                </div>
            </li>
            <li class="text-sm">
                <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Dashboard</a>
            </li>
        </ol>
    </nav>

    <h1 class="font-bold text-2xl mt-2 text-gray-900">Dashboard</h1>

    <div class="flex flex-col flex-grow border-2 border-gray-400 border-dashed bg-white rounded mt-2">
        <x-dashboard />
    </div>
@endsection
