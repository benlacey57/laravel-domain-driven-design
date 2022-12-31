            <div id="top" class="topbar group bg-white px-0 px-md-10 pt-md-4 pb-md-5 mb-8">
                <div class="topbar-center">
                    <img class="brand" src="{{ asset('hhf/assets/logo/propel-admin-logo.png') }}" width="216" height="35" alt="{{ __('hhf/common.logo.group') }}">
                </div>
                <div class="topbar-left">
                    @if (isset($backUrl) && $backUrl)
                        <a href="{{ $backUrl }}" class="back-button">{!! Icon::get('arrow-left', 26, '#6a8697', 3) !!}</a>
                    @endif
                    <h2 style="float:left;"> {{ $title ?? config('hhf.company.name') }}</h2>
                </div>
                <div class="topbar-right">
                    @yield('topbar.search', View::make('layouts.components.topbar.tagline'))
                </div>
            </div>
            