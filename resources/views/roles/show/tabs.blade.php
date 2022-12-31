<ul class="nav nav-tabs" id="rolesTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{request()->has('show') ? '' : 'active'}}" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">{{ __('hhf/common.users') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request('show') == 'permissions' ? 'active' : ''}}" id="permissions-tab" data-toggle="tab" href="#permissions" role="tab" aria-controls="permissions" aria-selected="false">{{ __('hhf/common.permissions') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request('show') == 'audits' ? 'active' : ''}}" id="permissions-tab" data-toggle="tab" href="#audit" role="tab" aria-controls="audit"
            aria-selected="false">{{ __('hhf/common.audit_log') }}</a>
    </li>
</ul>
