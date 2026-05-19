<?php

namespace Database\Seeders\Themes\Minimal;

use Botble\Page\Models\Page;

class PageSeeder extends \Database\Seeders\Themes\Main\PageSeeder
{
    public function run(): void
    {
        parent::run();

        $homepage = Page::query()->where('name', 'Homepage')->firstOrFail();

        $homepage->update([
            'content' => '',
            'template' => 'homepage-alt',
        ]);
    }
}
