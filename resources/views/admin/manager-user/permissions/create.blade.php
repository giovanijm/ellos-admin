<x-admin-layout>

    @include('admin.manager-user.permissions.partials.breadcumbs')

    <div class="p-4 mt-4 sm:p-8 bg-white shadow rounded-lg">
        <div class="flex-1 px-3 py-3 bg-gray-50 border rounded-lg">
            <h1 class="inline-flex font-bold text-sm sm:text-2xl mt-2 text-gray-900 uppercase drop-shadow-lg">
                <x-codicon-new-file class="h-4 w-4 sm:h-8 sm:w-8 mr-2" fill="currentColor" /> Adicionar @lang('admin/permissions.labelPermissions')
            </h1>
            <p class="text-sm font-medium text-gray-500 ">
                Preencha as informações abaixo solicitadas. Os campos marcados em negrito, são de preenchimento obrigatório.
            </p>
        </div>
        <div class="px-6 py-6 mt-6 border rounded-lg">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 hidden sm:block">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Específica</h3>
                        <p class="mt-1 text-sm text-gray-600">Aqui vais as informações necessárias para a criação de uma nova permissão.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form class="w-full" method="POST" action="{{ route('admin.permissions.store') }}">
                        @csrf
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-bold text-gray-700">Nome da Permissão:</label>
                                        <input type="text" name="name" id="name" autocomplete="given-name" maxlength="30"
                                        class="form-control mt-1 block w-full rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm valid:border-green-500 required:border-red-800 invalid:border-red-500 @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="description" class="block text-sm text-gray-700">Descrição:</label>
                                        <input type="text" name="description" id="description" autocomplete="given-name" maxlength="100"
                                        class="form-control mt-1 block w-full rounded-md focus:border-blue-500 sm:text-sm @error('description') border-red-800 @else border-gray-600 @enderror" value="{{ old('description') }}">
                                        @error('description')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
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
