<div class="ellos-header-page">
    <div class="div-titulo">
        <div class="div-icon">
            <svg aria-hidden="true" class="icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" fill-rule="evenodd"></path>
                <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z"></path>
              </svg>
        </div>
        <div class="div-text">
            <span class="subtitulo">{{ __('Cadastro') }}</span>
            <span class="titulo">
                {{ __('Prestadores de Serviços') }}
            </span>
        </div>
    </div>
    <div class="div-busca">
        <form class="" method="GET">
            <div class="busca">
                <ul>
                    <li>
                        <div class="opcao">
                            <input @if($filter_row == 'id') checked @endif id="filter_row_id" type="radio" value="id" name="filter_row">
                            <label for="filter_row_id">{{ __('Código') }}</label>
                        </div>
                    </li>
                    <li>
                        <div class="opcao">
                            <input @if($filter_row == 'fullName') checked @endif id="filter_row_fullname" type="radio" value="fullName" name="filter_row">
                            <label for="filter_row_fullname">{{ __('Nome') }}</label>
                        </div>
                    </li>
                    <li>
                        <div class="opcao">
                            <input @if($filter_row == 'documentNumber') checked @endif id="filter_row_documentnumber" type="radio" value="documentNumber" name="filter_row">
                            <label for="filter_row_documentnumber">{{ __('Documento') }}</label>
                        </div>
                    </li>
                    <li>
                        <div class="opcao">
                            <input @if($filter_row == 'statusId') checked @endif id="filter_row_statusid" type="radio" value="statusId" name="filter_row">
                            <label for="filter_row_statusid">{{ __('Status') }}</label>
                        </div>
                    </li>
                </ul>
                <div class="div-busca">
                    <label for="filter" class="sr-only">Search</label>
                    <div class="div-input">
                        <div class="div-icon">
                            <svg aria-hidden="true" class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" id="filter" name="filter" value="{{ $filter }}" placeholder="Digite a palavra chave ..." required>
                    </div>
                    <button type="submit" class="btn-blue">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                    <a href="{{ route('admin.providers.index') }}">
                        <button type="button" class="btn-blue">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 5.25c1.213 0 2.415.046 3.605.135a3.256 3.256 0 013.01 3.01c.044.583.077 1.17.1 1.759L17.03 8.47a.75.75 0 10-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 00-1.06-1.06l-1.752 1.751c-.023-.65-.06-1.296-.108-1.939a4.756 4.756 0 00-4.392-4.392 49.422 49.422 0 00-7.436 0A4.756 4.756 0 003.89 8.282c-.017.224-.033.447-.046.672a.75.75 0 101.497.092c.013-.217.028-.434.044-.651a3.256 3.256 0 013.01-3.01c1.19-.09 2.392-.135 3.605-.135zm-6.97 6.22a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.752-1.751c.023.65.06 1.296.108 1.939a4.756 4.756 0 004.392 4.392 49.413 49.413 0 007.436 0 4.756 4.756 0 004.392-4.392c.017-.223.032-.447.046-.672a.75.75 0 00-1.497-.092c-.013.217-.028.434-.044.651a3.256 3.256 0 01-3.01 3.01 47.953 47.953 0 01-7.21 0 3.256 3.256 0 01-3.01-3.01 47.759 47.759 0 01-.1-1.759L6.97 15.53a.75.75 0 001.06-1.06l-3-3z" fill-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Limpar</span>
                        </button>
                    </a>
                    @can('new', $objPermissions)
                        <a href="{{ route('admin.providers.create') }}">
                            <button type="button" class="btn-green">
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
