<x-admin.layouts-v2.breadcrumb>
    <x-admin.layouts-v2.breadcrumb-item href="{{ route('admin.index')}}">
        <x-eos-home class="icon-item" />
        <span class="hidden lg:block">Home</span>
    </x-admin.layouts-v2.breadcrumb-item>
    <x-admin.layouts-v2.breadcrumb-item href="{{ route('admin.manager-user') }}">
        <x-eos-settings class="icon-item" />
        <span class="hidden lg:block">Configurações</span>
    </x-admin.layouts-v2.breadcrumb-item>
    <x-admin.layouts-v2.breadcrumb-item href="{{ route('admin.manager-user') }}">
        <x-eos-manage-accounts class="icon-item" />
        <span class="hidden lg:block">Gestão de Usuários</span>
    </x-admin.layouts-v2.breadcrumb-item>
    <x-admin.layouts-v2.breadcrumb-item selected>
        <x-clarity-user-solid class="icon-item" />
        Usuários
    </x-admin.layouts-v2.breadcrumb-item>
</x-admin.layouts-v2.breadcrumb>
