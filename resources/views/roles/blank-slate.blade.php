@extends('layouts.app.logged-in')

@section('content')
    <div class="text-center mt-50 mt-sm-40">
        <p>
            {!! Icon::get('user-secure', 96, '#7999ac', 1) !!}
        </p>
        <p class="lead">
            {{ __('hhf/role.no_roles') }}.
        </p>
    </div>
@endsection
