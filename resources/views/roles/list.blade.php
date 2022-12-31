@extends('layouts.app.logged-in')

@section('content')
<div class="container-fluid container-howapp">

    @include('roles.list.alerts')
    @include('roles.list.options')

    @if ($roles->count() == 0)
        @include('roles.blank-slate')
    @else
    <div>
        <div class="card hhf-card">
            <div class="card-body">
                @include('roles.list.table')
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('modals')
    @parent
    @if ($loggedInUser->can('create-roles'))
        @include('roles.modal.create')
    @endif
@endsection
