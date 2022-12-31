<div class="tab-pane fade show {{request()->has('show') ? '' : 'active'}}" id="users" role="tabpanel" aria-labelledby="users-tab">
@if ($role->users->count() <= 0)
    <div class="py-10 text-center">
        <p>{!! Icon::get('users', 64, '#7999ac', 1) !!}</p>
        <p>{{ __('hhf/role.no_users', ['role-name' => $role->name]) }}</p>
    </div>
@else
    @include('roles.show.tabs.users.table')
@endif
</div>
