@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionManagerUsers = new Permission(); $sectionManagerUsers->name = "sectionManagerUsers";
        $cadPermissoes = new Permission(); $cadPermissoes->name = "CadPermissoes";
        $cadGrupos = new Permission(); $cadGrupos->name = "CadGrupos";
        $cadUsuarios = new Permission(); $cadUsuarios->name = "CadUsuarios";

@endphp

<x-admin.layouts-v2.nav-menu label="Menu">
    @can('view', $sectionManagerUsers)
        <x-admin.layouts-v2.nav-menu-item
            href="javascript:;"
            :temsubmenu="true"
            :nomemenu="'gestao-usuario-menu'"
            :nomesubmenu="'gestao-usuario-submenu'"
        >
            <x-eos-manage-accounts class="icon-item" />
            {{ __('admin/sidebar.labelSectionManagerUsers') }}
            @section('nav-menu-submenu')
                <x-admin.layouts-v2.nav-submenu :nomesubmenu="'gestao-usuario-submenu'" :nomemenu="'gestao-usuario-menu'">
                    @can('view', $cadUsuarios)
                        <x-admin.layouts-v2.nav-submenu-item
                            href="{{ route('admin.users.index') }}"
                            :selected="request()->routeIs('admin.users.*') ? 'item-selected' : ''"
                        >
                            <x-clarity-user-solid class="icon-item" />
                            {{ __('admin/sidebar.labelMenuUsers') }}
                        </x-admin.layouts-v2.nav-submenu-item>
                    @endcan
                    @can('view', $cadGrupos)
                        <x-admin.layouts-v2.nav-submenu-item
                            href="{{ route('admin.roles.index') }}"
                            :selected="request()->routeIs('admin.roles.*') ? 'item-selected' : ''"
                        >
                            <x-typ-group class="icon-item" />
                            {{ __('admin/sidebar.labelMenuRoles') }}
                        </x-admin.layouts-v2.nav-submenu-item>
                    @endcan
                    @can('view', $cadPermissoes)
                        <x-admin.layouts-v2.nav-submenu-item
                            href="{{ route('admin.permissions.index') }}"
                            :selected="request()->routeIs('admin.permissions.*') ? 'item-selected' : ''"
                        >
                            <x-typ-lock-closed class="icon-item" />
                            {{ __('admin/sidebar.labelMenuPermissions') }}
                        </x-admin.layouts-v2.nav-submenu-item>
                    @endcan
                </x-admin.layouts-v2.nav-submenu>
            @endsection
        </x-admin.layouts-v2.nav-menu-item>
    @endcan
</x-admin.layouts-v2.nav-menu>
