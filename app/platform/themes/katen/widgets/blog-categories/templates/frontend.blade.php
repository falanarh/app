@if (is_plugin_active('blog') && $categories->isNotEmpty())
    <div class="widget rounded widget-blog-categories">
        @if ($title = Arr::get($config, 'title'))
            <div class="widget-header text-center">
                <h3 class="widget-title">{!! BaseHelper::clean($title) !!}</h3>
                {!! Theme::partial('title-shape') !!}
            </div>
        @endif
        <div class="widget-content">
            <ul class="list">
                @foreach($categories as $category)
                    <li>
                        <a class="truncate-custom truncate-1-custom" title="{{ $category->name }}" href="{{ $category->url }}">{{ $category->name }}</a>
                        <span>({{ number_format($category->posts_count)  }})</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
