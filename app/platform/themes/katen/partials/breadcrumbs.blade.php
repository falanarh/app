@php
    $bgImage = Theme::get('breadcrumb_background_image') ?: theme_option('breadcrumb_background_image');
    $bgColor = Theme::get('breadcrumb_background_color') ?: theme_option('breadcrumb_background_color');
    $textColor = Theme::get('breadcrumb_text_color') ?: theme_option('breadcrumb_text_color');
    $height = Theme::get('breadcrumb_height') ?: theme_option('breadcrumb_height');
    $height = (int) $height ? $height . 'px' : 'auto';
    $hasTextColor = $textColor && $textColor !== 'transparent';
@endphp

@if ($pageTitle = Theme::get('pageTitle'))
    <section
        class="page-header page-breadcrumb"
        @style([
                sprintf('background-image: url(%s)', RvMedia::getImageUrl($bgImage)) => $bgImage,
                '--breadcrumb-bg-color: ' . $bgColor => $bgColor,
                '--breadcrumb-txt-color: ' . $textColor => $hasTextColor,
                '--breadcrumb-height: ' . $height => $height,
            ])
    >
        <div class="container-xl">
            <div class="text-center">
                @if ($pageTitle)
                    <h1 class="mt-0 mb-2">{!! BaseHelper::clean($pageTitle) !!}</h1>
                @endif

                @if(Theme::breadcrumb()->enabled())
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            @foreach (Theme::breadcrumb()->getCrumbs() as $crumb)
                                @if (! $loop->last)

                                    <li class="breadcrumb-item">
                                        <a href="{{ $crumb['url'] }}" title="{{ $crumb['label'] }}">
                                            {{ $crumb['label'] }}
                                        </a>
                                    </li>
                                @else
                                    <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                @endif
            </div>
        </div>
    </section>
@endif
