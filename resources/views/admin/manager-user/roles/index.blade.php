@extends('layouts.app')

@section('title', __('Todos os Grupos'))

@section('content')
    @include('admin.manager-user.roles._partials.breadcumbs')
    <div class="p-2 sm:p-4 xl:p-6 mt-4 bg-white sm:shadow rounded-lg">
        @include('admin.manager-user.roles._partials.header-page-index')
        <div class="overflow-x-auto mt-4 bg-white border rounded-lg">
            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-100 table-auto">
                <thead class="text-xs uppercase bg-gray-700 text-gray-200">
                    <tr>
                        <th scope="col" class="px-2 py-4">#</th>
                        <th scope="col" class="px-2 py-4 min-w-min">@sortablelink('name', trans('admin/roles.labelRolesName'))</th>
                        <th scope="col" class="px-2 py-4">@sortablelink('active','Ativo')</th>
                        @canany(['view'], $objPermissions2)
                            <th scope="col" class="px-2 py-4">Permissões</th>
                        @endcanany
                        <th scope="col" class="px-2 py-4">Usuários</th>
                        @canany(['edit', 'delete'], $objPermissions)
                            <th scope="col" class="px-2 py-4">Ações</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="even:bg-white odd:bg-gray-50 dark:bg-gray-800 hover:bg-blue-100">
                            <th scope="row" class="px-2 py-2 font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ $role->id }}</th>
                            <td class="px-2 py-2">{{ $role->name }}</td>
                            <td class="px-2 py-2">
                                @if($role->active)
                                    <div class="flex items-center mx-2">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-700 mr-2"></div> Sim
                                    </div>
                                @else
                                    <div class="flex items-center mx-2">
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Não
                                    </div>
                                @endif
                            </td>
                            @canany(['view'], $objPermissions2)
                                <td class="flex-grid gap-1 px-2 py-2">
                                    <div class="hidden lg:block">
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
                                    </div>
                                    <div class="lg:hidden">
                                        <div class="relative inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                                            <i class="fa-solid fa-key"></i>
                                            <span class="absolute top-0 right-0 mt-1 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 @if($role->permissions->count()>0) bg-green-500 @else bg-red-500 @endif text-white">{{ str_pad($role->permissions->count() , 2 , '0' , STR_PAD_LEFT) }}</span>
                                        </div>
                                    </div>
                                </td>
                            @endcanany
                            <td class="px-2 py-2">
                                <div class="lg:hidden">
                                    <div class="relative inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                                        <i class="fa-solid fa-user"></i>
                                        <span class="absolute top-0 right-0 mt-1 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 @if($role->users->count()>0) bg-green-500 @else bg-red-500 @endif text-white">{{ str_pad($role->users->count() , 2 , '0' , STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                                <div class="hidden lg:block">
                                    {{ count($role->users) }}
                                </div>
                            </td>
                            @canany(['edit', 'delete'], $objPermissions)
                                <td scope="row" class="px-2 py-2 border-l">
                                    <div class="flex justify-center">
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
