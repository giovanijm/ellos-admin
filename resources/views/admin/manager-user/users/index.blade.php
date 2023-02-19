@extends('layouts.app')

@section('title', __('admin/users.titlePageIndex'))

@section('content')
    @include('admin.manager-user.users._partials.breadcumbs')
    <div class="p-2 sm:p-4 xl:p-6 mt-4 bg-white sm:shadow rounded-lg">
        @include('admin.manager-user.users._partials.header-page-index')
        <div class="overflow-x-auto mt-4 bg-white border  rounded-lg">
            <table class="w-full text-sm text-left text-gray-800 table-auto">
                <thead class="bg-gray-700 text-gray-200">
                    <tr>
                        <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">@sortablelink('id','Código')</th>
                        <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">@sortablelink('name','Nome')</th>
                        <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">@sortablelink('active','Ativo')</th>
                        <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">@lang('admin/users.labelTableRole')</th>
                        @canany(['edit', 'delete'], $objPermissions)
                            <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">Ações</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="even:bg-white odd:bg-gray-50 dark:bg-gray-800 hover:bg-blue-100">
                            <th scope="row" class="px-2 py-2">
                                <a class="font-bold text-blue-700 hover:underline" href="{{ route('admin.users.edit', $user->id) }}">
                                    #{{ str_pad($user->id , 4 , '0' , STR_PAD_LEFT) }}
                                </a>
                            </th>
                            <td scope="row" class="flex items-center justify-items-center px-2 py-3 whitespace-nowrap">
                                <div class="relative inline-flex items-center justify-center  w-8 h-8 ring-2 ring-gray-900 ring-offset-slate-900 drop-shadow-sm overflow-hidden rounded-full bg-gray-600">
                                    <span class="font-bold text-gray-300">{{ Str::upper(Str::substr($user->name, 0, 2)) }}</span>
                                </div>
                                <div class="ml-2">
                                    <div class="text-sm font-bold text-gray-700 px-1 uppercase">{{ $user->name }}</div>
                                    <div class="text-sm font-normal text-gray-500 px-1">{{ $user->email }}</div>
                                </div>
                            </td>
                            <td scope="row" class="px-2 py-2">
                                @if($user->active)
                                    <div class="flex items-center mx-2">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-700 mr-2"></div> Sim
                                    </div>
                                @else
                                    <div class="flex items-center mx-2">
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Não
                                    </div>
                                @endif
                            </td>
                            <td scope="row" class="px-2 py-2">{{ $user->role->name }}</td>
                            @canany(['edit', 'delete'], $objPermissions)
                                <td scope="row" class="px-2 py-2 border-l">
                                    <div class="flex justify-center">
                                        @can('edit', $objPermissions)
                                            <div class="m-1 lg:m2">
                                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                                    <x-secondary-button class="lg:w-auto" icon="codicon-edit" adaptative="true">
                                                        {{ __('admin/default.labelUpdate') }}
                                                    </x-secondary-button>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('delete', $objPermissions)
                                            <div class="m-1 lg:m2">
                                                <form method="POST" class="form-exclusao" action="{{ route('admin.users.destroy', $user->id) }}">
                                                    <input type="hidden" value="{{$user->id}}" name="user_id">
                                                    <input type="hidden" value="{{$user->name}}" name="user_name">
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
            {!! $users->appends([
                'sort'          => request()->get('sort', 'name'),
                'direction'     => request()->get('direction', 'asc'),
                'filter'        => request()->get('filter', ''),
                'filter_row'    => request()->get('filter_row', 'name'),
            ])->links() !!}
        </div>
    </div>
    @include('admin.manager-user.users._partials.modal')
    @vite('resources/js/admin/manager-user/users.js')
@endsection
