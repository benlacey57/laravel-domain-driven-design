    @if ($status)
    <div class="row">
        <div class="col-12">
            @if ($status == 'create-success')
                @include('messages.success', [
                    'intro' => __('hhf/messages.role.create.intro'),
                    'message' => __('hhf/messages.role.create.message', ['name' => $role->name]),
                    'dismissible' => true,
                ])
            @elseif ($status == 'update-success')
                @include('messages.success', [
                    'intro' => __('hhf/messages.role.update.intro', ['name' => $role->name]),
                    'message' => __('hhf/messages.role.update.message', ['name' => $role->name]),
                    'dismissible' => true,
                ])
            @endif
        </div>
    </div>
    @endif
