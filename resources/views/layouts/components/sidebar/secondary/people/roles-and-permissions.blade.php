        <div class="menu-item mb-2 p-2 clearfix">
            <a href="{{ route('roles') }}" dusk="roles-and-permissions-option">
                <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
                <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('roles-and-permissions', 24, '#7999ac', 2) !!}</div>
                <div class="menu-item-text">
                    <span class="menu-item-title">{{ __('hhf/people.roles-and-permissions.title') }}</span><br>
                    <span class="menu-item-desc">{{ __('hhf/people.roles-and-permissions.desc') }}.</span>
                </div>
            </a>
        </div>
