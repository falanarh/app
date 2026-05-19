<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Facades\Html;
use Botble\Base\Supports\BaseSeeder;
use Botble\Media\Facades\RvMedia;
use Botble\Page\Database\Traits\HasPageSeeder;
use Illuminate\Support\Facades\File;

class PageSeeder extends BaseSeeder
{
    use HasPageSeeder;

    public function run(): void
    {
        $this->truncatePages();

        $policyContent = Html::tag('h3', 'EU Cookie Consent') .
            Html::tag(
                'p',
                'To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.'
            ) .
            Html::tag('h4', 'Essential Data') .
            Html::tag(
                'p',
                'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.'
            ) .
            Html::tag(
                'p',
                '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.'
            ) .
            Html::tag(
                'p',
                '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'
            );

        $randomContent = Html::tag('h3', 'Random Content') .
            Html::tag(
                'p',
                'This is a random content that will be displayed on the page.'
            );

        $pages = [
            [
                'name' => 'Homepage',
                'content' => Html::tag('div', '[blog-posts style="style-1" category_ids="1,4,6" limit="1"][/blog-posts]') .
                    Html::tag('div', '[blog-posts enable_lazy_loading="yes" style="style-2" category_ids="2,6,7,8,9" title="Editor’s Pick" limit="5"][/blog-posts]') .
                    Html::tag('div', '[blog-posts enable_lazy_loading="yes" style="style-3" category_ids="2,4,5,6,7" title="Trending" limit="6"][/blog-posts]') .
                    Html::tag('div', '[blog-posts enable_lazy_loading="yes" style="style-4" category_ids="2,4,5,6,7" title="Inspiration" limit="6"][/blog-posts]') .
                    Html::tag('div', '[blog-posts enable_lazy_loading="yes" style="style-5" category_ids="2,4,6,7" title="Latest Posts" limit="6"][/blog-posts]'),
                'template' => 'homepage',
            ],
            [
                'name' => 'Blog',
                'content' => $randomContent,
                'template' => 'default',
            ],
            [
                'name' => 'Contact Us',
                'content' => '[contact-form display_fields="phone,email,subject,address" mandatory_fields="email" title="Send Message" quantity="3" title_1="Phone" icon_1="ti ti-phone" description_1="+1-202-555-0135" url_1="tel:+1-202-555-0135" open_in_new_tab_1="no" title_2="E-Mail" description_2="hello@example.com" url_2="mailto:hello@example.com" open_in_new_tab_2="yes" icon_2="ti ti-mail" title_3="Location" description_3="California, USA" open_in_new_tab_3="yes" icon_3="ti ti-map"][/contact-form]',
                'template' => 'no-sidebar',
            ],
            [
                'name' => 'About Us',
                'content' => str_replace('__image__', RvMedia::getImageUrl($this->filePath('general/about-us.jpg')), File::get(database_path('seeders/contents/about-us.html'))),
                'template' => 'default',
            ],
            [
                'name' => 'Cookie Policy',
                'content' => $policyContent,
                'template' => 'no-sidebar',
            ],
            [
                'name' => 'Terms Of Use',
                'content' => $policyContent,
                'template' => 'no-sidebar',
            ],
            [
                'name' => 'Privacy Policy',
                'content' => $policyContent,
                'template' => 'no-sidebar',
            ],
        ];

        $this->createPages($pages);
    }
}
