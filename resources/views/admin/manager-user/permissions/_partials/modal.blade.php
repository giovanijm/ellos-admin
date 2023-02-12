<div id="modalE2" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative rounded-lg shadow bg-gray-700">
            <button id="btnFecharModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form id="formExcluir" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-200" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 1.875a1.125 1.125 0 012.25 0v8.219c.517.162 1.02.382 1.5.659V3.375a1.125 1.125 0 012.25 0v10.937a4.505 4.505 0 00-3.25 2.373 8.963 8.963 0 014-.935A.75.75 0 0018 15v-2.266a3.368 3.368 0 01.988-2.37 1.125 1.125 0 011.591 1.59 1.118 1.118 0 00-.329.79v3.006h-.005a6 6 0 01-1.752 4.007l-1.736 1.736a6 6 0 01-4.242 1.757H10.5a7.5 7.5 0 01-7.5-7.5V6.375a1.125 1.125 0 012.25 0v5.519c.46-.452.965-.832 1.5-1.141V3.375a1.125 1.125 0 012.25 0v6.526c.495-.1.997-.151 1.5-.151V1.875z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-400">
                        Deseja excluír o registro <span id="lblMemsagemExclusao"></span>?
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <x-danger-button
                            type="submit"
                            icon="codicon-trash"
                        >
                            Sim, quero excluir
                        </x-danger-button>
                        <x-secondary-button
                            id="btnRecusarModal"
                            type="button"
                            class="w-full"
                            icon="clarity-cancel-line"
                        >
                            Não, cancelar
                        </x-secondary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
