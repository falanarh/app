@php
    $wrapperClass = $wrapperClass ?? null;
@endphp

<div @class(['canvas-menu d-flex align-items-end flex-column', $wrapperClass])>
    <button type="button" class="btn-close" aria-label="{{ __('Close') }}"></button>

    <div class="logo">
        {!! Theme::partial('header.logo') !!}
    </div>

    <nav>
        {!! Menu::renderMenuLocation('main-menu', ['view' => 'main-menu-mobile', 'options' => ['class' => 'vertical-menu']]) !!}
    </nav>

    {!! dynamic_sidebar('menu_sidebar') !!}

    {!! Theme::partial('language-switcher', ['location' => 'sidebar']) !!}
</div>
