<x-admin.layouts-v2.app
    title="Alterar {{  __('Usuário') }}"
    meta-description="Página Principal do Sistema"
>
    @section('breadcrumbs')
        @include('admin.manager-user.users._partials.breadcumbs')
    @endsection

    @section('submenu')
        @include('admin.manager-user._partials.submenu')
    @endsection

    <div class="ellos-main-content">
        <div class="p-3 sm:p-4">
            @include('admin.manager-user.users._partials.header-page-create-edit', ['pageOrigem' => 'edit'])

            <div class="xl:grid xl:grid-cols-3 gap-2 xl:gap-4 mt-4 xl:mt-6">
                <div class="lg:col-span-3 mt-2 lg:mt-0">
                    <form class="form-clockUi-show w-full" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        <div class="sm:overflow-hidden rounded-lg sm:border dark:sm:border-gray-700 dark:bg-slate-700">
                            @include('admin.manager-user.users._partials.form', ['pageOrigem' => 'edit'])

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 dark:bg-slate-900 dark:sm:bg-slate-800 px-4 py-3 sm:px-6">
                                <x-primary-button
                                    type="submit"
                                    icon="codicon-save"
                                >
                                    {{ __('Atualizar') }}
                                </x-primary-button>
                                <x-danger-button
                                    type="button"
                                    id="btnVoltar"
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
    </div>
    @push('scripts')
        @vite('resources/js/admin/manager-user/users.js')
    @endpush
</x-admin.layouts-v2.app>
