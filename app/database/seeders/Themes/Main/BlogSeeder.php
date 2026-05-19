<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Database\Traits\HasBlogSeeder;
use Botble\Media\Facades\RvMedia;
use Botble\Member\Models\Member;
use Illuminate\Support\Facades\File;

class BlogSeeder extends BaseSeeder
{
    use HasBlogSeeder;

    public function run(): void
    {
        $this->createPosts();
    }

    public function createPosts(): void
    {
        $this->uploadFiles('news');

        $this->createBlogCategories($this->getBlogCategoryData());

        $this->createBlogTags($this->getBlogTagData());

        $members = Member::query()->pluck('id');

        $faker = $this->fake();
        $data = $this->getData();

        $content = File::get(database_path('seeders/contents/post.html'));

        foreach ($data as $index => $item) {
            $data[$index] = [
                ...$item,
                'content' => str_replace([
                    '__image_url_1__',
                    '__image_url_2__',
                    '__image_url_3__',
                ], [
                    RvMedia::getImageUrl($this->filePath('news/' . rand(1, 10) . '.jpg')),
                    RvMedia::getImageUrl($this->filePath('news/' . rand(1, 10) . '.jpg')),
                    RvMedia::getImageUrl($this->filePath('news/' . rand(1, 10) . '.jpg')),
                ], $content),
                'author_type' => Member::class,
                'author_id' => $faker->randomElement($members),
                'views' => $faker->numberBetween(100, 2500),
                'is_featured' => $index < 10,
                'image' => $this->filePath('news/' . ($index + 1) . '.jpg'),
            ];
        }

        $data[1]['metadata']['cover_image'] = $this->filePath('news/cover-image.jpg');

        $this->createBlogPosts($data);
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'Embracing Simplicity: My Journey to Minimalist Living',
                'description' => 'Discover how I simplified my life and found greater joy through minimalism, one step at a time.',
            ],
            [
                'name' => 'Minimalism in Everyday Life: Small Changes, Big Impact',
                'description' => 'Explore practical tips and strategies for integrating minimalism into your daily routine and experiencing its transformative effects.',
            ],
            [
                'name' => 'The Art of Decluttering: Finding Peace in Minimalism',
                'description' => 'Learn how decluttering your physical and mental space can lead to a more serene and fulfilling life, free from excess.',
            ],
            [
                'name' => 'Minimalist Wardrobe Essentials: Building a Capsule Closet',
                'description' => 'Uncover the key pieces and timeless styles that form the foundation of a minimalist wardrobe, allowing for effortless elegance every day.',
            ],
            [
                'name' => 'Mindful Consumption: Navigating Minimalism in a Consumerist World',
                'description' => 'Delve into the principles of mindful consumption and discover how embracing minimalism can foster a healthier relationship with material possessions.',
            ],
            [
                'name' => 'Minimalist Home Design: Creating Serenity in Small Spaces',
                'description' => 'Explore minimalist home decor ideas and space-saving solutions to cultivate a tranquil living environment that nurtures simplicity and harmony.',
            ],
            [
                'name' => 'Minimalism and Mental Health: Finding Clarity Amidst Chaos',
                'description' => 'Discover the profound impact of minimalist practices on mental well-being, as we explore how simplifying life can lead to greater clarity and inner peace.',
            ],
            [
                'name' => 'Digital Minimalism: Streamlining Your Tech Life for Greater Productivity',
                'description' => 'Learn how to minimize digital clutter and distractions, optimizing your use of technology to enhance focus, creativity, and productivity.',
            ],
            [
                'name' => 'Minimalist Travel: Embracing Experiences Over Possessions',
                'description' => 'Embark on a journey of minimalist travel and discover the joys of exploring the world with only the essentials, prioritizing meaningful experiences over material possessions.',
            ],
            [
                'name' => 'Minimalism and Mindfulness: Cultivating Presence in a Busy World',
                'description' => 'Explore the intersection of minimalism and mindfulness, and learn how embracing simplicity can facilitate a deeper connection to the present moment and a more fulfilling life.',
            ],
        ];
    }

    protected function getBlogCategoryData(): array
    {
        return [
            ['name' => 'Minimalist Living'],
            ['name' => 'Decluttering'],
            ['name' => 'Minimalist Wardrobe'],
            ['name' => 'Mindfulness'],
            ['name' => 'Sustainable Living'],
            ['name' => 'Digital Minimalism'],
            ['name' => 'Simple Home Decor'],
            ['name' => 'Minimalist Travel'],
            ['name' => 'Self-care'],
            ['name' => 'Personal Growth'],
        ];
    }

    protected function getBlogTagData(): array
    {
        return [
            ['name' => 'Minimalism'],
            ['name' => 'Simplicity'],
            ['name' => 'Mindfulness'],
            ['name' => 'Wellness'],
            ['name' => 'Minimalist Fashion'],
            ['name' => 'Organization'],
            ['name' => 'Sustainability'],
            ['name' => 'Digital Detox'],
            ['name' => 'Travel'],
            ['name' => 'Self-Reflection'],
        ];
    }
}
