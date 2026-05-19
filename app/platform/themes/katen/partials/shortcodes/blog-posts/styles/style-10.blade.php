<div class="row gy-4">
    @foreach($posts as $post)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="post post-classic rounded bordered">
                <div class="thumb top-rounded">
                    {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory, 'wrapperClass' => 'position-absolute']) !!}
                    <a title="{{ $post->name }}" href="{{ $post->url }}">
                        <div class="inner">
                            {{ RvMedia::image($post->image, $post->name) }}
                        </div>
                    </a>
                </div>
                <div class="details p-3">
                    {!! Theme::partial('blog.post-meta', compact('post')) !!}
                    <div class="post-title mb-3 mt-3 h6">
                        <a title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
                    </div>

                    @if ($description = $post->description)
                        <p class="excerpt mb-0 truncate-custom truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                    @endif
                </div>
                <div class="post-bottom clearfix d-flex align-items-center p-3 pt-0">
                    <div class="float-end">
                        <a href="{{ $post->url }}" class="more-link">{{ __('Read More') }}
                            <x-core::icon name="ti ti-chevron-right"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    {{-- Pagination in full width --}}
    @if (method_exists($posts, 'links'))
        <div class="col-12">
            <div class="text-center mt-4">
                {!! $posts->withQueryString()->links() !!}
            </div>
        </div>
    @elseif ($blogPageUrl = get_blog_page_url())
        <div class="col-12">
            <div class="text-center">
                <a href="{{ $blogPageUrl }}" class="btn btn-simple">{{ __('View More') }}</a>
            </div>
        </div>
    @endif
</div>