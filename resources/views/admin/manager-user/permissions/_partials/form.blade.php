@csrf
<div class="bg-white dark:bg-slate-900 px-4 pb-4 sm:p-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 py-2">
        <div class="col-span-1">
            <x-input-label for="id" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Código').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-regular fa-id-badge text-gray-500 dark:text-gray-400"></i>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="id"
                        type="text"
                        name="id"
                        :disabled=true
                        :value="!empty($permission) ? str_pad($permission->id , 4 , '0' , STR_PAD_LEFT) : old('id')"
                    />
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 py-2">
        <div class="col-span-1 sm:col-span-3">
            <x-input-label for="name" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Nome da Permissão').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-codicon-key class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="name"
                        type="text"
                        name="name"
                        :value="$permission->name ?? old('name')"
                        placeholder="Digite nome da permissão..."
                        autofocus
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('name')" :enableIcon=true/>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 py-2">
        <div class="col-span-1 sm:col-span-3">
            <x-input-label for="description" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Descrição').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-clarity-file-group-solid class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="description"
                        type="text"
                        name="description"
                        :value="$permission->description ?? old('description')"
                        placeholder="Digite a descrição..."
                        autofocus
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('description')" :enableIcon=true/>
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
                        :value="!empty($permission) ? $permission->created_at : old('created_at')"
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
                        :value="!empty($permission) ? $permission->updated_at : old('updated_at')"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
