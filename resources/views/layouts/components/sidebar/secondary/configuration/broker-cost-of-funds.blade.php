<div class="menu-item mb-2 p-2 clearfix">
    <a href="{{ (config('hhf.feature-flags.cost_of_funds.active') == true) ? route('cost-of-funds.list') : route('broker-cost-of-funds.show') }}" dusk="hhf-broker-cost-of-funds-option">
        <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
        <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('rate-card', 24, '#7999ac', 2) !!}</div>
        <div class="menu-item-text">
            <span class="menu-item-title">{{ __('hhf/configurations.broker_cost_of_funds.title') }}</span><br>
            <span class="menu-item-desc">{{ __('hhf/configurations.broker_cost_of_funds.desc') }}.</span>
        </div>
    </a>
</div>
