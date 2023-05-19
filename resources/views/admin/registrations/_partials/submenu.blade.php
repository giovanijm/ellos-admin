@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionManagerCustomers = new Permission(); $sectionManagerCustomers->name = "SectionManagerCustomers";
        $cadCustomers = new Permission(); $cadCustomers->name = "CadCustomers";
        $cadAssistant = new Permission(); $cadAssistant->name = "CadAssistant";
        $cadStatus = new Permission(); $cadStatus->name = "CadStatus";

@endphp

<x-admin.layouts-v2.nav-menu label="Menu">
    @can('view', $sectionManagerCustomers)
        @can('view', $cadCustomers)
            <x-admin.layouts-v2.nav-menu-item
                href="{{ route('admin.customers.index') }}"
                :temsubmenu="false"
                class="{{ request()->routeIs('admin.customers.*') ? 'item-selected' : ''}}"
            >
                <x-fas-hospital-user class="icon-item" />
                {{ __('Clientes') }}
            </x-admin.layouts-v2.nav-menu-item>
        @endcan
        @can('view', $cadCustomers)
            <x-admin.layouts-v2.nav-menu-item
                href="{{ route('admin.providers.index') }}"
                :temsubmenu="false"
                class="{{ request()->routeIs('admin.providers.*') ? 'item-selected' : ''}}"
            >
                <x-fas-user-md class="icon-item" />
                {{ __('Prestadores de Serviço') }}
            </x-admin.layouts-v2.nav-menu-item>
        @endcan
        @can('view', $cadCustomers)
            <x-admin.layouts-v2.nav-menu-item
                href="{{ route('admin.services.index') }}"
                :temsubmenu="false"
                class="{{ request()->routeIs('admin.services.*') ? 'item-selected' : ''}}"
            >
                <x-fas-cart-plus class="icon-item" />
                {{ __('Serviços e Produtos') }}
            </x-admin.layouts-v2.nav-menu-item>
        @endcan
        @can('view', $cadAssistant)
            <x-admin.layouts-v2.nav-menu-item
                href="javascript:;"
                :temsubmenu="true"
                :nomemenu="'gestao-cliente-menu'"
                :nomesubmenu="'gestao-cliente-submenu'"
            >
                <x-fas-laptop-file class="icon-item" />
                {{ __('Auxiliar') }}
                @section('nav-menu-submenu')
                    <x-admin.layouts-v2.nav-submenu :nomesubmenu="'gestao-cliente-submenu'" :nomemenu="'gestao-cliente-menu'">
                        @can('view', $cadStatus)
                            <x-admin.layouts-v2.nav-submenu-item
                                href="{{ route('admin.status.index') }}"
                                :selected="request()->routeIs('admin.status.*') ? 'item-selected' : ''"
                            >
                                <x-fas-person-circle-check class="icon-item" />
                                {{ __('Status de Cadastro') }}
                            </x-admin.layouts-v2.nav-submenu-item>
                        @endcan
                    </x-admin.layouts-v2.nav-submenu>
                @overwrite
            </x-admin.layouts-v2.nav-menu-item>
        @endcan
    @endcan

</x-admin.layouts-v2.nav-menu>
