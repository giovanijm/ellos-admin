@extends('layouts.app')

@section('title', 'Alterar ' . __('Grupos'))

@section('content')
    @include('admin.manager-user.roles._partials.breadcumbs')
    <div class="p-3 sm:p-4 lg:mt-3 bg-white sm:shadow rounded-lg">
        <div class="flex items-center mb-2">
            <div class="flex items-center justify-center text-gray-100 bg-green-700 rounded-md w-8 h-8 lg:w-12 lg:h-12 shadow">
                <x-clarity-note-edit-line class="h-4 w-4 sm:h-6 sm:w-6" fill="currentColor" />
            </div>
            <div class="flex flex-col ml-2">
                <span class="text-xs lg:text-sm font-medium text-gray-500">@lang('admin/permissions.labelManagerUsers')</span>
                <span class="font-bold text-normal text-sm lg:text-2xl  text-gray-900 uppercase drop-shadow">
                    Alterar {{ __('Grupos') }}
                </span>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-500">
            Preencha as informações abaixo solicitadas. Os campos marcados em negrito, são de preenchimento obrigatório.
        </p>
        <div class="sm:px-6 sm:py-6 mt-2 sm:mt-6 bg-white sm:bg-transparent border rounded-lg">
            <div class="lg:grid lg:grid-cols-3 lg:gap-6 border-0 bg-white sm:bg-transparent rounded-lg sm:rounded-none">
                <div class="lg:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Dados do grupo de usuários</h3>
                        <p class="mt-1 text-sm text-gray-600">Aqui vais as informações necessárias para a edição de um grupo de usuários.</p>
                    </div>
                </div>
                <div class="lg:col-span-2 mt-2 lg:mt-0">
                    <form class="w-full" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                        @method('PUT')
                        <div class="sm:overflow-hidden rounded-lg sm:border">
                            @include('admin.manager-user.roles._partials.form')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 px-4 py-3 sm:px-6">
                                <x-primary-button
                                    type="submit"
                                    icon="codicon-save"
                                >
                                    {{ __('Atualizar') }}
                                </x-primary-button>
                                <x-danger-button
                                    type="button"
                                    icon="codicon-reply"
                                    class="btn-voltar"
                                >
                                    {{ __('Voltar') }}
                                </x-danger-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @canany(['edit', 'view'], $objPermissions)
            <div class="sm:px-6 sm:py-6 mt-2 sm:mt-6 bg-white sm:bg-transparent border rounded-lg">
                <div class="lg:grid lg:grid-cols-3 lg:gap-6 border-0 bg-white sm:bg-transparent rounded-lg sm:rounded-none">
                    <div class="lg:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Permissões</h3>
                            <p class="mt-1 text-sm text-gray-600">Lista de permissões da plataforma, os itens selecionados, são as permissões que o grupo tem acesso.</p>
                        </div>
                    </div>
                    <div class="lg:col-span-2 mt-2 lg:mt-0">
                        <form class="w-full" method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                            @csrf
                            <div class="sm:overflow-hidden rounded-lg sm:border">
                                <div class="bg-white px-4 pb-4 sm:p-6">
                                    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
                                        @foreach ($permissions as $permission)
                                            <div class="flex items-center my-1 pl-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input @checked($role->hasPermission($permission->name)) id="permissions-checkbox-{{$permission->id}}" type="checkbox" value="{{$permission->id}}" name="permissions[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="permissions-checkbox-{{$permission->id}}" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$permission->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 px-4 py-3 sm:px-6">
                                    @canany(['edit'], $objPermissions)
                                        <x-primary-button
                                            type="submit"
                                            icon="codicon-save"
                                        >
                                            {{ __('Atualizar Permissões') }}
                                        </x-primary-button>
                                    @endcanany
                                    <x-danger-button
                                        type="button"
                                        icon="codicon-reply"
                                        class="btn-voltar"
                                    >
                                        {{ __('Voltar') }}
                                    </x-danger-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcanany
    </div>
    @vite('resources/js/admin/manager-user/roles.js')
@endsection


{{-- @extends('layouts.app')

@section('title', 'Alterar ' . __('Grupo'))

@section('content')
    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Back</a>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="text-xl">Name</label>
                    <input id="name" type="text" name="name" value="{{ $role->name }}"
                        class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    @error('name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600 rounded-md
                        font-medium text-white uppercase
                        focus:outline-none hover:shadow-none">
                    Update
                </button>
            </form>
        </div>
    </div>
    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <h2>Permissions</h2>
            <div class="max-w-md mx-auto">
                @foreach ($role->permissions as $rp)
                    <span class="m-2 p-2 bg-indigo-300 rounded-md">{{ $rp->name }}</span>
                @endforeach
            </div>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                @csrf
                <div>
                    <label class="text-xl" style="max-width: 300px">
                        <span class="text-gray-700">Permissions</span>
                        <select name="permissions[]"
                            class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md"
                            multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" @selected($role->hasPermission($permission->name))>
                                    {{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </label>

                </div>

                <button type="submit"
                    class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600 rounded-md
                        font-medium text-white uppercase
                        focus:outline-none hover:shadow-none">
                    Assign Permissions
                </button>
            </form>
        </div>
    </div>
@endsection
 --}}
