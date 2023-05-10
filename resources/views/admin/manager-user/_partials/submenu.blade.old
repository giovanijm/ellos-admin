@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionManagerUsers = new Permission(); $sectionManagerUsers->name = "sectionManagerUsers";
        $cadPermissoes = new Permission(); $cadPermissoes->name = "CadPermissoes";
        $cadGrupos = new Permission(); $cadGrupos->name = "CadGrupos";
        $cadUsuarios = new Permission(); $cadUsuarios->name = "CadUsuarios";

@endphp

<p>Menu</p>
<x-sidebar-menu-v2 :active="request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')" :open="request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')">
    <x-sidebar-menu-section-v2>
        <x-clarity-id-badge-solid class="icon-item" />
        <p>{{ __('admin/sidebar.labelSectionManagerUsers') }}</p>
    </x-sidebar-menu-section-v2>
    <x-sidebar-submenu aria-label="{{ __('admin/sidebar.labelSectionManagerUsers') }}">
        @can('view', $cadUsuarios)
            <x-sidebar-menu-option-v2 :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                <x-clarity-user-solid class="icon-item" />
                <p>{{ __('admin/sidebar.labelMenuUsers') }}</p>
            </x-sidebar-menu-option-v2>
        @endcan
        @can('view', $cadGrupos)
            <x-sidebar-menu-option-v2 :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                <x-typ-group class="icon-item" />
                <p>{{ __('admin/sidebar.labelMenuRoles') }}</p>
            </x-sidebar-menu-option-v2>
        @endcan
        @can('view', $cadPermissoes)
            <x-sidebar-menu-option-v2 :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.*')">
                <x-typ-lock-closed class="icon-item" />
                <p>{{ __('admin/sidebar.labelMenuPermissions') }}</p>
            </x-sidebar-menu-option-v2>
        @endcan
    </x-sidebar-submenu>
</x-sidebar-menu-v2>
{{-- <x-sidebar-menu-v2>
    <x-sidebar-menu-section-v2>
        <x-clarity-building-outline-badged class="icon-item" />
        <p>{{ __('Dados da Empresa') }}</p>
    </x-sidebar-menu-section-v2>
    <x-sidebar-submenu labelName="{{ __('admin/sidebar.labelSectionManagerUsers') }}">
        @can('view', $cadUsuarios)
            <x-sidebar-menu-option-v2 :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                <x-eos-pin-drop class="icon-item"/>
                {{ __('Localização') }}
            </x-sidebar-menu-option-v2>
        @endcan
    </x-sidebar-submenu>
</x-sidebar-menu-v2> --}}
