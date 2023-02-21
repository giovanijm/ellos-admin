<form class="" method="GET">
    <div class="lg:flex lg:gap-2">
        <ul data-tooltip-target="tooltip-btn-filter-row" data-tooltip-placement="top" class="items-center text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex my-2 uppercase">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center px-3">
                    <input @if($filter_row == 'id') checked @endif id="filter_row_id" type="radio" value="id" name="filter_row" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="filter_row_id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Código') }}</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center px-3">
                    <input @if($filter_row == 'name') checked @endif id="filter_row_name" type="radio" value="name" name="filter_row" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="filter_row_name" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Nome') }}</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center px-3">
                    <input @if($filter_row == 'active') checked @endif id="filter_row_active" type="radio" value="active" name="filter_row" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="filter_row_active" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Ativo') }}</label>
                </div>
            </li>
        </ul>
        <div id="tooltip-btn-filter-row" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Selecione um dos campos para fazer a busca
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <div class="flex items-center w-full my-2 lg:mx-2">
            <label for="filter" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="filter" name="filter" value="{{ $filter }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digite a palavra chave ..." required>
            </div>
            <button data-tooltip-target="tooltip-btn-search" data-tooltip-placement="top" type="submit" class="p-2.5 ml-2 text-sm font-medium text-white shadow bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>
            <div id="tooltip-btn-search" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Filtrar os registros
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="{{ route('admin.roles.index') }}">
                <button data-tooltip-target="tooltip-btn-clear" data-tooltip-placement="top" type="button" class="p-2.5 ml-2 text-sm font-medium text-white shadow bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M12 5.25c1.213 0 2.415.046 3.605.135a3.256 3.256 0 013.01 3.01c.044.583.077 1.17.1 1.759L17.03 8.47a.75.75 0 10-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 00-1.06-1.06l-1.752 1.751c-.023-.65-.06-1.296-.108-1.939a4.756 4.756 0 00-4.392-4.392 49.422 49.422 0 00-7.436 0A4.756 4.756 0 003.89 8.282c-.017.224-.033.447-.046.672a.75.75 0 101.497.092c.013-.217.028-.434.044-.651a3.256 3.256 0 013.01-3.01c1.19-.09 2.392-.135 3.605-.135zm-6.97 6.22a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.752-1.751c.023.65.06 1.296.108 1.939a4.756 4.756 0 004.392 4.392 49.413 49.413 0 007.436 0 4.756 4.756 0 004.392-4.392c.017-.223.032-.447.046-.672a.75.75 0 00-1.497-.092c-.013.217-.028.434-.044.651a3.256 3.256 0 01-3.01 3.01 47.953 47.953 0 01-7.21 0 3.256 3.256 0 01-3.01-3.01 47.759 47.759 0 01-.1-1.759L6.97 15.53a.75.75 0 001.06-1.06l-3-3z" fill-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Limpar</span>
                </button>
                <div id="tooltip-btn-clear" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Limpar o filtro
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </a>
            @can('new', $objPermissions)
                <a href="{{ route('admin.roles.create') }}">
                    <button data-tooltip-target="tooltip-btn-adicionar" data-tooltip-placement="top" type="button" class="p-2.5 ml-2 text-sm font-medium text-white shadow bg-green-600 rounded-lg border border-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                        <x-codicon-new-file class="h-5 w-5" fill="currentColor" />
                        <span class="sr-only">Limpar</span>
                    </button>
                    <div id="tooltip-btn-adicionar" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Adicionar novo registro
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </a>
            @endcan
        </div>
    </div>
</form>
