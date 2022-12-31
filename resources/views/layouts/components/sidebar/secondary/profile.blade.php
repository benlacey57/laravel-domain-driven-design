<div id="secondary-sidebar-profile" class="secondary-sidebar group scrollable-sidebar">
    <div class="secondary-sidebar-header">
        @include('layouts.components.sidebar.secondary.profile.header')
    </div>
    <div class="secondary-sidebar-content mt-20">
        <div class="avatar avatar-md avatar-round avatar-text">{{ $loggedInUser->initials() }}</div>
        <p>{{ $loggedInUser->first_name }} {{ $loggedInUser->last_name }}</p>
        <p>{{ $loggedInUser->comma_delimited_teams }}</p>
        <ul class="list-unstyled mt-10">
            <li><a href="{{ route('auth.passwords.reset.index') }}">{{ __('hhf/profile.change_password') }}</a></li>
        </ul>
    </div>
    <form id="logout" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-primary btn" type="submit">{{ __('hhf/common.log_out') }}</button>
    </form>
    <div class="app-version">
        {{Version::show()}}
    </div>
</div>
