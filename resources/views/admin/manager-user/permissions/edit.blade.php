<x-admin-layout>

    @include('admin.manager-user.permissions.partials.breadcumbs')
    @section('title', 'Editar ' . __('admin/permissions.labelPermissions'))

    <div class="p-4 mt-4 sm:p-8 bg-white shadow rounded-lg">
        <div class="flex">
            <div class="flex items-center justify-center text-gray-100 bg-green-700 rounded-md w-12 h-12">
                <x-clarity-note-edit-line class="h-8 w-8" fill="currentColor" />
            </div>
            <div class="flex flex-col ml-2">
                <span class="text-sm font-medium text-gray-500">@lang('admin/permissions.labelManagerUsers')</span>
                <span class="font-bold text-2xl  text-gray-900 uppercase drop-shadow-lg">
                    Editar @lang('admin/permissions.labelPermissions')
                </span>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-500 ">
            Preencha as informações abaixo solicitadas. Os campos marcados em negrito, são de preenchimento obrigatório.
        </p>
        <div class="px-6 py-6 mt-6 border rounded-lg">
            <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                <div class="lg:col-span-1 hidden sm:block">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Específica</h3>
                        <p class="mt-1 text-sm text-gray-600">Aqui vais as informações necessárias para a edição de uma permissão. <b>Após confirmar e salvar os dados, lembre-se de fazer as alterações necessárias também nas validações que utilizam desta permissão</b>.</p>
                    </div>
                </div>
                <div class="mt-5 lg:col-span-2 lg:mt-0">
                    <form class="w-full" method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-1">
                                        <label for="id" class="block text-sm text-gray-700">Código:</label>
                                        <input type="text" name="id" id="id"
                                        class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="{{ $permission->id }}">
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3">
                                        <label for="name" class="block text-sm font-bold text-gray-700">Nome da Permissão:</label>
                                        <input type="text" name="name" id="name" autocomplete="given-name" maxlength="30"
                                        class="form-control mt-1 block w-full rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm valid:border-green-500 required:border-red-800 invalid:border-red-500 @error('name') is-invalid @enderror" required value="{{ $permission->name }}">
                                        @error('name')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                        <p id="helper-text-explanation" class="mt-1 ml-1 text-sm text-gray-500">O nome da permissãp deve ser único no banco de dados. Ele será usado como chave para validação de acesso as informações do sistema.</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3">
                                        <label for="description" class="block text-sm text-gray-700">Descrição:</label>
                                        <input type="text" name="description" id="description" autocomplete="given-name" maxlength="100"
                                        class="form-control mt-1 block w-full rounded-md focus:border-blue-500 sm:text-sm @error('description') border-red-800 @else border-gray-600 @enderror" value="{{ $permission->description }}">
                                        @error('description')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-1">
                                        <label for="created_at" class="block text-sm text-gray-700">Data de Criação:</label>
                                        <input type="text" name="created_at" id="created_at"
                                        class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="{{ $permission->created_at->format('d/m/Y - H:i:s') }}">
                                    </div>
                                    <div class="col-span-3 sm:col-span-1">
                                        <label for="updated_at" class="block text-sm text-gray-700">Data de Alteração:</label>
                                        <input type="text" name="updated_at" id="updated_at"
                                        class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="{{ $permission->updated_at->format('d/m/Y - H:i:s') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3 bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <div class="hidden lg:block"></div>
                                <div class="hidden lg:block"></div>
                                <x-danger-button id="btnVoltar" icon="codicon-reply">
                                    {{ __('Voltar') }}
                                </x-danger-button>
                                <x-primary-button type="submit" icon="codicon-save">
                                    {{ __('Salvar') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/admin/manager-user/permissions.js')

</x-admin-layout>
