<!doctype html>
<html {!! Theme::htmlAttributes() !!}>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {!! BaseHelper::googleFonts('https://fonts.googleapis.com/' . sprintf(
           'css2?family=%s:wght@400;500;600;700;800&family=%s:wght@400;500;600;700;800&display=swap',
           urlencode(theme_option('primary_font', 'Roboto')),
           urlencode(theme_option('heading_font', 'Poppins'))
       )) !!}

        {!! Theme::partial('css-variable-declare') !!}

        {!! Theme::header() !!}
    </head>

    <body {!! Theme::bodyAttributes() !!} >

        {!! Theme::partial('toggle-theme') !!}

        <div class="main-overlay"></div>

        {!! apply_filters(THEME_FRONT_BODY, null) !!}

        {!! Theme::partial('header') !!}

        <main>
            @yield('content')
        </main>

        <script>
            'use strict';

            window.siteConfig = {};
        </script>

        {!! Theme::partial('footer') !!}

        {!! Theme::footer() !!}
    </body>
</html>
