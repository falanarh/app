@php
    $wrapperClass = $wrapperClass ?? null;
@endphp

@if ($category)
    <a @class(['category-badge', $wrapperClass]) title="{{ $category->name }}" href="{{ $category->url }}">
        <span>{{ $category->name }}</span>
    </a>
@endif
