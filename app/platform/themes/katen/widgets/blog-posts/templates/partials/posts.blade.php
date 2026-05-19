@if ($posts->isNotEmpty())
    @foreach($posts as $post)
        <div class="post post-list-sm circle">
            <div class="thumb circle">
                <a href="{{ $post->url }}">
                    <div class="inner">
                        {{ RvMedia::image($post->image, $post->name, 'thumb', lazy: ! request()->ajax()) }}
                    </div>
                </a>
            </div>
            <div class="details clearfix">
                <div class="post-title my-0 h6">
                    <a title="{{ $post->name }}" class="truncate-custom truncate-2-custom" href="{{ $post->url }}">{{ $post->name }}</a>
                </div>
                {!! Theme::partial('blog.post-widget-meta', compact('post')) !!}
            </div>
        </div>
    @endforeach
@else
    <p class="text-center">{{ $emptyMessage ?? __('No posts') }}</p>
@endif
