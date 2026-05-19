<header class="header-default">
    <nav class="navbar navbar-expand-lg">
        <div class="container-xl">
            {!! Theme::partial('header.logo') !!}

            <div class="collapse navbar-collapse justify-content-center main-menu">
                {!! Menu::renderMenuLocation('main-menu', ['view' => 'main-menu', 'options' => ['class' => 'navbar-nav mr-auto']]) !!}
            </div>

            <div class="header-right">
                {!! dynamic_sidebar('header_sidebar') !!}

                {!! Theme::partial('header.action-buttons') !!}
            </div>
        </div>
    </nav>
</header>
