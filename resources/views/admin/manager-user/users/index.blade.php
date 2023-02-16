@extends('layouts.app')

@section('title', __('Listar Usuários'))

@section('content')
    @include('admin.manager-user.users.partials.breadcumbs')
    <div class="p-4 mt-4 sm:p-8 bg-white shadow rounded-lg">
        <div class="overflow-x-auto mt-4 bg-white border  rounded-lg">
            <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                @include('admin.manager-user.users.partials.table-caption')
                <thead class="text-medium text-left text-white uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="px-2 py-4">#</th>
                        <th scope="col" class="px-2 py-4">@lang('admin/users.labelTableNameUser')</th>
                        <th scope="col" class="px-2 py-4">@lang('admin/users.labelTableRole')</th>
                        <th scope="col" class="px-2 py-4 text-center"></th>
                    </tr>
                </thead>
                <tbody class="text-medium text-gray-900">
                    @foreach ($users as $user)
                        <tr class="even:bg-white odd:bg-gray-100 hover:bg-blue-100">
                            <td scope="row" class="px-2 py-3 font-bold">{{ $user->id }}</td>
                            <td scope="row" class="px-2 py-3">{{ $user->name }}</td>
                            <td scope="row" class="px-2 py-3">{{ $user->role->name }}</td>
                            <td scope="row" class="px-2 py-1">
                                <div class="flex justify-end">
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <x-secondary-button icon="codicon-edit">
                                            {{ __('admin/default.labelUpdate') }}
                                        </x-secondary-button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
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
            {!! $users->appends(['sort' => 'name'])->links() !!}
        </div>
    </div>
@endsection
