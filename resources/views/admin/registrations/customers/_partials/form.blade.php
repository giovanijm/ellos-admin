@csrf
<div class="bg-white dark:bg-slate-900 px-4 pb-4 sm:p-6">
    <div class="grid grid-cols-1 lg:flex">
        @if ($pageOrigem == 'edit' && $customer->photo)
            <div class="col-span-1 lg:flex-none">
                <div class="grid justify-content align-center">
                    <div class="grid grid-cols-1 avatar2-img relative">
                        <a href="{{ route('admin.customers.destroyphoto', $customer->id) }}">
                            <x-danger-button
                                type="button"
                                icon="codicon-trash"
                                id="btnRemovePhoto"
                                class="absolute bottom-1 left-1 bg-opacity-25"
                                :textHidden="true"
                                title="Apagar imagem"
                            >
                            </x-danger-button>
                        </a>
                        <img src="/storage/{{ $customer->photo }}">
                    </div>

                </div>
            </div>
        @endif
        <div class="col-span-1 lg:flex-1 @if ($pageOrigem == 'edit' && $customer->photo) lg:pl-4 lg:pt-10 @endif">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 sm:gap-4 py-2">
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
                                :value="!empty($customer) ? str_pad($customer->id , 4 , '0' , STR_PAD_LEFT) : old('id')"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <x-input-label for="id" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Código Externo').':'"/>
                    <div class="relative w-full">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-fas-qrcode class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                            </div>
                            <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                                id="id"
                                type="text"
                                name="id"
                                :disabled=true
                                :value="!empty($customer) ? $customer->externalId : old('externalId')"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <x-input-label for="origin" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Origem do Cadastro').':'"/>
                    <div class="relative w-full">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-fas-file-import class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                            </div>
                            <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                                id="origin"
                                type="text"
                                name="origin"
                                :disabled=true
                                :value="!empty($customer) ? $customer->origin : 'SYSWEB'"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-span-1 pb-2 sm:pb-0">
                    <div>
                        <x-input-label for="origin" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Status do Cliente').':'"/>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-fas-person-circle-check class="fa-solid fa-user-group w-5 h-5 text-gray-500 dark:text-gray-400" />
                            </div>
                            <select id="statusId" name="statusId" class="py-[10px] px-4 pr-16 pl-10 block w-full text-sm text-gray-700 dark:text-gray-400 dark:bg-slate-900 border-gray-600 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm invalid:border-red-700 disabled:bg-gray-50 disabled:text-gray-500">
                                @foreach ($tbstatus as $status)
                                    <option value="{{ $status->id }}" @selected(!empty($status) && $pageOrigem == 'edit' && $status->id == $customer->statusId)>{{ Str::upper($status->name) }}</option>
                                @endforeach
                            </select>
                            @error('statusId')
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-8">
                                    <svg class="h-4 w-4 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('statusId')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-span-1 lg:col-span-2">
                    <x-input-label for="fullName" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Nome Completo').':'"/>
                    <div class="relative w-full">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-clarity-user-solid class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                            </div>
                            <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                                id="fullName"
                                type="text"
                                name="fullName"
                                :value="$customer->fullName ?? old('fullName')"
                                placeholder="Digite nome completo do cliente..."
                                autofocus
                                required
                            />
                        </div>
                        <x-input-error :messages="$errors->get('fullName')" :enableIcon=true/>
                    </div>
                </div>
                <div class="col-span-1">
                    <x-input-label for="socialName" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Nome Social').':'"/>
                    <div class="relative w-full">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-clarity-user-solid class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                            </div>
                            <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                                id="socialName"
                                type="text"
                                name="socialName"
                                :value="$customer->socialName ?? old('socialName')"
                                placeholder="Digite nome social do cliente..."
                                autofocus
                                required
                            />
                        </div>
                        <x-input-error :messages="$errors->get('socialName')" :enableIcon=true/>
                    </div>
                </div>
                <div class="col-span-1">
                    <x-input-label for="documentNumber" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Número do CPF').':'"/>
                    <div class="relative w-full">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-fas-id-card class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                            </div>
                            <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                                id="documentNumber"
                                type="text"
                                name="documentNumber"
                                :value="$customer->documentNumber ?? old('documentNumber')"
                                placeholder="Digite o número do CPF do cliente..."
                                autofocus
                                required
                            />
                        </div>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">Digite somente números.</p>
                        <x-input-error :messages="$errors->get('documentNumber')" :enableIcon=true/>
                    </div>
                </div>
                @if ($pageOrigem == 'edit' && !$customer->photo)
                    <div class="col-span-1 lg:col-span-4">
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
                @endif
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 py-2">
        <div class="col-span-1">
            <x-input-label for="postalCode" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Número CEP').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div id="postalCode-icon" class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-fas-location-dot class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="postalCode"
                        type="text"
                        name="postalCode"
                        :value="$customer->postalCode ?? old('postalCode')"
                        placeholder="Digite CEP do endereço..."
                        autofocus
                        required
                    />
                </div>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">Digite somente números.</p>
                <x-input-error :messages="$errors->get('postalCode')" :enableIcon=true/>
            </div>
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-input-label for="address" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Endereço').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-fas-location-dot class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="address"
                        type="text"
                        name="address"
                        :value="$customer->address ?? old('address')"
                        placeholder="Digite o endereço do cliente..."
                        autofocus
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('address')" :enableIcon=true/>
            </div>
        </div>
        <div class="col-span-1">
            <x-input-label for="addressNumber" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Número').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-fas-location-dot class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="addressNumber"
                        type="text"
                        name="addressNumber"
                        :value="$customer->addressNumber ?? old('addressNumber')"
                        placeholder="Digite número do endereço..."
                        autofocus
                    />
                </div>
                <x-input-error :messages="$errors->get('addressNumber')" :enableIcon=true/>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 py-2">
        <div class="col-span-1">
            <x-input-label for="complement" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Complemento').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-fas-location-dot class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="complement"
                        type="text"
                        name="complement"
                        :value="$customer->complement ?? old('complement')"
                        placeholder="Digite o complemento do endereço..."
                        autofocus
                    />
                </div>
                <x-input-error :messages="$errors->get('complement')" :enableIcon=true/>
            </div>
        </div>
        <div class="col-span-1">
            <x-input-label for="neighborhood" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Bairro').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-fas-location-dot class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="neighborhood"
                        type="text"
                        name="neighborhood"
                        :value="$customer->neighborhood ?? old('neighborhood')"
                        placeholder="Digite o bairro do endereço..."
                        autofocus
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('neighborhood')" :enableIcon=true/>
            </div>
        </div>
        <div class="col-span-1">
            <x-input-label for="city" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Cidade').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-fas-location-dot class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="city"
                        type="text"
                        name="city"
                        :value="$customer->city ?? old('city')"
                        placeholder="Digite o cidade do endereço..."
                        autofocus
                        required
                    />
                </div>
                <x-input-error :messages="$errors->get('city')" :enableIcon=true/>
            </div>
        </div>
        <div class="col-span-1">
            <x-input-label for="state" class="block mb-1 text-sm font-bold text-gray-700" :value="'* '.__('Estado (UF)').':'"/>
            <div class="relative w-full">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-fas-location-dot class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <x-text-input class="sm:text-sm w-full pl-10 p-2.5 placeholder-gray-600"
                        id="state"
                        type="text"
                        name="state"
                        :value="$customer->state ?? old('state')"
                        placeholder="Digite o estado (UF) do endereço..."
                        autofocus
                        required
                        maxlength="2"
                    />
                </div>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">Somente a sigla do UF.</p>
                <x-input-error :messages="$errors->get('state')" :enableIcon=true/>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:gap-4 py-2">
        <div class="col-span-1">
            <x-input-label for="observation" class="block mb-1 text-sm font-bold text-gray-700" :value="__('Observação').':'"/>
            <div class="relative w-full">
                <textarea id="observation" name="observation" class="w-full text-sm rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm invalid:border-red-700 valid:border-green-700 disabled:bg-gray-50 disabled:text-gray-500 dark:disabled:bg-slate-800 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" rows="5">{{ !empty($customer) ?  $customer->observation : '' }}</textarea>
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
                        :value="!empty($customer) ? $customer->created_at : old('created_at')"
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
                        :value="!empty($customer) ? $customer->updated_at : old('updated_at')"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
