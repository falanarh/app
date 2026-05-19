<div class="container-minimal">
    @foreach($posts as $post)
        <div class="post post-xl">
            <div class="post-top">
                {!! Theme::partial('blog.post-meta', compact('post')) !!}
                <div class="post-title mb-0 mt-4 h5">
                    <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
                </div>
            </div>
            <div class="thumb rounded">
                {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory, 'wrapperClass' => 'position-absolute']) !!}
                <a title="{{ $post->name }}" href="{{ $post->url }}">
                    <div class="inner">
                        {!! RvMedia::image($post->image, $post->name) !!}
                    </div>
                </a>
            </div>

            @if ($description = $post->description)
                <div class="details">
                    <p class="excerpt mb-0 truncate-custom truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                </div>
            @endif

            <div class="post-bottom clearfix d-flex align-items-center">
                {!! Theme::partial('blog.post-sharing', compact('post')) !!}

                <div class="float-end d-none d-md-block">
                    <a href="{{ $post->url }}" class="more-link">{{ __('Continue reading') }}
                        <x-core::icon name="ti ti-chevron-right"/>
                    </a>
                </div>
                <div class="more-button d-block d-md-none float-end">
                    <a href="{{ $post->url }}"><span class="icon-options"></span></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
