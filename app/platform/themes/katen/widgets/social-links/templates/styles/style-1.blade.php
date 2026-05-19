@if ($items = Theme::getSocialLinks())
    <ul @class(['social-icons list-unstyled list-inline mb-0', 'w-100 mt-auto' => $sidebar == 'menu_sidebar']) >
        @include(Theme::getThemeNamespace('widgets.social-links.templates.partials.social-items'), ['wrapperClass' => 'list-inline-item'])
    </ul>
@endif
