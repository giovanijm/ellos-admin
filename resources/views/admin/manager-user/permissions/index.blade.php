@php
    $cadPermissoes = new \App\Models\Permission(); $cadPermissoes->name = "CadPermissoes";
@endphp

<x-admin-layout>
    @section('title', __('admin/permissions.titlePage'))
    @include('admin.manager-user.permissions.partials.breadcumbs')
    <div class="p-4 mt-4 sm:p-8 bg-white shadow rounded-lg">
        {{-- <x-speed-dial/> --}}
        @include('admin.manager-user.permissions.partials.table-caption')

        <div class="overflow-x-auto mt-4 bg-white border rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">@sortablelink('id', 'Código')</th>
                        <th scope="col" class="px-6 py-3">@sortablelink('name', trans('admin/permissions.labelPermissionName'))</th>
                        <th scope="col" class="px-6 py-3">@sortablelink('description', trans('admin/permissions.labelPermissionDescription'))</th>
                        <th scope="col" class="px-6 py-3">{{ __('Quant. Grupos Vinculados') }}</th>
                        @canany(['edit', 'delete'], $cadPermissoes)
                            <th scope="col" class="px-6 py-2"></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        {{-- <tr class="even:bg-white odd:bg-gray-100 hover:bg-blue-100"> --}}
                        <tr class="even:bg-white odd:bg-gray-100 dark:bg-gray-800 hover:bg-blue-100">
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $permission->id }}</th>
                            <td class="px-6 py-2">{{ $permission->name }}</td>
                            <td class="px-6 py-2">{{ $permission->description }}</td>
                            <td class="px-6 py-2 ">{{ $permission->roles->count() }}</td>
                            @canany(['edit', 'delete'], $cadPermissoes)
                                <td scope="row" class="px-6 py-2 border-l">
                                    <div class="grid lg:flex lg:justify-center">
                                        @can('edit', $cadPermissoes)
                                            <div class="m-1 lg:m2">
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                    <x-secondary-button class="lg:w-auto" icon="codicon-edit" adaptative="true">
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
                                                    <x-danger-button class="w-full lg:w-auto" type="submit" icon="codicon-trash" adaptative="true">
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
            {!! $permissions->appends([
                    'sort'              => request()->get('sort', 'name'),
                    'direction'         => request()->get('direction', 'asc'),
                    'campo-radio'       => request()->get('campo-radio', 'name'),
                    'row-selected'      => request()->get('row-selected', 'Nome da Permissão'),
                    'search-dropdown'   => request()->get('search-dropdown', ''),
                ])->links() !!}
        </div>
    </div>

    @include('admin.manager-user.permissions.partials.modal')
    @vite('resources/js/admin/manager-user/permissions.js')

</x-admin-layout>
