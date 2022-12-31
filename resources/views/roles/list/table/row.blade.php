                            <tr>
                                <td>{!! HowAppRoleHyperlink::for($role)->use('slug')->display('name')->get() !!}</td>
                                <td>{{ $role->description }}</td>
                                <td class="action text-right">
                                    <div class="dropdown">
                                        <a class="dropdown-more dropdown-more-vertical dropdown-toggle" href="#" role="button" id="roleActionsMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">{{ __('hhf/common.more') }}</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="roleActionsMenu">
                                            <h6 class="dropdown-header">
                                                {!! Icon::get('user-secure', 16, '#7999ac', 2) !!}
                                                {{ $role->name }}
                                            </h6>
                                            @if ($loggedInUser->can('edit-roles'))
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editRoleModal_{{ $role->slug }}" data-backdrop="static">{{ __('hhf/common.edit.role') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="action text-right">
                                    <a href="{{ route('role.show', $role->slug) }}" title="{{ __('hhf/common.view.role', ['name' => $role->name]) }}" dusk="view-{{ $role->slug }}-option">
                                        {!! Icon::get('arrow-right-action', 18, '#4c606b') !!}
                                    </a>
                                </td>
                            </tr>

@section('modals')
    @parent
    @if ($loggedInUser->can('edit-roles'))
        @include('roles.modal.edit')
    @endif
@endsection
