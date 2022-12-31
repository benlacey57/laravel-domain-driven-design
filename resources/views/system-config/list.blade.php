@extends('layouts.app.logged-in')

@section('content')
    <div class="container-fluid container-howapp">
        <div class="pl-6">
            <div class="card hhf-card">
                <div class="card-body">
                    @include('system-config.list.table')
                </div>
            </div>
        </div>
    </div>
@endsection



