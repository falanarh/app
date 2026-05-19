<li class="list-inline-item">
    <a href="{{ $author->url }}" title="{{ $author->name }}" class="d-inline-flex align-items-center author">
        @if ($author->avatar_thumb_url && $avatar ?? true)
            <div class="author-avatar me-2">
                <img src="{{ $author->avatar_thumb_url }}" class="author" alt="author">
            </div>
        @endif

        {{ $author->name }}
    </a>
</li>
