@if ($tags->isNotEmpty())
    <div class="widget rounded text-center widget-blog-tags">
        @if ($name = Arr::get($config, 'name'))
            <div class="widget-header text-center">
                <h3 class="widget-title">{!! BaseHelper::clean($name) !!}</h3>
                {!! Theme::partial('title-shape') !!}
            </div>
        @endif
        <div class="widget-content">
            @foreach($tags as $tag)
                <a href="{{ $tag->url }}" title="{{ $tag->name }}" class="tag">#{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
@endif
