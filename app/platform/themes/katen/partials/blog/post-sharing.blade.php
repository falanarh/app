@if ($socials = \Botble\Theme\Supports\ThemeSupport::getSocialSharingButtons($post->url, SeoHelper::getDescription()))
    <div class="social-share me-auto">
        <button title="{{ __('Share post') }}" class="toggle-button icon-share"></button>

        {!! Theme::partial('blog.post-sharing-buttons', compact('socials')) !!}
    </div>
@endif
