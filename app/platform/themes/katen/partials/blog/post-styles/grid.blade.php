@php
    $wrapperClass = $wrapperClass ?? null;
    $postMeta = $postMeta ?? 'post-meta';
    $postMeta = in_array($postMeta, ['post-meta', 'post-detail-meta', 'post-widget-meta']) ? $postMeta : 'post-meta';
    $lazyLoadImage = $lazyLoadImage ?? [];
@endphp

<div @class(['post', $wrapperClass])>
    <div class="thumb rounded">
        {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory, 'wrapperClass' => 'position-absolute']) !!}
        <a href="{{ $post->url }}" title="{{ $post->name }}">
            <div class="inner">
                {{ RvMedia::image($post->image, $post->name, 'medium', attributes: [...$lazyLoadImage]) }}
            </div>
        </a>
    </div>
    {!! Theme::partial("blog.$postMeta", ['post' => $post, 'wrapperClass' => 'mt-4']) !!}

    <div class="post-title mb-3 mt-3 h5">
        <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
    </div>

    @if (($description = $post->description) && ($showDescription ?? true))
        <p class="excerpt mb-0 truncate-custom truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
    @endif
</div>
