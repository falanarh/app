@if ($posts)
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-12 col-sm-6">
                {!! Theme::partial('blog.post-styles.list', ['post' => $post, 'lazyLoadImage' => false]) !!}
            </div>
        @endforeach
    </div>
@else
    <p class="text-center"> {{ __('No posts') }} </p>
@endif
