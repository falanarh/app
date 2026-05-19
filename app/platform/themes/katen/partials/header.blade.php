@php
    $style = theme_option('header_style', 1);
    $style = in_array($style, [1, 2, 3, 4]) ? $style : 1;
@endphp

{!! Theme::partial("header.styles.header-$style") !!}

{!! Theme::partial('header.search-popup') !!}

{!! Theme::partial('header.sidebar', ['wrapperClass' => $style == 3 ? 'position-left' : null]) !!}
