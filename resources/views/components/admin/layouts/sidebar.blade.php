@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionHome = new Permission(); $sectionHome->name = "SectionHome";
    $modifyProfile = new Permission(); $modifyProfile->name = "ModifyProfile";

    $sectionManagerUsers = new Permission(); $sectionManagerUsers->name = "sectionManagerUsers";
        $cadPermissoes = new Permission(); $cadPermissoes->name = "CadPermissoes";
        $cadGrupos = new Permission(); $cadGrupos->name = "CadGrupos";
        $cadUsuarios = new Permission(); $cadUsuarios->name = "CadUsuarios";

@endphp

<div id="application-sidebar"
    class="ellos-sidebar hs-overlay hs-overlay-open:translate-x-0 -translate-x-full hidden fixed inset-y-0 left-0 z-[60] w-64 overflow-y-auto transition duration-300 transform scrollbar-y lg:block lg:translate-x-0 lg:static lg:inset-0">
        <x-avatar-sidebar :view-info-user="true"/>

        <nav>
            <h5>Módulos</h5>
            <a href="#" class="modulo-item">
                <x-codicon-preview class="icon-item" />
                <span class="ml-2">{{ __('admin/sidebar.labelHome') }}</span>
            </a>
            <a href="#" class="modulo-item-active">
                <x-eos-settings class="icon-item" />
                <span class="ml-2">{{ __('Configurações') }}</span>
            </a>
            <a href="{{ route('admin.permissions.index') }}" class="modulo-item">
                <x-eos-business-center class="icon-item" />
                <span class="ml-2">{{ __('Negócios') }}</span>
            </a>
            <h5>Menu</h5>

        </nav>
</div>
