@if ($loggedInUser->can('create-deals'))
<div class="menu-item mb-2 p-2 clearfix">
    <a href="{{ route('proposal.new') }}">
        <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
        <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('proposal-add', 24, '#7999ac', 2) !!}</div>
        <div class="menu-item-text">
            <span class="menu-item-title">{{ __('hhf/proposal.sidebar.title') }}</span><br>
            <span class="menu-item-desc">{{ __('hhf/proposal.sidebar.description') }}.</span>
        </div>
    </a>
</div>
@endif

<div class="menu-item mb-2 p-2 clearfix">
    <a href="{{ route('proposals') }}">
        <span class="menu-item-arrow">{!! Icon::get('arrow-right', 24, '#7999ac', 2) !!}</span>
        <div class="menu-item-icon pt-1 pr-3">{!! Icon::get('view-all', 24, '#7999ac', 2) !!}</div>
        <div class="menu-item-text">
            <span class="menu-item-title">{{ __('hhf/proposal.sidebar_view_all.title') }}</span><br>
            <span class="menu-item-desc">{{ __('hhf/proposal.sidebar_view_all.description') }}.</span>
        </div>
    </a>
</div>
{{-- Legacy Proposals --}}
@include('layouts.components.sidebar.secondary.legacy-proposal.all-legacy-proposals')
