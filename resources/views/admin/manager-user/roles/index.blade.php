@extends('layouts.app')

@section('title', __('Todos os Grupos'))

@section('content')
    @include('admin.manager-user.roles.partials.breadcumbs')
    <div class="p-4 mt-4 sm:p-8 bg-white shadow rounded-lg">
        <div class="overflow-x-auto mt-4 bg-white border  rounded-lg">
            <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                @include('admin.manager-user.roles.partials.table-caption')
                <thead class="text-medium text-left text-white uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="px-2 py-4">#</th>
                        <th scope="col" class="px-2 py-4">@lang('admin/roles.labelRolesName')</th>
                        <th scope="col" class="px-2 py-4">@lang('admin/roles.labelPermissions')</th>
                        <th scope="col" class="px-2 py-4">Quant. Usuários Vinculados</th>
                        <th scope="col" class="px-2 py-4 text-center"></th>
                    </tr>
                </thead>
                <tbody class="text-medium text-gray-900">
                    @foreach ($roles as $role)
                        <tr class="even:bg-white odd:bg-gray-100 hover:bg-blue-100">
                            <td scope="row" class="px-2 py-3 font-bold">{{ $role->id }}</td>
                            <td scope="row" class="px-2 py-3">{{ $role->name }}</td>
                            <td scope="row" class="flex-grid gap-1">
                                @forelse ($role->permissions as $rp)
                                    <span class="inline-block my-1 px-2 py-2 bg-green-200 text-green-700 font-medium text-xs
                                    leading-tight uppercase rounded-full shadow-md hover:bg-green-300 hover:shadow-lg
                                    focus:bg-green-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-400
                                    active:shadow-lg transition duration-150 ease-in-out">{{ $rp->name }}</span>
                                @empty
                                    <span class="inline-block my-1 px-2 py-2 bg-red-200 text-red-700 font-medium text-xs
                                    leading-tight uppercase rounded-full shadow-md hover:bg-red-300 hover:shadow-lg
                                    focus:bg-red-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-400
                                    active:shadow-lg transition duration-150 ease-in-out">@lang('admin/roles.labelNotPermission')</span>
                                @endforelse
                            </td>
                            <td scope="row" class="px-2 py-3">{{ count($role->users) }}</td>
                            <td scope="row" class="px-1 py-1">
                                <div class="flex justify-end">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}">
                                        <x-secondary-button icon="codicon-edit">
                                            {{ __('admin/default.labelUpdate') }}
                                        </x-secondary-button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit" icon="codicon-trash">
                                            {{ __('admin/default.labelDelete') }}
                                        </x-danger-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-2">
            {!! $roles->appends(['sort' => 'name'])->links() !!}
        </div>
    </div>
@endsection
