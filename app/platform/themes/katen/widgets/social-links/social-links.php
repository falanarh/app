<?php

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\UiSelectorField;
use Botble\Theme\Facades\Theme;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;

class SocialLinksWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Social Links'),
            'description' => __('Widget display social links network'),
            'items' => [],
        ]);
    }

    protected function settingForm(): WidgetForm|string|null
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'alert',
                AlertField::class,
                AlertFieldOption::make()
                    ->content(__('You can edit your social links in the Appearance → Theme Options → Social Links.'))
                    ->toArray()
            )
            ->add(
                'style',
                UiSelectorField::class,
                SelectFieldOption::make()
                    ->choices(
                        collect(range(1, 2))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/widgets/social-links/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($this->getConfig(), 'style', 'style-1'))
                    ->toArray()
            )
            ->add(
                'description',
                TextareaField::class,
                DescriptionFieldOption::make()->toArray()
            )
            ->add(
                'background_image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background image'))
                    ->toArray()
            );
    }
}
