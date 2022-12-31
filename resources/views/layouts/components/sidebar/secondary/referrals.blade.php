<div id="secondary-sidebar-referrals" class="secondary-sidebar group scrollable-sidebar">
    <div class="secondary-sidebar-header">
        @include('layouts.components.sidebar.secondary.referrals.header')
    </div>
    <div class="secondary-sidebar-content text-left mt-20">
        @include('layouts.components.sidebar.secondary.referrals.referrals')
       
        @can(PermissionSlugEnum::LIST_REFERRALS_VALIDATION)
            @include('layouts.components.sidebar.secondary.pre-referrals.all-pre-referrals')
        @endcan

        @include('layouts.components.sidebar.secondary.legacy-proposal.barclays-legacy-proposals')
    </div>
</div>


