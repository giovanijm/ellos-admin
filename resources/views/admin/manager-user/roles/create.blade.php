<x-admin-layout>
    @include('admin.manager-user.roles.partials.breadcumbs')
    <div class="p-4 mt-4 sm:p-8 bg-white shadow rounded-lg">
        <div class="flex-1 px-3 py-3 bg-gray-50 border rounded-lg">
            <h1 class="inline-flex font-bold text-sm sm:text-2xl mt-2 text-gray-900 uppercase drop-shadow-lg">
                <x-codicon-new-file class="h-4 w-4 sm:h-8 sm:w-8 mr-2" fill="currentColor" /> Adicionar @lang('admin/roles.labelRoles')
            </h1>
            <p class="text-sm font-medium text-gray-500 ">
                Preencha as informações abaixo solicitadas. Os campos marcados em negrito, são de preenchimento obrigatório.
            </p>
        </div>
        <div class="px-6 py-6 mt-6 border rounded-lg">
            <form class="w-full" method="POST" action="{{ route('admin.roles.store') }}">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            * Nome do Grupo
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            placeholder=""
                            value="{{ old('name') }}"
                        >
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-3 px-2 justify-end">
                    <a href="{{ route('admin.roles.index') }}">
                        <x-danger-button icon="codicon-reply">
                            {{ __('Voltar') }}
                        </x-danger-button>
                    </a>
                    <x-primary-button type="submit" icon="codicon-save">
                        {{ __('Salvar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
