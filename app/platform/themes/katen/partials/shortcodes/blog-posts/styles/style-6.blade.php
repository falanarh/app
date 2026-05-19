<section class="hero-carousel">
    @php
        $count = min($posts->count(), 5);
    @endphp

    <section @class(['hero-carousel', 'container-xl' => $count <= 2])>
        <div data-slides-to-show="{{ $count }}" class="row post-carousel-featured post-carousel">
            @foreach($posts as $post)
                @php
                    $image = $post->image ? RvMedia::getImageUrl($post->image) : null;
                @endphp
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory]) !!}
                        <h4 class="post-title">
                            <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
                        </h4>
                        {!! Theme::partial('blog.post-meta', ['post' => $post, 'avatar' => false]) !!}
                    </div>
                    <a title="{{ $post->name }}" href="{{ $post->url }}">
                        <div class="thumb rounded">
                            <div class="inner data-bg-image" @if($image) data-bg-image="{{ $image }}" @endif></div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</section>
