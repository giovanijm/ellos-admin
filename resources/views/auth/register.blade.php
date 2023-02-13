@extends('layouts.guest')

@section('title', __('Registrar'))

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
                            <h2 class="text-2xl font-bold text-gray-700 mb-4">
                                Entre com suas credências:
                            </h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- Name -->
                                <div>
                                    <x-input-label
                                        for="name"
                                        class="block mb-2 text-sm font-medium text-gray-700"
                                        :value="__('auth/register.labelName')"
                                    />
                                    <x-text-input
                                        id="name"
                                        class="border sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                        type="text"
                                        name="name"
                                        :value="old('name')"
                                        placeholder="Digite seu nome..."
                                        required autofocus
                                    />
                                    <x-input-error
                                        :messages="$errors->get('name')"
                                        class="mt-2"
                                    />
                                </div>
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label
                                        for="email"
                                        class="block mb-2 text-sm font-medium text-gray-700"
                                        :value="__('auth/register.labelEmail')"
                                    />
                                    <x-text-input
                                        id="email"
                                        class="border sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                        type="email"
                                        name="email"
                                        :value="old('email')"
                                        placeholder="name@company.com"
                                        required
                                    />
                                    <x-input-error
                                        :messages="$errors->get('email')"
                                        class="mt-2"
                                    />
                                </div>
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label
                                        for="password"
                                        class="lock mb-2 text-sm font-bmedium text-gray-700"
                                        :value="__('auth/register.labelPassword')"
                                    />
                                    <x-text-input
                                        id="password"
                                        class="border sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="new-password"
                                        placeholder="••••••••"
                                    />
                                    <x-input-error
                                        :messages="$errors->get('password')"
                                        class="mt-2"
                                    />
                                </div>
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label
                                        for="password_confirmation"
                                        class="lock mb-2 text-sm font-bmedium text-gray-700"
                                        :value="__('auth/register.labelPasswordConfirmation')"
                                    />
                                    <x-text-input
                                        id="password_confirmation"
                                        class="border sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                        type="password"
                                        name="password_confirmation"
                                        required
                                        placeholder="••••••••"
                                    />
                                    <x-input-error
                                        :messages="$errors->get('password_confirmation')"
                                        class="mt-2"
                                    />
                                </div>
                                <div class="mb-3 mt-5 text-right">
                                    <x-primary-button icon="codicon-check">
                                        {{ __('auth/register.labelBtnRegister') }}
                                    </x-primary-button>
                                </div>
                                <div class="text-sm font-medium text-gray-600">
                                    {{ __('auth/register.linkAlreadyRegistered') }} <a href="{{ route('login') }}" class="text-gray-800 hover:underline">Sim, sou registrado.</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="lg:w-6/12 h-80 sm:h-56 lg:h-auto flex items-center rounded-none lg:rounded-r-lg bg-cover bg-top lg:bg-center" style="background-image: url('/imagem/layout/login/img_login2.jpg')">
                        <div class="text-white px-4 py-6 md:p-12 md:mx-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
