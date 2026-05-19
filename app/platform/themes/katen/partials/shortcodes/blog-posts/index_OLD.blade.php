@php
    $style = (int) Str::after($shortcode->style, 'style-') <= 7 ? $shortcode->style : 'style-1';
    $style = $style ?: 'style-1';
@endphp

<section class="blog-posts blog-posts-{{ $style }}" @if($style == 'style-1') style="margin-top: 0" @endif>
    @if ($style !== 'style-4')
        {!! Theme::partial('shortcodes.blog-posts.partials.header-title', compact('shortcode')) !!}
    @endif

    {!! Theme::partial('shortcodes.blog-posts.styles.' . $style, compact('shortcode', 'posts')) !!}
</section>
