<div class="tab-pane fade {{request('show') == 'permissions' ? 'active' : ''}}" id="permissions" role="tabpanel" aria-labelledby="permissions-tab">
@if ($role->permissions->count() <= 0)
    <div class="py-10 text-center">
        <p>{!! Icon::get('permissions', 64, '#7999ac', 1) !!}</p>
        <p>{{ __('hhf/role.no_permissions', ['role-name' => $role->name]) }}</p>
    </div>
@else
    @include('roles.show.tabs.permissions.list')
@endif
</div>
