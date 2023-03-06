@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionManagerUsers = new Permission(); $sectionManagerUsers->name = "sectionManagerUsers";
        $cadPermissoes = new Permission(); $cadPermissoes->name = "CadPermissoes";
        $cadGrupos = new Permission(); $cadGrupos->name = "CadGrupos";
        $cadUsuarios = new Permission(); $cadUsuarios->name = "CadUsuarios";

@endphp

<x-admin.layouts-v2.nav-menu label="Menu">
    <x-admin.layouts-v2.nav-menu-item
        href="javascript:;"
        :submenu="true"
        :name="'account-accordion'"
    >
        <x-eos-manage-accounts class="icon-item" />
        {{ __('admin/sidebar.labelSectionManagerUsers') }}

        @section('nav-menu-submenu')
            <x-admin.layouts-v2.nav-submenu :name="'account-accordion'">
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
</x-admin.layouts-v2.nav-menu>

{{-- <x-admin.layouts-v2.nav-menu>
    <x-admin.layouts-v2.nav-menu-item
        href="javascript:;"
    >
        <x-eos-edit-calendar-o class="icon-item" />
        Calendar
    </x-admin.layouts-v2.nav-menu-item>
</x-admin.layouts-v2.nav-menu>

<x-admin.layouts-v2.nav-menu>
    <x-admin.layouts-v2.nav-menu-item
        href="javascript:;"
    >
        <x-eos-document-scanner class="icon-item" />
        Documentation
    </x-admin.layouts-v2.nav-menu-item>
</x-admin.layouts-v2.nav-menu> --}}
