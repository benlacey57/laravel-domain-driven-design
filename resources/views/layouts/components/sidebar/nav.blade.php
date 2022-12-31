<li class="icon mb-2">
    <div
            class="tooltip-nav"
            title="{{ __('hhf/common.create') }}"
            role="button"
            id="createMenuLink"
            data-toggle="tooltip"
            data-placement="right"
            data-original-title="{{ __('hhf/common.create') }}"
            data-sidebar-parent="create"
    >
        {!! Icon::get('plus', 36, '#f3f3f3', 3) !!}
        <span class="sr-only">{{ __('hhf/common.create') }}</span>
    </div>
</li>
{{-- menu spacer --}}
<li class="icon mt-15 mb-4">
    <div
            class="tooltip-nav"
            title="{{ __('hhf/common.proposals') }}"
            role="button"
            id="proposalMenuLink"
            data-toggle="tooltip"
            data-placement="right"
            data-original-title="{{ __('hhf/common.proposals') }}"
            data-sidebar-parent="proposal"
    >
        {!! Icon::get('proposal', 22, '#e3e3e3', 3) !!}
        <span class="sr-only">{{ __('hhf/common.proposals') }}</span>
    </div>
</li>
<li class="icon mt-4 mb-4">
    <a
            href="{{ route('organisations') }}"
            class="tooltip-nav"
            title="{{ __('hhf/common.organisations') }}"
            data-toggle="tooltip"
            data-placement="right"
            data-original-title="{{ __('hhf/common.organisations') }}"
    >
        {!! Icon::get('organisation', 22, '#e3e3e3', 3) !!}
        <span class="sr-only">{{ __('hhf/common.organisations') }}</span>
    </a>
</li>
<li class="icon mt-4 mb-4">
    <div
            class="tooltip-nav"
            title="{{ __('hhf/common.people') }}"
            role="button"
            id="peopleMenuLink"
            data-toggle="tooltip"
            data-placement="right"
            data-original-title="{{ __('hhf/common.people') }}"
            data-sidebar-parent="people"
    >
        {!! Icon::get('users', 22, '#e3e3e3', 3) !!}
        <span class="sr-only">{{ __('hhf/common.people') }}</span>
    </div>
</li>
<li class="icon mt-4 mb-4">
    <a href="{{ route('credit-proposals.index') }}">
        <div class="tooltip-nav" title="{{ __('hhf/common.credit_proposals') }}" data-toggle="tooltip" data-placement="right" data-original-title="{{ __('hhf/common.credit') }}">
            {!! Icon::get('credit', 22, '#e3e3e3', 3) !!}
            <span class="sr-only">{{ __('hhf/common.credit') }}</span>
        </div>
    </a>
</li>

@can(PermissionSlugEnum::LIST_REFERRALS)
    <li class="icon mt-4 mb-4">
        <a
                href="{{ route('referrals.index') }}"
                class="tooltip-nav"
                title="{{ __('hhf/referrals.referrals') }}"
                data-toggle="tooltip"
                data-placement="right"
                data-original-title="{{ __('hhf/referrals.referrals') }}"
                data-sidebar-parent="referrals"
                id="referralsMenuLink"
        >
            {!! Icon::get('deal', 22, '#e3e3e3', 3) !!}

            <span class="sr-only">{{ __('hhf/referrals.referrals') }}</span>
        </a>
    </li>
@endcan


{{-- menu spacer --}}
<li class="icon mt-15 mb-4">
    <div
            class="tooltip-nav"
            title="{{ __('hhf/common.configuration') }}"
            role="button"
            id="configurationMenuLink"
            data-toggle="tooltip"
            data-placement="right"
            data-original-title="{{ __('hhf/common.configuration') }}"
            data-sidebar-parent="configuration"
    >
        {!! Icon::get('settings', 22, '#e3e3e3', 3) !!}
        <span class="sr-only">{{ __('hhf/common.configuration') }}</span>
    </div>
</li>
