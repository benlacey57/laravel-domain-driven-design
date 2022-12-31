        <span class="icon icon-title">
            {!! Icon::get('hhf-user', 24) !!}
        </span>
        <span class="title">
            <h4>{{ $loggedInUser->first_name }} {{ $loggedInUser->last_name }}</h4>
        </span>
        <span id="secondary-sidebar-dismiss-profile" class="icon icon-dismiss">
            {!! Icon::get('close', 36) !!}
        </span>
