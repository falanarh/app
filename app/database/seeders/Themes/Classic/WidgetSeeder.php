<?php

namespace Database\Seeders\Themes\Classic;

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
                    'limit' => 3,
                    'category_ids' => [1, 2, 4, 5],
                    'style' => 'style-4',
                ],
            ],
        ];
    }
}
