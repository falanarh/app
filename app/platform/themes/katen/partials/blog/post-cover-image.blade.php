@php
    $coverImage = $post->getMetaData('cover_image', true);
@endphp
@if($coverImage)
    <section class="single-cover data-bg-image" data-bg-image="{{ RvMedia::getImageUrl($coverImage) }}">
        <div class="container-xl">
            <div class="cover-content post">
                {!! Theme::partial('blog.post-breadcrumbs', compact('post')) !!}

                {!! Theme::partial('blog.post-header',  compact('post')) !!}
            </div>
        </div>
    </section>
@endif
