{!! apply_filters('ads_render', null, 'post_list_before', ['class' => 'mb-2']) !!}

@if ($posts->isNotEmpty())
    {!! Theme::partial('blog.posts', compact('posts')) !!}

    @if ($posts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $posts->total() > 0)
        <div class="text-center mt-30">
            {{ $posts->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) }}
        </div>
    @endif

@else
    {!! Theme::partial('no-content') !!}
@endif

{!! apply_filters('ads_render', null, 'post_list_after', ['class' => 'mt-2']) !!}
