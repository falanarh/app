@if ($items = Theme::getSocialLinks())
    @php
        $backgroundImage = Arr::get($config, 'background_image');
        $backgroundImage = $backgroundImage ? RvMedia::getImageUrl($backgroundImage) : null
    @endphp
    <div class="widget rounded">
        <div class="widget-about data-bg-image text-center" @if($backgroundImage) data-bg-image="{{ $backgroundImage }}" @endif>
            {!! Theme::partial('header.logo', ['wrapperClass' => 'd-flex justify-content-center']) !!}

            @if ($description = Arr::get($config, 'description'))
                <p class="mb-4 mt-4">{!! BaseHelper::clean($description) !!}</p>
            @endif

            <ul class="social-icons list-unstyled list-inline mb-0">
                @include(Theme::getThemeNamespace('widgets.social-links.templates.partials.social-items'), ['wrapperClass' => 'list-inline-item'])
            </ul>
        </div>
    </div>
@endif
