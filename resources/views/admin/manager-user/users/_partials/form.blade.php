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
                        :value="!empty($user) ? str_pad($user->id , 4 , '0' , STR_PAD_LEFT) : old('id')"
                    />
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 py-2">
        <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
            <x-input-label for="name" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('auth/register.labelName')"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-clarity-user-solid class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="name"
                        type="text"
                        name="name"
                        :value="$user->name ?? old('name')"
                        placeholder="Digite seu nome..."
                        autofocus
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('name')" :enableIcon=true/>
            </div>
        </div>
        <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
            <x-input-label for="email" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('E-mail')"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"></path>
                            <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"></path>
                        </svg>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="email"
                        type="text"
                        name="email"
                        :value="$user->email ?? old('email')"
                        placeholder="name@company.com"
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('email')" :enableIcon=true/>
            </div>
        </div>
    </div>
    @if($pageOrigem == 'create')
        <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 py-2">
            <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
                <x-input-label for="password" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Senha').':'"/>
                <div class="relative w-full">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-clarity-key-solid class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                        </div>
                        <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                            id="password"
                            type="password"
                            name="password"
                            :value="old('password')"
                            placeholder="••••••••"
                            required
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" :enableIcon=true/>
                </div>
            </div>
            <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
                <x-input-label for="password_confirmation" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Confirmar Senha').':'"/>
                <div class="relative w-full">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-clarity-key-solid class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                        </div>
                        <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            :value="old('password_confirmation')"
                            placeholder="••••••••"
                            required
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" :enableIcon=true/>
                </div>
            </div>
        </div>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 py-2">
        <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
            <div>
                <label for="role_id" class="block text-sm font-medium mb-2 dark:text-white">Grupo do Usuário:</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-user-group w-5 h-5 mt-1 text-gray-500 dark:text-gray-400"></i>
                    </div>
                    <select id="role_id" name="role_id" class="py-[10px] px-4 pr-16 pl-10 block w-full text-sm text-gray-700 dark:text-gray-400 dark:bg-slate-900 border-gray-600 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm invalid:border-red-700 disabled:bg-gray-50 disabled:text-gray-500">
                        <option value="0">Selecione uma opção...</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected(!empty($user) && $user->hasRole($role->name))>{{ Str::upper($role->name) }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-8">
                            <svg class="h-4 w-4 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('role_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-span-2 sm:col-span-1 pb-2 sm:pb-0">
            <div class="sm:col-span-3 mt-3">
                <x-input-label for="switch_active" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Usuário Ativo').':'"/>
                <div class="flex items-center my-2">
                    <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Não</label>
                    <input type="checkbox" id="switch_active" name="active" value="1" class="relative shrink-0 w-[3.25rem] h-7 bg-red-600 checked:bg-none checked:focus:bg-green-600 checked:bg-green-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-green-600 focus:ring-green-600 ring-offset-white focus:outline-none appearance-none
                    before:inline-block before:w-6 before:h-6 before:bg-red-200 checked:before:bg-green-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-green-200" @checked(!empty($user) && $user->active)>
                    <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Sim</label>
                </div>
            </div>
        </div>
    </div>
    @if ($pageOrigem == 'edit')
        @if($user->photo)
            <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 py-2">
                <div class="col-span-1">
                    <x-input-label for="photo-file" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Imagem do Perfil').':'"/>
                    <div class="flex justify-content align-center">
                        <div class="ellos-avatar-horizontal lg:ellos-avatar-horizontal-md 2xl:ellos-avatar-horizontal-lg">
                            <div class="avatar-img">
                                <img src="/storage/{{ $user->photo }}">
                            </div>
                        </div>

                    </div>
                    <a href="{{ route('admin.user.destroyphoto', $user->id) }}">
                        <x-danger-button
                            type="button"
                            icon="codicon-trash"
                            id="btnRemovePhoto"
                        >
                            {{ __('Remover Foto') }}
                    </x-danger-button>
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 py-2">
                <div class="col-span-3">
                    <x-input-label for="photo-file" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Imagem do Perfil').':'"/>
                    <div class="relative w-full">
                        <div class="relative w-full">
                            <div class="absolute bg-blue-700 dark:bg-blue-800 border-l border-t border-b border-gray-300 dark:border-gray-700 rounded-l-md inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-fas-id-badge class="w-5 h-5 text-gray-200 dark:text-gray-400"/>
                            </div>
                            <input type="file" name="photo-file" id="photo-file"
                                class="block w-full border border-gray-300 shadow-sm rounded-md text-sm file:text-gray-200 text-gray-600 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                                    file:border-0
                                    file:bg-blue-700 file:mr-4
                                    file:py-3 file:px-4
                                    dark:file:bg-blue-800 dark:file:text-gray-400
                                    file:ml-5"
                            >
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    <x-input-error :messages="$errors->get('photo-file')" :enableIcon=true/>
                </div>
            </div>
        @endif
    @endif
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
                        :value="!empty($user) ? $user->created_at : old('created_at')"
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
                        :value="!empty($user) ? $user->updated_at : old('updated_at')"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
