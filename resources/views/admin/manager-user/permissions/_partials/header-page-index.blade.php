<div class="xl:grid xl:grid-cols-3 gap-2 xl:gap-4">
    <div class="flex items-center">
        <div class="flex items-center justify-center text-gray-100 bg-green-700 rounded-md w-8 h-8 sm:w-12 sm:h-12 shadow">
            <svg aria-hidden="true" class="h-4 w-4 sm:h-6 sm:w-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" fill-rule="evenodd"></path>
                <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z"></path>
            </svg>
        </div>
        <div class="flex flex-col ml-2">
            <span class="text-xs lg:text-sm font-medium text-gray-500">@lang('admin/permissions.labelManagerUsers')</span>
            <span class="font-bold text-normal text-sm sm:text-xl xl:text-2xl  text-gray-900 dark:text-gray-300 uppercase drop-shadow">
                {{ __('admin/permissions.titlePageIndex') }}
            </span>
        </div>
    </div>
    <div class="xl:col-span-2">
        <form method="GET">
            <div class="xl:flex xl:gap-2">
                <ul class="items-center text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white grid grid-cols-2 sm:flex my-2 uppercase">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center px-3">
                            <input @if($filter_row == 'id') checked @endif id="filter_row_id" type="radio" value="id" name="filter_row" class="w-4 h-4 text-teal-600 dark:text-red-300 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-red-400 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_row_id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">{{ __('Código') }}</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center px-3">
                            <input @if($filter_row == 'name') checked @endif id="filter_row_name" type="radio" value="name" name="filter_row" class="w-4 h-4 text-teal-600 dark:text-red-300 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-red-400 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_row_name" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">{{ __('Nome') }}</label>
                        </div>
                    </li>
                    <li class="w-full dark:border-gray-600">
                        <div class="flex items-center px-3">
                            <input @if($filter_row == 'description') checked @endif id="filter_row_description" type="radio" value="description" name="filter_row" class="w-4 h-4 text-teal-600 dark:text-red-300 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-red-400 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_row_description" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">{{ __('Descrição') }}</label>
                        </div>
                    </li>
                </ul>
                <div class="flex items-center w-full my-2 lg:mx-2">
                    <label for="filter" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" id="filter" name="filter" value="{{ $filter }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-offset-4 dark:focus:ring-offset-slate-900 dark:focus:ring-red-300" placeholder="Digite a palavra chave ..." required>
                    </div>
                    <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white shadow bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                    <a href="{{ route('admin.permissions.index') }}">
                        <button type="button" class="clockUi-show p-2.5 ml-2 text-sm font-medium text-white shadow bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 5.25c1.213 0 2.415.046 3.605.135a3.256 3.256 0 013.01 3.01c.044.583.077 1.17.1 1.759L17.03 8.47a.75.75 0 10-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 00-1.06-1.06l-1.752 1.751c-.023-.65-.06-1.296-.108-1.939a4.756 4.756 0 00-4.392-4.392 49.422 49.422 0 00-7.436 0A4.756 4.756 0 003.89 8.282c-.017.224-.033.447-.046.672a.75.75 0 101.497.092c.013-.217.028-.434.044-.651a3.256 3.256 0 013.01-3.01c1.19-.09 2.392-.135 3.605-.135zm-6.97 6.22a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.752-1.751c.023.65.06 1.296.108 1.939a4.756 4.756 0 004.392 4.392 49.413 49.413 0 007.436 0 4.756 4.756 0 004.392-4.392c.017-.223.032-.447.046-.672a.75.75 0 00-1.497-.092c-.013.217-.028.434-.044.651a3.256 3.256 0 01-3.01 3.01 47.953 47.953 0 01-7.21 0 3.256 3.256 0 01-3.01-3.01 47.759 47.759 0 01-.1-1.759L6.97 15.53a.75.75 0 001.06-1.06l-3-3z" fill-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Limpar</span>
                        </button>
                    </a>
                    @can('new', $objPermissions)
                        <a href="{{ route('admin.permissions.create') }}">
                            <button type="button" class="clockUi-show p-2.5 ml-2 text-sm font-medium text-white shadow bg-green-600 rounded-lg border border-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                                <x-codicon-new-file class="h-5 w-5" fill="currentColor" />
                                <span class="sr-only">Limpar</span>
                            </button>
                        </a>
                    @endcan
                </div>
            </div>
        </form>
    </div>
</div>
