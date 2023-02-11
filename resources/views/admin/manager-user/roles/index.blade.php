<x-admin-layout>
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
                            <td scope="row" class="px-1 py-2">
                                @forelse ($role->permissions as $rp)
                                    {{-- <span class="m-1 px-2 py-0 uppercase text-center bg-green-300 rounded-lg">{{ $rp->name }}</span> --}}
                                    <span class="m-1 text-center uppercase bg-green-400 text-green-900 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $rp->name }}</span>
                                @empty
                                <span class="m-1 px-2 py-0 text-red-800 uppercase text-center bg-red-300 rounded-lg">@lang('admin/roles.labelNotPermission')</span>
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
</x-admin-layout>
