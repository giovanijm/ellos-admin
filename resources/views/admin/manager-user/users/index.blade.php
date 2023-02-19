@extends('layouts.app')

@section('title', __('admin/users.titlePageIndex'))

@section('content')
    @include('admin.manager-user.users._partials.breadcumbs')
    <div class="p-2 sm:p-4 xl:p-6 mt-4 bg-white sm:shadow rounded-lg">
        @include('admin.manager-user.users._partials.header-page-index')
        <div class="overflow-x-auto mt-4 bg-white border  rounded-lg">
            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-100 table-auto">
                <thead class="text-xs uppercase bg-gray-700 text-gray-200">
                    <tr>
                        <th scope="col" class="px-2 py-4">#</th>
                        <th scope="col" class="px-2 py-4">@sortablelink('name','Nome')</th>
                        <th scope="col" class="px-2 py-4">@sortablelink('email','E-mail')</th>
                        <th scope="col" class="px-2 py-4">@sortablelink('active','Ativo')</th>
                        <th scope="col" class="px-2 py-4">@lang('admin/users.labelTableRole')</th>
                        @canany(['edit', 'delete'], $objPermissions)
                            <th scope="col" class="px-2 py-4">Ações</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="even:bg-white odd:bg-gray-50 dark:bg-gray-800 hover:bg-blue-100">
                            <th scope="row" class="px-2 py-2 font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ str_pad($user->id , 4 , '0' , STR_PAD_LEFT) }}</th>
                            <td scope="row" class="px-2 py-2">{{ $user->name }}</td>
                            <td scope="row" class="px-2 py-2">{{ $user->email }}</td>
                            <td class="px-2 py-2">
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
