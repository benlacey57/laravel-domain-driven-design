{{-- edit role modal --}}
<div class="modal fade" id="editRoleModal_{{ $role->slug }}" tabindex="-1" role="dialog" aria-labelledby="editRoleLabel_{{ $role->slug }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="edit_role_form_{{ $role->slug }}" class="modal-form" method="POST" action="{{ route('role.update', $role->id) }}">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleLabel_{{ $role->slug }}">
                        <span class="modal-title-icon pr-2">{!! Icon::get('user-secure', 24) !!}</span>
                        <span class="modal-title-text">{{ __('hhf/edit.role.modal.title') }} &#9642; {{ $role->name }}</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">{!! Icon::get('close', 36) !!}</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('roles.modal.edit.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-loader">{{ __('hhf/edit.role.save') }}</button>
                    <button type="submit" class="btn btn-link btn-sm" data-dismiss="modal">{{ __('hhf/common.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
