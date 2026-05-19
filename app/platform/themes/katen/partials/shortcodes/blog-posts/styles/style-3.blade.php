@php
    $chunkedPosts = $posts->chunk(6);
@endphp

<div class="padding-30 rounded bordered">
    @foreach($chunkedPosts as $posts)
        <div @class(['mb-5' => ! $loop->last])>
            <div class="row gy-2">
                @foreach($posts->take(2) as $post)
                    <div class="col-sm-6">
                        {!! Theme::partial('blog.post-styles.grid', compact('post')) !!}
                    </div>
                @endforeach
            </div>

            <div class="row">
                @foreach($posts->skip(2) as $post)
                    <div class="col-sm-6">
                        {!! Theme::partial('blog.post-styles.list-simple', ['post' => $post, 'wrapperClass' => 'before-seperator']) !!}
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
