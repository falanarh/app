<header class="header-classic">
    <div class="container-xl">
        <div class="header-top">
            <div class="d-flex align-items-center justify-content-between">
                {!! Theme::partial('header.logo') !!}
                {!! dynamic_sidebar('header_sidebar') !!}
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="header-bottom  w-100">

            <div class="container-xl">
                <div class="d-flex align-items-center">
                    <div class="collapse navbar-collapse flex-grow-1 main-menu">
                        {!! Menu::renderMenuLocation('main-menu', ['view' => 'main-menu', 'options' => ['class' => 'navbar-nav']]) !!}
                    </div>

                    {!! Theme::partial('header.action-buttons') !!}
                </div>
            </div>
        </div>
    </nav>
</header>
