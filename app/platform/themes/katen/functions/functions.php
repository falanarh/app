<?php

use Botble\Base\Contracts\BaseModel;
use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\FormAbstract;
use Botble\Blog\Http\Requests\PostRequest;
use Botble\Blog\Models\Post;
use Botble\Media\Facades\RvMedia;
use Botble\Member\Models\Member;
use Botble\Newsletter\Facades\Newsletter;
use Botble\Newsletter\Forms\Fronts\NewsletterForm;
use Botble\Page\Http\Requests\PageRequest;
use Botble\Page\Models\Page;
use Botble\Slug\Facades\SlugHelper;
use Botble\Support\Http\Requests\Request;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Supports\ThemeSupport;

if (is_plugin_active('member')) {
    SlugHelper::registerModule(Member::class, 'Member');
}

app()->booted(function (): void {
    ThemeSupport::registerSiteCopyright();
    ThemeSupport::registerPreloader();
    ThemeSupport::registerLazyLoadImages();
    ThemeSupport::registerSocialSharing();
    ThemeSupport::registerSocialLinks();
    ThemeSupport::registerDateFormatOption();
    ThemeSupport::registerToastNotification();

    if (is_plugin_active('newsletter')) {
        Newsletter::registerNewsletterPopup();

        NewsletterForm::extend(function (NewsletterForm $form) {
            return $form->formClass('newsletter-form');
        });
    }

    RvMedia::addSize('medium-square', 500, 500)
        ->addSize('medium', 500, 375);

    register_page_template([
        'no-sidebar' => __('No Sidebar'),
        'homepage' => __('Homepage'),
        'homepage-alt' => __('Homepage (No Sidebar)'),
    ]);

    register_sidebar([
        'id' => 'header_sidebar',
        'name' => __('Header sidebar'),
        'description' => __('The widget for the sidebar display is located at the header.'),
    ]);

    register_sidebar([
        'id' => 'menu_sidebar',
        'name' => __('Menu sidebar'),
        'description' => __('The widget for the sidebar display is located at menu sidebar.'),
    ]);

    register_sidebar([
        'id' => 'homepage_sidebar',
        'name' => __('Homepage sidebar'),
        'description' => __('The widget for the sidebar display is located at the header of homepage.'),
    ]);

    register_sidebar([
        'id' => 'top_footer_sidebar',
        'name' => __('Top footer sidebar'),
        'description' => __('The widget for the sidebar display is located at the top of the footer.'),
    ]);

    register_sidebar([
        'id' => 'mid_footer_sidebar',
        'name' => __('Mid footer sidebar'),
        'description' => __('The widget for the sidebar display is located at the mid of the footer.'),
    ]);

    register_sidebar([
        'id' => 'bottom_footer_sidebar',
        'name' => __('Bottom footer sidebar'),
        'description' => __('The widget for the sidebar display is located at the bottom of the footer.'),
    ]);

    add_filter('theme_preloader_versions', function (): array {
        return [
            'v2' => __('Default'),
            'v1' => __('Simplify'),
        ];
    }, 128);

    add_filter('theme_preloader', function (string $preloader): string {
        if (theme_option('preloader_version', 'v2') === 'v2') {
            return Theme::partial('preloader');
        }

        return $preloader;
    }, 128);

    if (is_plugin_active('blog')) {
        add_filter('core_request_rules', function (array $rules, Request $request) {
            if ($request instanceof PostRequest) {
                return array_merge($rules, [
                    'cover_image' => 'nullable|string',
                    'time_to_read' => 'nullable|numeric',
                ]);
            }

            if ($request instanceof PageRequest) {
                $rules = array_merge($rules, [
                    'breadcrumb_background_image' => 'nullable|string',
                    'breadcrumb_background_color' => 'nullable|string',
                    'breadcrumb_text_color' => 'nullable|string',
                    'breadcrumb_height' => 'nullable|numeric|max:1280|min:0',
                ]);
            }

            return $rules;
        }, 120, 2);

        add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function (FormAbstract $form, BaseModel $data): FormAbstract {
            switch ($data::class) {
                case Page::class:
                    $data->loadMissing('metadata');

                    $form
                        ->when(theme_option('theme_breadcrumb_enabled', true), function (FormAbstract $form) use ($data): void {
                            $helperText = __('This only works when the page template is not homepage.');

                            $form
                                ->addAfter(
                                    'image',
                                    'breadcrumb_background_image',
                                    MediaImageField::class,
                                    MediaImageFieldOption::make()
                                        ->label(__('Breadcrumb background'))
                                        ->value($data->getMetaData('breadcrumb_background_image', true))
                                        ->helperText($helperText)
                                        ->toArray()
                                )
                                ->addAfter(
                                    'breadcrumb_background_image',
                                    'breadcrumb_background_color',
                                    ColorField::class,
                                    ColorFieldOption::make()
                                        ->label(__('Breadcrumb background color'))
                                        ->value($data->getMetaData('breadcrumb_background_color', true))
                                        ->helperText($helperText)
                                        ->toArray()
                                )
                                ->addAfter(
                                    'breadcrumb_background_color',
                                    'breadcrumb_text_color',
                                    ColorField::class,
                                    ColorFieldOption::make()
                                        ->label(__('Breadcrumb text color'))
                                        ->value($data->getMetaData('breadcrumb_text_color', true))
                                        ->helperText($helperText)
                                        ->toArray()
                                )
                                ->addAfter(
                                    'breadcrumb_text_color',
                                    'breadcrumb_height',
                                    NumberField::class,
                                    NumberFieldOption::make()
                                        ->label(__('Breadcrumb height (px)'))
                                        ->value($data->getMetaData('breadcrumb_height', true))
                                        ->helperText($helperText)
                                        ->toArray()
                                );
                        });

                    break;
                case Post::class:
                    $data->loadMissing('metadata');

                    $form
                        ->addAfter(
                            'image',
                            'cover_image',
                            MediaImageField::class,
                            MediaImageFieldOption::make()
                                ->label(__('Cover image (1920x1080px)'))
                                ->value($data->getMetaData('cover_image', true))
                                ->toArray()
                        )
                        ->addAfter(
                            'image',
                            'time_to_read',
                            NumberField::class,
                            NumberFieldOption::make()
                                ->label(__('Time to read (minute)'))
                                ->value($data->getMetaData('time_to_read', true))
                                ->toArray()
                        );

                    break;
            }

            return $form;
        }, 128, 2);

        add_action(
            [BASE_ACTION_AFTER_CREATE_CONTENT, BASE_ACTION_AFTER_UPDATE_CONTENT],
            function (string $type, $request, BaseModel $model): void {
                switch ($model::class) {
                    case Page::class:
                        $model->saveMetaDataFromFormRequest([
                            'breadcrumb_background_image',
                            'breadcrumb_background_color',
                            'breadcrumb_text_color',
                            'breadcrumb_height',
                        ], $request);

                        break;

                    case Post::class:
                        $model->saveMetaDataFromFormRequest([
                            'cover_image',
                            'time_to_read',
                        ], $request);

                        break;
                }
            },
            128,
            3
        );
    }

    add_filter('ads_locations', function (array $locations) {
        return [
            ...$locations,
            'primary_sidebar_start' => __('Primary Sidebar (start)'),
            'primary_sidebar_end' => __('Primary Sidebar (end)'),
            'footer_before' => __('Footer (before)'),
            'footer_after' => __('Footer (after)'),
            'post_list_before' => __('Post List (before)'),
            'post_list_after' => __('Post List (after)'),
            'post_before' => __('Post Detail (before)'),
            'post_after' => __('Post Detail (after)'),
        ];
    }, 128);
});
