@foreach($posts as $post)
    <div class="post featured-post-lg mb-3">
        {!! Theme::partial('blog.post-styles.featured', compact('post')) !!}
    </div>
@endforeach
