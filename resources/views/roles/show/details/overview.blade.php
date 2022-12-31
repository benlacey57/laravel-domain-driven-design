                        <div class="avatar avatar-lg avatar-round avatar-outline avatar-text d-inline-block">
                            {!! Icon::get('user-secure', 48, '#abbfcb') !!}
                        </div>
                        <p class="overview-name">
                            <span class="sr-only">{{ __('hhf/role.role_name') }}</span>
                            {{ $role->name ?? __('hhf/role.no_role_name')}}
                        </p>
                        <p class="overview-secondary">
                            <span class="sr-only">{{ __('hhf/role.role_description') }}</span>
                            {{ $role->description ?? __('hhf/role.no_role_description')}}
                        </p>
                        <p class="role-users">
                            {!! trans_choice('hhf/role.number_of_role_users', $role->users->count(), ['role-name' => $role->name]) !!}
                        </p>
