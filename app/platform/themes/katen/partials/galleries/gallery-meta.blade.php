<ul class="meta list-inline mb-0">
    @if ($author = $gallery->user)
        <li class="list-inline-item">{{ $author->name }}</li>
    @endif
    <li class="list-inline-item">{{ Theme::formatDate($gallery->created_at) }}</li>
</ul>
