<header @class(['header-personal', Theme::get('headerWrapperClass')])>
    <div class="container-xl header-top">
        <div class="row align-items-center">
            <div class="col-4 d-none d-md-block d-lg-block">
                {!! dynamic_sidebar('header_sidebar') !!}
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                @if ($authorAvatar = theme_option('site_author_avatar'))
                    <a class="navbar-brand header-author-avatar" href="{{ BaseHelper::getHomepageUrl() }}">
                        {{ RvMedia::image($authorAvatar, theme_option('site_tagline')) }}
                    </a>
                @endif

                {!! Theme::partial('header.logo', [
                    'wrapperClass' => 'd-block text-logo',
                    'logoName' => Theme::get('isHomepage') ? 'site_logo_alt' : 'logo',
                ]) !!}

                @if ($title = theme_option('site_tagline'))
                    <span class="slogan d-block mt-2">{!! BaseHelper::clean($title) !!}</span>
                @endif
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                {!! Theme::partial('header.action-buttons', ['wrapperClass' => 'float-md-end mt-4 mt-md-0']) !!}
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container-xl">
            <div class="collapse navbar-collapse justify-content-center centered-nav main-menu">
                {!! Menu::renderMenuLocation('main-menu', ['view' => 'main-menu', 'options' => ['class' => 'navbar-nav']]) !!}
            </div>
        </div>
    </nav>
</header>
