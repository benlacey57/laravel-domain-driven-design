{{-- create role modal --}}
<div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="create_role_form" class="modal-form" method="POST" action="{{ route('role.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createRoleLabel">
                        <span class="modal-title-icon pr-2">{!! Icon::get('role-add', 24, '#7999ac', 2) !!}</span>
                        <span class="modal-title-text">{{ __('hhf/create.role.modal.title') }}</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">{!! Icon::get('close', 36) !!}</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('roles.modal.create.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-loader">{{ __('hhf/create.role.create') }}</button>
                    <button type="submit" class="btn btn-link btn-sm" data-dismiss="modal">{{ __('hhf/common.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
