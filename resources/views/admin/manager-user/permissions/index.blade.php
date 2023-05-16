<x-admin.layouts-v2.app
    title="{{  __('admin/permissions.titlePageIndex') }}"
    meta-description="Página Principal do Sistema"
>
    @section('breadcrumbs')
        @include('admin.manager-user.permissions._partials.breadcumbs')
    @endsection

    @section('submenu')
        @include('admin.manager-user._partials.submenu')
    @endsection

    <div class="ellos-main-content">
        <div class="p-3 sm:p-4">
            @include('admin.manager-user.permissions._partials.header-page-index')
            <div class="overflow-x-auto mt-4 border rounded-lg dark:border-gray-800">
                <table class="ellos-table">
                    <thead>
                        <tr>
                            <th scope="col">@sortablelink('id','Código',null)</th>
                            <th scope="col">@sortablelink('name', trans('admin/permissions.labelPermissionName'),null)</th>
                            <th scope="col">@sortablelink('description', trans('admin/permissions.labelPermissionDescription'),null)</th>
                            <th scope="col">{{ __('Grupos') }}</th>
                            @canany(['edit', 'delete'], $objPermissions)
                                <th scope="col" class="grid justify-center">Ações</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <th scope="row">
                                    <a class="link-id" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                        #{{ str_pad($permission->id , 4 , '0' , STR_PAD_LEFT) }}
                                    </a>
                                </th>
                                <td class="whitespace-nowrap">{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>
                                    <div class="relative inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        <i class="fa-solid fa-users"></i>
                                        <span class="absolute top-0 right-0 mt-1 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 {{ $permission->roles->count() > 0 ? 'bg-green-500' : 'bg-red-500' }} text-white">{{ str_pad($permission->roles->count() , 2 , '0' , STR_PAD_LEFT) }}</span>
                                    </div>
                                </td>
                                @canany(['edit', 'delete'], $objPermissions)
                                    <td scope="row" class="border-l dark:border-l-gray-900">
                                        <div class="hs-dropdown relative inline-flex items-center lg:hidden">
                                            <button id="hs-dropdown-basic" type="button" class="hs-dropdown-toggle hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 shadow-md rounded-lg p-2 bg-gray-800 dark:border border-gray-700 divide-gray-700" aria-labelledby="hs-dropdown-basic">
                                                <div class="py-2 first:pt-0 last:pb-0 grid grid-cols-1 gap-y-2">
                                                    @can('edit', $objPermissions)
                                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                            <x-secondary-button class="w-full clockUi-show" icon="codicon-edit">
                                                                {{ __('admin/default.labelUpdate') }}
                                                            </x-secondary-button>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $objPermissions)
                                                        <form method="POST" class="form-exclusao" action="{{ route('admin.permissions.destroy', $permission->id) }}">
                                                            @csrf
                                                            <input type="hidden" value="{{$permission->id}}" name="permission_id">
                                                            <input type="hidden" value="{{$permission->name}}" name="permission_name">
                                                            <x-danger-button class="w-full" type="submit" icon="codicon-trash">
                                                                {{ __('admin/default.labelDelete') }}
                                                            </x-danger-button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden lg:flex justify-center">
                                            @can('edit', $objPermissions)
                                                <div class="m-1 lg:m2">
                                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="clockUi-show">
                                                        <x-secondary-button class="lg:w-auto" icon="codicon-edit">
                                                            {{ __('admin/default.labelUpdate') }}
                                                        </x-secondary-button>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('delete', $objPermissions)
                                                <div class="m-1 lg:m2">
                                                    <form method="POST" class="form-exclusao" action="{{ route('admin.permissions.destroy', $permission->id) }}">
                                                        @csrf
                                                        <input type="hidden" value="{{$permission->id}}" name="permission_id">
                                                        <input type="hidden" value="{{$permission->name}}" name="permission_name">
                                                        <x-danger-button class="w-full lg:w-auto" type="submit" icon="codicon-trash">
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
        @push('modalGeral')
            @include('admin.manager-user.permissions._partials.modal')
        @endpush
    </div>
    @push('scripts')
        @vite('resources/js/admin/manager-user/permissions.js')
    @endpush
</x-admin.layouts-v2.app>
