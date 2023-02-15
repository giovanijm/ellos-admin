@extends('layouts.app')

@section('title', __('admin/permissions.titlePage'))

@section('content')
    @include('admin.manager-user.permissions._partials.breadcumbs')
    <div class="p-2 sm:p-4 xl:p-6 mt-4 bg-white sm:shadow rounded-lg">
        @include('admin.manager-user.permissions._partials.header-page-index')
        <div class="overflow-x-auto mt-4 bg-white border rounded-lg">
            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-100">
                <thead class="text-xs uppercase bg-gray-700 text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">@sortablelink('name', trans('admin/permissions.labelPermissionName'))</th>
                        <th scope="col" class="px-6 py-3">@sortablelink('description', trans('admin/permissions.labelPermissionDescription'))</th>
                        <th scope="col" class="px-6 py-3">{{ __('Quant. Grupos Vinculados') }}</th>
                        @canany(['edit', 'delete'], $objPermissions)
                            <th scope="col" class="px-6 py-2"></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="even:bg-white odd:bg-gray-50 dark:bg-gray-800 hover:bg-blue-100">
                            <th scope="row" class="px-6 py-2 font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ $permission->id }}</th>
                            <td class="px-6 py-2">{{ $permission->name }}</td>
                            <td class="px-6 py-2">{{ $permission->description }}</td>
                            <td class="px-6 py-2 ">{{ $permission->roles->count() }}</td>
                            @canany(['edit', 'delete'], $objPermissions)
                                <td scope="row" class="px-6 py-2 border-l">
                                    <div class="sm:flex sm:justify-center">
                                        @can('edit', $objPermissions)
                                            <div class="m-1 lg:m2">
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                    <x-secondary-button class="lg:w-auto" icon="codicon-edit" adaptative="true">
                                                        {{ __('admin/default.labelUpdate') }}
                                                    </x-secondary-button>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('delete', $objPermissions)
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
                    'sort'          => request()->get('sort', 'name'),
                    'direction'     => request()->get('direction', 'asc'),
                    'filter'        => request()->get('filter', ''),
                    'filter_row'    => request()->get('filter_row', 'name'),
                ])->links() !!}
        </div>
    </div>
    @include('admin.manager-user.permissions._partials.modal')
    @vite('resources/js/admin/manager-user/permissions.js')
@endsection
