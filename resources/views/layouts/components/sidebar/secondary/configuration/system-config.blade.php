<div class="menu-item mb-2 p-2 clearfix">
    <a href="{{route('system-config')}}">
        <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
        <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('settings', 22, '#7999ac', 3) !!}</div>
        <div class="menu-item-text">
            <span class="menu-item-title">{{ __('hhf/configurations.system_config.title') }}</span><br>
            <span class="menu-item-desc">{{ __('hhf/configurations.system_config.desc') }}.</span>
        </div>
    </a>
</div>
