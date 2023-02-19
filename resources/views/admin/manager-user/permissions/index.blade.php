@extends('layouts.app')

@section('title', __('admin/permissions.titlePageIndex'))

@section('content')
    @include('admin.manager-user.permissions._partials.breadcumbs')
    <div class="p-2 sm:p-4 xl:p-6 mt-4 bg-white sm:shadow rounded-lg">
        @include('admin.manager-user.permissions._partials.header-page-index')
        <div class="overflow-x-auto mt-4 bg-white border rounded-lg">
            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-100 table-auto">
                <thead class="text-xs uppercase bg-gray-700 text-gray-200">
                    <tr>
                        <th scope="col" class="px-2 py-4">#</th>
                        <th scope="col" class="px-2 py-4">@sortablelink('name', trans('admin/permissions.labelPermissionName'))</th>
                        <th scope="col" class="px-2 py-4">@sortablelink('description', trans('admin/permissions.labelPermissionDescription'))</th>
                        <th scope="col" class="px-2 py-4">{{ __('Grupos') }}</th>
                        @canany(['edit', 'delete'], $objPermissions)
                            <th scope="col" class="px-2 py-4">Ações</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="even:bg-white odd:bg-gray-50 dark:bg-gray-800 hover:bg-blue-100">
                            <th scope="row" class="px-2 py-2 font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ str_pad($permission->id , 4 , '0' , STR_PAD_LEFT) }}</th>
                            <td class="px-2 py-2">{{ $permission->name }}</td>
                            <td class="px-2 py-2">{{ $permission->description }}</td>
                            <td class="px-4 py-2 ">
                                <div class="lg:hidden">
                                    <div class="relative inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                                        <i class="fa-solid fa-users"></i>
                                        <span class="absolute top-0 right-0 mt-1 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 @if($permission->roles->count() > 0) bg-green-500 @else bg-red-500 @endif text-white">{{ str_pad($permission->roles->count() , 2 , '0' , STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                                <div class="hidden lg:block">
                                    {{ $permission->roles->count() }}
                                </div>
                            </td>
                            @canany(['edit', 'delete'], $objPermissions)
                                <td scope="row" class="px-2 py-2 border-l">
                                    <div class="flex justify-center">
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
