@php
    Theme::set('pageTitle', __('Search result for: ":query"', ['query' => BaseHelper::stringify(request()->input('q'))]));
    Theme::layout('default');
@endphp

@include(Theme::getThemeNamespace('views.loop'))
