@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionHome = new Permission(); $sectionHome->name = "SectionHome";
    $modifyProfile = new Permission(); $modifyProfile->name = "ModifyProfile";

@endphp


<div id="application-sidebar"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform scrollbar-y dark:scrollbar-y z-[60] hidden lg:block fixed top-0 left-0 bottom-0 overflow-y-auto lg:translate-x-0 lg:right-auto lg:bottom-0 ellos-sidebar"
>

    <x-avatar-sidebar :view-info-user="true"/>
    <nav class="nav-modulo">
        <label>Módulos</label>
        <ul>
            <li class="item-selected">
                <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'modulo-item-active' : 'modulo-item' }}">
                    <x-eos-home class="icon-item" />
                    <span class="ml-2">{{ __('admin/sidebar.labelHome') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.manager-user') }}" class="{{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*') ? 'modulo-item-active' : 'modulo-item' }}">
                    <x-eos-settings class="icon-item" />
                    <span class="ml-2">{{ __('Configurações') }}</span>
                </a>
            </li>
        </ul>
    </nav>
    @yield('submenu')
</div>
