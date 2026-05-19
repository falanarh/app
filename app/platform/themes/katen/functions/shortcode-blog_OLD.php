<?php

use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\Fields\UiSelectorField;
use Botble\Blog\Models\Post;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Theme\Facades\Theme;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event;
use Theme\Katen\FormDecorators\PostByCategoriesFormDecorator;
use Theme\Katen\FormDecorators\PostFormDecorator;

if (! is_plugin_active('blog')) {
    return;
}

Event::listen(RouteMatched::class, function (): void {
    Shortcode::register(
        'blog-posts',
        __('Blog Posts'),
        __('Blog Posts'),
        function (ShortcodeCompiler $shortcode): ?string {
            $limit = (int) $shortcode->limit ?: 4;
            $categoryIds = Shortcode::fields()->getIds('category_ids', $shortcode);

            $posts = Post::query()
                ->with('slugable')
                ->wherePublished()
                ->when(! empty($categoryIds), function ($query) use ($categoryIds): void {
                    $query->whereHas('categories', function ($query) use ($categoryIds): void {
                        $query->whereIn('categories.id', $categoryIds);
                    });
                })
                ->limit($limit)
                ->latest()
                ->get();

            if ($posts->isEmpty()) {
                return null;
            }

            return Theme::partial('shortcodes.blog-posts.index', compact('shortcode', 'posts'));
        }
    );

    Shortcode::setAdminConfig('blog-posts', function (array $attributes) {
        $form = ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->add(
                'style',
                UiSelectorField::class,
                SelectFieldOption::make()
                    ->choices(
                        collect(range(1, 7))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/shortcodes/blog-posts/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($attributes, 'style', 'style-1'))
                    ->toArray()
            );

        return PostByCategoriesFormDecorator::createFrom(PostFormDecorator::createFrom($form, 'style'), 'style');
    });
});
