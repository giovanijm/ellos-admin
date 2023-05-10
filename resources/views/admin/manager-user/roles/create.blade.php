<x-admin.layouts-v2.app
    title="Adicionar {{  __('Grupos') }}"
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
            @include('admin.manager-user.roles._partials.header-page-create')

            <div class="xl:grid xl:grid-cols-3 gap-2 xl:gap-4 mt-4 xl:mt-6">
                <div class="lg:col-span-3 mt-2 lg:mt-0">
                    <form class="form-clockUi-show w-full" method="POST" action="{{ route('admin.roles.store') }}">
                        <div class="sm:overflow-hidden rounded-lg sm:border dark:sm:border-gray-700 dark:bg-slate-700">
                            @include('admin.manager-user.roles._partials.form')

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 dark:bg-slate-900 dark:sm:bg-slate-800 px-4 py-3 sm:px-6">
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
    @push('scripts')
        @vite('resources/js/admin/manager-user/roles.js')
    @endpush
</x-admin.layouts-v2.app>
