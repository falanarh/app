<?php

namespace Database\Seeders\Themes\Main;

use Botble\ACL\Database\Seeders\UserSeeder;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Supports\BaseSeeder;
use Botble\Contact\Database\Seeders\ContactSeeder;
use Botble\Language\Database\Seeders\LanguageSeeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->prepareRun();

        BaseHelper::maximumExecutionTimeAndMemoryLimit();

        $this->uploadFiles('general');

        $seeders = [];

        foreach ($this->getSeeders() as $seeder) {
            $seeders[Str::afterLast($seeder, '\\')] = $seeder;
        }

        $this->call($seeders);

        $this->finished();
    }

    public function getSeeders(): array
    {
        return [
            AnnouncementSeeder::class,
            LanguageSeeder::class,
            UserSeeder::class,
            MemberSeeder::class,
            ContactSeeder::class,
            PageSeeder::class,
            ThemeOptionSeeder::class,
            MenuSeeder::class,
            BlogSeeder::class,
            WidgetSeeder::class,
            GallerySeeder::class,
            MenuSeeder::class,
            CommentSeeder::class,
        ];
    }
}
