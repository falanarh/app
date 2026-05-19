@php
    $hasLogoDark ??= true;
    $defaultIsDark ??= false;

    $logo = theme_option('logo');
    $logoDark = theme_option('logo_dark');

    $height = theme_option('logo_height', 25);
    $attributes = [
        'style' => sprintf('height: %s', is_numeric($height) ? "{$height}px" : $height),
        'loading' => false,
    ];

    $wrapperClass ??= null;
@endphp

@if ($logo || $logoDark)
    <a @class(['navbar-brand', $wrapperClass]) href="{{ BaseHelper::getHomepageUrl() }}">
        @if ($hasLogoDark)
            {{ RvMedia::image($logoDark ?: $logo, theme_option('site_title'), attributes: ['class' => 'logo-dark', ...$attributes]) }}
            {{ RvMedia::image($logo ?: $logoDark, theme_option('site_title'), attributes: ['class' => 'logo-light', ...$attributes]) }}
        @else
            {{ RvMedia::image($defaultIsDark ? $logoDark : $logo, theme_option('site_title'), attributes: $attributes) }}
        @endif
    </a>
@endif
