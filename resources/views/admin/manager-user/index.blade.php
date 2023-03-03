<x-admin.layouts.app
    title="{{  __('admin/permissions.titlePageIndex') }}"
    meta-description="Página Principal do Sistema"
>
    @section('submenu')
        @include('admin.manager-user._partials.submenu')
    @endsection

    @include('admin.manager-user._partials.breadcumbs')

    <div class="ellos-main-content">
        <div class="p-3 sm:p-4">


        </div>
        @push('modalGeral')
            @include('admin.manager-user.permissions._partials.modal')
        @endpush
    </div>
    @push('scripts')

    @endpush
</x-admin.layouts.app>
