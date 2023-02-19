@extends('layouts.app')

@section('title', 'Adicionar ' . __('Usuário'))

@section('content')
    @include('admin.manager-user.users._partials.breadcumbs')
    <div class="p-2 sm:p-4 xl:p-6 mt-4 bg-white sm:shadow rounded-lg">
        <div class="flex items-center mb-2">
            <div class="flex items-center justify-center text-gray-100 bg-green-700 rounded-md w-8 h-8 lg:w-12 lg:h-12 shadow">
                <x-codicon-new-file class="h-4 w-4 sm:h-6 sm:w-6" fill="currentColor" />
            </div>
            <div class="flex flex-col ml-2">
                <span class="text-xs lg:text-sm font-medium text-gray-500">@lang('admin/permissions.labelManagerUsers')</span>
                <span class="font-bold text-normal text-sm lg:text-2xl  text-gray-900 uppercase drop-shadow">
                    Adicionar {{ __('Usuário') }}
                </span>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-500">
            Preencha as informações abaixo solicitadas. Os campos marcados em negrito, são de preenchimento obrigatório.
        </p>
        <div class="sm:px-6 sm:py-6 mt-2 sm:mt-6 bg-white sm:bg-transparent border rounded-lg">
            <div class="lg:grid lg:grid-cols-3 lg:gap-6 border-0 bg-white sm:bg-transparent rounded-lg sm:rounded-none">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Dados do grupo de usuários</h3>
                        <p class="mt-1 text-sm text-gray-600">Aqui vais as informações necessárias para a criação de um novo grupo de usuários. Para atribuir as permissões, após criar o grupo você entra em editar.</p>
                    </div>
                </div>
                <div class="lg:col-span-2 mt-2 lg:mt-0">
                    <form class="w-full" method="POST" action="{{ route('admin.users.store') }}">
                        <div class="sm:overflow-hidden rounded-lg sm:border">
                            @include('admin.manager-user.users._partials.form', ['pageOrigem' => 'create'])
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 px-4 py-3 sm:px-6">
                                <x-primary-button
                                    type="submit"
                                    icon="codicon-save"
                                >
                                    {{ __('Salvar') }}
                                </x-primary-button>
                                <x-danger-button
                                    type="button"
                                    class="btn-voltar"
                                    icon="codicon-reply"
                                >
                                    {{ __('Voltar') }}
                                </x-danger-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/admin/manager-user/users.js')
@endsection
