@if (($pageTitle = Theme::get('pageTitle')) && Theme::breadcrumb()->enabled())
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach (Theme::breadcrumb()->getCrumbs() as $crumb)
                @if (! $loop->last)

                    <li class="breadcrumb-item">
                        <a href="{{ $crumb['url'] }}" title="{{ $crumb['label'] }}">
                            {{ $crumb['label'] }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
