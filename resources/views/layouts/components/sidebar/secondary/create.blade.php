<div id="secondary-sidebar-create" class="secondary-sidebar group scrollable-sidebar">
    <div class="secondary-sidebar-header">
        @include('layouts.components.sidebar.secondary.create.header')
    </div>
    <div class="secondary-sidebar-content text-left mt-20">
        @if ($loggedInUser->can('create-deals'))
            @include('layouts.components.sidebar.secondary.create.proposal')
        @endif
{{--        @if ($loggedInUser->can('create-partner-users'))--}}
{{--            @include('layouts.components.sidebar.secondary.create.partner-user')--}}
{{--        @endif--}}
{{--        @if ($loggedInUser->can(PermissionSlugEnum::CREATE_USERS))--}}
{{--            @include('layouts.components.sidebar.secondary.create.hhf-user')--}}
{{--        @endif--}}
{{--        @if ($loggedInUser->can('create-roles'))--}}
{{--            @include('layouts.components.sidebar.secondary.create.role')--}}
{{--        @endif--}}
{{--        --}}{{----}}
{{--        @if ($loggedInUser->can('import-partner-organisations'))--}}
{{--            @include('layouts.components.sidebar.secondary.create.organisation')--}}
{{--        @endif--}}
{{--        --}}
    </div>
</div>



@section('modals')
    @parent
{{--    @if ($loggedInUser->can('import-partner-organisations'))--}}
{{--        @include('organisations.modal.import')--}}
{{--    @endif--}}
{{--    @if ($loggedInUser->can('create-partner-users'))--}}
{{--        @include('partner-users.modal.create')--}}
{{--    @endif--}}
{{--    @if ($loggedInUser->can(PermissionSlugEnum::CREATE_USERS))--}}
{{--        @include('hhf-users.modal.create')--}}
{{--    @endif--}}
{{--    @if ($loggedInUser->can('create-roles'))--}}
{{--        @include('roles.modal.create')--}}
{{--    @endif--}}
@endsection

