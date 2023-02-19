@csrf
<div class="bg-white px-4 pb-4 sm:p-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
        <div class="col-span-3 sm:col-span-1">
            <label for="id" class="block text-sm text-gray-700">Código:</label>
            <input type="text" name="id" id="id"
            class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="{{ str_pad($permission->id , 4 , '0' , STR_PAD_LEFT) ?? old('id') }}">
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
        <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-bold text-gray-700">Nome da Permissão:</label>
            <input type="text" name="name" id="name" autocomplete="given-name" maxlength="30"
            class="form-control mt-1 block w-full rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm valid:border-green-500 required:border-red-800 invalid:border-red-500 @error('name') is-invalid @enderror" required value="{{ $permission->name ?? old('name') }}">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
        <div class="sm:col-span-3">
            <label for="description" class="block text-sm text-gray-700">Descrição:</label>
            <input type="text" name="description" id="description" autocomplete="given-name" maxlength="100"
            class="form-control mt-1 block w-full rounded-md focus:border-blue-500 sm:text-sm @error('description') border-red-800 @else border-gray-600 @enderror" value="{{ $permission->description ?? old('description') }}">
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
        <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
            <label for="created_at" class="block text-sm text-gray-700">Data de Criação:</label>
            <input type="text" name="created_at" id="created_at"
            class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="@if(!empty($permission)){{$permission->created_at->format('d/m/Y - H:i:s')}}@else{{old('created_at')}}@endif">
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="updated_at" class="block text-sm text-gray-700">Data de Alteração:</label>
            <input type="text" name="updated_at" id="updated_at"
            class="form-control mt-1 block w-full rounded-md sm:text-sm text-gray-500 border-gray-300 bg-gray-50" disabled="true" value="@if(!empty($permission)){{ $permission->updated_at->format('d/m/Y - H:i:s')}}@else{{old('updated_at')}}@endif">
        </div>
    </div>
</div>
