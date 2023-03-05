<div class="ellos-toast">
    @if (Session::has('messageInfo'))
        <x-admin.layouts.toast type-message="info">
            {{ Session::get('messageInfo') }}
        </x-admin.layouts.toast>
    @endif
    @if (Session::has('messageSuccess'))
        <x-admin.layouts.toast type-message="success">
            {{ Session::get('messageSuccess') }}
        </x-admin.layouts.toast>
    @endif
    @if (Session::has('messageWarning'))
        <x-admin.layouts.toast type-message="warning">
            {{ Session::get('messageWarning') }}
        </x-admin.layouts.toast>
    @endif
    @if (Session::has('messageDanger'))
        <x-admin.layouts.toast type-message="danger">
            {{ Session::get('messageDanger') }}
        </x-admin.layouts.toast>
    @endif
</div>
