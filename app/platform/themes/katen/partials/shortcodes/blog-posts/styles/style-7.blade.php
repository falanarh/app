<section class="hero-carousel">
    <div class="container-xl">
        <div class="post-carousel-lg mx-n2">
            @foreach($posts as $post)
                @php
                    $image = $post->image ? RvMedia::getImageUrl($post->image) : null;
                @endphp

                <div class="post featured-post-xl mx-2">
                    <div class="details clearfix">
                        {!! Theme::partial('blog.category-badge', ['category' => $post->firstCategory]) !!}
                        <h4 class="post-title">
                            <a class="truncate-custom truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
                        </h4>
                        <ul class="meta list-inline mb-0">
                            {!! Theme::partial('blog.post-meta', ['post' => $post, 'avatar' => false]) !!}
                        </ul>
                    </div>

                    <a href="{{ $post->url }}" title="{{ $post->name }}">
                        <div class="thumb rounded">
                            <div class="inner data-bg-image" @if($image) data-bg-image="{{ $image }}" @endif></div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
