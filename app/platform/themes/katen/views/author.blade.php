@php
    Theme::set('pageTitle', $author->name);
    Theme::layout(theme_option('blog_post_author_layout', 'default'));
    Theme::set('breadcrumbs', false);
    Theme::set('beforeContent',Theme::partial('blog.post-author-header', compact('author')));
@endphp

@include(Theme::getThemeNamespace('views.loop'))
