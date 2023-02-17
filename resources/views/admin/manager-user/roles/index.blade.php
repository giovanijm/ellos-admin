@extends('layouts.app')

@section('title', __('Todos os Grupos'))

@section('content')
    @include('admin.manager-user.roles._partials.breadcumbs')
    <div class="p-2 sm:p-4 xl:p-6 mt-4 bg-white sm:shadow rounded-lg">
        @include('admin.manager-user.roles._partials.header-page-index')
        <div class="overflow-x-auto mt-4 bg-white border rounded-lg">
            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-100">
                <thead class="text-xs uppercase bg-gray-700 text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">@sortablelink('name', trans('admin/roles.labelRolesName'))</th>
                        @canany(['view'], $objPermissions2)
                            <th scope="col" class="px-6 py-3">@lang('admin/roles.labelPermissions')</th>
                        @endcanany
                        <th scope="col" class="px-6 py-3">Quant. Usuários Vinculados</th>
                        @canany(['edit', 'delete'], $objPermissions)
                            <th scope="col" class="px-6 py-2"></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="even:bg-white odd:bg-gray-50 dark:bg-gray-800 hover:bg-blue-100">
                            <th scope="row" class="px-6 py-2 font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ $role->id }}</th>
                            <td class="px-6 py-2">{{ $role->name }}</td>
                            @canany(['view'], $objPermissions2)
                                <td class="flex-grid gap-1 px-6 py-2">
                                    @forelse ($role->permissions as $rp)
                                        <span class="inline-block my-1 px-2 py-2 bg-green-200 text-green-700 font-medium text-xs
                                        leading-tight uppercase rounded-full shadow-md hover:bg-green-300 hover:shadow-lg
                                        focus:bg-green-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-400
                                        active:shadow-lg transition duration-150 ease-in-out">{{ $rp->name }}</span>
                                    @empty
                                        @if ($role->id == env('ROLE_ID_ADMIN'))
                                            <span class="inline-block my-1 px-2 py-2 bg-green-400 text-green-900 font-bold text-xs
                                            leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:text-white hover:shadow-lg
                                            focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-600
                                            active:shadow-lg transition duration-150 ease-in-out">{{ __('Todas as permissões') }}</span>
                                        @else
                                            <span class="inline-block my-1 px-2 py-2 bg-red-200 text-red-700 font-medium text-xs
                                            leading-tight uppercase rounded-full shadow-md hover:bg-red-300 hover:shadow-lg
                                            focus:bg-red-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-400
                                            active:shadow-lg transition duration-150 ease-in-out">@lang('admin/roles.labelNotPermission')</span>
                                        @endif
                                    @endforelse
                                </td>
                            @endcanany
                            <td class="px-6 py-2">{{ count($role->users) }}</td>
                            @canany(['edit', 'delete'], $objPermissions)
                                <td scope="row" class="px-6 py-2 border-l">
                                    <div class="sm:flex sm:justify-center">
                                        @can('edit', $objPermissions)
                                            <div class="m-1 lg:m2">
                                                <a href="{{ route('admin.roles.edit', $role->id) }}">
                                                    <x-secondary-button class="lg:w-auto" icon="codicon-edit" adaptative="true">
                                                        {{ __('admin/default.labelUpdate') }}
                                                    </x-secondary-button>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('delete', $objPermissions)
                                            <div class="m-1 lg:m2">
                                                <form method="POST" class="form-exclusao" action="{{ route('admin.roles.destroy', $role->id) }}">
                                                    <input type="hidden" value="{{$role->id}}" name="role_id">
                                                    <input type="hidden" value="{{$role->name}}" name="role_name">
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
            {!! $roles->appends([
                'sort'          => request()->get('sort', 'name'),
                'direction'     => request()->get('direction', 'asc'),
                'filter'        => request()->get('filter', ''),
                'filter_row'    => request()->get('filter_row', 'name'),
            ])->links() !!}
        </div>
    </div>
    @include('admin.manager-user.roles._partials.modal')
    @vite('resources/js/admin/manager-user/roles.js')
@endsection
