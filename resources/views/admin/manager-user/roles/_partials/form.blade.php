@csrf
<div class="bg-white dark:bg-slate-900 px-4 pb-4 sm:p-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 py-2">
        <div class="col-span-1">
            <x-input-label for="id" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Código').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-clarity-qr-code-line class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="id"
                        type="text"
                        name="id"
                        :disabled=true
                        :value="!empty($role) ? str_pad($role->id , 4 , '0' , STR_PAD_LEFT) : old('id')"
                    />
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 py-2">
        <div class="col-span-1 sm:col-span-3">
            <x-input-label for="name" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Nome do Grupo').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-clarity-group-solid class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="name"
                        type="text"
                        name="name"
                        :value="$role->name ?? old('name')"
                        placeholder="Digite nome do grupo..."
                        autofocus
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('name')" :enableIcon=true/>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 pb-2">
        <div class="sm:col-span-3">
            <x-input-label for="name" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Grupo Ativo').':'"/>
            <div class="flex items-center my-2">
                <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">NÃO</label>
                <input type="checkbox" id="switch_active" name="active" value="1" class="relative shrink-0 w-[3.25rem] h-7 bg-red-600 checked:bg-none checked:bg-green-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent checked:hover:bg-green-600 checked:focus:bg-green-600 focus:border-green-600 focus:ring-green-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-green-600 dark:focus:ring-offset-gray-800
                before:inline-block before:w-6 before:h-6 before:bg-red-200 checked:before:bg-green-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-green-200" @checked(!empty($role) && $role->active)>
                <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">SIM</label>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
        <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
            <x-input-label for="created_at" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Data de Criação').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-calendar-days text-gray-500 dark:text-gray-400"></i>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="created_at"
                        type="text"
                        name="created_at"
                        :disabled=true
                        :value="!empty($role) ? $role->created_at : old('created_at')"
                    />
                </div>
            </div>
        </div>
        <div class="col-span-2 sm:col-span-1">
            <x-input-label for="updated_at" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Data de Alteração').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-calendar-days text-gray-500 dark:text-gray-400"></i>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="updated_at"
                        type="text"
                        name="updated_at"
                        :disabled=true
                        :value="!empty($role) ? $role->updated_at : old('updated_at')"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
