<div id="secondary-sidebar-people" class="secondary-sidebar group scrollable-sidebar">
    <div class="secondary-sidebar-header">
        @include('layouts.components.sidebar.secondary.people.header')
    </div>
    <div class="secondary-sidebar-content text-left mt-20">
        @include('layouts.components.sidebar.secondary.people.hhf-users')
        @include('layouts.components.sidebar.secondary.people.partner-users')
        @include('layouts.components.sidebar.secondary.people.roles-and-permissions')
        @include('layouts.components.sidebar.secondary.people.admin-groups')
    </div>
</div>
