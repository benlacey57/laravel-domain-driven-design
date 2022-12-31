<div id="secondary-sidebar-configuration" class="secondary-sidebar group scrollable-sidebar">
    <div class="secondary-sidebar-header">
        @include('layouts.components.sidebar.secondary.configuration.header')
    </div>
    <div class="secondary-sidebar-content text-left mt-20">
        @include('layouts.components.sidebar.secondary.configuration.assets')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.direct-business-configurations')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.products')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.programs')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.manufacturers')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.document-templates')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.rate-cards')
    </div>
    @can([PermissionSlugEnum::UNDERWRITE_PROPOSALS, PermissionSlugEnum::CHANGE_FUNDER])
        <div class="secondary-sidebar-content text-left">
            @include('layouts.components.sidebar.secondary.configuration.rule-sets')
        </div>
    @endcan
    @can([PermissionSlugEnum::UNDERWRITE_PROPOSALS])
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.cashflow-configuration')
    </div>
    @endcan
    @can(PermissionSlugEnum::IMPORT_COMMISSION_SPLITS)
        <div class="secondary-sidebar-content text-left">
            @include('layouts.components.sidebar.secondary.configuration.commission-splits')
        </div>
    @endcan
    @can(PermissionSlugEnum::CREDIT_BATCH_ELIGIBILITY)
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.credit-batches')
    </div>
    @endcan
    @can(PermissionSlugEnum::PREPARE_FUNDING_FILES)
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.prepare-funding-files')
    </div>
    @endcan
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.document-validation-sets')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.event-and-action-sets')
    </div>
    <div class="secondary-sidebar-content text-left">
        @include('layouts.components.sidebar.secondary.configuration.system-config')
    </div>
    @can(PermissionSlugEnum::BROKER_COST_OF_FUNDS)
        <div class="secondary-sidebar-content text-left">
            @include('layouts.components.sidebar.secondary.configuration.broker-cost-of-funds')
        </div>
    @endcan
</div>
