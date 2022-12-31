<div class="menu-item mb-2 p-2 clearfix">
    <a href="{{ route('rule-engine.sets.index') }}" dusk="hhf-rule-sets-option">
        <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
        <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('view-all', 22, '#7999ac', 3) !!}</div>
        <div class="menu-item-text">
            <span class="menu-item-title">{{ __('hhf/configurations.rule_sets.title') }}</span><br>
            <span class="menu-item-desc">{{ __('hhf/configurations.rule_sets.desc') }}.</span>
        </div>
    </a>
</div>
