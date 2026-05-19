@php
    $wrapperClass = $wrapperClass ?? null;
@endphp

<div @class(['post post-list-sm square', $wrapperClass])>
    <div class="thumb rounded">
        <a href="{{ $post->url }}">
            <div class="inner">
                {{ RvMedia::image($post->image, $post->name, 'medium') }}
            </div>
        </a>
    </div>
    <div class="details clearfix">
        <div class="post-title my-0 h6">
            <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
        </div>

        {!! Theme::partial('blog.post-widget-meta', ['post' => $post, 'wrapperClass' => 'mt-1']) !!}
    </div>
</div>
