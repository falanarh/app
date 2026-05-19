<?php

use Botble\Ads\Models\Ads;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;

class AdsWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Ads'),
            'description' => __('Ads Widget'),
        ]);
    }

    public function settingForm(): WidgetForm|string|null
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'ad_id',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Choose ad'))
                    ->choices(Ads::query()->wherePublished()->pluck('name', 'id')->all())
                    ->toArray()
            );
    }

    public function data(): array
    {
        $ads = null;

        if ($adsId = Arr::get($this->getConfig(), 'ad_id')) {
            $ads = Ads::query()->where('id', $adsId)->notExpired()->first();
        }

        return compact('ads');
    }

    protected function requiredPlugins(): array
    {
        return ['ads'];
    }
}
