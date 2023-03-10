@extends('layouts.app')

@section('title', __('admin/users.titlePageIndex'))

@section('content')
    @include('admin.manager-user.users._partials.breadcumbs')
    <div class="p-3 sm:p-4 lg:mt-3 bg-white sm:shadow rounded-lg">
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
                                <div class="w-24 flex justify-center">
                                    @if($user->active)
                                        <div class="flex items-center mx-2 text-xs uppercase text-green-700 bg-green-200 rounded-full px-4 py-1">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-700 mr-2"></div> SIM
                                        </div>
                                    @else
                                        <div class="flex items-center mx-2 text-xs uppercase text-red-700 bg-red-200 rounded-full px-4 py-1">
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-700 mr-2"></div> NÃO
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td scope="row" class="px-2 py-2 whitespace-nowrap">{{ $user->role->name }}</td>
                            @canany(['edit', 'delete', 'sendnotification'], $objPermissions)
                                <td scope="row" class="px-2 py-2 border-l">
                                    <div class="hs-dropdown relative inline-flex items-center lg:hidden">
                                        <button id="hs-dropdown-basic" type="button" class="hs-dropdown-toggle hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 shadow-md rounded-lg p-2 bg-gray-800 border border-gray-700 divide-gray-700" aria-labelledby="hs-dropdown-basic">
                                            <div class="py-2 first:pt-0 last:pb-0 grid grid-cols-1 gap-y-2">
                                                @can('sendnotification', $objPermissions)
                                                    <a href="{{ route('admin.user.notification', $user->id) }}">
                                                        <x-secondary-button class="w-full whitespace-nowrap" icon="clarity-email-outline-alerted">
                                                            {{ __('Boas Vindas') }}
                                                        </x-secondary-button>
                                                    </a>
                                                @endcan
                                                @can('edit', $objPermissions)
                                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                                        <x-secondary-button class="w-full" icon="codicon-edit">
                                                            {{ __('admin/default.labelUpdate') }}
                                                        </x-secondary-button>
                                                    </a>
                                                @endcan
                                                @can('delete', $objPermissions)
                                                    <form method="POST" class="form-exclusao" action="{{ route('admin.users.destroy', $user->id) }}">
                                                        @csrf
                                                        <input type="hidden" value="{{$user->id}}" name="user_id">
                                                        <input type="hidden" value="{{$user->name}}" name="user_name">
                                                        <x-danger-button class="w-full" type="submit" icon="codicon-trash">
                                                            {{ __('admin/default.labelDelete') }}
                                                        </x-danger-button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden lg:flex justify-center">
                                        @can('sendnotification', $objPermissions)
                                            <div class="m-1 lg:m2">
                                                <a href="{{ route('admin.user.notification', $user->id) }}">
                                                    <x-secondary-button class="w-full lg:w-auto whitespace-nowrap" icon="clarity-email-outline-alerted" adaptative="true">
                                                        {{ __('Boas Vindas') }}
                                                    </x-secondary-button>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('edit', $objPermissions)
                                            <div class="m-1 lg:m2">
                                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                                    <x-secondary-button class="w-full lg:w-auto" icon="codicon-edit" adaptative="true">
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
