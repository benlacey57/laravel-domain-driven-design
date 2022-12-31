<div class="menu-item mb-2 p-2 clearfix">
    <a href="{{ route('credit-batch.index') }}" dusk="hhf-credit-eligibility-batches">
        <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
        <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('proposal', 22, '#7999ac', 3) !!}</div>
        <div class="menu-item-text">
            <span class="menu-item-title">{{ __('hhf/configurations.credit_batch.title') }}</span><br>
            <span class="menu-item-desc">{{ __('hhf/configurations.credit_batch.desc') }}.</span>
        </div>
    </a>
</div>
