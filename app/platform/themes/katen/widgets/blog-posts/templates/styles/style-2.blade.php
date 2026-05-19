@if ($posts->isNotEmpty())
    <div class="widget-blog-posts widget rounded">
        @if ($title = Arr::get($config, 'title'))
            <div class="widget-header text-center">
                <h3 class="widget-title">{!! BaseHelper::clean($title) !!}</h3>
                {!! Theme::partial('title-shape') !!}
            </div>
        @endif
        <div class="widget-content">
            <div class="post-carousel-widget mx-n2">
                @foreach($posts as $post)
                    {!! Theme::partial('blog.post-styles.grid', [
                            'post' => $post,
                            'showDescription' => false,
                            'postMeta' => 'post-widget-meta',
                            'lazyLoadImage' => ['loading' => false],
                            'wrapperClass' => 'mx-2',
                          ])
                      !!}
                @endforeach
            </div>
            <div class="slick-arrows-bot">
                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons me-1" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons ms-1" aria-label="Next"><i class="icon-arrow-right"></i></button>
            </div>
        </div>
    </div>
@endif
