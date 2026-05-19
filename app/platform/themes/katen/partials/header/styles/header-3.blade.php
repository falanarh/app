<div class="container-xl">
    <header class="header-minimal">
        <div class="row align-items-center">
            <div class="col-4">
                <button class="burger-menu icon-button" aria-label="{{ __('Toggle menu') }}">
                    <x-core::icon name="ti ti-menu" />
                </button>
            </div>

            <div class="col-4 text-center">
                {!! Theme::partial('header.logo') !!}
            </div>

            <div class="col-4">
                <button class="search icon-button float-end" title="{{ __('Search') }}">
                    <x-core::icon name="ti ti-search" />
                </button>

                {!! Theme::partial('header.account', ['wrapperClass' => 'float-end me-2']) !!}

                {!! Theme::partial('language-switcher', ['location' => 'header', 'wrapperClass' => 'me-2 d-md-block float-end']) !!}
            </div>
        </div>
    </header>

    @if ($headerSidebar = dynamic_sidebar('header_sidebar'))
        <div class="mt-4 mb-4 d-sm-flex align-items-center justify-content-between d-none">
            {!! $headerSidebar !!}
        </div>
    @endif
</div>
