@if($pageOrigem == 'create')
    <div class="grid gap-4">
        <div class="flex items-center">
            <div class="flex items-center justify-center text-gray-100 bg-green-700 rounded-md w-8 h-8 sm:w-12 sm:h-12 shadow">
                <x-codicon-new-file class="h-4 w-4 sm:h-6 sm:w-6" fill="currentColor" />
            </div>
            <div class="flex flex-col ml-2">
                <span class="text-xs lg:text-sm font-medium text-gray-500">{{ __('Gestão de Clientes') }}</span>
                <span class="font-bold text-normal text-sm sm:text-xl xl:text-2xl  text-gray-900 dark:text-gray-300 uppercase drop-shadow">
                    Adicionar {{ __('Cliente') }}
                </span>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-500">
            Preencha as informações abaixo solicitadas. Os campos marcados em negrito, são de preenchimento obrigatório.
        </p>
    </div>
@else
    <div class="grid gap-4">
        <div class="flex items-center">
            <div class="flex items-center justify-center text-gray-100 bg-green-700 rounded-md w-8 h-8 sm:w-12 sm:h-12 shadow">
                <x-clarity-note-edit-line class="h-4 w-4 sm:h-6 sm:w-6" fill="currentColor" />
            </div>
            <div class="flex flex-col ml-2">
                <span class="text-xs lg:text-sm font-medium text-gray-500">{{ __('Gestão de Clientes') }}</span>
                <span class="font-bold text-normal text-sm sm:text-xl xl:text-2xl  text-gray-900 dark:text-gray-300 uppercase drop-shadow">
                    Alterar {{ __('Cliente') }}
                </span>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-500">
            Preencha as informações abaixo solicitadas. Os campos marcados em negrito, são de preenchimento obrigatório.
        </p>
    </div>
@endif
