                    <div class="btn btn-icon btn-outline-group p-2" href="#" role="button" title="{{ __('hhf/role.edit', ['name' => $role->name]) }}" data-toggle="modal" data-target="#editRoleModal_{{ $role->slug }}" data-backdrop="static" dusk="edit-role-option">
                        {!! Icon::get('edit', 16, '#1f3b84', 2) !!}
                        <span class="sr-only">{{ __('hhf/role.edit', ['name' => $role->name]) }}</span>
                    </div>
