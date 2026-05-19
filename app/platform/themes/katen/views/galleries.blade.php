@if ($galleries->isNotEmpty())
    @php
        Theme::set('pageTitle', __('Galleries'));
    @endphp

    @if ($galleries->isNotEmpty())
        <div class="row gy-4">
            @foreach($galleries as $gallery)
                <div class="col-sm-6">
                    {!! Theme::partial('galleries.gallery-item', compact('gallery')) !!}
                </div>
            @endforeach
        </div>

        @if ($galleries instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $galleries->total() > 0)
            <div class="text-center mt-30">
                {{ $galleries->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) }}
            </div>
        @endif
    @else
        {!! Theme::partial('no-content') !!}
    @endif
@endif
