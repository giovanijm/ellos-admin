@csrf
<div class="bg-white px-4 pb-4 sm:p-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
        <div class="col-span-3 sm:col-span-1">
            <label for="id" class="block text-sm text-gray-700">Código:</label>
            <input type="text" name="id" id="id"
            class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="{{ str_pad($role->id , 4 , '0' , STR_PAD_LEFT) ?? old('id') }}">
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
        <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-bold text-gray-700">Nome do Grupo:</label>
            <input type="text" name="name" id="name" autocomplete="given-name" maxlength="30"
            class="form-control mt-1 block w-full rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm valid:border-green-500 required:border-red-800 invalid:border-red-500 @error('name') is-invalid @enderror" required value="{{ $role->name ?? old('name') }}">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
        <div class="sm:col-span-3">
            <label class="block text-sm font-sm text-gray-700">Grupo Ativo ?</label>
            <div class="flex items-center my-2">
                <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Não</label>
                <input type="checkbox" id="switch_active" name="active" value="1" class="relative shrink-0 w-[3.25rem] h-7 bg-red-600 checked:bg-none checked:bg-green-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent checked:hover:bg-green-600 checked:focus:bg-green-600 focus:border-green-600 focus:ring-green-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-green-600 dark:focus:ring-offset-gray-800
                before:inline-block before:w-6 before:h-6 before:bg-red-200 checked:before:bg-green-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-green-200" @checked(!empty($role) && $role->active)>
                <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Sim</label>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
        <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
            <label for="created_at" class="block text-sm text-gray-700">Data de Criação:</label>
            <input type="text" name="created_at" id="created_at"
            class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="@if(!empty($role)){{$role->created_at->format('d/m/Y - H:i:s')}}@else{{old('created_at')}}@endif">
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="updated_at" class="block text-sm text-gray-700">Data de Alteração:</label>
            <input type="text" name="updated_at" id="updated_at"
            class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="@if(!empty($role)){{ $role->updated_at->format('d/m/Y - H:i:s')}}@else{{old('updated_at')}}@endif">
        </div>
    </div>
</div>
