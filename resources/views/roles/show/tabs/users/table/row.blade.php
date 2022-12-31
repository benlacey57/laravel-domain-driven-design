            <tr>
                <td>{{ $roleUser->first_name }} {{ $roleUser->last_name }}</td>
                <td>{{ $roleUser->email }}</td>
                <td>{{ $roleUser->roles->implode('name', ', ') }}</td>
                <td class="action text-right">
                    <a href="#" title="{{ __('hhf/common.view.user', ['name' => $roleUser->name]) }}">
                        {!! Icon::get('arrow-right-action', 18, '#4c606b') !!}
                    </a>
                </td>
            </tr>
