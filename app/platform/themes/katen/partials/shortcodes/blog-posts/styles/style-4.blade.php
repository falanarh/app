@if ($title = $shortcode->title)
    <div class="section-header">
        <h3 class="section-title">{!! BaseHelper::clean($title) !!}</h3>
        {!! Theme::partial('title-shape') !!}
        <div class="slick-arrows-top">
            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons me-1" aria-label="Previous"><i class="icon-arrow-left"></i></button>
            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons ms-1" aria-label="Next"><i class="icon-arrow-right"></i></button>
        </div>
    </div>
@endif

<div class="row post-carousel-twoCol post-carousel">
    @foreach($posts as $post)
        <div class="post post-over-content col-md-6">
           {!! Theme::partial('blog.post-styles.featured', compact('post')) !!}
        </div>
    @endforeach
</div>
