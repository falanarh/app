<?php

use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\FieldOptions\ShortcodeTabsFieldOption;
use Botble\Shortcode\Forms\Fields\ShortcodeTabsField;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Theme\Facades\Theme;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;

if (! is_plugin_active('contact')) {
    return;
}

Event::listen(RouteMatched::class, function (): void {
    add_filter(CONTACT_FORM_TEMPLATE_VIEW, function () {
        return Theme::getThemeNamespace('partials.shortcodes.contact-form.index');
    }, 120);

    Shortcode::modifyAdminConfig('contact-form', function (ShortcodeForm $form) {
        $attributes = is_array($form->getModel()) ? $form->getModel() : [];

        $form
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'tabs',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->attrs($attributes)
                    ->fields([
                        'title' => [
                            'title' => __('Title'),
                        ],
                        'description' => [
                            'type' => 'textarea',
                            'title' => __('Description'),
                        ],
                        'url' => [
                            'title' => __('URL'),
                        ],
                        'open_in_new_tab' => [
                            'type' => 'checkbox',
                            'title' => __('Open URL in new tab?'),
                            'default_value' => 'yes',
                        ],
                        'icon' => [
                            'type' => 'coreIcon',
                            'title' => __('Icon'),
                        ],
                        'icon_image' => [
                            'type' => 'image',
                            'title' => __('Icon Image (It will override icon above if set)'),
                        ],
                    ])
                    ->toArray()
            );

        return $form;
    });
});
