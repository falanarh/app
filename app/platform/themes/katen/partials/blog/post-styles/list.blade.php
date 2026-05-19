<div class="post post-list clearfix">
    <div class="thumb rounded">
        <a href="{{ $post->url }}">
            <div class="inner">
                {{ RvMedia::image($post->image, $post->name, 'medium', attributes: ['loading' => $lazyLoadImage ?? true]) }}
            </div>
        </a>
    </div>
    <div class="details">
        {!! Theme::partial('blog.post-meta', ['post' => $post, 'wrapperClass' => 'mb-3']) !!}
        <div class="post-title h5">
            <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
        </div>

        @if ($description = $post->description)
            <p class="excerpt mb-0 truncate-custom truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
        @endif

        <div class="post-bottom clearfix d-flex align-items-center">
            {!! Theme::partial('blog.post-sharing', compact('post')) !!}

            <div class="more-button float-end">
                <a title="{{ __('View') }}" href="{{ $post->url }}"><span class="icon-options"></span></a>
            </div>
        </div>
    </div>
</div>
