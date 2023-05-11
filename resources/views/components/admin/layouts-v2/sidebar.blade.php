@php
    use \App\Models\Admin\ManagerUser\Permission;

    $moduleSettings = new Permission(); $moduleSettings->name = "moduleSettings";
@endphp
<div id="application-sidebar"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform scrollbar-y dark:scrollbar-y z-[60] hidden xl:block fixed top-0 left-0 bottom-0 overflow-y-auto xl:translate-x-0 xl:right-auto xl:bottom-0 ellos-sidebar"
>

    <x-avatar-sidebar :view-info-user="true"/>

    <x-admin.layouts-v2.nav-modulo label="Módulo">
        <x-admin.layouts-v2.nav-modulo-item
            href="{{ route('admin.index') }}"
            class="{{ request()->routeIs('admin.index') ? 'modulo-item-active' : 'modulo-item' }}"
            selected="{{ request()->routeIs('admin.index') ? 'item-selected' : '' }}"
        >
            <x-eos-home class="icon-item" />
            <span class="ml-2">{{ __('admin/sidebar.labelHome') }}</span>
        </x-admin.layouts-v2.nav-modulo-item>
        @can('view', $moduleSettings)
            <x-admin.layouts-v2.nav-modulo-item
                href="{{ route('admin.manager-user') }}"
                class="{{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*') ? 'modulo-item-active' : 'modulo-item' }}"
                selected="{{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*') ? 'item-selected' : '' }}"
            >
                <x-eos-settings class="icon-item" />
                <span class="ml-2">{{ __('Configurações') }}</span>
            </x-admin.layouts-v2.nav-modulo-item>
        @endcan
    </x-admin.layouts-v2.nav-modulo>

    @yield('submenu')
</div>
