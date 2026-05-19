@if ($title = $shortcode->title)
    <div class="section-header">
        <h3 class="section-title">{!! BaseHelper::clean($title) !!}</h3>
        {!! Theme::partial('title-shape') !!}
    </div>
@endif
