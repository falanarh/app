<div class="padding-30 rounded bordered">
    <div class="row gy-4">
        @foreach($posts as $post)
            <div class="col-md-6 col-sm-12">
                {!! Theme::partial('blog.post-styles.grid', compact('post')) !!}
            </div>
        @endforeach
    </div>

    {{-- Pagination Support --}}
    @if (method_exists($posts, 'links'))
        <div class="text-center mt-4">
            {!! $posts->withQueryString()->links() !!}
        </div>
    @elseif ($blogPageUrl = get_blog_page_url())
        <div class="text-center">
            <a href="{{ $blogPageUrl }}" class="btn btn-simple">{{ __('View More') }}</a>
        </div>
    @endif
</div>