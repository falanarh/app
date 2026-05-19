<div class="post post-grid rounded bordered">
    <div class="thumb top-rounded">
        <a href="{{ $gallery->url }}" title="{{ $gallery->name }}">
            <div class="inner">
                {{ RvMedia::image($gallery->image, $gallery->title, 'medium') }}
            </div>
        </a>
    </div>

    <div class="details">
        <div class="post-title mb-3 mt-3 h5">
            <a class="truncate-custom truncate-2-custom" title="{{ $gallery->name }}" href="{{ $gallery->url }}">{{ $gallery->name }}</a>
        </div>

        {!! Theme::partial('galleries.gallery-meta', compact('gallery')) !!}
    </div>

    <div class="post-bottom clearfix d-flex align-items-center">
        {!! Theme::partial('blog.post-sharing', ['post' => $gallery]) !!}

        <div class="more-button float-end">
            <a title="{{ __('View') }}" href="{{ $gallery->url }}"><span class="icon-options"></span></a>
        </div>
    </div>
</div>
