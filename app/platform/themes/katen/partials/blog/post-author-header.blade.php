@php
    $bgImage = theme_option('breadcrumb_background_image');
    $bgColor = theme_option('breadcrumb_background_color');
    $textColor = theme_option('breadcrumb_text_color');
    $hasTextColor = $textColor && $textColor !== 'transparent';
@endphp

<section
    class="page-header page-breadcrumb"
    @style([
        sprintf('background-image: url(%s)', RvMedia::getImageUrl($bgImage)) => $bgImage,
        '--breadcrumb-bg-color: ' . $bgColor => $bgColor,
        '--breadcrumb-txt-color:' . $textColor => $hasTextColor
    ])
>
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12 author-header">
                <div class="author-content author">
                    @if ($avatar = $author->avatar->url)
                        <div class="author-avatar">
                            <img src="{{ RvMedia::getImageUrl($avatar) }}" alt="{{ $author->name }}">
                        </div>
                    @endif
                    <div class="author-info">
                        <h1 class="author-title text-capitalize mt-0 mb-2">{{ $author->name }}</h1>

                        @if ($description = $author->description)
                            <p>{!! BaseHelper::clean($description) !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
