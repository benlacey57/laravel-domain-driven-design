<div class="menu-item mb-2 p-2 clearfix">
    <a href="{{ route('organisations') }}">
        <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
        <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('view-all', 24, '#7999ac', 2) !!}</div>
        <div class="menu-item-text">
            <span class="menu-item-title">{{ __('hhf/organisation.sidebar.title') }}</span><br>
            <span class="menu-item-desc">{{ __('hhf/organisation.sidebar.description') }}.</span>
        </div>
    </a>
</div>
