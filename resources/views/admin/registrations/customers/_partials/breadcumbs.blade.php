<x-admin.layouts-v2.breadcrumb>
    <x-admin.layouts-v2.breadcrumb-item href="{{ route('admin.index')}}">
        <x-eos-home class="icon-item" />
        <span class="hidden lg:block">Home</span>
    </x-admin.layouts-v2.breadcrumb-item>
    <x-admin.layouts-v2.breadcrumb-item href="{{ route('admin.registrations') }}">
        <x-fas-file-invoice class="icon-item" />
        <span class="hidden lg:block">Cadastros</span>
    </x-admin.layouts-v2.breadcrumb-item>
    <x-admin.layouts-v2.breadcrumb-item selected>
        <x-fas-hospital-user class="icon-item" />
        Clientes
    </x-admin.layouts-v2.breadcrumb-item>
</x-admin.layouts-v2.breadcrumb>
