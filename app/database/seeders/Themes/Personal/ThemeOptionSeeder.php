<?php

namespace Database\Seeders\Themes\Personal;

class ThemeOptionSeeder extends \Database\Seeders\Themes\Main\ThemeOptionSeeder
{
    protected function getThemeOptions(): array
    {
        return [
            ...parent::getThemeOptions(),
            'header_style' => '2',
            'blog_page_id' => $this->getPageId('Homepage'),
            'site_logo_alt' => $this->filePath('general/logo.png'),
        ];
    }
}
