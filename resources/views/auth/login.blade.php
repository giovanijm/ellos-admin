
@extends('layouts.guest')

@section('title', __('Login'))

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <main class="bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 bg-gray-900">
            <a href="https://flowbite-admin-dashboard.vercel.app/" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 text-white">
                <img src="https://flowbite-admin-dashboard.vercel.app/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo">
                <span>Flowbite</span>
            </a>
            <!-- Card -->
            <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 rounded-lg shadow bg-gray-800">
                <h2 class="text-2xl font-bold text-white">
                    Entre com suas credências:
                </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" class="block mb-2 text-sm font-medium text-white" :value="__('auth/login.labelEmail')" />
                        <x-text-input id="email" class="border sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" type="email" name="email" :value="old('email')" placeholder="name@company.com" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" class="block mb-2 text-sm font-medium text-white" :value="__('auth/login.labelPassword')" />
                        <x-text-input id="password" class="border sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                        type="password"
                                        name="password"
                                        placeholder="••••••••"
                                        required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Remember Me -->
                    <div class="flex items-start mt-3">
                        <div class="flex items-center h-5">
                            <input id="remember_me" aria-describedby="remember_me" name="remember" type="checkbox" class="w-4 h-4 rounded focus:ring-3 focus:ring-primary-300 focus:ring-primary-600 ring-offset-gray-800 bg-gray-700 border-gray-600">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember_me" class="font-medium text-white">{{ __('auth/login.labelRemenberMe') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="ml-auto text-sm text-white hover:underline">{{ __('auth/login.linkFotgotYouPassword') }}</a>
                        @endif
                    </div>
                    <div class="my-3">
                        <x-primary-button icon="codicon-lock">
                            {{ __('auth/login.labelBtnLogIn') }}
                        </x-primary-button>
                    </div>
                    @if (Route::has('register'))
                        <div class="text-sm font-medium text-gray-400">
                            Não é registrado? <a href="{{ route('register') }}" class="text-white hover:underline">Criar conta.</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </main>

@endsection
