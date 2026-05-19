@php
    Theme::set('pageTitle', $category->name);
    Theme::layout('default');
@endphp

@include(Theme::getThemeNamespace('views.loop'))
