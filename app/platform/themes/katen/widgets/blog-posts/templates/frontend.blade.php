@php
    $style = Arr::get($config, 'style');
    $style = in_array($style, ['style-1', 'style-2', 'style-3', 'style-4']) ? $style : 'style-1';
@endphp

@include(Theme::getThemeNamespace('widgets.blog-posts.templates.styles.' . $style))
