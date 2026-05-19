<?php

namespace Database\Seeders\Themes\Personal;

class WidgetSeeder extends \Database\Seeders\Themes\Main\WidgetSeeder
{
    protected function getWidgets(): array
    {
        return [
            ...parent::getWidgets(),
            [
                'widget_id' => 'BlogPostsWidget',
                'sidebar_id' => 'homepage_sidebar',
                'position' => 1,
                'data' => [
                    'title' => '',
                    'limit' => 6,
                    'category_ids' => [1, 2, 4, 5, 6, 7, 8, 9, 10],
                    'style' => 'style-3',
                ],
            ],
        ];
    }
}
