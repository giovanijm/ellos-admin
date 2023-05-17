<x-admin.layouts-v2.app
    title="{{  __('admin/permissions.titlePageIndex') }}"
    meta-description="Página Principal do Sistema"
>
    @section('breadcrumbs')
        @include('admin.registrations.providers._partials.breadcumbs')
    @endsection

    @section('submenu')
        @include('admin.registrations._partials.submenu')
    @endsection

    <div class="ellos-main-content">
        <div class="p-3 sm:p-4">
            @include('admin.registrations.providers._partials.header-page-create-edit', ['pageOrigem' => 'edit'])

            <div class="xl:grid xl:grid-cols-3 gap-2 xl:gap-4 mt-4 xl:mt-6">
                <div class="lg:col-span-3 mt-2 lg:mt-0">
                    <form class="form-clockUi-show w-full" method="POST" action="{{ route('admin.providers.update', $provider->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="sm:overflow-hidden rounded-lg sm:border dark:sm:border-gray-700 dark:bg-slate-700">
                            @include('admin.registrations.providers._partials.form', ['pageOrigem' => 'edit'])

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-gray-50 dark:bg-slate-900 dark:sm:bg-slate-800 px-4 py-3 sm:px-6">
                                <x-primary-button
                                    type="submit"
                                    icon="codicon-save"
                                    title="Atualizar dados"
                                >
                                    {{ __('Atualizar') }}
                                </x-primary-button>
                                <x-danger-button
                                    type="button"
                                    id="btnVoltar"
                                    icon="codicon-reply"
                                    class="btn-voltar clockUi-show"
                                    title="Voltar a listagem de registros"
                                >
                                    {{ __('Voltar') }}
                                </x-danger-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="sm:px-6 sm:py-6 mt-2 sm:mt-6 bg-white sm:overflow-hidden sm:border dark:sm:border-gray-700 dark:bg-slate-900 sm:bg-transparent border rounded-lg">
                <div class="grid gap-2 mt-4">
                    <div class="lg:col-span-1">
                        <div class="px-4 sm:px-0">
                            <div class="flex font-bold text-normal text-sm sm:text-xl xl:text-2xl  text-gray-900 dark:text-gray-300 uppercase drop-shadow">
                                <x-fas-square-phone class="w-4 h-4 sm:w-8 sm:h-8"/>
                                <span class="ml-2">Contatos</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-600">Lista de contatos cadastrados para o cliente.</p>
                        </div>
                    </div>
                    <div class="overflow-x-auto lg:col-span-2 mt-2 lg:mt-0">
                        <div class="overflow-x-auto sm:overflow-hidden rounded-lg bg-white dark:bg-slate-900 sm:border border dark:border-gray-700">
                            <form class="w-full" method="POST" action="{{ route('admin.providers.contacts.store') }}">
                                @csrf
                                <input type="hidden" name="providerId" value="{{ $provider->id }}">
                                <table class="ellos-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('Tipo') }}</th>
                                            <th scope="col">{{ __('Contato') }}</th>
                                            <th scope="col">{{ __('Nome do Contato') }}</th>
                                            {{-- @canany(['edit', 'delete'], $objPermissions) --}}
                                                <th scope="col" class="grid justify-center">Ações</th>
                                            {{-- @endcanany --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">
                                                <div class="relative w-full">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <x-fas-hand-point-right class="fa-solid fa-user-group w-5 h-5 text-gray-500 dark:text-gray-400" />
                                                    </div>
                                                    <select id="typeContactId" name="typeContactId" class="py-[10px] px-4 pr-16 pl-10 block w-full text-sm text-gray-700 dark:text-gray-400 dark:bg-slate-900 border-gray-600 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm invalid:border-red-700 disabled:bg-gray-50 disabled:text-gray-500">
                                                        @foreach ($typeContact as $type)
                                                            <option value="{{ $type->id }}">{{ Str::upper($type->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('statusId')
                                                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-8">
                                                            <svg class="h-4 w-4 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                            </svg>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <div class="relative w-full">
                                                    <div class="relative w-full">
                                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                            <x-fas-clipboard-list class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                                                        </div>
                                                        <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                                                            id="contact"
                                                            type="text"
                                                            name="contact"
                                                            placeholder="Digite o contato do cliente..."
                                                            autofocus
                                                            required
                                                        />
                                                    </div>
                                                    <x-input-error :messages="$errors->get('contact')" :enableIcon=true/>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <div class="relative w-full">
                                                    <div class="relative w-full">
                                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                            <x-clarity-user-solid class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                                                        </div>
                                                        <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                                                            id="contactName"
                                                            type="text"
                                                            name="contactName"
                                                            placeholder="Digite o nome do contato..."
                                                            autofocus
                                                            required
                                                        />
                                                    </div>
                                                    <x-input-error :messages="$errors->get('contactName')" :enableIcon=true/>
                                                </div>
                                            </td>
                                            <td scope="row" class="grid justify-center">
                                                <x-primary-button
                                                    type="submit"
                                                    icon="codicon-save"
                                                    :textHidden="true"
                                                    title="Salvar contato"
                                                />
                                            </td>
                                        </tr>
                                        @foreach ($provider->contacts as $contact)
                                            <tr>
                                                <td scope="row" class="flex whitespace-nowrap uppercase">
                                                    <div class="flex items-center pr-2 pointer-events-none">
                                                        @switch($contact->typeContact->name)
                                                            @case('CELULAR')
                                                            @case('CELULAR RECADO')
                                                                <x-fas-mobile-alt class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                                                                @break
                                                            @case('TELEFONE FIXO')
                                                            @case('TELEFONE RECADO')
                                                                <x-fas-square-phone class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                                                                @break
                                                            @case('E-MAIL')
                                                                <x-fas-mail-bulk class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                                                                @break
                                                            @case('WHATSAPP')
                                                                <x-fab-whatsapp-square class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                                                                @break
                                                            @default

                                                        @endswitch

                                                    </div>
                                                    {{ $contact->typeContact->name }}
                                                </td>
                                                <td scope="row" class="whitespace-nowrap uppercase">{{ $contact->contact }}</td>
                                                <td scope="row" class="whitespace-nowrap uppercase">{{ $contact->contactName }}</td>
                                                <td scope="row" class="grid justify-center">
                                                    <x-danger-button
                                                        type="button"
                                                        id="btnContatoExcluir"
                                                        icon="codicon-trash"
                                                        class="btn-contato-excluir flex items-center"
                                                        data-contact-id="{{ $contact->id }}"
                                                        :textHidden="true"
                                                        title="Excluir contato"
                                                    />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @push('scripts')
        @vite('resources/js/admin/manager-customers/providers.js')
    @endpush
</x-admin.layouts-v2.app>
