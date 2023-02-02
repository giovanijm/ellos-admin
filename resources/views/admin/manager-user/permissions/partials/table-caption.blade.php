<caption class="text-left bg-gray-50">
    <div class="2xl:flex 2xl:place-items-center">
        <div class="px-3 py-3 2xl:w-1/2">
            <h1 class="inline-flex font-bold text-2xl mt-2 text-gray-900 uppercase">
                <svg aria-hidden="true" class="h-8 w-8 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1015.75 1.5zm0 3a.75.75 0 000 1.5A2.25 2.25 0 0118 8.25a.75.75 0 001.5 0 3.75 3.75 0 00-3.75-3.75z" fill-rule="evenodd"></path>
                </svg>
                @lang('admin/permissions.labelPermissions')
            </h1>
            <p class="text-sm font-medium text-gray-500 ">
                @lang('admin/permissions.indexDescriptionPermissions')
            </p>
        </div>
        <div class="2xl:grid 2xl:grid-cols-3 gap-2 px-2 py-2 2xl:py-0 2xl:w-1/2">
            <form id="frmBuscaIndex" class="col-span-2" method="GET" action="{{ route('admin.permissions.index') }}">
                <input type="hidden" value="@if($dadosbusca){{ $dadosbusca["row-selected"] }}@else{{__('Nome')}}@endif" name="row-selected" id="row-selected">
                <input type="hidden" value="@if($dadosbusca){{ $dadosbusca["sort"] }}@else{{__('name')}}@endif" name="sort" id="sort">
                <div class="flex mb-2 2xl:mb-0">
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                        <span id="labelBusca">@if($dadosbusca){{$dadosbusca["row-selected"]}}@else{{__('Selecione um campo')}}@endif</span>
                        <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio-1" name="campo-radio" type="radio" value="id" value-label="Código" @if($dadosbusca && $dadosbusca["campo-radio"] == "id") checked="checked" @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio-1" class="font-medium text-gray-900 dark:text-gray-300">
                                          <div>Código</div>
                                        </label>
                                    </div>
                                  </div>
                            </li>
                            <li>
                                <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio-2" name="campo-radio" type="radio" value="name" value-label="Nome" @if(!$dadosbusca || ($dadosbusca && $dadosbusca["campo-radio"] == "name")) checked="checked" @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio-2" class="font-medium text-gray-900 dark:text-gray-300">
                                          <div>Nome</div>
                                        </label>
                                    </div>
                                  </div>
                            </li>
                            <li>
                                <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio-3" name="campo-radio" type="radio" value="description" value-label="Descrição" @if($dadosbusca && $dadosbusca["campo-radio"] == "description") checked="checked" @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio-3" class="font-medium text-gray-900 dark:text-gray-300">
                                          <div>Descrição</div>
                                        </label>
                                    </div>
                                  </div>
                            </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input
                            type="search"
                            id="search-dropdown"
                            name="search-dropdown"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Buscar por código, nome ou descrição..."
                            required
                            value="@if($dadosbusca){{$dadosbusca["search-dropdown"]}}@endif"
                        >
                        <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Buscar</span>
                        </button>
                    </div>
                </div>
            </form>
            @can('new', $cadPermissoes)
                <a href="{{ route('admin.permissions.create') }}">
                    <x-primary-button class="w-full" icon="codicon-diff-added">
                        {{ __('admin/permissions.labelNewPermission') }}
                    </x-primary-button>
                </a>
            @endcan
        </div>
    </div>
</caption>
