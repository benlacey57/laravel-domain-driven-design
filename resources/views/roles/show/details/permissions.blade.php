                        <div class="row">
                            <div class="col-12">
                                <p class="item">
                                    <span class="label">{{ __('hhf/common.permissions') }}</span><span class="sr-only">:</span>
                                    @if (($role->permissions) && ($role->permissions->count() > 0))
                                    @each('roles.show.details.permissions.item', $role->permissions, 'permission')
                                    @else
                                    <span class="data">{{ __('hhf/role.no_permissions', ['role-name' => $role->name]) }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
