<?php

use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\UiSelectorField;
use Botble\Theme\Facades\Theme;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Theme\Katen\FormDecorators\PostByCategoriesFormDecorator;
use Theme\Katen\FormDecorators\PostFormDecorator;
use Theme\Katen\Support\ThemeHelper;

class BlogPostsWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Blog Posts'),
            'description' => __('Choose type and categories for posts in widget'),
        ]);
    }

    protected function data(): array|Collection
    {
        $config = $this->getConfig();

        $style = Arr::get($config, 'style', 'style-1');
        $categoryIds = Arr::get($config, 'category_ids', []) ?: [];
        $limit = (int) Arr::get($config, 'limit', 4);
        $types = Arr::get($config, 'types');

        if ($style == 'style-1') {
            return compact('categoryIds', 'limit', 'types');
        }

        $posts = ThemeHelper::getBlogPosts($categoryIds, (is_array($types) ? Arr::first($types) : $types), $limit);

        return compact('posts');
    }

    public function settingForm(): WidgetForm|string|null
    {
        $form = WidgetForm::createFromArray($this->getConfig())
            ->add(
                'style',
                UiSelectorField::class,
                SelectFieldOption::make()
                    ->choices(
                        collect(range(1, 4))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/widgets/blog-posts/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($this->getConfig(), 'style', 'style-1'))
                    ->toArray()
            )
            ->add(
                'types',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Choose type'))
                    ->choices([
                        'popular' => __('Popular posts'),
                        'featured' => __('Featured posts'),
                        'recent' => __('Recent posts'),
                    ])
                    ->searchable()
                    ->multiple()
                    ->toArray()
            );

        return PostFormDecorator::createFrom(PostByCategoriesFormDecorator::createFrom($form));
    }

    protected function requiredPlugins(): array
    {
        return ['blog'];
    }
}
