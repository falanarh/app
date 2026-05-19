@php
    Theme::set('pageTitle', $tag->name);
    Theme::layout('default');
@endphp

@include(Theme::getThemeNamespace('views.loop'))
