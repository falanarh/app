<?php

namespace Database\Seeders\Themes\Minimal;

class ThemeOptionSeeder extends \Database\Seeders\Themes\Main\ThemeOptionSeeder
{
    protected function getThemeOptions(): array
    {
        return [
            ...parent::getThemeOptions(),
            'header_style' => '3',
            'blog_page_id' => $this->getPageId('Homepage'),
            'blog_list_style' => '2',
        ];
    }
}
