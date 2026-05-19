<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Shortcode\View\View;
use Botble\Theme\Theme;

return [

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these events can be overridden by package config.
    |
     */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function (Theme $theme): void {
        },
        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme): void {
            // You may use this event to set up your assets.
            $theme->addBodyAttributes(['class' => 'site-wrapper']);

            $version = get_cms_version();

            $theme->asset()->container('footer')->usePath()->add('jquery', 'plugins/jquery/jquery.min.js');
            $theme->asset()->container('footer')->usePath()->add('bootstrap-js', 'plugins/bootstrap/bootstrap.bundle.min.js');
            $theme->asset()->container('footer')->usePath()->add('slick-js', 'plugins/slick/slick.min.js');
            $theme->asset()->container('footer')
                ->usePath()->add('jquery-sticky-sidebar-js', 'plugins/jquery/jquery.sticky-sidebar.min.js', ['jquery']);
            $theme->asset()->container('footer')->usePath()
                ->add('script', 'js/script.js', ['jquery'], [], $version);
            $theme->asset()->container('footer')->usePath()
                ->add('main', 'js/main.js', ['jquery', 'slick-js'], [], $version);
            $theme->asset()->container('footer')->usePath()->add('toastr-js', 'plugins/toastr/toastr.min.js');

            if (BaseHelper::isRtlEnabled()) {
                $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap/bootstrap.rtl.min.css');
            } else {
                $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap/bootstrap.min.css');
            }

            $theme->asset()->usePath()->add('simple-line-icons', 'plugins/simple-line-icons/simple-line-icons.css');
            $theme->asset()->usePath()->add('slick-css', 'plugins/slick/slick.css');
            $theme->asset()->usePath()->add('toastr-css', 'plugins/toastr/toastr.min.css');
            $theme->asset()->usePath()->add('style', 'css/style.css', [], [], $version);

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post'], function (View $view): void {
                    $view->withShortcodes();
                });
            }

            $theme->addHtmlAttributes([
                'data-theme' => $_COOKIE['katen-theme'] ?? 'light',
            ]);
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function (Theme $theme): void {
            },
        ],
    ],
];
