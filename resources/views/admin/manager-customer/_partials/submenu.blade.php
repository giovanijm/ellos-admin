@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionManagerCustomers = new Permission(); $sectionManagerCustomers->name = "SectionManagerCustomers";
        $cadCustomers = new Permission(); $cadCustomers->name = "CadCustomers";

@endphp

<x-admin.layouts-v2.nav-menu label="Menu">
    @can('view', $sectionManagerCustomers)
        <x-admin.layouts-v2.nav-menu-item
            href="javascript:;"
            :temsubmenu="true"
            :nomemenu="'gestao-cliente-menu'"
            :nomesubmenu="'gestao-cliente-submenu'"
        >
            <x-fas-people-line class="icon-item" />
            {{ __('Gestão de Clientes') }}
            @section('nav-menu-submenu')
                <x-admin.layouts-v2.nav-submenu :nomesubmenu="'gestao-cliente-submenu'" :nomemenu="'gestao-cliente-menu'">
                    @can('view', $cadCustomers)
                        <x-admin.layouts-v2.nav-submenu-item
                            href="{{ route('admin.customers.index') }}"
                            :selected="request()->routeIs('admin.customers.*') ? 'item-selected' : ''"
                        >
                            <x-fas-hospital-user class="icon-item" />
                            {{ __('Clientes') }}
                        </x-admin.layouts-v2.nav-submenu-item>
                    @endcan
                </x-admin.layouts-v2.nav-submenu>
            @endsection
        </x-admin.layouts-v2.nav-menu-item>
    @endcan
</x-admin.layouts-v2.nav-menu>
