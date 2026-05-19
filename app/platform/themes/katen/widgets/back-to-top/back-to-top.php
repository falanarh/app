<?php

use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;

class BackToTopWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Back To Top Button'),
            'description' => __('Back To Top Button Widget'),
            'button_label' => __('Back to top'),
        ]);
    }

    public function settingForm(): WidgetForm|string|null
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button label'))
                    ->toArray()
            );
    }
}
