@php
    use Botble\Theme\Facades\Theme;
    use Botble\Theme\Supports\ThemeSupport;

    $hasCover = !!$post->getMetaData('cover_image', true);

    Theme::layout(theme_option('blog_post_detail_layout', 'default'));
    Theme::set('pageTitle', $post->name);
    Theme::set('breadcrumbs', false);
    Theme::set('beforeContent', $hasCover ? Theme::partial('blog.post-cover-image', compact('post')) : null);
@endphp

@if (!$hasCover)
    {!! Theme::partial('blog.post-breadcrumbs', compact('post')) !!}
@endif

<div class="post post-single">
    @if(!$hasCover)
        {!! Theme::partial('blog.post-header', compact('post')) !!}

        @if ($image = $post->image)
            <div class="featured-image">
                <a href="{{ RvMedia::getImageUrl($image) }}" title="{{ $post->name }}" class="image-popup">
                    {{ RvMedia::image($image, $post->name) }}
                </a>
            </div>
        @endif

    @endif

    @if ($content = $post->content)
        <div class="post-content clearfix ck-content">
            {!! apply_filters('ads_render', null, 'post_before', ['class' => 'mb-2']) !!}
            {!! BaseHelper::clean($content) !!}
            {!! apply_filters('ads_render', null, 'post_after', ['class' => 'mt-2']) !!}
        </div>
    @endif

    <div class="post-bottom">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 col-12 text-center text-md-start">
                @if($post->tags->isNotEmpty())
                    @foreach($post->tags as $tag)
                        <a href="{{ $tag->url }}" title="{{ $tag->name }}" class="tag" rel="tag">#{{ $tag->name }}</a>
                    @endforeach
                @endif
            </div>

            <div class="col-md-6 col-12">
                {!! Theme::partial('blog.post-sharing-buttons', ['socials' => ThemeSupport::getSocialSharingButtons($post->url, $post->name, RvMedia::getImageUrl($post->image)), 'wrapperClass' => 'mb-0 float-md-end']) !!}
            </div>
        </div>
    </div>
</div>

<div class="spacer" data-height="50"></div>

@if (($posts = get_related_posts($post->id, 4)) && $posts->isNotEmpty())
    <div class="section-header">
        <h3 class="section-title">{{ __('Related Posts') }}</h3>
        <div class="slick-arrows-top">
            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons me-1"
                aria-label="Previous"><i class="icon-arrow-left"></i></button>
            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons ms-1"
                aria-label="Next"><i class="icon-arrow-right"></i></button>
        </div>
    </div>

    <div class="row post-carousel-twoCol post-carousel">
        @foreach($posts as $post)
            <div class="post post-over-content col-md-6">
                {!! Theme::partial('blog.post-styles.featured', compact('post')) !!}
            </div>
        @endforeach
    </div>
@endif

{!! Theme::partial('blog.post-author', compact('post')) !!}

{!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null, $post) !!}

<style>
    .image-viewer-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 99999;
        display: none;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .image-viewer-popup.visible {
        display: flex;
        opacity: 1;
    }

    .image-viewer-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.9);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        cursor: zoom-out;
    }

    .image-viewer-content {
        position: relative;
        max-width: 95%;
        max-height: 95%;
        z-index: 100000;
        transform: scale(0.9);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image-viewer-popup.visible .image-viewer-content {
        transform: scale(1);
    }

    .image-viewer-content img {
        max-width: 100%;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .image-viewer-content .btn-close {
        position: fixed;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        z-index: 100001;
    }

    .image-viewer-content .btn-close:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: rotate(90deg);
    }

    .image-viewer-content .btn-close svg {
        width: 24px;
        height: 24px;
    }
</style>

<div class="image-viewer-popup" id="imageViewerPopup">
    <div class="image-viewer-overlay"></div>
    <div class="image-viewer-content">
        <div class="btn-close" id="closeImageViewer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
        <img src="" alt="" id="popupImage">
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('imageViewerPopup');
        const popupImg = document.getElementById('popupImage');
        const closeBtn = document.getElementById('closeImageViewer');
        const overlay = popup.querySelector('.image-viewer-overlay');

        function openPopup(src, alt) {
            popupImg.src = src;
            popupImg.alt = alt || '';
            popup.style.display = 'flex';
            setTimeout(() => {
                popup.classList.add('visible');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closePopup() {
            popup.classList.remove('visible');
            setTimeout(() => {
                popup.style.display = 'none';
                popupImg.src = '';
            }, 300);
            document.body.style.overflow = '';
        }

        // Handle explicit triggers
        document.querySelectorAll('.image-popup').forEach(trigger => {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                const src = this.getAttribute('href');
                const alt = this.querySelector('img') ? this.querySelector('img').getAttribute('alt') : '';
                openPopup(src, alt);
            });
        });

        // Handle images in content
        document.querySelectorAll('.post-content img').forEach(img => {
            if (!img.closest('a')) {
                img.style.cursor = 'zoom-in';
                img.addEventListener('click', function () {
                    openPopup(this.src, this.alt);
                });
            }
        });

        closeBtn.addEventListener('click', closePopup);
        overlay.addEventListener('click', closePopup);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && popup.classList.contains('visible')) {
                closePopup();
            }
        });
    });
</script>