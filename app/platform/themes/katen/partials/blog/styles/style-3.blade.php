<div class="row gy-4">
    @foreach($posts as $post)
        <div class="col-12">
            <div class="post post-classic rounded bordered">
                <div class="thumb top-rounded">
                    {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory, 'wrapperClass' => 'position-absolute']) !!}
                    <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">
                        <div class="inner">
                            {{ RvMedia::image($post->image, $post->name) }}
                        </div>
                    </a>
                </div>
                <div class="details">
                    {!! Theme::partial('blog.post-meta', compact('post')) !!}
                    <div class="post-title mb-3 mt-3 h5">
                        <a title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
                    </div>

                    @if ($description = $post->description)
                        <p class="excerpt mb-0 truncate-custom truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                </div>
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
        </div>
    @endforeach
</div>
