@if (Session::has('messageInfo'))
    <div id="toastMessage-Info" class="flex p-4 mb-4 text-blue-800 border-l-4 border-blue-300 bg-blue-50 rounded-lg shadow-lg" role="alert">
        <div class="flex-none h-6 w-6 mr-2" fill="currentColor">
            {{ svg('typ-info') }}
        </div>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-bold">Mensagem de Informação</span><br/>{{ Session::get('messageInfo') }}
        </div>
        <button id="btnFecharMessagemTM"  type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8" data-dismiss-target="#toastMessage-Info" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @vite('resources/js/message-toast.js')
@elseif (Session::has('messageSuccess'))
    <div id="toastMessage-Info" class="flex p-4 mb-4 text-green-800 border-l-4 border-green-400 bg-green-100 rounded-lg shadow-lg" role="alert">
        <div class="flex-none h-6 w-6 mr-2" fill="currentColor">
            {{ svg('clarity-success-standard-solid') }}
        </div>
        <span class="sr-only">Success</span>
        <div>
        <span class="font-bold">Mensagem de Sucesso</span><br/>{{ Session::get('messageSuccess') }}
        </div>
        <button id="btnFecharMessagemTM"  type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8" data-dismiss-target="#toastMessage-Info" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @vite('resources/js/message-toast.js')
@elseif (Session::has('messageWarning '))
    <div id="toastMessage-Info" class="flex p-4 mb-4 text-yellow-800 border-l-4 border-yellow-400 bg-yellow-100 rounded-lg shadow-lg" role="alert">
        <div class="flex-none h-6 w-6 mr-2" fill="currentColor">
            {{ svg('clarity-warning-standard-solid') }}
        </div>
        <span class="sr-only">Warning</span>
        <div>
        <span class="font-bold">Mensagem de Cuidado</span><br/>{{ Session::get('messageWarning') }}
        </div>
        <button id="btnFecharMessagemTM"  type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-100 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8" data-dismiss-target="#toastMessage-Info" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @vite('resources/js/message-toast.js')
@elseif (Session::has('messageDanger'))
    <div id="toastMessage-Info" class="flex p-4 mb-4 text-red-800 border-l-4 border-red-400 bg-red-100 rounded-lg shadow-lg" role="alert">
        <div class="flex-none h-6 w-6 mr-2" fill="currentColor">
            {{ svg('eos-dangerous') }}
        </div>
        <span class="sr-only">Danger</span>
        <div>
        <span class="font-bold">Mensagem de Erro</span><br/>{{ Session::get('messageDanger') }}
        </div>
        <button id="btnFecharMessagemTM"  type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8" data-dismiss-target="#toastMessage-Info" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @vite('resources/js/message-toast.js')
@endif