<div class="row gy-4">
    @foreach($posts as $post)
        <div class="col-sm-6">
            {!! Theme::partial('blog.post-item', compact('post')) !!}
        </div>
    @endforeach
</div>
