@php
    use \App\Models\Admin\ManagerUser\Permission;

    $moduleSettings = new Permission(); $moduleSettings->name = "moduleSettings";
    $moduleRegistrations = new Permission(); $moduleRegistrations->name = "ModuleRegistrations";
    $moduleReports = new Permission(); $moduleReports->name = "ModuleReports";
@endphp
<div id="application-sidebar"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform scrollbar-y dark:scrollbar-y z-[60] hidden xl:block fixed top-0 left-0 bottom-0 overflow-y-auto xl:translate-x-0 xl:right-auto xl:bottom-0 ellos-sidebar"
>

    <div class="hidden xl:flex justify-items-center text-xl font-semibold dark:text-white tracking-wide pb-6 pl-6">
        <img class="mr-2 w-10 h-12 p-1 drop-shadow dark:backdrop-brightness-200 dark:bg-white dark:rounded" src="{{getUrlImageServidor('802f9a82-0015-43c4-0ab9-2da5d868cd00')}}"/>
        <div class="grid grid-cols-1">
            <span class="font-bold drop-shadow text-slate-900 dark:text-gray-300">Ellos</span>
            <span class="text-xs whitespace-nowrap uppercase text-gray-600 dark:text-gray-500">Tecnologia de ponta</span>
        </div>
    </div>

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
        @can('view', $moduleRegistrations)
            <x-admin.layouts-v2.nav-modulo-item
                href="{{ route('admin.registrations') }}"
                class="{{ request()->routeIs('admin.customers.*')
                            || request()->routeIs('admin.providers.*')
                            || request()->routeIs('admin.services.*')
                            || request()->routeIs('admin.status.*')
                                ? 'modulo-item-active'
                                : 'modulo-item' }}"
                selected="{{ request()->routeIs('admin.customers.*')
                            || request()->routeIs('admin.providers.*')
                            || request()->routeIs('admin.services.*')
                            || request()->routeIs('admin.status.*')
                                ? 'item-selected'
                                : '' }}"
            >
                <x-fas-file-invoice class="icon-item" />
                <span class="ml-2">{{ __('Cadastros') }}</span>
            </x-admin.layouts-v2.nav-modulo-item>
        @endcan
        @can('view', $moduleReports)
            <x-admin.layouts-v2.nav-modulo-item
                href="{{ route('admin.manager-reports') }}"
                class="{{ request()->routeIs('admin.reports.*') ? 'modulo-item-active' : 'modulo-item' }}"
                selected="{{ request()->routeIs('admin.reports.*') ? 'item-selected' : '' }}"
            >
                <x-fas-print class="icon-item" />
                <span class="ml-2">{{ __('Relatórios') }}</span>
            </x-admin.layouts-v2.nav-modulo-item>
        @endcan
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
