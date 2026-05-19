<div class="padding-30 rounded bordered">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-12 col-sm-6">
                {!! Theme::partial('blog.post-styles.list', compact('post')) !!}
            </div>
        @endforeach
    </div>

    @if ($blogPageUrl = get_blog_page_url())
        <div class="text-center">
            <a href="{{ $blogPageUrl }}" class="btn btn-simple">{{ __('View More') }}</a>
        </div>
    @endif
</div>
