<div class="widget rounded newsletter-widget">
    @if ($title = Arr::get($config, 'title'))
        <div class="widget-header text-center">
            <h3 class="widget-title">{!! BaseHelper::clean($title) !!}</h3>
            {!! Theme::partial('title-shape') !!}
        </div>
    @endif

    <div class="widget-content">
        @if ($subtitle = Arr::get($config, 'subtitle'))
            <span class="newsletter-headline text-center mb-3">{!! BaseHelper::clean($subtitle) !!}</span>
        @endif
        {!! $form->renderForm() !!}

        @if ($description = Arr::get($config, 'description'))
            <span class="newsletter-privacy text-center mt-3">{!! BaseHelper::clean($description) !!}</span>
        @endif
    </div>
</div>
