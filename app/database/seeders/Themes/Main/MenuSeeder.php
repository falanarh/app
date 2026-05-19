<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Post;
use Botble\Menu\Database\Traits\HasMenuSeeder;
use Botble\Page\Database\Traits\HasPageSeeder;
use Botble\Page\Models\Page;

class MenuSeeder extends BaseSeeder
{
    use HasMenuSeeder;
    use HasPageSeeder;

    public function run(): void
    {
        $this->createMenus($this->getData());
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'Main menu',
                'slug' => 'main-menu',
                'location' => 'main-menu',
                'items' => [
                    [
                        'title' => 'Home',
                        'url' => '/',
                        'children' => [
                            [
                                'title' => 'Magazine',
                                'url' => 'https://katen.archielite.com',
                            ],
                            [
                                'title' => 'Personal',
                                'url' => 'https://katen-personal.archielite.com',
                            ],
                            [
                                'title' => 'Personal Alt',
                                'url' => 'https://katen-personal-alt.archielite.com',
                            ],
                            [
                                'title' => 'Minimal',
                                'url' => 'https://katen-minimal.archielite.com',
                            ],
                            [
                                'title' => 'Classic',
                                'url' => 'https://katen-classic.archielite.com',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Galleries',
                        'url' => '/galleries',
                    ],
                    [
                        'title' => 'Blog',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'Blog List',
                                'reference_type' => Page::class,
                                'reference_id' => $this->getPageId('Blog'),
                            ],
                            [
                                'title' => 'Blog Post Single',
                                'reference_type' => Post::class,
                                'reference_id' => 1,
                            ],
                            [
                                'title' => 'Blog Post Single (Has Cover)',
                                'reference_type' => Post::class,
                                'reference_id' => 2,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Pages',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'Terms Of Use',
                                'reference_type' => Page::class,
                                'reference_id' => $this->getPageId('Terms Of Use'),
                            ],
                            [
                                'title' => 'Privacy Policy',
                                'reference_type' => Page::class,
                                'reference_id' => $this->getPageId('Privacy Policy'),
                            ],
                            [
                                'title' => 'Cookie Policy',
                                'reference_type' => Page::class,
                                'reference_id' => $this->getPageId('Cookie Policy'),
                            ],
                            [
                                'title' => 'About Us',
                                'reference_type' => Page::class,
                                'reference_id' => $this->getPageId('About Us'),
                            ],
                            [
                                'title' => 'Contact Us',
                                'reference_type' => Page::class,
                                'reference_id' => $this->getPageId('Contact Us'),
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
