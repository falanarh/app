@use(Botble\Theme\Supports\ThemeSupport)

@php
    $sidebar = dynamic_sidebar('primary_sidebar');
    Theme::set('pageTitle', $gallery->name);
    Theme::set('pageDescription', $gallery->description);
@endphp

<div class="post post-single">
    <div class="post-header">
        <h1 class="title mt-0 mb-3">{{ $gallery->name }}</h1>

        {!! Theme::partial('galleries.gallery-meta', compact('gallery')) !!}
    </div>

    <div class="post-content clearfix ck-content">
        {!! BaseHelper::clean($gallery->description ) !!}
    </div>

    <div id="list-photo" class="post-photos row g-4">
        @foreach (gallery_meta_data($gallery) as $image)
            @continue(! $image)

            <div
                class="gallery-items col-lg-4 col-md-6 col-12"
                data-src="{{ RvMedia::getImageUrl($imageUrl = Arr::get($image, 'img')) }}"
                data-sub-html="{{ $description = BaseHelper::clean(Arr::get($image, 'description')) }}"
            >
                <div class="photo-item">
                    <div class="thumb img-transition-scale">
                        <a href="{{ $description }}">
                            {{ RvMedia::image($imageUrl, $description, 'extra-large') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="post-bottom">
        {!! Theme::partial('blog.post-sharing-buttons', ['socials' => ThemeSupport::getSocialSharingButtons($gallery->url, $gallery->name, RvMedia::getImageUrl($gallery->image)), 'wrapperClass' => 'float-md-end']) !!}
    </div>
</div>

<div class="spacer" data-height="50"></div>

{!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null, $gallery) !!}
