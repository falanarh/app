<?php

namespace Database\Seeders\Themes\PersonalAlt;

class ThemeOptionSeeder extends \Database\Seeders\Themes\Main\ThemeOptionSeeder
{
    protected function getThemeOptions(): array
    {
        return [
            ...parent::getThemeOptions(),
            'header_style' => '2',
            'blog_page_id' => $this->getPageId('Homepage'),
            'site_author_avatar' => $this->filePath('members/' . rand(1, 11) . '.jpg'),
            'site_tagline' => 'Professional Writer & Personal Blogger',
            'site_logo_alt' => $this->filePath('general/logo-alt.png'),
        ];
    }
}
