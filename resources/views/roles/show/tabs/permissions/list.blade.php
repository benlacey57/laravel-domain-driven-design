    <div class="row">
        <div class="col-12">
            <p class="item">
                <span class="label">{{ $role->name }} {{ __('hhf/common.permissions') }}</span><span class="sr-only">:</span>
            </p>
        </div>
    </div>
    @foreach ($allPermissions->chunk(3) as $chunk)
    <div class="row mx-0 py-2 mb-2">
        @foreach ($chunk as $permission)
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $permission->id }}" id="list-{{ $permission->slug }}-{{ $permission->id }}" {!! ($role->hasPermission($permission->id)) ? 'checked="checked"' : '' !!} disabled="disabled">
                <label class="custom-control-label" for="{{ $permission->slug }}-{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
