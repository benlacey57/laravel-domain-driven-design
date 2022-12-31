<div id="roles-table" class="table-responsive datatable-wrapper">
    <h2>Partner Portal System Config</h2>

    @if(session()->has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif


    <form id="edit_system_config_form" method="POST" action="{{ route('system-config.update') }}">
        @csrf

        <table class="table table-hover table-striped hhf-table datatable">
            <thead>
                @include('system-config.list.table.header')
            </thead>
            <tbody>
                @foreach ($options as $option)
                    @include('system-config.list.table.row', ['option' => $option])
                @endforeach
            </tbody>
        </table>
        <div class="form-group mt-3 mb-4">
            <button type="submit" class="btn btn-primary btn-sm btn-loader">Save Config</button>
        </div>
    </form>
</div>
