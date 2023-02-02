@php
    $cadPermissoes = new \App\Models\Permission(); $cadPermissoes->name = "CadPermissoes";
@endphp

<x-admin-layout>
    @include('admin.manager-user.permissions.partials.breadcumbs')
    <div class="p-4 mt-4 sm:p-8 bg-white shadow rounded-lg">
        <x-speed-dial/>
        <div class="overflow-x-auto mt-4 bg-white border rounded-lg">
            <table class="w-full text-sm text-gray-500">
                @include('admin.manager-user.permissions.partials.table-caption')
                <thead class="text-medium text-left text-white uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="px-2 py-4">#</th>
                        <th scope="col" class="px-2 py-4">@lang('admin/permissions.labelPermissionName')</th>
                        <th scope="col" class="px-2 py-4">@lang('admin/permissions.labelPermissionDescription')</th>
                        <th scope="col" class="px-2 py-4">Quant. Grupos Vinculados</th>
                        @canany(['edit', 'delete'], $cadPermissoes)
                            <th scope="col" class="px-2 py-4 text-center"></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody class="text-medium text-gray-900">
                    @foreach ($permissions as $permission)
                        <tr class="even:bg-white odd:bg-gray-100 hover:bg-blue-100">
                            <td scope="row" class="px-2 py-3 font-bold">{{ $permission->id }}</td>
                            <td scope="row" class="px-2 py-3">{{ $permission->name }}</td>
                            <td scope="row" class="px-2 py-3">{{ $permission->description }}</td>
                            <td scope="row" class="px-2 py-3">{{ count($permission->roles) }}</td>
                            @canany(['edit', 'delete'], $cadPermissoes)
                                <td scope="row" class="border-l">
                                    <div class="grid lg:flex lg:justify-center">
                                        @can('edit', $cadPermissoes)
                                            <div class="m-1 lg:m2">
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                    <x-secondary-button class="w-full lg:w-auto" icon="codicon-edit">
                                                        {{ __('admin/default.labelUpdate') }}
                                                    </x-secondary-button>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('delete', $cadPermissoes)
                                            <div class="m-1 lg:m2">
                                                <form method="POST" class="form-exclusao" action="{{ route('admin.permissions.destroy', $permission->id) }}">
                                                    <input type="hidden" value="{{$permission->id}}" name="permission_id">
                                                    <input type="hidden" value="{{$permission->name}}" name="permission_name">
                                                    <x-danger-button class="w-full lg:w-auto" type="submit" icon="codicon-trash">
                                                        {{ __('admin/default.labelDelete') }}
                                                    </x-danger-button>
                                                </form>
                                            </div>
                                        @endcan
                                    </div>
                                </td>
                            @endcanany
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-2">
            {!! $permissions->appends(['sort' => $dadosbusca != null ? $dadosbusca["sort"] : 'name'])->links() !!}
        </div>
    </div>

    <div id="modalEl" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>

    @include('admin.manager-user.permissions.partials.modal')
    @vite('resources/js/admin/manager-user/permissions.js')

</x-admin-layout>
