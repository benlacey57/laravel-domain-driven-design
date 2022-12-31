@extends('layouts.app.logged-in')

@section('content')
<div class="container-fluid container-howapp">

    @include('roles.show.alerts')
    @include('roles.show.options')

    <div class="row">
        <div class="col-3 pr-4">
            <div class="card hhf-card role-card">
                <div class="card-body">
                    @include('roles.show.details')
                </div>
            </div>
        </div>
        <div class="col-9 pl-4">
            <div class="card hhf-card role-card">
                <div class="card-body">
                    @include('roles.show.tabs')
                    <div class="tab-content" id="rolesTabContent">
                        @include('roles.show.tabs.users')
                        @include('roles.show.tabs.permissions')
                        @include('audits.tabs.audit')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    @parent
    @if ($loggedInUser->can('edit-roles'))
        @include('roles.modal.edit')
    @endif
@endsection
