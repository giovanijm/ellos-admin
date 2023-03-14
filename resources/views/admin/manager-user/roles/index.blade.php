<x-admin.layouts-v2.app
    title="{{  __('admin/roles.titlePageIndex') }}"
    meta-description="Página Principal do Sistema"
>
    @section('breadcrumbs')
        @include('admin.manager-user.roles._partials.breadcumbs')
    @endsection

    @section('submenu')
        @include('admin.manager-user._partials.submenu')
    @endsection

    <div class="ellos-main-content">
        <div class="p-3 sm:p-4">
            @include('admin.manager-user.roles._partials.header-page-index')
            <div class="overflow-x-auto mt-4 bg-white border rounded-lg">
                <table class="w-full text-sm text-left text-gray-800 table-auto">
                    <thead class="bg-gray-700 text-gray-200">
                        <tr>
                            <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">@sortablelink('id','Código')</th>
                            <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">@sortablelink('name', trans('admin/roles.labelRolesName'))</th>
                            <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">@sortablelink('active','Ativo')</th>
                            @canany(['view'], $objPermissions2)
                                <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">Permissões</th>
                            @endcanany
                            <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">Usuários</th>
                            @canany(['edit', 'delete'], $objPermissions)
                                <th scope="col" class="px-2 py-4 text-sm font-bold whitespace-nowrap tracking-wide text-left uppercase">Ações</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr class="even:bg-white odd:bg-gray-50 dark:bg-gray-800 hover:bg-blue-100">
                                <th scope="row" class="px-2 py-2">
                                    <a class="font-bold text-blue-700 hover:underline" href="{{ route('admin.users.edit', $role->id) }}">
                                        #{{ str_pad($role->id , 4 , '0' , STR_PAD_LEFT) }}
                                    </a>
                                </th>
                                <td class="px-2 py-2 whitespace-nowrap">{{ $role->name }}</td>
                                <td class="px-2 py-2">
                                    <div class="w-24 flex justify-center">
                                        @if($role->active)
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
                                @canany(['view'], $objPermissions2)
                                    <td class="flex-grid justify-items-stretch px-2 py-2">
                                        <div class="hidden lg:block">
                                            @forelse ($role->permissions as $rp)
                                                <span class="inline-block my-1 mx-1 px-2 py-1 text-xs font-normal uppercase tracking-wider whitespace-nowrap border border-green-600 text-green-900 bg-green-400 hover:text-white hover:bg-green-600 rounded-lg bg-opacity-50">
                                                    {{ $rp->name }}
                                                </span>
                                            @empty
                                                @if ($role->id == env('ROLE_ID_ADMIN'))
                                                    <span class="inline-block my-1 mx-1 px-2 py-1 text-xs font-normal uppercase tracking-wider whitespace-nowrap border border-green-600 text-green-900 bg-green-400 hover:text-white hover:bg-green-600 rounded-lg bg-opacity-50">
                                                        {{ __('Permissão Total') }}
                                                    </span>
                                                @else
                                                    <span class="inline-block my-1 mx-1 px-2 py-1 text-xs font-normal uppercase tracking-wider whitespace-nowrap border border-red-600 text-red-900 bg-red-400 hover:text-white hover:bg-red-600 rounded-lg bg-opacity-50">
                                                        {{ __('admin/roles.labelNotPermission') }}
                                                    </span>
                                                @endif
                                            @endforelse
                                        </div>
                                        <div class="lg:hidden">
                                            <div class="relative inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                                                <i class="fa-solid fa-key"></i>
                                                <span class="absolute top-0 right-0 mt-1 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 {{ $role->permissions->count() > 0 ? 'bg-green-500' : 'bg-red-500' }} text-white">{{ str_pad($role->permissions->count() , 2 , '0' , STR_PAD_LEFT) }}</span>
                                            </div>
                                        </div>
                                    </td>
                                @endcanany
                                <td class="px-2 py-2">
                                    <div class="relative inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                                        <i class="fa-solid fa-user"></i>
                                        <span class="absolute top-0 right-0 mt-1 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 {{ $role->users->count() > 0 ? 'bg-green-500' : 'bg-red-500' }} text-white">{{ str_pad($role->users->count() , 2 , '0' , STR_PAD_LEFT) }}</span>
                                    </div>
                                </td>
                                @canany(['edit', 'delete'], $objPermissions)
                                    <td scope="row" class="px-2 py-2 border-l">
                                        <div class="hs-dropdown relative inline-flex items-center lg:hidden">
                                            <button id="hs-dropdown-basic" type="button" class="hs-dropdown-toggle hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 shadow-md rounded-lg p-2 bg-gray-800 border border-gray-700 divide-gray-700" aria-labelledby="hs-dropdown-basic">
                                                <div class="py-2 first:pt-0 last:pb-0 grid grid-cols-1 gap-y-2">
                                                    @can('edit', $objPermissions)
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}">
                                                            <x-secondary-button class="w-full" icon="codicon-edit">
                                                                {{ __('admin/default.labelUpdate') }}
                                                            </x-secondary-button>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $objPermissions)
                                                        <form method="POST" class="form-exclusao" action="{{ route('admin.roles.destroy', $role->id) }}">
                                                            @csrf
                                                            <input type="hidden" value="{{$role->id}}" name="role_id">
                                                            <input type="hidden" value="{{$role->name}}" name="role_name">
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
        @push('modalGeral')
            @include('admin.manager-user.roles._partials.modal')
        @endpush
    </div>
    @push('scripts')
        @vite('resources/js/admin/manager-user/roles.js')
    @endpush
</x-admin.layouts-v2.app>
