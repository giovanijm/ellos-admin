<x-admin.layouts-v2.app
    title="Home"
    meta-description="Página Principal do Sistema"
>
    @section('breadcrumbs')
        @include('admin._partials.breadcumbs')
    @endsection
    @section('submenu')
        @include("admin._partials.submenu")
    @endsection

    Conteúdo da Página Index

</x-admin.layouts-v2.app>
