@php
    $image = $post->image ? RvMedia::getImageUrl($post->image) : null;
    $name = $post->name;
@endphp

<div class="details clearfix">
    {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory]) !!}
    <h2 class="post-title">
        <a class="truncate-custom truncate-2-custom" title="{{ $name }}" href="{{ $post->url }}">{{ $name }}</a>
    </h2>
    {!! Theme::partial('blog.post-meta', ['post' => $post, 'avatar' => false]) !!}
</div>
<a title="{{ $name }}" href="{{ $post->url }}">
    <div class="thumb rounded">
        <div class="inner">
            {!! RvMedia::image($image, $name, 'medium', attributes: ['loading' => false]) !!}
        </div>
    </div>
</a>
