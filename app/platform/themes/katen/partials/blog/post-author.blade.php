@if (class_exists($post->author_type) && ($author = $post->author) && $post->author->exists)
    <div class="about-author padding-30 rounded">
        @if ($avatar = $author->avatar->url)
            <div class="thumb d-flex align-items-center justify-content-center">
                {{ RvMedia::image($avatar, $author->name, 'thumb') }}
            </div>
        @endif

        <div class="details">
            <div class="name"><a href="{{ $author->url }}" title="{{ $author->name }}">{{ $author->name }}</a></div>
            @if ($description = $author->description)
                <p>{!! BaseHelper::clean($description) !!}</p>
            @endif
        </div>
    </div>

    <div class="spacer" data-height="50"></div>
@endif
