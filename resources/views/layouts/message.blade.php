
@if (Session::has('messageInfo'))
    <div id="toastMessage-Info" class="alert-toast flex items-center p-4 mb-4 mt-2 lg:mt-0 text-blue-800 border-l-4 border-blue-300 bg-blue-50 rounded-lg shadow-lg" role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
        <div class="fa-2x flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-blue-300 bg-blue-200 text-blue-500 dark:bg-blue-700 dark:border-blue-600 dark:text-blue-100 mr-4">
            <i class="fa-solid fa-circle-info fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;" ></i>
        </div>
        <div>
            <span class="font-bold">Informação:</span><br/>{{ Session::get('messageInfo') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8" @click="show = false">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
@endif
@if (Session::has('messageSuccess'))
    <div id="toastMessage-Info" class="alert-toast flex items-center p-4 mb-4 mt-2 lg:mt-0 text-green-800 border-l-4 border-green-300 bg-green-50 rounded-lg shadow-lg" role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
        <div class="fa-2x flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-green-300 bg-green-200 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100 mr-4">
            <i class="fa-solid fa-circle-info fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;" ></i>
        </div>
        <div>
            <span class="font-bold">Sucesso:</span><br/>{{ Session::get('messageSuccess') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8" @click="show = false">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
@endif
@if (Session::has('messageWarning'))
    <div id="toastMessage-Info" class="alert-toast flex items-center p-4 mb-4 mt-2 lg:mt-0 text-yellow-800 border-l-4 border-yellow-300 bg-yellow-50 rounded-lg shadow-lg" role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
        <div class="fa-2x flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-yellow-300 bg-yellow-200 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-red-100 mr-4">
            <i class="fa-solid fa-circle-info fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;" ></i>
        </div>
        <div>
            <span class="font-bold">Atenção:</span><br/>{{ Session::get('messageWarning') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-100 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8" @click="show = false">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
@endif
@if (Session::has('messageDanger'))
    <div id="toastMessage-Info" class="alert-toast flex items-center p-4 mb-4 mt-2 lg:mt-0 text-red-800 border-l-4 border-red-300 bg-red-50 rounded-lg shadow-lg" role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
        <div class="fa-2x flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-300 bg-red-200 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100 mr-4">
            <i class="fa-solid fa-circle-info fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;" ></i>
        </div>
        <div>
            <span class="font-bold">Erro:</span><br/>{{ Session::get('messageDanger') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8" @click="show = false">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
@endif

