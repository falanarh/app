<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Page\Database\Traits\HasPageSeeder;
use Botble\Theme\Database\Traits\HasThemeOptionSeeder;

class ThemeOptionSeeder extends BaseSeeder
{
    use HasThemeOptionSeeder;
    use HasPageSeeder;

    public function run(): void
    {
        $this->createThemeOptions($this->getThemeOptions());
    }

    protected function getThemeOptions(): array
    {
        return [
            'site_title' => 'Katen - Minimal Blog & Magazine',
            'seo_description' => 'Katen is a modern, clean, and professional Laravel script suitable for a minimal blog and magazine website.',
            'copyright' => '©%Y Archi Elite JSC. All Rights Reserved.',
            'favicon' => $this->filePath('general/favicon.png'),
            'logo' => $this->filePath('general/logo.png'),
            'logo_dark' => $this->filePath('general/logo-dark.png'),
            'logo_height' => '25px',
            'primary_font' => 'Roboto',
            'heading_font' => 'Poppins',
            'gradient_from' => '#FE4F70',
            'gradient_to' => '#FFA387',
            'primary_color' => '#FE4F70',
            'secondary_color' => '#FFA387',
            'text_color' => '#6C7A91', // #8F9BAD'
            'homepage_id' => $this->getPageId('Homepage'),
            'blog_page_id' => $this->getPageId('Blog'),
            'preloader_enabled' => 'no',
            'preloader_version' => 'v2',
            'lazy_load_images' => 1,
            'lazy_load_placeholder_image' => $this->filePath('general/preloader.gif'),
            'social_links' => [
                [
                    [
                        'key' => 'name',
                        'value' => 'Facebook',
                    ],
                    [
                        'key' => 'icon',
                        'value' => 'ti ti-brand-facebook',
                    ],
                    [
                        'key' => 'url',
                        'value' => 'https://www.facebook.com/',
                    ],
                ],
                [
                    [
                        'key' => 'name',
                        'value' => 'Instagram',
                    ],
                    [
                        'key' => 'icon',
                        'value' => 'ti ti-brand-instagram',
                    ],
                    [
                        'key' => 'url',
                        'value' => 'https://www.instagram.com/',
                    ],
                ],
                [
                    [
                        'key' => 'name',
                        'value' => 'X (Twitter)',
                    ],
                    [
                        'key' => 'icon',
                        'value' => 'ti ti-brand-x',
                    ],
                    [
                        'key' => 'url',
                        'value' => 'https://x.com/',
                    ],
                ],
                [
                    [
                        'key' => 'name',
                        'value' => 'YouTube',
                    ],
                    [
                        'key' => 'icon',
                        'value' => 'ti ti-brand-youtube',
                    ],
                    [
                        'key' => 'url',
                        'value' => 'https://www.youtube.com/',
                    ],
                ],
                [
                    [
                        'key' => 'name',
                        'value' => 'Pinterest',
                    ],
                    [
                        'key' => 'icon',
                        'value' => 'ti ti-brand-pinterest',
                    ],
                    [
                        'key' => 'url',
                        'value' => 'https://www.pinterest.com/',
                    ],
                ],
            ],
            'social_sharing' => [
                [
                    ['key' => 'social', 'value' => 'facebook'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-facebook'],
                ],
                [
                    ['key' => 'social', 'value' => 'x'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-x'],
                ],
                [
                    ['key' => 'social', 'value' => 'pinterest'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-pinterest'],
                ],
                [
                    ['key' => 'social', 'value' => 'linkedin'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-linkedin'],
                ],
                [
                    ['key' => 'social', 'value' => 'whatsapp'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-whatsapp'],
                ],
                [
                    ['key' => 'social', 'value' => 'email'],
                    ['key' => 'icon', 'value' => 'ti ti-mail'],
                ],
            ],
            'newsletter_popup_enable' => true,
            'newsletter_popup_image' => $this->filePath('general/newsletter-popup.jpg'),
            'newsletter_popup_title' => 'Subscribe Now',
            'newsletter_popup_subtitle' => 'Newsletter',
            'newsletter_popup_description' => 'Stay in the Loop: Sign Up for Our Newsletter!',
        ];
    }
}
