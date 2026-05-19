@php
    $style = theme_option('blog_list_style');
    $style = in_array($style, [1, 2, 3]) ? $style : 1;
@endphp

{!! Theme::partial("blog.styles.style-$style", compact('posts')) !!}
