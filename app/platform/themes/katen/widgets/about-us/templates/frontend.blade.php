@php
    Theme::set('headerWrapperClass', 'light');
@endphp

<section class="hero data-bg-image d-flex align-items-center"
         @if ($backgroundImage = Arr::get($config, 'background_image'))
             data-bg-image="{{ RvMedia::getImageUrl($backgroundImage) }}"
    @endif
>
    <div class="container-xl">
        <div class="cta text-center">
            @if ($title = Arr::get($config, 'title'))
                <h2 class="mt-0 mb-4">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            @if ($description = Arr::get($config, 'description'))
                <p class="mt-0 mb-4">{!! BaseHelper::clean($description) !!}</p>
            @endif

            @if (($label = Arr::get($config, 'button_label')) && ($url = Arr::get($config, 'button_url')))
                <a href="{{ $url }}" class="btn btn-light mt-2">{!! BaseHelper::clean($label) !!}</a>
            @endif
        </div>
    </div>

    <span class="mouse">
        <span class="wheel"></span>
    </span>
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 260"><path fill="#FFF" fill-opacity="1" d="M0,256L60,245.3C120,235,240,213,360,218.7C480,224,600,256,720,245.3C840,235,960,181,1080,176C1200,171,1320,213,1380,234.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</section>
