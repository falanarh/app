@use(Theme\Katen\Support\ThemeHelper)

@if ($post)
    <ul @class(['meta list-inline mb-0', $wrapperClass ?? null])>
        @if(class_exists($post->author_type) && ($author = $post->author ?? null) && ThemeHelper::isShowPostMeta('widget', 'author_name', false) && $author)
            {!! Theme::partial('blog.post-meta.author', ['author' => $author, 'avatar' => $avatar ?? false]) !!}
        @endif

        @if(ThemeHelper::isShowPostMeta('widget', 'published_date', true))
            {!! Theme::partial('blog.post-meta.published-date', compact('post')) !!}
        @endif

        @if(ThemeHelper::isShowPostMeta('widget', 'reading_time', false))
            {!! Theme::partial('blog.post-meta.reading-time', compact('post')) !!}
        @endif

        @if(ThemeHelper::isShowPostMeta('widget', 'views_count', false))
            {!! Theme::partial('blog.post-meta.views-count', compact('post')) !!}
        @endif
    </ul>
@endif
