<div class="post post-grid rounded bordered">
    <div class="thumb top-rounded">
        {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory, 'wrapperClass' => 'position-absolute']) !!}
        <a href="{{ $post->url }}" title="{{ $post->name }}">
            <div class="inner">
                {{ RvMedia::image($post->image, $post->name, 'medium') }}
            </div>
        </a>
    </div>
    <div class="details">
        {!! Theme::partial('blog.post-meta', compact('post')) !!}

        <div class="post-title mb-3 mt-3 h5">
            <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
        </div>

        @if ($description = $post->description)
            <p class="excerpt mb-0 truncate-custom truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
        @endif
    </div>
    <div class="post-bottom clearfix d-flex align-items-center">
        {!! Theme::partial('blog.post-sharing', compact('post')) !!}
        <div class="more-button float-end">
            <a title="{{ __('View') }}" href="{{ $post->url }}"><span class="icon-options"></span></a>
        </div>
    </div>
</div>
