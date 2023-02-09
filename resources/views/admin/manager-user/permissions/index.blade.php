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
            <table class="w-full text-sm text-gray-500">
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
                            <td scope="row" class="px-2 py-3">{{ $permission->roles->count() }}</td>
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
            {!! $permissions->appends([
                    'sort'              => request()->get('sort', 'name'),
                    'campo-radio'       => request()->get('campo-radio', 'name'),
                    'row-selected'      => request()->get('row-selected', 'Nome da Permissão'),
                    'search-dropdown'   => request()->get('search-dropdown', ''),
                ])->links() !!}
        </div>
    </div>

    @include('admin.manager-user.permissions.partials.modal')
    @vite('resources/js/admin/manager-user/permissions.js')

</x-admin-layout>
