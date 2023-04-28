<x-admin.layouts-v2.app
    title="Alterar {{  __('Grupos') }}"
    meta-description="Página Principal do Sistema"
>
    @section('breadcrumbs')
        @include('admin.manager-user.roles._partials.breadcumbs')
    @endsection

    @section('submenu')
        @include('admin.manager-user._partials.submenu')
    @endsection

    <div class="ellos-main-content">
        <div class="p-3 sm:p-4">
            @include('admin.manager-user.permissions._partials.header-page-edit')

            <div class="xl:grid xl:grid-cols-3 gap-2 xl:gap-4 mt-4 xl:mt-6">
                <div class="lg:col-span-3 mt-2 lg:mt-0">
                    <form class="form-clockUi-show w-full" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                        @method('PUT')
                        <div class="sm:overflow-hidden rounded-lg sm:border dark:sm:border-gray-700 dark:bg-slate-700">
                            @include('admin.manager-user.roles._partials.form')

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 dark:bg-slate-900 dark:sm:bg-slate-800 px-4 py-3 sm:px-6">
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

            @canany(['edit', 'view'], $objPermissions)
                <div class="sm:px-6 sm:py-6 mt-2 sm:mt-6 bg-white sm:overflow-hidden sm:border dark:sm:border-gray-700 dark:bg-slate-900 sm:bg-transparent border rounded-lg">
                    <div class="xl:grid xl:grid-cols-3 gap-2 xl:gap-4 mt-4 xl:mt-6">
                        <div class="lg:col-span-1">
                            <div class="px-4 sm:px-0">
                                <div class="flex font-bold text-normal text-sm sm:text-xl xl:text-2xl  text-gray-900 dark:text-gray-300 uppercase drop-shadow">
                                    <x-codicon-key class="w-4 h-4 sm:w-8 sm:h-8"/>
                                    <span class="ml-2">Permissões</span>
                                </div>
                                <p class="mt-1 text-sm text-gray-600">Lista de permissões da plataforma, os itens selecionados, são as permissões que o grupo tem acesso.</p>
                            </div>
                        </div>
                        <div class="lg:col-span-2 mt-2 lg:mt-0">
                            <div class="sm:overflow-hidden rounded-lg bg-white dark:bg-slate-900 sm:border border dark:border-gray-700">
                                <div class="w-full px-4 pt-4">
                                    <div class="grid grid-cols-7 gap-2 mb-2 sm:mb-0 sm:flex sm:items-center w-full">
                                        <label for="filter" class="sr-only">Search</label>
                                        <div class="col-span-7 sm:col-span-1 relative w-full">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <input type="text" id="filter" name="filter" value="" class="input-search-checkbox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digite a palavra chave ...">
                                        </div>
                                        <button data-tooltip-target="tooltip-btn-search" data-tooltip-placement="top" type="button" target_name="divPermissions" class="btn-search-checkbox p-2 ml-2 text-sm font-medium text-white shadow bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <x-eos-manage-search class="w-6 h-6" fill="currentColor" />
                                            <span class="sr-only">Search</span>
                                        </button>
                                        <div id="tooltip-btn-search" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Filtrar os registros
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button data-tooltip-target="tooltip-btn-clear" data-tooltip-placement="top" type="button" target_name="divPermissions" class="btn-search-checkbox-clear p-2 ml-2 text-sm font-medium text-white shadow bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <x-eos-restore-page-o class="w-6 h-6" fill="currentColor" />
                                            <span class="sr-only">Reset</span>
                                        </button>
                                        <div id="tooltip-btn-clear" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Limpar o filtro
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button data-tooltip-target="tooltip-btn-seleciona" data-tooltip-placement="top" type="button" target_name="divPermissions" class="btn-select-all p-2 ml-2 text-sm font-medium text-white shadow bg-green-600 rounded-lg border border-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                                            <x-eos-check-box-o class="h-6 w-6" alt="" title="" fill="currentColor" />
                                            <span class="sr-only">Select All</span>
                                        </button>
                                        <div id="tooltip-btn-seleciona" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Selecionar todos os registros
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button data-tooltip-target="tooltip-btn-remove" data-tooltip-placement="top" type="button" target_name="divPermissions" class="btn-no-select-all p-2 ml-2 text-sm font-medium text-white shadow bg-red-600 rounded-lg border border-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                                            <x-eos-check-box-blank class="h-6 w-6" alt="" title="" fill="currentColor" />
                                            <span class="sr-only">Remove All</span>
                                        </button>
                                        <div id="tooltip-btn-remove" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Desmarcar todos os registros
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button data-tooltip-target="tooltip-btn-inverter" data-tooltip-placement="top" type="button" target_name="divPermissions" class="btn-select-invert p-2 ml-2 text-sm font-medium text-white shadow bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <x-eos-library-add-check class="h-6 w-6" alt="" title="" fill="currentColor" />
                                            <span class="sr-only">Invert All</span>
                                        </button>
                                        <div id="tooltip-btn-inverter" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Inverter seleção dos registros
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                </div>
                                <form class="w-full" method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                    @csrf
                                    <div class="bg-white dark:bg-slate-900 px-4 pb-4 sm:p-4">
                                        <div id="divPermissions" class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
                                            @foreach ($permissions as $permission)
                                                <div for="permissions-checkbox-{{$permission->id}}" class="flex items-center my-1 pl-4 border border-gray-200 rounded dark:border-gray-700">
                                                    <input @checked($role->hasPermission($permission->name)) id="permissions-checkbox-{{$permission->id}}" type="checkbox" value="{{$permission->id}}" name="permissions[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="permissions-checkbox-{{$permission->id}}" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$permission->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endcanany
        </div>
    </div>
    @push('scripts')
        @vite('resources/js/admin/manager-user/roles.js')
    @endpush
</x-admin.layouts-v2.app>
