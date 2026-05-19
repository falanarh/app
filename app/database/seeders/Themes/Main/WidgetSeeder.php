<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Widget\Database\Traits\HasWidgetSeeder;

class WidgetSeeder extends BaseSeeder
{
    use HasWidgetSeeder;

    public function run(): void
    {
        $this->uploadFiles('backgrounds');

        $this->createWidgets($this->getWidgets());
    }

    protected function getWidgets(): array
    {
        return [
            [
                'widget_id' => 'SiteCopyrightWidget',
                'sidebar_id' => 'bottom_footer_sidebar',
                'position' => 1,
                'data' => [],
            ],
            [
                'widget_id' => 'SocialLinksWidget',
                'sidebar_id' => 'bottom_footer_sidebar',
                'position' => 2,
                'data' => [],
            ],
            [
                'widget_id' => 'SocialLinksWidget',
                'sidebar_id' => 'primary_sidebar',
                'position' => 0,
                'data' => [
                    'style' => 'style-2',
                    'description' => 'Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.',
                    'background_image' => $this->filePath('backgrounds/map-bg.png'),
                ],
            ],
            [
                'widget_id' => 'BackToTopWidget',
                'sidebar_id' => 'bottom_footer_sidebar',
                'position' => 3,
                'data' => [],
            ],
            [
                'widget_id' => 'GalleriesWidget',
                'sidebar_id' => 'top_footer_sidebar',
                'position' => 1,
                'data' => [
                    'button_label' => '@Katen on Instagram',
                    'button_url' => '/',
                    'limit' => 6,
                ],
            ],
            [
                'widget_id' => 'SocialLinksWidget',
                'sidebar_id' => 'header_sidebar',
                'position' => 1,
                'data' => [],
            ],
            [
                'widget_id' => 'SocialLinksWidget',
                'sidebar_id' => 'menu_sidebar',
                'position' => 1,
                'data' => [],
            ],
            [
                'widget_id' => 'BlogPostsWidget',
                'sidebar_id' => 'primary_sidebar',
                'position' => 1,
                'data' => [
                    'types' => ['popular', 'recent'],
                    'limit' => 4,
                    'category_ids' => [1, 3, 7],
                ],
            ],
            [
                'widget_id' => 'BlogCategoriesWidget',
                'sidebar_id' => 'primary_sidebar',
                'position' => 2,
                'data' => [
                    'title' => 'Explore Topics',
                    'category_ids' => [1, 2, 3, 4, 5],
                ],
            ],
            [
                'widget_id' => 'BlogTagsWidget',
                'sidebar_id' => 'primary_sidebar',
                'position' => 3,
                'data' => [
                    'name' => 'Tag Clouds',
                    'number_display' => 5,
                ],
            ],
            [
                'widget_id' => 'NewsletterWidget',
                'sidebar_id' => 'primary_sidebar',
                'position' => 3,
                'data' => [
                    'title' => 'Newsletter',
                    'subtitle' => 'Join 70,000 subscribers!',
                    'description' => 'By signing up, you agree to our Privacy Policy',
                ],
            ],
            [
                'widget_id' => 'BlogPostsWidget',
                'sidebar_id' => 'primary_sidebar',
                'position' => 5,
                'data' => [
                    'title' => 'Celebration',
                    'limit' => 5,
                    'category_ids' => [1, 2, 4, 5],
                    'style' => 'style-2',
                ],
            ],
        ];
    }
}
