@extends('layouts.guest')

@section('title', __('Login'))

@section('content')
    <div class="flex flex-col items-center justify-center h-full sm:p-4 bg-gray-200 bg-cover bg-center" style="background-image: url('/imagem/layout/fundo_principal_claro.jpg')">
        <div class="relative w-full lg:w-10/12 xl:w-8/12 xl2:w-3/12">
            <div class="block shadow-lg rounded-lg">
                <div class="lg:flex lg:flex-wrap g-0">
                    <div class="lg:w-6/12 px-4 md:px-0 rounded-none lg:rounded-l-lg bg-gray-50 bg-opacity-80">
                        <div class="p-4 md:p-12 md:mx-6">
                            <div class="text-center my-4 sm:my-8">
                                <img class="mx-auto w-72" src="/imagem/layout/login/logoSistemaEllos.png" alt="Sistema Ellos"/>
                            </div>
                            <h2 class="text-center text-2xl font-bold text-gray-700 mt-3 mb-4">
                                Sejam bem-vindos!
                            </h2>
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('auth/forgot-password.txtExplanation') }}
                            </div>
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('auth/forgot-password.txtExplanation') }}
                            </div>
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('auth/forgot-password.txtExplanation') }}
                            </div>
                            @if (Route::has('login'))
                                <div class="w-full text-center px-6 py-4 block">
                                    @auth
                                        <a href="{{ route('admin.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Sistema Administrativo</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">@lang('welcome.labelLogin')</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">@lang('welcome.labelRegister')</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="lg:w-6/12 h-80 sm:h-56 lg:h-auto flex items-center rounded-none lg:rounded-r-lg bg-cover bg-top lg:bg-center" style="background-image: url('/imagem/layout/img_principal.jpg')">
                        <div class="text-white px-4 py-6 md:p-12 md:mx-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

