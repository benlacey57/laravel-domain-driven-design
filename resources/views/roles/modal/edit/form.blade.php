                    <div class="form-group ">
                        <div class="col-12">
                            @include('common.forms.mandatory.all')
                        </div>
                    </div>
                    <div class="form-group md-input mt-8">
                        <div class="col-12">
                            <input type="text" class="form-control md-form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $role->name) }}" placeholder="{{ __('hhf/forms.edit.role.name.placeholder') }}" {{ required() }}>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="name">{{ __('hhf/forms.edit.role.name.label') }}</label>
                            <span class="invalid-feedback">
                                @if ($errors->has('name'))
                                {{ $errors->first('name') }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group md-input">
                        <div class="col-12">
                            <input type="text" class="form-control md-form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $role->description) }}" placeholder="{{ __('hhf/forms.edit.role.description.placeholder') }}" {{ required() }}>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="description">{{ __('hhf/forms.edit.role.description.label') }}</label>
                            <span class="invalid-feedback">
                                @if ($errors->has('description'))
                                {{ $errors->first('description') }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-8">
                        <div class="col-12">
                            <p class="select-permissions">{{ __('hhf/forms.edit.role.permissions.select') }}</p>
                            <span class="invalid-feedback">
                                @if ($errors->has('permissions'))
                                {{ $errors->first('permissions') }}
                                @endif
                            </span>
                            @foreach ($editRolePermissions->chunk(3) as $chunk)
                            <div class="row mx-0 py-2 mb-2">
                                @foreach ($chunk as $permission)
                                <div class="col-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $permission->id }}" id="{{ $role->slug }}-{{ $permission->slug }}-{{ $permission->id }}" @if ($role->hasPermission($permission->id)) checked="checked" @endif>
                                        <label class="custom-control-label" for="{{ $role->slug }}-{{ $permission->slug }}-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
