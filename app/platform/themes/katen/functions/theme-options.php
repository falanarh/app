<?php

use Botble\Theme\Events\RenderingThemeOptionSettings;
use Botble\Theme\Facades\Theme;
use Botble\Theme\ThemeOption;
use Botble\Theme\ThemeOption\Fields\UiSelectorField;
use Illuminate\Support\Facades\Event;

Event::listen(RenderingThemeOptionSettings::class, function (): void {
    foreach (range(1, 4) as $i) {
        $headerStyles[$i] = [
            'label' => __('Header :number', ['number' => $i]),
            'image' => Theme::asset()->url(sprintf('images/header-styles/header-%s.png', $i)),
        ];
    }

    foreach (range(1, 3) as $i) {
        $blogListStyles[$i] = [
            'label' => __('Blog list :number', ['number' => $i]),
            'image' => Theme::asset()->url(sprintf('images/blog-list-styles/style-%s.png', $i)),
        ];
    }

    theme_option()
        ->setSection([
            'title' => __('Styles'),
            'id' => 'opt-text-subsection-styles',
            'subsection' => true,
            'icon' => 'ti ti-brush',
            'fields' => [
                UiSelectorField::make()
                    ->label(__('Header style'))
                    ->name('header_style')
                    ->options($headerStyles)
                    ->defaultValue(1),
                [
                    'id' => 'site_logo_alt',
                    'type' => 'mediaImage',
                    'label' => __('Site Logo'),
                    'attributes' => [
                        'name' => 'site_logo_alt',
                        'value' => null,
                    ],
                    'helper' => __('Only apply for header style 2 and the homepage with about us widget.'),
                ],
                [
                    'id' => 'site_author_avatar',
                    'type' => 'mediaImage',
                    'label' => __('Author avatar'),
                    'attributes' => [
                        'name' => 'site_author_avatar',
                        'value' => null,
                    ],
                    'helper' => __('Only apply for header style 2'),
                ],
                [
                    'id' => 'site_tagline',
                    'type' => 'textarea',
                    'label' => __('Tagline'),
                    'attributes' => [
                        'name' => 'site_tagline',
                        'value' => null,
                        'options' => [
                            'class' => 'form-control',
                            'data-counter' => 255,
                            'rows' => 3,
                        ],
                    ],
                    'helper' => __('Only apply for header style 2'),
                ],
                [
                    'id' => 'primary_font',
                    'type' => 'googleFonts',
                    'label' => __('Primary font'),
                    'attributes' => [
                        'name' => 'primary_font',
                        'value' => 'Roboto',
                    ],
                ],
                [
                    'id' => 'heading_font',
                    'type' => 'googleFonts',
                    'label' => __('Heading font'),
                    'attributes' => [
                        'name' => 'heading_font',
                        'value' => 'Poppins',
                    ],
                ],
                [
                    'id' => 'primary_color',
                    'type' => 'customColor',
                    'label' => __('Primary color'),
                    'attributes' => [
                        'name' => 'primary_color',
                        'value' => '#537FE7',
                    ],
                ],
                [
                    'id' => 'text_color',
                    'type' => 'customColor',
                    'label' => __('Text color'),
                    'attributes' => [
                        'name' => 'text_color',
                        'value' => '#5E5E5E',
                    ],
                ],
                [
                    'id' => 'gradient_from',
                    'type' => 'customColor',
                    'label' => __('Gradient color from'),
                    'attributes' => [
                        'name' => 'gradient_from',
                        'value' => '#FE4F70',
                    ],
                ],
                [
                    'id' => 'gradient_to',
                    'type' => 'customColor',
                    'label' => __('Gradient color to'),
                    'attributes' => [
                        'name' => 'gradient_to',
                        'value' => '#FFA387',
                    ],
                ],
                [
                    'id' => 'breadcrumb_background_image',
                    'type' => 'mediaImage',
                    'label' => __('Breadcrumb background image'),
                    'attributes' => [
                        'name' => 'breadcrumb_background_image',
                        'value' => null,
                    ],
                ],
                [
                    'id' => 'breadcrumb_background_color',
                    'type' => 'customColor',
                    'label' => __('Breadcrumb background color'),
                    'attributes' => [
                        'name' => 'breadcrumb_background_color',
                        'value' => '#F1F8FF',
                    ],
                ],
                [
                    'id' => 'breadcrumb_text_color',
                    'type' => 'customColor',
                    'label' => __('Breadcrumb text color'),
                    'attributes' => [
                        'name' => 'breadcrumb_text_color',
                        'value' => 'transparent',
                    ],
                ],
                [
                    'id' => 'breadcrumb_height',
                    'type' => 'number',
                    'label' => __('Breadcrumb height (px)'),
                    'attributes' => [
                        'name' => 'breadcrumb_height',
                        'value' => null,
                    ],
                ],
            ],
        ])
        ->setField([
            'id' => 'logo_height',
            'section_id' => 'opt-text-subsection-logo',
            'type' => 'number',
            'label' => __('Logo height (px)'),
            'attributes' => [
                'name' => 'logo_height',
                'value' => 60,
                'options' => [
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 150,
                ],
            ],
        ])
        ->when(is_plugin_active('blog'), function (ThemeOption $themeOption) use ($blogListStyles) {
            return $themeOption
                ->setField(
                    UiSelectorField::make()
                        ->label(__('Blog list style'))
                        ->name('blog_list_style')
                        ->options($blogListStyles)
                        ->id('blog_list_style')
                        ->sectionId('opt-text-subsection-blog')
                        ->defaultValue(1),
                )
                ->setField([
                    'id' => 'blog_post_detail_layout',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'customSelect',
                    'label' => __('Post detail layout'),
                    'attributes' => [
                        'name' => 'blog_post_detail_layout',
                        'list' => get_page_templates(),
                        'value' => 'default',
                    ],
                ])
                ->setField([
                    'id' => 'blog_post_author_layout',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'customSelect',
                    'label' => __('Post author layout'),
                    'attributes' => [
                        'name' => 'blog_post_author_layout',
                        'list' => get_page_templates(),
                        'value' => 'default',
                    ],
                ])
                ->setField([
                    'id' => 'blog_post_list_meta_display_default',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'hidden',
                    'attributes' => [
                        'name' => 'blog_post_list_meta_display',
                        'value' => '[]',
                    ],
                ])
                ->setField([
                    'id' => 'blog_post_list_meta_display',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'multiChecklist',
                    'label' => __('Post meta display (blog list)'),
                    'attributes' => [
                        'name' => 'blog_post_list_meta_display[]',
                        'value' => json_decode(theme_option('blog_post_list_meta_display', '["author_name", "published_date"]')) ?: [],
                        'choices' => $postMetaOptions = [
                            'author_name' => __('Author name'),
                            'published_date' => __('Published date'),
                            'reading_time' => __('Reading time'),
                            'views_count' => __('Views count'),
                        ],
                    ],
                ])
                ->setField([
                    'id' => 'blog_post_detail_meta_display_default',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'hidden',
                    'attributes' => [
                        'name' => 'blog_post_detail_meta_display',
                        'value' => '[]',
                    ],
                ])
                ->setField([
                    'id' => 'blog_post_detail_meta_display',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'multiChecklist',
                    'label' => __('Post meta display (blog detail)'),
                    'attributes' => [
                        'name' => 'blog_post_detail_meta_display[]',
                        'value' => json_decode(theme_option('blog_post_detail_meta_display', '["author_name", "published_date", "reading_time", "views_count"]')) ?: [],
                        'choices' => $postMetaOptions,
                    ],
                ])
                ->setField([
                    'id' => 'blog_post_widget_meta_display_default',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'hidden',
                    'attributes' => [
                        'name' => 'blog_post_widget_meta_display',
                        'value' => '[]',
                    ],
                ])
                ->setField([
                    'id' => 'blog_post_widget_meta_display',
                    'section_id' => 'opt-text-subsection-blog',
                    'type' => 'multiChecklist',
                    'label' => __('Post meta display (blog widget)'),
                    'attributes' => [
                        'name' => 'blog_post_widget_meta_display[]',
                        'value' => json_decode(theme_option('blog_post_widget_meta_display', '["published_date"]')) ?: [],
                        'choices' => $postMetaOptions,
                    ],
                ])
                ->setField([
                    'id' => 'logo_dark',
                    'section_id' => 'opt-text-subsection-logo',
                    'type' => 'mediaImage',
                    'label' => 'Logo dark',
                    'attributes' => [
                        'name' => 'logo_dark',
                        'value' => null,
                    ],
                ]);
        });
});
