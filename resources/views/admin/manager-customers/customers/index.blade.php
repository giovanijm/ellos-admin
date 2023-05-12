<x-admin.layouts-v2.app
    title="{{  __('Cadastro de Clientes') }}"
    meta-description="Página Principal do Sistema"
>
    @section('breadcrumbs')
        @include('admin.manager-customers.customers._partials.breadcumbs')
    @endsection
    @section('submenu')
        @include('admin.manager-customers._partials.submenu')
    @endsection

    <div class="ellos-main-content">
        <div class="p-3 sm:p-4">
            @include('admin.manager-customers.customers._partials.header-page-index')
            <div class="overflow-x-auto mt-4 border rounded-lg dark:border-gray-800">
                <table class="ellos-table">
                    <thead>
                        <tr>
                            <th scope="col">@sortablelink('id','Código')</th>
                            <th scope="col">@sortablelink('fullName','Nome Completo')</th>
                            <th scope="col">@sortablelink('socialName','Nome Social')</th>
                            <th scope="col">@sortablelink('documentNumber','Documento')</th>
                            <th scope="col">@sortablelink('statusId','Status')</th>
                            @canany(['edit', 'delete'], $objPermissions)
                                <th scope="col">Ações</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <th scope="row">
                                    <a class="link-id" href="{{ route('admin.customers.edit', $customer->id) }}">
                                        #{{ str_pad($customer->id , 4 , '0' , STR_PAD_LEFT) }}
                                    </a>
                                </th>
                                <td scope="row" class="whitespace-nowrap uppercase">{{ $customer->fullName }}</td>
                                <td scope="row" class="whitespace-nowrap uppercase">{{ $customer->socialName }}</td>
                                <td scope="row" class="whitespace-nowrap uppercase">{{ $customer->documentNumber }}</td>
                                <td scope="row" class="whitespace-nowrap uppercase">{{ $customer->status->name }}</td>
                                {{-- <td scope="row" class="flex items-center justify-items-center whitespace-nowrap">
                                    <div class="relative inline-flex items-center justify-center w-8 h-8 ring-2 ring-gray-700 overflow-hidden rounded-full bg-gray-600">
                                        <span class="font-bold text-gray-300">
                                            @if ($user->photo)
                                                <img src="/storage/{{ $user->photo }}" alt="{{ $user->name }}">
                                            @else
                                                {{ Str::upper(Str::substr($user->name, 0, 2)) }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="ml-2">
                                        <div class="text-sm font-bold text-gray-700 dark:text-gray-400 px-1 uppercase">{{ $user->name }}</div>
                                        <div class="text-sm font-normal text-gray-500 px-1">{{ $user->email }}</div>
                                    </div>
                                </td> --}}
                                @canany(['edit', 'delete'], $objPermissions)
                                    <td scope="row" class="border-l dark:border-l-gray-900">
                                        <div class="hs-dropdown relative inline-flex items-center lg:hidden">
                                            <button id="hs-dropdown-basic" type="button" class="hs-dropdown-toggle hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-12 w-12 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 shadow-md rounded-lg p-2 bg-gray-800 border border-gray-700 divide-gray-700" aria-labelledby="hs-dropdown-basic">
                                                <div class="py-2 first:pt-0 last:pb-0 grid grid-cols-1 gap-y-2">
                                                    @can('edit', $objPermissions)
                                                        <a href="{{ route('admin.customers.edit', $customer->id) }}">
                                                            <x-secondary-button class="w-full" icon="codicon-edit">
                                                                {{ __('admin/default.labelUpdate') }}
                                                            </x-secondary-button>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $objPermissions)
                                                        <form method="POST" class="form-exclusao" action="{{ route('admin.customers.destroy', $customer->id) }}">
                                                            @csrf
                                                            <input type="hidden" value="{{$customer->id}}" name="user_id">
                                                            <input type="hidden" value="{{$customer->fullName}}" name="user_name">
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
                                                    <a href="{{ route('admin.customers.edit', $customer->id) }}">
                                                        <x-secondary-button class="w-full lg:w-auto" icon="codicon-edit" adaptative="true">
                                                            {{ __('admin/default.labelUpdate') }}
                                                        </x-secondary-button>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('delete', $objPermissions)
                                                <div class="m-1 lg:m2">
                                                    <form method="POST" class="form-exclusao" action="{{ route('admin.customers.destroy', $customer->id) }}">
                                                        <input type="hidden" value="{{$customer->id}}" name="user_id">
                                                        <input type="hidden" value="{{$customer->fullName}}" name="user_name">
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
                {!! $customers->appends([
                    'sort'          => request()->get('sort', 'fullName'),
                    'direction'     => request()->get('direction', 'asc'),
                    'filter'        => request()->get('filter', ''),
                    'filter_row'    => request()->get('filter_row', 'fullName'),
                ])->links() !!}
            </div>
            @push('modalGeral')
                @include('admin.manager-customers.customers._partials.modal')
            @endpush
        </div>
    </div>
    @push('scripts')
        @vite('resources/js/admin/manager-customers/customers.js')
    @endpush
</x-admin.layouts-v2.app>
