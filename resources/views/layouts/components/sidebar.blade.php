<nav class="sidebar sidebar-group scrollable-sidebar">
    <div class="sidebar-sticky">
        @include('layouts.components.sidebar.brand')
        <ul class="nav d-flex flex-column mt-20 px-2 text-center">
            @include('layouts.components.sidebar.nav')
        </ul>
        @include('layouts.components.sidebar.user')
    </div>
</nav>
