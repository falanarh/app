@php
    $chunkedPosts = $posts->chunk(5);
@endphp

<div class="padding-30 rounded bordered">
    @foreach($chunkedPosts as $posts)
        <div @class(['row gy-5', 'mb-3' => ! $loop->last])>
            @if ($firstPost = $posts->first())
                <div class="col-sm-6">
                    {!! Theme::partial('blog.post-styles.grid', ['post' => $firstPost]) !!}
                </div>
            @endif

            <div class="col-sm-6">
                @foreach($posts->skip(1) as $post)
                    {!! Theme::partial('blog.post-styles.list-simple', compact('post')) !!}
                @endforeach
            </div>
        </div>
    @endforeach
</div>
