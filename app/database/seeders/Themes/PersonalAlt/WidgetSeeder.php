<?php

namespace Database\Seeders\Themes\PersonalAlt;

class WidgetSeeder extends \Database\Seeders\Themes\Main\WidgetSeeder
{
    protected function getWidgets(): array
    {
        return [
            ...parent::getWidgets(),
            [
                'widget_id' => 'AboutUsWidget',
                'sidebar_id' => 'homepage_sidebar',
                'position' => 1,
                'data' => [
                    'title' => 'I\'m Katen Doe.',
                    'description' => 'Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle. She helps clients bring the right content to the right people.',
                    'button_label' => 'About Me',
                    'button_url' => '/about-us',
                    'background_image' => $this->filePath('general/hero.jpg'),
                ],
            ],
        ];
    }
}
