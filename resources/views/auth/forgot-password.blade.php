@extends('layouts.guest')

@section('title', __('Recuperar senha'))

@section('content')
    <div class="flex flex-col items-center justify-center h-full sm:p-4 bg-gray-200">
        <div class="relative w-full lg:w-10/12 xl:w-8/12 xl2:w-3/12">
            <div class="block bg-white shadow-lg rounded-lg">
                <div class="lg:flex lg:flex-wrap g-0">
                    <div class="lg:w-6/12 px-4 md:px-0 bg-gray-50 rounded-none lg:rounded-l-lg">
                        <div class="p-4 md:p-12 md:mx-6">
                            <div class="text-center my-4 sm:my-8">
                                <img class="mx-auto w-72" src="/imagem/layout/login/logoSistemaEllos.png" alt="Sistema Ellos"/>
                            </div>
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('auth/forgot-password.txtExplanation') }}
                            </div>
                            <h2 class="text-2xl font-bold text-gray-700 mb-4">
                                Entre com seus dados:
                            </h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" class="block mb-2 text-sm font-medium text-gray-700" :value="__('auth/forgot-password.labelEmail')" />
                                    <x-text-input id="email" class="border sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" type="email" name="email" :value="old('email')" placeholder="name@company.com" required/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mt-3 mb-5 text-right">
                                    <x-primary-button icon="codicon-mail">
                                        {{ __('auth/forgot-password.labelBtnEmailPasswordReset') }}
                                    </x-primary-button>
                                </div>
                                @if (Route::has('register'))
                                    <div class="text-sm font-medium text-gray-600">
                                        Não é registrado? <a href="{{ route('register') }}" class="text-gray-800 hover:underline">Criar conta.</a>
                                    </div>
                                @endif
                                <div class="text-sm font-medium text-gray-600">
                                    {{ __('auth/register.linkAlreadyRegistered') }} <a href="{{ route('login') }}" class="text-gray-800 hover:underline">Sim, sou registrado.</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="lg:w-6/12 h-80 sm:h-56 lg:h-auto flex items-center rounded-none lg:rounded-r-lg bg-cover bg-top lg:bg-center" style="background-image: url('/imagem/layout/login/img_login3.jpg')">
                        <div class="text-white px-4 py-6 md:p-12 md:mx-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

