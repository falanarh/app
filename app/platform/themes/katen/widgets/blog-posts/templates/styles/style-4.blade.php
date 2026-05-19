@if($posts->isNotEmpty())
    <div class="widget border-0">
        @if ($title = Arr::get($config, 'title'))
            <div class="widget-header text-center">
                <h3 class="widget-title">{!! BaseHelper::clean($title) !!}</h3>
                {!! Theme::partial('title-shape') !!}
            </div>
        @endif

        <div class="widget-content">
            @include(Theme::getThemeNamespace('partials.shortcodes.blog-posts.styles.style-7'))
        </div>
    </div>
@endif
